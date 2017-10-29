<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
		$difficulty = DB::table('difficulty')->get();
		$types_plat = DB::table('type_recipe')->get();



		return view('recipes.add', array( 'types' => $types_univ, 'difficulty' => $difficulty, 'types_plat' => $types_plat ) );
	}

	public function store(Request $request){
		$input = $request->all();
		return $input;
	}

	public function show($slug){
		return $slug;
	}
}
