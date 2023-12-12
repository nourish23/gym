<?php

namespace App\Http\Controllers;

use App\Models\BodyMeasurement;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class BodyMeasurementController
 * @package App\Http\Controllers
 */
class BodyMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodyMeasurements = BodyMeasurement::paginate();

        return view('body-measurement.index', compact('bodyMeasurements'))
            ->with('i', (request()->input('page', 1) - 1) * $bodyMeasurements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodyMeasurement = new BodyMeasurement();
        $users = $this->getFormData();
        return view('body-measurement.create', compact(['bodyMeasurement', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creationView($userID)
    {
        $bodyMeasurement = new BodyMeasurement();

        return view('body-measurement.create', compact(['bodyMeasurement', 'userID']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BodyMeasurement::$rules);

        $bodyMeasurement = BodyMeasurement::create($request->all());

        return redirect()->route('users.body.measurements', $request->user_id)
            ->with('success', 'BodyMeasurement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bodyMeasurement = BodyMeasurement::find($id);

        return view('body-measurement.show', compact('bodyMeasurement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userID)
    {
        $bodyMeasurement = BodyMeasurement::find($userID);
        $users = $this->getFormData();
        return view('body-measurement.edit', compact(['bodyMeasurement', 'userID', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BodyMeasurement $bodyMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BodyMeasurement $bodyMeasurement)
    {
        request()->validate(BodyMeasurement::$rules);

        $bodyMeasurement->update($request->all());

        return redirect()->route('users.body.measurements', $bodyMeasurement->user_id)
            ->with('success', 'BodyMeasurement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bodyMeasurement =  BodyMeasurement::findOrFail($id);
        $user_id = $bodyMeasurement->user_id;
        $bodyMeasurement->delete();

        return redirect()->route('users.body.measurements',  $user_id)
            ->with('success', 'BodyMeasurement deleted successfully');
    }

    public function getFormData()
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        $userOptions = $users->map(function ($user) {
            $fullName = $user->first_name . ' ' . $user->last_name;
            return ['id' => $user->id, 'name' => $fullName];
        })->pluck('name', 'id')->toArray();

        return  $userOptions;
    }
}
