<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealsResource;
use App\Models\DataMeal;
use App\Models\Day;
use App\Models\Meal;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Class MealController
 * @package App\Http\Controllers
 */
class MealController extends Controller
{
    public function import(Request $request)
    {
        $file        = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file);
        $worksheet   = $spreadsheet->getActiveSheet();
        $rows        = $worksheet->toArray();
        $mainMeals = [];
        $days = Day::select("id", "name")->get();
        Meal::where([["week_id", $request->week_id], ["user_id", $request->user_id]])->delete();

        $dataMeal = $rows;
        array_shift($dataMeal);

        // Remove first element "Day"
        array_shift($rows[0]);

        foreach ($rows[0] as $index => $mainMeal) {
            $mealData = [];
            $result   = $this->getTimeAndTitle($mainMeal);

            $meal   = Meal::create([
                "user_id" => $request->user_id,
                "week_id" => $request->week_id,
                "title"   => $result["title"] ?? "-",
                "time"    => $result["time"] ?? "1:00 PM",
            ]);

            foreach ($dataMeal as $row) {
                array_push($mealData,  [
                    "body"    => $row[$index + 1] ?? "-",
                    "day_id"  => $days->where("name",  ucfirst($row[0]))->first()->id ?? 1,
                    "meal_id" => $meal->id,
                ]);
            }

            DataMeal::insert($mealData);
        }


        return redirect()->route('users.nutrition.plan', ["id" => $request->user_id]);
    }

    function getTimeAndTitle($inputString)
    {
        $time = null;
        $title = null;

        // Extract the time using regular expression
        if (preg_match('/\d{1,2}:\d{2} [APap][Mm]/', $inputString, $timeMatches)) {
            $time = $timeMatches[0];
        }

        // Extract the title by removing the time from the input string
        $title = trim(str_replace($time, '', $inputString));

        return ['time' => $time, 'title' => $title];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::paginate();

        return view('meal.index', compact('meals'))
            ->with('i', (request()->input('page', 1) - 1) * $meals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meal = new Meal();
        $data = $this->getFormData($meal->user_id);

        return view('meal.create', compact(['meal', 'data']));
    }

    // For specific user
    public function creationView($userID)
    {
        $meal = new Meal();
        $user = User::findOrFail($userID);
        $data = $this->getFormData($user);

        return view('meal.create', compact(['meal', 'data', 'user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Meal::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title"]
        );

        $meal = Meal::create($data);

        return redirect()->route('users.meals', $meal->user_id)
            ->with('success', 'Meal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::find($id);
        $dataMeals = DataMeal::where("meal_id", $id)->paginate();

        return view('meal.show', compact(['meal', 'dataMeals']))
            ->with('i', (request()->input('page', 1) - 1) * $dataMeals->perPage());;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::find($id);
        $user = User::findOrFail($meal->user_id);
        $data = $this->getFormData($user);

        return view('meal.edit', compact(['meal', 'data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Meal $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        request()->validate(Meal::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title"]
        );

        $meal->update($data);

        return redirect()->route('users.meals', $meal->user_id)
            ->with('success', 'Meal updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $meal   = Meal::find($id);
        $userID = $meal->user_id;
        $meal->delete();

        return redirect()->route('users.meals', $userID)
            ->with('success', 'Meal deleted successfully');
    }

    public function getFormData($user)
    {
        $numberOfMonths = array_sum($user->subscription_history);
        $numberOfWeeks  = floor(($numberOfMonths * 30) / 7)  ;
  
        $weeks = Week::limit( $numberOfWeeks)->pluck("title", "id");

        return [
            "weeks" => $weeks,
        ];
    }
}
