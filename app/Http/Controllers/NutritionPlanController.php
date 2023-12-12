<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataMealResource;
use App\Http\Resources\MealsResource;
use App\Models\BodyMeasurement;
use App\Models\Day;
use App\Models\Meal;
use App\Models\NutritionPlan;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class NutritionPlanController
 * @package App\Http\Controllers
 */
class NutritionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nutritionPlans = NutritionPlan::paginate();

        return view('nutrition-plan.index', compact('nutritionPlans'))
            ->with('i', (request()->input('page', 1) - 1) * $nutritionPlans->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nutritionPlan = new NutritionPlan();
        return view('nutrition-plan.create', compact('nutritionPlan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creationView($userID)
    {
        $nutritionPlan = new NutritionPlan();
        $data = $this->getFormData($userID);
        return view('nutrition-plan.create', compact(['nutritionPlan', "data"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(NutritionPlan::$rules);

        $nutritionPlan = NutritionPlan::create($request->all());

        return redirect()->route('users.nutrition.plan', $request->user_id)
            ->with('success', 'NutritionPlan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nutritionPlan = NutritionPlan::find($id);

        return view('nutrition-plan.show', compact('nutritionPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nutritionPlan = NutritionPlan::find($id);
        $data = $this->getFormData($nutritionPlan->user_id);

        return view('nutrition-plan.edit', compact(['nutritionPlan', 'data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  NutritionPlan $nutritionPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NutritionPlan $nutritionPlan)
    {
        request()->validate(NutritionPlan::$rules);

        $nutritionPlan->update($request->all());

        return redirect()->route('users.nutrition.plan', $request->user_id)
            ->with('success', 'NutritionPlan updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nutritionPlan = NutritionPlan::findOrFail($id);
        $user_id = $nutritionPlan->user_id;
        $nutritionPlan->delete();

        return redirect()->route('users.nutrition.plan', $user_id)
            ->with('success', 'NutritionPlan deleted successfully');
    }

    public function getFormData($userID)
    {
        return [
            "bodyMeasurement" => BodyMeasurement::where("user_id", $userID)->pluck("weight", "id"),
            "days" =>  Day::pluck("name", "id"),
            "plans" => Plan::pluck("title", "id"),
            "meals" => Meal::where("user_id", $userID)->pluck("title", "id"),
            "user" => User::where("id", $userID)->first(),
        ];
    }
}
