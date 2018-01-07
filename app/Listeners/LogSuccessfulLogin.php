<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        DB::table('users')
            ->where('id', $event->user->id)
            ->increment('nb_visites' , 1);

        $ip = geoip()->getClientIP();

        if($event->user != null){
            Log::notice('IP '. $ip. "  logged in ".$event->user->id. " on ". now());
        }
    }
}
