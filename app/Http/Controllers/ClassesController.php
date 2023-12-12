<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::orderBy("created_at", "DESC")->paginate();

        return view('class.index', compact('classes'))
            ->with('i', (request()->input('page', 1) - 1) * $classes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = new Classes();
        return view('class.create', compact(['class']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Classes::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title", "description"]
        );

        if ($file = $request->file('thumbnail_url')) {
            $data['thumbnail_url'] = $this->uploads($file, "classes");
        }

        Classes::create($data);

        return redirect()->route('class.index')
            ->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classes::find($id);

        return view('class.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classes::find($id);

        return view('class.edit', compact(['class']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PlanClass $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        request()->validate(Classes::$rules);

        $data = $this->handleTranslatableInput($request->all(), ["title", "description"]);

        if ($file = $request->file('thumbnail_url')) {
            $data['thumbnail_url'] = $this->uploads($file, "classes");
        }

        $class->update($data);

        return redirect()->route('class.index')
            ->with('success', 'Class updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $class = Classes::find($id);
        Storage::disk('s3')->delete("classes/" . substr($class->thumbnail_url, strrpos($class->thumbnail_url, '/') + 1));
        Storage::disk('s3')->delete("classes/" . substr($class->video_url, strrpos($class->video_url, '/') + 1));
        $class->delete();

        return redirect()->route('class.index')
            ->with('success', 'Class deleted successfully');
    }
}
