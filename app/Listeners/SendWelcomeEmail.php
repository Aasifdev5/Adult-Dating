<?php

namespace App\Listeners;

use App\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    use InteractsWithQueue;

    public function handle(Registered $event)
    {
        // Access the user from the event
        $user = $event->user;

        // Send welcome email logic
        // Example: You might use Laravel's built-in Mail facade
        // Make sure you create a corresponding Mailable class

        // \Illuminate\Support\Facades\Mail::to($user->email)->send(new WelcomeEmail($user));
    }
}
