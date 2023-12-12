<?php

namespace App\Http\Controllers;

use App\Models\DataMeal;
use App\Models\Day;
use Illuminate\Http\Request;

/**
 * Class DataMealController
 * @package App\Http\Controllers
 */
class DataMealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMeals = DataMeal::paginate();

        return view('data-meal.index', compact('dataMeals'))
            ->with('i', (request()->input('page', 1) - 1) * $dataMeals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataMeal = new DataMeal();
        return view('data-meal.create', compact('dataMeal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function creationView($mealID)
    {
        $dataMeal = new DataMeal();
        $days     = Day::pluck("name", "id");
        return view('data-meal.create', compact(['dataMeal', 'days', 'mealID']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DataMeal::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["body"]
        );

        $dataMeal = DataMeal::create($request->all());

        return redirect()->route('meals.show', $request->meal_id)
            ->with('success', 'DataMeal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataMeal = DataMeal::find($id);

        return view('data-meal.show', compact('dataMeal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataMeal = DataMeal::find($id);
        $mealID   = $dataMeal->meal_id;
        $days     = Day::pluck("name", "id");

        return view('data-meal.edit', compact(['dataMeal', 'days', 'mealID']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DataMeal $dataMeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataMeal $dataMeal)
    {
        request()->validate(DataMeal::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["body"]
        );

        $dataMeal->update($request->all());

        return redirect()->route('meals.show', $dataMeal->meal_id)
            ->with('success', 'DataMeal updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dataMeal = DataMeal::find($id);
        $mealID   = $dataMeal->meal_id;
        $dataMeal->delete();

        return redirect()->route('meals.show', $mealID)
            ->with('success', 'DataMeal deleted successfully');
    }
}
