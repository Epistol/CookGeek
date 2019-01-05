<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\UniverseProvider;
use App\RecipeImg;
use App\Recipes;
use App\Univers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\SchemaOrg\Schema;
use Carbon\Carbon;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return redirect()->route("user.index");
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		Carbon::setLocale('fr');
		$user = DB::table('users')->select('id', 'role_id', 'name', 'avatar', 'img', 'created_at', 'updated_at')->where('name', '=', $id)->first();
		$recipes = DB::table('recipes')->where('id_user', '=', $user->id)->paginate(5);
		return view('user.show')->with('user', $user)->with('recettes', $recipes);
	}



}
