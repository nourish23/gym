<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

/**
 * Class EquipmentController
 * @package App\Http\Controllers
 */
class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::paginate();

        return view('equipments.index', compact('equipments'))
            ->with('i', (request()->input('page', 1) - 1) * $equipments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment = new Equipment();
        return view('equipments.create', compact('equipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Equipment::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["name", "additional_info"]
        );

        Equipment::create($data);

        return redirect()->route('equipments.index')
            ->with('success', 'Equipment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = Equipment::find($id);

        return view('equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::find($id);

        return view('equipments.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipment $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        request()->validate(Equipment::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["name", "additional_info"]
        );
        
        $equipment->update($data);

        return redirect()->route('equipments.index')
            ->with('success', 'Equipment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipment = Equipment::find($id)->delete();

        return redirect()->route('equipments.index')
            ->with('success', 'Equipment deleted successfully');
    }
}
