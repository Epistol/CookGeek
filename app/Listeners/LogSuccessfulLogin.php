<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
{

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

        $client_ip = geoip()->getClientIP();

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

        // TODO LATER

        if ($event->user != null) {
            Log::notice('IP ' . $client_ip . '  logged in ' . $event->user->id . ' on ' . now());
        }
    }
}
