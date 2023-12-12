<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

/**
 * Class NewsletterController
 * @package App\Http\Controllers
 */
class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::paginate();

        return view('newsletter.index', compact('newsletters'))
            ->with('i', (request()->input('page', 1) - 1) * $newsletters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsletter = new Newsletter();
        return view('newsletter.create', compact('newsletter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Newsletter::$rules);

        $newsletter = Newsletter::create($request->all());

        return redirect()->route('{newsletters}.index')
            ->with('success', 'Newsletter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsletter = Newsletter::find($id);

        return view('newsletter.show', compact('newsletter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = Newsletter::find($id);

        return view('newsletter.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Newsletter $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        request()->validate(Newsletter::$rules);

        $newsletter->update($request->all());

        return redirect()->route('{newsletters}.index')
            ->with('success', 'Newsletter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id)->delete();

        return redirect()->route('{newsletters}.index')
            ->with('success', 'Newsletter deleted successfully');
    }
}
