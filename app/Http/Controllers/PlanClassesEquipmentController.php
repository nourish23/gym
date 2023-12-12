<?php

namespace App\Http\Controllers;

use App\Models\PlanClassesEquipment;
use Illuminate\Http\Request;

/**
 * Class PlanClassesEquipmentController
 * @package App\Http\Controllers
 */
class PlanClassesEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planClassesEquipments = PlanClassesEquipment::paginate();

        return view('plan-classes-equipment.index', compact('planClassesEquipments'))
            ->with('i', (request()->input('page', 1) - 1) * $planClassesEquipments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planClassesEquipment = new PlanClassesEquipment();
        return view('plan-classes-equipment.create', compact('planClassesEquipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PlanClassesEquipment::$rules);

        $planClassesEquipment = PlanClassesEquipment::create($request->all());

        return redirect()->route('{planclassesequipments}.index')
            ->with('success', 'PlanClassesEquipment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planClassesEquipment = PlanClassesEquipment::find($id);

        return view('plan-classes-equipment.show', compact('planClassesEquipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planClassesEquipment = PlanClassesEquipment::find($id);

        return view('plan-classes-equipment.edit', compact('planClassesEquipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PlanClassesEquipment $planClassesEquipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanClassesEquipment $planClassesEquipment)
    {
        request()->validate(PlanClassesEquipment::$rules);

        $planClassesEquipment->update($request->all());

        return redirect()->route('{planclassesequipments}.index')
            ->with('success', 'PlanClassesEquipment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $planClassesEquipment = PlanClassesEquipment::find($id)->delete();

        return redirect()->route('{planclassesequipments}.index')
            ->with('success', 'PlanClassesEquipment deleted successfully');
    }
}
