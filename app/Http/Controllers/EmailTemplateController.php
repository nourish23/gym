<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Mail\DynamicEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailTemplateController
 * @package App\Http\Controllers
 */
class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailTemplates = EmailTemplate::paginate(10);

        return view('email-template.index', compact('emailTemplates'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('email', 'id');
        return view('email-template.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|array',
            'user_id.*' => 'exists:users,id',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        foreach ($validatedData['user_id'] as $userId) {
            $emailTemplate = EmailTemplate::create([
                'user_id' => $userId,
                'subject' => $validatedData['subject'],
                'content' => $validatedData['content'],
            ]);

            Mail::to(User::find($userId)->email)->send(new DynamicEmail($emailTemplate));
        }

        return redirect()->route('email-templates.index')->with('success', 'Emails sent successfully.');
    }

    public function destroy($id)
    {
        EmailTemplate::find($id)->delete();

        return redirect()->route('email-templates.index')
            ->with('success', 'EmailTemplate deleted successfully');
    }
}
