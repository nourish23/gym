<?php

namespace App\Observers;

use App\Jobs\ClassReminderJob;
use App\Models\ScheduledClass;
use Carbon\Carbon;
use DateTime;

class ScheduledClassObserver
{
    /**
     * Handle the ScheduledClass "created" event.
     *
     * @param  \App\Models\ScheduledClass  $scheduledClass
     * @return void
     */
    public function created(ScheduledClass $scheduledClass)
    {
        if ($scheduledClass->isDirty('url') && !is_null($scheduledClass->url)) {
            $this->sendNotification($scheduledClass);
        }
    }

    /**
     * Handle the ScheduledClass "updated" event.
     *
     * @param  \App\Models\ScheduledClass  $scheduledClass
     * @return void
     */
    public function updated(ScheduledClass $scheduledClass)
    {
        $this->sendNotification($scheduledClass);
    }

    public function sendNotification($scheduledClass)
    {
        $now           = Carbon::now();
        $startTime     = Carbon::parse($scheduledClass->start_time);
        $interval      = $now->diff($startTime);
        $diffInSeconds = ($interval->s + ($interval->i * 60) + ($interval->h * 3600) + ($interval->days * 86400)) - 900;
 
        ClassReminderJob::dispatch([
            'class_url' =>  $scheduledClass->url
        ])->delay(now()->addSeconds($diffInSeconds));
    }
    /**
     * Handle the ScheduledClass "deleted" event.
     *
     * @param  \App\Models\ScheduledClass  $scheduledClass
     * @return void
     */
    public function deleted(ScheduledClass $scheduledClass)
    {
        //
    }

    /**
     * Handle the ScheduledClass "restored" event.
     *
     * @param  \App\Models\ScheduledClass  $scheduledClass
     * @return void
     */
    public function restored(ScheduledClass $scheduledClass)
    {
        //
    }

    /**
     * Handle the ScheduledClass "force deleted" event.
     *
     * @param  \App\Models\ScheduledClass  $scheduledClass
     * @return void
     */
    public function forceDeleted(ScheduledClass $scheduledClass)
    {
        //
    }
}
