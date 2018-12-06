<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
	public function get_picture(Request $request)
	{
		$recipe_id = $request->recipeid;

		$pic = DB::table('recipe_imgs')
			->where('recipe_id', '=', $recipe_id)
			->first();

		// si un id existe, on le supprime et renvoie false
		if($pic) {
			return response()->json($pic);
		} else {
			return response()->json(false);
		}
	}

}
