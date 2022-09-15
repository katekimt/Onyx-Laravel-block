<?php

namespace App\Listeners;

use App\Events\UserStored;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class SendMailNewUser extends Mailable
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
        Mail::to($event->user)->send(new WelcomeEmail());
    }
}
