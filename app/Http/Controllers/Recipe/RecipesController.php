<?php

namespace App\Http\Controllers\Recipe;

use App\User;
use App\Http\Controllers\Controller;

class RecipesController extends Controller
{
	/**
	 * Show the profile for the given user.
	 *
	 * @return Response
	 */
	public function show()
	{
		return 'CDG'; /*view('user.profile', ['user' => User::findOrFail($id)]);*/
	}

	public function add(){
		return view('recipes.add');
	}
}
