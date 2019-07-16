<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogPasswordReset
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
     * @param PasswordReset $event
     *
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $ip = geoip()->getClientIP();

        if ($event->user != null) {
            Log::notice('IP ' . $ip . ' resetted password of account ' . $event->user->id . ' on ' . now());
        }
    }
}
