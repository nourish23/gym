<?php

namespace App\Observers;

use App\Mail\NewUserRegistered;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Mail::to('info@nourishfitness.net')->send(new NewUserRegistered($user));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        // if ($user->isDirty('is_paid') && $user->is_paid == "1") {
        //     $user->subscription_start_date = Carbon::now()->toDateString();
        //     $user->subscription_end_date   = Carbon::now()->addMonths($user->plan->period)->addDays(7)->toDateString();
  
        //     $user->save();
        // }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
