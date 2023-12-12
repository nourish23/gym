<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class PlanController
 * @package App\Http\Controllers
 */
class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::paginate();

        return view('plan.index', compact('plans'))
            ->with('i', (request()->input('page', 1) - 1) * $plans->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plan = new Plan();
        $categories = Category::pluck("title", "id");

        return view('plan.create', compact(['plan', "categories"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Plan::$rules);
        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title"]
        );
        if ($file = $request->file('image')) {
            $data['image'] = $this->uploads($file, "plans");
        }

        $plan = Plan::create($data);

        return redirect()->route('plans.index')
            ->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::find($id);

        return view('plan.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        $categories = Category::pluck("title", "id");

        return view('plan.edit', compact(['plan', "categories"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        request()->validate(Plan::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title"]
        );

        if ($file = $request->file('image')) {
            $data['image'] = $this->uploads($file, "plans");
        }
        $plan->update($data);

        return redirect()->route('plans.index')
            ->with('success', 'Plan updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        Storage::disk('s3')->delete("plans/" . substr($plan->image, strrpos($plan->image, '/') + 1));
        $plan->delete();

        return redirect()->route('plans.index')
            ->with('success', 'Plan deleted successfully');
    }
}
