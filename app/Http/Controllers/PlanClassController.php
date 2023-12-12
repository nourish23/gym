<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Equipment;
use App\Models\PlanClass;
use App\Models\PlanClassesEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

/**
 * Class PlanClassController
 * @package App\Http\Controllers
 */
class PlanClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planClasses = PlanClass::orderBy("created_at", "DESC")->get();

        return view('plan-class.index', compact('planClasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planClass  = new PlanClass();
        $coaches    = Coach::pluck("name", "id");
        $equipments = Equipment::pluck("name", "id");

        return view('plan-class.create', compact(['planClass', "coaches", "equipments"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PlanClass::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title", "description"]
        );

        if ($file = $request->file('thumbnail_url')) {
            $data['thumbnail_url'] = $this->uploads($file, "classes_plan");
        }

        $data['video_url'] = $request->link;

        $plan = PlanClass::create($data);

        if ($request->has("equipment_id") && !is_null($request->equipment_id[0])) {
            foreach ($request->equipment_id as $id) {
                PlanClassesEquipment::create([
                    "equipment_id"  => $id,
                    "plan_class_id" => $plan->id,
                ]);
            }
        }

        return redirect()->route('planclasses.index')
            ->with('success', 'PlanClass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planClass = PlanClass::find($id);

        return view('plan-class.show', compact('planClass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planClass = PlanClass::find($id);
        $coaches   = Coach::pluck("name", "id");
        $equipments = Equipment::pluck("name", "id");
        $selectedEquipments = PlanClassesEquipment::select("id")->where("plan_class_id", $id)->pluck("id");

        return view('plan-class.edit', compact(['planClass', "coaches", "equipments", "selectedEquipments"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PlanClass $planClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $planClass = PlanClass::findOrFail($id);
        request()->validate(PlanClass::$rules);
        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title", "description"]
        );
        if ($file = $request->file('thumbnail_url')) {
            $data['thumbnail_url'] = $this->uploads($file, "classes_plan");
        }
        $data['video_url'] = $request->link;

        if ($request->has("equipment_id") && !is_null($request->equipment_id[0])) {
            foreach ($request->equipment_id as $equipmentId) {
                $existingEntry = PlanClassesEquipment::where('equipment_id', $equipmentId)
                    ->where('plan_class_id', $planClass->id)
                    ->first();

                if (!$existingEntry) {
                    PlanClassesEquipment::create([
                        "equipment_id" => $equipmentId,
                        "plan_class_id" => $planClass->id,
                    ]);
                }
            }
        }

        $planClass->update($data);

        return redirect()->route('planclasses.index')
            ->with('success', 'PlanClass updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $planClass = PlanClass::find($id);
        Storage::disk('s3')->delete("classes_plan/" . substr($planClass->thumbnail_url, strrpos($planClass->thumbnail_url, '/') + 1));
        Storage::disk('s3')->delete("classes_plan/" . substr($planClass->video_url, strrpos($planClass->video_url, '/') + 1));
        $planClass->delete();

        return redirect()->route('planclasses.index')
            ->with('success', 'PlanClass deleted successfully');
    }
}
