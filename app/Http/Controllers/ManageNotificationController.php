<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\EmailTemplate;
use App\Models\ManageNotification;
use App\Models\User;
use App\Notifications\CustomNotifications;
use App\Services\FireBaseServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendCustomNotificationJob;

/**
 * Class ManageNotificationController
 * @package App\Http\Controllers
 */
class ManageNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n = DB::table('notifications as n')
            ->select('n.*')
            ->paginate(10);
        return view('manage-notification.index', compact('n'));
    }

    public function create()
    {
        $users = User::pluck('email', 'id');

        return view('manage-notification.create', ['users' => $users]);
    }

    public function sendNotification(Request $request)
    {


        $title = $request->input('title', '');
        $body = $request->input('body', '');
        $dt = Carbon::now();
        if ($request->user_group == 0) {
            $selectedUsers = $request->input('user_id', []);
            $users = User::whereIn('id', $selectedUsers)->get();
        } else {
            if ($request->user_group == 1) {
                $users = User::where('is_active', 1)->get();
            } elseif ($request->user_group == 2) {
                $users = User::where('is_active', 0)->get();
            } elseif ($request->user_group == 3) {
                $users = User::all();
            }

        }

        $notificationData = [
            'title' => $title,
            'body' => $body,
            'uri_string' => '#',
            'sent_time' => Carbon::createFromFormat('Y-m-d H:i:s', $dt->toDateTimeString())->format('Y-m-d g:i:s A'),
        ];

        foreach ($users as $user) {
            $notificationData['name'] = $user->first_name . ' ' . $user->last_name;
            $user->notify(new CustomNotifications($notificationData));
            if (!is_null($user->fcm_token)) {
                foreach ($user->fcm_token as $fcmToken) {
                    SendCustomNotificationJob::dispatch([
                        "fcmToken" => $fcmToken,
                        "notificationData" => $notificationData
                    ]);
                }
            }
        }

        return redirect()->route('manage-notifications.index')->with('success', 'Notification sent successfully');
    }


    public function show($id)
    {
        // Logic to show a specific manage notification
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $manageNotification = ManageNotification::find($id)->delete();

        return redirect()->route('manage-notifications.index')
            ->with('success', 'ManageNotification deleted successfully');
    }
}
