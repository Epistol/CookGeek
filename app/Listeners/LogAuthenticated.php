<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Log;

class LogAuthenticated
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
     * @param Authenticated $event
     *
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $ip = geoip()->getClientIP();

        if (!$event->user != null) {
            Log::notice('IP ' . $ip . ' tried to connect to an inexistant account (bad mail/username');
        }
    }
}
