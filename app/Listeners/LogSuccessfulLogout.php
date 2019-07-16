<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogout
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
     * @param Logout $event
     *
     * @return void
     */
    public function handle(Logout $event)
    {
        $ip = geoip()->getClientIP();

        if ($event->user != null) {
            Log::notice('IP ' . $ip . '  logged in ' . $event->user->id . ' on ' . now());
        }
    }
}
