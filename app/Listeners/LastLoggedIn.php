<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Carbon;

class LastLoggedIn
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => request()->ip()
        ]);
    }
}
