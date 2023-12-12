<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealsResource;
use App\Models\BodyMeasurement;
use App\Models\Category;
use App\Models\DataMeal;
use App\Models\Day;
use App\Models\Meal;
use App\Models\NutritionPlan;
use App\Models\Plan;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;


/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();


        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $categories = Category::pluck("title", "id");
        $plans = Plan::pluck("title", "id");
        return view('user.create', compact(['user', 'categories', 'plans']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);
        $plan = Plan::where('category_id', $request->services)->where('period', $request->subscription)->first();

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $categories = Category::pluck("title", "id");
        $periods    = Plan::select('title', 'period')
            ->distinct('period')
            ->pluck("title", "period");

        return view('user.edit', compact(['user', "categories", "periods"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);
        $data = $request->all();

        if ((int)$data['is_new_subscription']) {
            $plan = Plan::select("id", "period")
                ->where('category_id', $request->category_id)
                ->where('period', $request->period)
                ->first();

            $dataArray = $user->subscription_history;
            array_push($dataArray, $plan->period);
            $date = Carbon::now() > Carbon::parse($user->subscription_end_date) ? Carbon::now() : Carbon::parse($user->subscription_end_date);

            $data += [
                'plan_id' => $plan->id,
                'subscription_end_date'   => $date->addMonths($plan->period)->format("Y-m-d H:i:s"),
                'subscription_start_date' => Carbon::now()->toDateString(),
                "subscription_history"    =>  $dataArray
            ];
        }

        if ($data["is_active"] == "1" && $user->is_active != $data["is_active"]) {
            $subscription_start_date = Carbon::now()->toDateString();
            $subscription_end_date = Carbon::now()->addDays(7)->toDateString();
        } else {
            $subscription_start_date = $user->subscription_start_date;
            $subscription_end_date = $user->subscription_end_date;
        }

        if ($data["is_paid"] == "1" && $user->is_paid != $data["is_paid"]) {
            $subscription_end_date = Carbon::parse($subscription_end_date)->addMonths($user->plan->period)->toDateString();
        }

        $data['subscription_start_date'] = $subscription_start_date;
        $data['subscription_end_date'] = $subscription_end_date;

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function getUsers()
    {

        if (request()->has("filter") && request()->filter == "subscriptions") {
            $endDate = Carbon::now()->addDays(3)->endOfDay();
            $users = User::where([
                ["subscription_end_date", "<=", $endDate],
                ["subscription_end_date", ">", Carbon::now()]
            ])->get();

        } else {
            $users = User::get();
        }
        return  DataTables::of($users)->make(true);
    }

    public function getUserNutritionPlan($userID, $weekID = 1)
    {
        $user = User::find($userID);
        $weekCount = $user->meal()->distinct('week_id')->count('week_id');
        $days   = Day::get();
        $weekID = null;
        $weekMeals = [];
        $weeks = Meal::select("week_id")
            ->where([['user_id', $userID], ['status', '1']])
            ->with('week')
            ->groupBy("week_id")
            ->paginate(1);

        if (!empty($weeks[0])) {
            $weekID = $weeks[0]->week_id;

            $weekMeals = Meal::where('week_id', $weekID)
                ->where([['user_id', $userID], ['status', '1']])
                ->with('dataMeals')
                ->get();
        }

        return view('user.nutritionPlan', compact(['weekMeals', "days", "weeks",  "weekCount", 'weekID', 'userID']));
    }

    public function getUserMeasurements($id)
    {
        $bodyMeasurements = BodyMeasurement::where("user_id", $id)->paginate();

        return view('user.bodyMeasurements', compact(['bodyMeasurements', 'id']))
            ->with('i', (request()->input('page', 1) - 1) * $bodyMeasurements->perPage());;
    }

    public function getUserMeals($userID)
    {
        $meals = Meal::where("user_id", $userID)->paginate();
        $user  = User::where("id", $userID)->first();

        return view('user.meals', compact(['meals', 'user']))
            ->with('i', (request()->input('page', 1) - 1) * $meals->perPage());;
    }
}
