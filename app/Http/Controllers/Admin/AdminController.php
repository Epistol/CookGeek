<?php

namespace App\Http\Controllers\Admin;

use App\Firewall;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TCG\Voyager\Facades\Voyager;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function ban()
    {
        $user_ip = Firewall::getAllIps();

        $bans = User::onlyBanned()->get();

        $blacklist = Firewall::getAllIps()->filter(function ($item) {
            return $item->whitelisted == false;
        });
        $whitelist = Firewall::getAllIps()->filter(function ($item) {
            return $item->whitelisted == true;
        });

        return view('admin.ban.index', compact('blacklist', 'whitelist', 'user_ip', 'bans'));
    }

}
