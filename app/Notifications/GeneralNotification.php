<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    use Queueable;
    private $title;
    private $body;
    private $uri_string;
    private $sent_time;
    private $fcm_token;
    private $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $body, $uri_string, $sent_time, $fcm_token, $name)
    {
        $this->title = $title;
        $this->body = $body;
        $this->uri_string = $uri_string;
        $this->sent_time = $sent_time;
        $this->fcm_token = $fcm_token;
        $this->$name =  $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        if (!empty($this->fcm_token)) {
            //FCM API end-point
            $url = 'https://fcm.googleapis.com/fcm/send';
            //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
            $server_key = 'AAAAc7gdjP8:APA91bFYDKa8RPajX4mjbbszemAWFmVVhXWVKc2AB2cfXIfaJIdmik8Cfd9Iq6BwYfViHZhfDPLs3dmGn2de1wOF9YZxDnyiHw58y3d2XDZWYIvsiBQzbOZ7xAbocpf4Iwk-r-QgEj9V';
            //header with content_type api key
            $header = array(
                'Content-Type:application/json',
                'authorization:key=' . $server_key
            );

            // $user_notify = User::find($this->requestData['user_id']);
            $postdata = '{
                "to" : "' . $this->fcm_token . '",
                "notification" : {
                "body" : "' . $this->body . '",
                "title" : "' . $this->title . '"
                "content_available" : true,
                "priority" : "high",
                },
                "data" : {
                "body" : "' . $this->body . '",
                "title" : "' . $this->title . '"
                "content_available" : true,
                "priority" : "high",
                } 
            }';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        return [
            'title' => $this->title,
            'body' => $this->body,
            'uri_string' => $this->uri_string,
            'sent_time' => $this->sent_time,
            // 'user_id' => $user_notify->id,
            'name' => $this->name
        ];
    }
}
