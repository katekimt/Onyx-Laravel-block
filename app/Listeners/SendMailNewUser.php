<?php

namespace App\Listeners;

use App\Events\UserStored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailNewUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserStored  $event
     * @return void
     */
    public function handle(UserStored $event)
    {
        Mail::to($event->user->email)->send(new UserStored($event->user));
    }
}
