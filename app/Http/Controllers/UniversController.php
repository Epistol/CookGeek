<?php

namespace App\Http\Controllers;

use App\Categunivers;
use App\Univers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// on va charger les univers les plus vus de chaque types

		// 1) Charger les types (anime, manga, etc)
		$categunivers = (new Categunivers())->alltypes();

		if($categunivers != null) {
			// On charge les données dans la vue
			return view('univers.index', array('cateunivers' => $categunivers))->with(['controller' => $this]);

		} else {
			return back();
		}
	}

	public function get_all_universes_in_categ($categ)
	{
		// trouver les univers ayant des recettes de la catégorie (anime, manga, etc)
		$recettes = DB::table('recipes')->select('univers')->where('type_univers', '=', $categ)->distinct()->orderByDesc("nb_views")->get();
		return $recettes;
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

	public function store_api($text)
	{
		$string = app('profanityFilter')->filter($text);

		if(preg_match("/^(?:.*)[\*\*](?:.*)$/", $string)) {
			$string = '';
		}

		// Adding to the DB
		$id_univers = DB::table('univers')->insertGetId(
			['name' => $string]
		);
		return $univ = $id_univers;
	}


	/**
	 * @param $text
	 * @return mixed
	 */
	public function FirstOrCreate($text)
	{
		$univ = (new \App\Univers)->get_first($text);
//        dd($univ);
		if($univ->isEmpty()) {
			$univ = $this->store_api($text);

		} else {
			$univ = $univ->first();
			$univ = $univ->id;
		}

		return $univ;
	}


}
