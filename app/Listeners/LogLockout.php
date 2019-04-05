<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Log;

class LogLockout
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
     * @param Lockout $event
     *
     * @return void
     */
    public function handle(Lockout $event)
    {
        $ip = geoip()->getClientIP();

        if ($event->user != null) {
            Log::notice('IP ' . $ip . ' tried too hard to connect to account ' . $event->user->id . ' and failed');
        } else {
            Log::notice('IP ' . $ip . ' tried to connect to an inexistant account (bad mail/username');
        }
    }
}
