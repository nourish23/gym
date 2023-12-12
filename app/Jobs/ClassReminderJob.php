<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\ClassReminderNotification;
use App\Services\FireBaseServices;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClassReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::join("plans", "users.plan_id", "=", "plans.id")
            ->select("users.id", "users.fcm_token", "users.plan_id", "plans.category_id",)
            ->where("users.subscription_end_date", ">", Carbon::now())
            ->where("users.is_active",1)
            ->whereIn("plans.category_id", [1, 3])
            ->get();

        if (!$users->isEmpty()) {
            $notificationData = [
                'title' => "Schedule Class Reminder",
                'body'  => 'Your class will start in 15 minuets.  ' . "          " . $this->details["class_url"],
                'uri_string' => $this->details["class_url"],
                'class_url'  => $this->details["class_url"],
                'sent_time' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString())->format('Y-m-d g:i:s A'),
            ];

            foreach ($users as $user) {
                $notificationData['user_id'] = $user->id;
                $user->notify(new ClassReminderNotification($notificationData));
                if (!is_null($user->fcm_token)) {
                    foreach ($user->fcm_token as $key => $fcmToken) {
                        (new FireBaseServices())->sendNotification($fcmToken, $notificationData);
                    }
                }
            }
        }
    }
}
