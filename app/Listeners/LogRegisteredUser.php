<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogRegisteredUser
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
     * @param Registered $event
     *
     * @return void
     */
    public function handle(Registered $event)
    {
        $ip = geoip()->getClientIP();

        DB::table('users_info_loggin')
            ->insertGetId([
                'user_id'       => $event->user->id,
                'ip_address'    => $ip,
                'account_state' => 0,
                'register'      => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

        Log::notice('IP '.$ip.' registred new account :  '.$event->user->id.' on '.now());
    }
}
