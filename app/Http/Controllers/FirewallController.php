<?php

namespace App\Http\Controllers;

use App\Firewall;

class FirewallController extends Controller
{
    public function allFilters()
    {
        $user_ip   = geoip()->getClientIP();
        $blacklist = Firewall::getAllIps();
//        dd($blacklist);
    }
}
