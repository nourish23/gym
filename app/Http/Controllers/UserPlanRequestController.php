<?php

namespace App\Http\Controllers;

use App\Models\UserPlanRequest;
use Illuminate\Http\Request;

/**
 * Class UserPlanRequestController
 * @package App\Http\Controllers
 */
class UserPlanRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPlanRequests = UserPlanRequest::paginate();

        return view('user-plan-request.index', compact('userPlanRequests'))
            ->with('i', (request()->input('page', 1) - 1) * $userPlanRequests->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userPlanRequest = new UserPlanRequest();
        return view('user-plan-request.create', compact('userPlanRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserPlanRequest::$rules);

        $userPlanRequest = UserPlanRequest::create($request->all());

        return redirect()->route('{userplanrequests}.index')
            ->with('success', 'UserPlanRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userPlanRequest = UserPlanRequest::find($id);

        return view('user-plan-request.show', compact('userPlanRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userPlanRequest = UserPlanRequest::find($id);

        return view('user-plan-request.edit', compact('userPlanRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserPlanRequest $userPlanRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPlanRequest $userPlanRequest)
    {
        request()->validate(UserPlanRequest::$rules);

        $userPlanRequest->update($request->all());

        return redirect()->route('{userplanrequests}.index')
            ->with('success', 'UserPlanRequest updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userPlanRequest = UserPlanRequest::find($id)->delete();

        return redirect()->route('{userplanrequests}.index')
            ->with('success', 'UserPlanRequest deleted successfully');
    }
}
