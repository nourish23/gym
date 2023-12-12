<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\SubscriptionExpiryNotification;
use App\Services\FireBaseServices;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckSubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('subscription_end_date', '<', Carbon::today())->get();

        foreach ($users as $user) {
            $notificationData = [
                'title' => "Custom Subscription Expiry Notification",
                'body' => "Hello, Your custom subscription is about to expire. Please renew your subscription to continue using our custom services.Thank you for using our custom application.",
                'uri_string' => '#',
                'sent_time' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString())->format('Y-m-d g:i:s A'),
            ];

            $user->is_active = 0;
            $user->save();
            $user->notify(new SubscriptionExpiryNotification());

            if (!is_null($user->fcm_token)) {
                foreach ($user->fcm_token as $key => $fcmToken) {
                    (new FireBaseServices())->sendNotification($fcmToken, $notificationData);
                }
            }
        }
    }
}
