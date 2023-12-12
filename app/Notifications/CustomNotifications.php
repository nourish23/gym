<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomNotifications extends Notification
{
    use Queueable;

    private $notificationData;

    public function __construct(array $notificationData)
    {
        $this->notificationData = $notificationData;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->notificationData['title'],
            'body' => $this->notificationData['body'],
            'uri_string' => $this->notificationData['uri_string'],
            'sent_time' => now(),
            'user_id' => $notifiable->id,
            'name' => $notifiable->name,
        ];
    }
}
