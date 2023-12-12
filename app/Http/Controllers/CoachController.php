<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class CoachController
 * @package App\Http\Controllers
 */
class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaches = Coach::paginate();

        return view('coach.index', compact('coaches'))
            ->with('i', (request()->input('page', 1) - 1) * $coaches->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coach = new Coach();
        return view('coach.create', compact('coach'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Coach::$rules);
        $data = $this->handleTranslatableInput(
            $request->all(),
            ["name", "description", "brief"]
        );

        if ($file = $request->file('image_url')) {
            $data['image_url'] = $this->uploads($file, "coaches");
        }

        Coach::create($data);

        return redirect()->route('coachs.index')
            ->with('success', 'Coach created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coach = Coach::find($id);

        return view('coach.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coach = Coach::find($id);

        return view('coach.edit', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Coach $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coach $coach)
    {
        request()->validate(Coach::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["name", "description", "brief"]
        );
        
        if ($file = $request->file('image_url')) {
            $data['image_url'] = $this->uploads($file, "coaches");
        }

        $coach->update($data);

        return redirect()->route('coachs.index')
            ->with('success', 'Coach updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coach = Coach::find($id);
        Storage::disk('s3')->delete("coaches/" . substr($coach->image_url, strrpos($coach->image_url, '/') + 1));
        $coach->delete();
        
        return redirect()->route('coachs.index')
            ->with('success', 'Coach deleted successfully');
    }
}
