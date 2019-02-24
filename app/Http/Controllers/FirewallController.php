<?php

namespace App\Http\Controllers;

use App\Firewall;

class FirewallController extends Controller
{
    public function all_filters()
    {
        $user_ip = geoip()->getClientIP();
        $blacklist = Firewall::getAllIps();
        dd($blacklist);
    }
}
