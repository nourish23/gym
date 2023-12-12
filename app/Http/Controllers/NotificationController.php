<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Models\User;
use Notification;
use App\Notifications\GeneralNotification;
use App\Services\FireBaseServices;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('product');
    }


    public function usernotificationslist(Request $request)
    {
        $listnotifications = $request->user()->notifications()->paginate(12);
        $data['list'] = array();

        foreach ($listnotifications as $value) {
            $sentTime = \Carbon\Carbon::parse($value->data['sent_time'])->format('Y-m-d\TH:i:s.u\Z');
            $data['list'][] = [
                'id' => $value->id,
                'title' => $value->data['title'],
                'body' => $value->data['body'],
                'uri_string' => $value->data['uri_string'],
                'read_at' => $value->read_at,
                'is_read' => $value->read_at ? true : false,
                'sent_time' => $sentTime
            ];
        }

        $response = ['data' => $data['list'], 'message' => 'return notifications list'];
        return response($response, 200);
    }


    public function markNotificationsReadAll(Request $request)
    {

        foreach ($request->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        $response = ['data' => null, 'message' => 'read all notifications list'];
        return response($response, 200);
    }

    public function markNotificationRead($notificationId, Request $request)
    {

        $Notification = $request->user()->Notifications->find($notificationId);
        if ($Notification) {
            $Notification->markAsRead();
        }

        $response = ['data' => null, 'message' => 'mark as read successfully.'];
        return response($response, 200);
    }

    public function sendWelcomeNotification(Request $request)
    {
        $user = $request->user();
        $dt = Carbon::now();
        $sent_time = $dt->format('H:i:s');
        $uri_string = '#';
        $title = 'Welcome to Nourish Fitness';
        $body = '';
        $fcm_token = $request->user()->fcm_token;
        $name = $request->user()->first_name . " " . $request->user()->last_name;
        $notificationData = [
            'title' => $title,
            'body' => $body,
            'uri_string' => $uri_string,
            'date' => $dt,
            'sent_time' => $sent_time,
        ];

        $request->user()->notify(new GeneralNotification($title, $body, $uri_string, $sent_time, $fcm_token, $name));
        if (!is_null($fcm_token)) {
            foreach ($user->fcm_token as $key => $fcmToken) {
                (new FireBaseServices())->sendNotification($fcmToken, $notificationData);
            }
        }
        return true;
    }

    public function sendOfferNotification(Request $request)
    {
        $user = $request->user();
        $dt = Carbon::now();
        $sent_time = $dt->format('H:i:s');
        $uri_string = '#';
        $title = 'Welcome to Nourish Fitness';
        $body = '';
        $fcm_token = $request->user()->fcm_token;
        $name = $request->user()->first_name . " " . $request->user()->last_name;
        $notificationData = [
            'title' => $title,
            'body' => $body,
            'uri_string' => $uri_string,
            'sent_time' => Carbon::createFromFormat('Y-m-d H:i:s', $dt->toDateTimeString())->format('Y-m-d g:i:s A'),
            'name' => $name
        ];

        $user->notify(new GeneralNotification($title, $body, $uri_string, $sent_time, $fcm_token, $name));
        if (!is_null($fcm_token)) {
            foreach ($user->fcm_token as $key => $fcmToken) {
                (new FireBaseServices())->sendNotification($fcmToken, $notificationData);
            }
        }
        (new FireBaseServices())->sendNotification($fcm_token, $notificationData);
    }
}
