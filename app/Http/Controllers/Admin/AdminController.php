<?php

namespace App\Http\Controllers\Admin;

use App\Firewall;
use App\Http\Controllers\FirewallController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*    $admin = Voyager::canOrFail('browse_admin');
            dd($admin);*/
        return view("admin.index");
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
