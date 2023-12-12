<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\PlanClass;
use App\Models\ScheduledClass;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

/**
 * Class ScheduledClassController
 * @package App\Http\Controllers
 */
class ScheduledClassController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduledClasses = ScheduledClass::paginate();
        $timezone = $this->getLocalTimezone(request()->ip());
        return view('scheduled-class.index', compact(['scheduledClasses', 'timezone']))
            ->with('i', (request()->input('page', 1) - 1) * $scheduledClasses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scheduledClass = new ScheduledClass();
        $days        = Day::pluck("name", "id");
        $planClasses = PlanClass::where("class_type", 0)->pluck("title", "id");
        $timezone = $this->getLocalTimezone(request()->ip());;

        return view('scheduled-class.create', compact(['scheduledClass', "days", "planClasses", "timezone"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ScheduledClass::$rules);

        $data  = $request->all();
        $data["start_time"]  = Carbon::parse($data["start_time_utc"])->format("Y-m-d H:i:s");
        $data["end_time"]    = Carbon::parse($data["end_time_utc"])->format("Y-m-d H:i:s");


        ScheduledClass::create($data);

        return redirect()->route('scheduled-classes.index')
            ->with('success', 'ScheduledClass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scheduledClass = ScheduledClass::find($id);
        $timezone = $this->getLocalTimezone(request()->ip());;

        return view('scheduled-class.show', compact(['scheduledClass',  "timezone"]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduledClass = ScheduledClass::find($id);
        $days           = Day::pluck("name", "id");
        $planClasses    = PlanClass::where("class_type", 0)->pluck("title", "id");
        $timezone       = $this->getLocalTimezone(request()->ip());;
        return view('scheduled-class.edit', compact(['scheduledClass', "days", "planClasses", "timezone"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ScheduledClass $scheduledClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduledClass $scheduledClass)
    {
        request()->validate(ScheduledClass::$rules);
        $data  = $request->all();
        $data["start_time"]  = Carbon::parse($data["start_time_utc"])->format("Y-m-d H:i:s");
        $data["end_time"]    = Carbon::parse($data["end_time_utc"])->format("Y-m-d H:i:s");


        $scheduledClass->update($data);

        return redirect()->route('scheduled-classes.index')
            ->with('success', 'ScheduledClass updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        ScheduledClass::find($id)->delete();

        return redirect()->route('scheduled-classes.index')
            ->with('success', 'ScheduledClass deleted successfully');
    }

    function getLocalTimezone($ip)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://ipapi.co/' . $ip . '/json');
            $location = json_decode($response->getBody()->getContents(), true);
            if (empty($location['timezone'])) {
                return 'Asia/Amman';
            }
            return $location['timezone'];
        } catch (\Exception $e) {
            return 'Asia/Amman';
        }
    }
}
