<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogFailedLogin
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
     * @param Failed $event
     *
     * @return void
     */
    public function handle(Failed $event)
    {
        $ip = geoip()->getClientIP();

        DB::table('users_info_loggin')
            ->insertGetId([
                'ip_address' => $ip,
                'login'      => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        if ($event->user != null) {
            Log::notice('IP '.$ip.' tried to connect to account '.$event->user->id.' but failed');
        } else {
            Log::notice('IP '.$ip.' tried to connect to an inexistant account (bad mail/username');
        }
    }
}
