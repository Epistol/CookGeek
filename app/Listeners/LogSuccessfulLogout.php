<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
	    $ip = geoip()->getClientIP();

	    DB::table('users_info_loggin')
		    ->insertGetId([
			    'user_id' => $event->user->id,
			    'ip_address' => $ip,
			    'account_state' => 0,
			    'logout' => 1,
			    'created_at' => now(),
			    'updated_at' => now(),
		    ]);


    }
}
