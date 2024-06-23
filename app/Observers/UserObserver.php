<?php

namespace App\Observers;

use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): RedirectResponse
    {

        $to = "abdelkader@gmail.com";
        $send = "welocme abdelkader to mail trapmail integration";
        $mail = new SendMailJob($to, $send);
        //  $mail->delay(Carbon::now()->addSeconds(10))->dispatch($to, $send);
        Auth::login($user);
        return to_route('admin.dashboard');

    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
