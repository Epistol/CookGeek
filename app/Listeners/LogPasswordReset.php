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

        // 2 for reset password
        DB::table('users_info_loggin')
          ->insertGetId([
              'user_id'    => $event->user->id,
              'ip_address' => $ip,
              'register'   => 2,
              'created_at' => now(),
              'updated_at' => now(),
          ]);

        if ($event->user != null) {
            Log::notice('IP ' . $ip . ' resetted password of account ' . $event->user->id . ' on ' . now());
        }
    }
}
