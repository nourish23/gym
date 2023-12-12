<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class SliderController
 * @package App\Http\Controllers
 */
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate();

        return view('slider.index', compact('sliders'))
            ->with('i', (request()->input('page', 1) - 1) * $sliders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = new Slider();
        return view('slider.create', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Slider::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title", "text"]
        );

        if ($file = $request->file('image_url')) {
            $data['image_url'] = $this->uploads($file, "slider");
        }

        Slider::create($data);

        return redirect()->route('sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);

        return view('slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        request()->validate(Slider::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title", "text"]
        );

        if ($file = $request->file('image_url')) {
            $data['image_url'] = $this->uploads($file, "slider");
        }

        $slider->update($data);

        return redirect()->route('sliders.index')
            ->with('success', 'Slider updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        Storage::disk('s3')->delete("slider/" . substr($slider->image_url, strrpos($slider->image_url, '/') + 1));
        $slider->delete();

        return redirect()->route('sliders.index')
            ->with('success', 'Slider deleted successfully');
    }
}
