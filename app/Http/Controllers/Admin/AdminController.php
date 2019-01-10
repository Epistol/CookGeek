<?php

namespace App\Http\Controllers\Admin;

use App\Firewall;
use App\Http\Controllers\FirewallController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
		return view("voyager.dashboard");
	}

	public function ban()
	{
		$user_ip = Firewall::getAllIps();

		$bans = DB::table('bans')->groupBy('user_id')
			->get();

		$blacklist = Firewall::getAllIps()->filter(function($item) {
			return $item->whitelisted == false;
		});
		$whitelist = Firewall::getAllIps()->filter(function($item) {
			return $item->whitelisted == true;
		});

		return view('admin.ban.index', compact('blacklist', 'whitelist', 'user_ip', 'bans'));
	}

	public function bansubmit(Request $request)
	{
		$titles = ['name', 'email', 'ip'];
		$user = "";
		foreach($titles as $title) {
			if($request->$title) {
				if($title === "name") {
					$user = DB::table('users')->where('name', '=', $request->$title)->get();
				} elseif($title === "email") {
					$user = DB::table('users')->where('email', '=', $request->$title)->get();
				} elseif($title === "ip") {
					$ip_user = DB::table('users_info_loggin')->where('ip_address', '=', $request->$title)->groupBy('user_id')->get();
					$count = collect($ip_user)->count();
					if($count > 1) {
						return $ip_user;
					} else {
						$user = DB::table('users')->where('id', '=', $ip_user[0]->user_id)->get();
					}
				}
			}
		}

		if($user) {
			$user_collec = collect($user)->first();
			if($request->days !== "definitive") {
				$ban = User::ban($user_collec->id, Auth::user()->id, intval($request->days),  false, strip_tags(clean($request->reason)));
			} else {
				$ban = User::ban($user_collec->id, Auth::user()->id, intval($request->days), true,  strip_tags(clean($request->reason)));

			}

			return json_encode($ban);
		}
		return json_encode(false);

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
