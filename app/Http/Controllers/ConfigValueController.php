<?php

namespace App\Http\Controllers;

use App\Models\ConfigValue;
use Illuminate\Http\Request;

/**
 * Class ConfigValueController
 * @package App\Http\Controllers
 */
class ConfigValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configValues = ConfigValue::paginate();

        return view('config-value.index', compact('configValues'))
            ->with('i', (request()->input('page', 1) - 1) * $configValues->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configValue = new ConfigValue();
        return view('config-value.create', compact('configValue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ConfigValue::$rules);

        $configValue = ConfigValue::create($request->all());

        return redirect()->route('{config_values}.index')
            ->with('success', 'ConfigValue created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configValue = ConfigValue::find($id);

        return view('config-value.show', compact('configValue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configValue = ConfigValue::find($id);

        return view('config-value.edit', compact('configValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ConfigValue $configValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigValue $configValue)
    {
        request()->validate(ConfigValue::$rules);

        $configValue->update($request->all());

        return redirect()->route('{config_values}.index')
            ->with('success', 'ConfigValue updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $configValue = ConfigValue::find($id)->delete();

        return redirect()->route('{config_values}.index')
            ->with('success', 'ConfigValue deleted successfully');
    }
}
