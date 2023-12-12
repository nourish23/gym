<?php

namespace App\Http\Controllers;

use App\Models\UserService;
use Illuminate\Http\Request;

/**
 * Class UserServiceController
 * @package App\Http\Controllers
 */
class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userServices = UserService::paginate();

        return view('user-service.index', compact('userServices'))
            ->with('i', (request()->input('page', 1) - 1) * $userServices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userService = new UserService();
        return view('user-service.create', compact('userService'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserService::$rules);

        $userService = UserService::create($request->all());

        return redirect()->route('{userservices}.index')
            ->with('success', 'UserService created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userService = UserService::find($id);

        return view('user-service.show', compact('userService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userService = UserService::find($id);

        return view('user-service.edit', compact('userService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserService $userService)
    {
        request()->validate(UserService::$rules);

        $userService->update($request->all());

        return redirect()->route('{userservices}.index')
            ->with('success', 'UserService updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userService = UserService::find($id)->delete();

        return redirect()->route('{userservices}.index')
            ->with('success', 'UserService deleted successfully');
    }
}
