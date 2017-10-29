<?php

namespace App\Http\Controllers\Recipe;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
	/**
	 * Show the profile for the given user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'CDG'; /*view('user.profile', ['user' => User::findOrFail($id)]);*/
	}

	public function add(){
		$types_univ = DB::table('categunivers')->get();
		return view('recipes.add', ['types' => $types_univ]);
	}

	public function show($slug){
		return $slug;
	}
}
