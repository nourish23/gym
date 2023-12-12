<?php

namespace App\Http\Controllers;

use App\Models\Week;
use Illuminate\Http\Request;

/**
 * Class WeekController
 * @package App\Http\Controllers
 */
class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeks = Week::paginate();

        return view('week.index', compact('weeks'))
            ->with('i', (request()->input('page', 1) - 1) * $weeks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $week = new Week();
        return view('week.create', compact('week'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Week::$rules);

        $week = Week::create($request->all());

        return redirect()->route('weeks.index')
            ->with('success', 'Week created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $week = Week::find($id);

        return view('week.show', compact('week'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $week = Week::find($id);

        return view('week.edit', compact('week'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Week $week
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Week $week)
    {
        request()->validate(Week::$rules);

        $week->update($request->all());

        return redirect()->route('weeks.index')
            ->with('success', 'Week updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $week = Week::find($id)->delete();

        return redirect()->route('weeks.index')
            ->with('success', 'Week deleted successfully');
    }
}
