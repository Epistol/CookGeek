<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
		dd($input);
		// User ID :
		$iduser = Auth::user()->id;

		// Verification des champs null

		if(!isset($request->prep_minute) || $request->prep_minute  == NULL){
			$request->prep_minute = 0;
		}
		if(!isset($request->prep_heure ) || $request->prep_heure == NULL){
			$request->prep_heure = 0;
		}

		if(!isset($request->cook_minute ) || $request->cook_minute == NULL){
			$request->cook_minute = 0;
		}
		if(!isset($request->cook_heure ) || $request->cook_heure == NULL){
			$request->cook_heure = 0;
		}

		if(!isset($request->rest_minute ) || $request->rest_minute == NULL){
			$request->rest_minute = 0;
		}
		if(!isset($request->rest_heure ) || $request->rest_heure == NULL){
			$request->rest_heure = 0;
		}
		if(!isset($request->value_part ) || $request->value_part == NULL || $request->value_part == ''){
			$request->value_part = "personnes";
		}

		$prep = ( $request->prep_heure * 60 ) + $request->prep_minute;
		$cook = ( $request->cook_heure * 60 ) + $request->cook_minute;
		$rest = ( $request->rest_heure * 60 ) + $request->rest_minute;

		$univers = DB::table('univers')->select('id')->where('name', 'like', '%'.$request->universe.'%')->get();
		// Si aucun univers n'est associé à la recherche
		if($univers == NULL) {
			$id_univers = DB::table( 'univers' )->insertGetId(
				[ 'name' => $request->universe ]
			);
			$univers    = $id_univers;
		}


		// Insert recette
		$idRecette = DB::table('recipes')->insertGetId(
			['title' => $request->title,
			 'vegan' => $request->vegan,
			 'difficulty' => $request->difficulty,
			 'type' => $request->categ_plat,
			 'cost' => $request->cost,
			 'prep_time' => $prep,
			 'cook_time' => $cook,
			 'rest_time' => $rest,
			 'nb_guests' => $request->unite_part,
			 'guest_type' => $request->value_part,
			 'univers' => $univers,
			 'type_univers' => $request->type,
			 'id_user' => $iduser,
			 'slug' => '',
			 'vegetarien' => $request->vegan,
			 'comment' => $request->comment,


			]
		);


		// Partie SLUG
		$titreslug= str_slug($request->title, '-');
		$univslug = str_slug($request->universe, '-');
		$slug = $titreslug."-".$univslug."-".$idRecette;

		DB::table('recipes')
		  ->where('id', $idRecette)
		  ->update(['slug' => $slug]);


// Partie ingrédients

		// Parties étapes


		return $input;
	}

	public function show($slug){
		return $slug;
	}
}
