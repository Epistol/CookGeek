<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PragmaRX\Firewall\Firewall;

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
     * @param Login $event
     *
     * @return void
     */
    public function handle(Login $event)
    {
        DB::table('users')
          ->where('id', $event->user->id)
          ->increment('nb_visites', 1);

        $ip = geoip()->getClientIP();

        $has_recipe_signaled_dangerous = DB::table('signalements')
                                           ->join('recipes', 'signalements.recipe_id', '=', 'recipes.id_user')->count();

        if ($has_recipe_signaled_dangerous !== null) {
            if ($has_recipe_signaled_dangerous > 1) {
                $state = 2;
            } elseif ($has_recipe_signaled_dangerous > 0) {
                $state = 1;
            } else {
                $state = 0;
            }
        } else {
            $state = 0;
        }

        DB::table('users_info_loggin')
          ->insertGetId([
              'user_id'       => $event->user->id,
              'ip_address'    => $ip,
              'account_state' => $state,
              'login'         => 1,
              'created_at'    => now(),
              'updated_at'    => now(),
          ]);

        if ($state == 2) {
            Firewall::blacklist($ip, true); /// true = force in case IP is whitelisted
        }

        if ($event->user != null) {
            Log::notice('IP ' . $ip . '  logged in ' . $event->user->id . ' on ' . now());
        }
    }
}
