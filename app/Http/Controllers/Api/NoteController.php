<?php

namespace App\Http\Controllers\Api;

use App\UserRecipeLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{

	public function checknote(Request $request)
	{
		if($request->userid === -1) {
			return response()->json(false);
		}
		$note_system = $this->find($request->recette, $request->note, $request->userid);

		// si la note n'existe pas, on l'ajoute au systeme
		if($note_system->isEmpty()) {

			// on vérifie d'abord qu'aucune note avec cette recette et cet user n'existe, si oui, on l'update
			$note_without_value = $this->find_without_value($request->recette, $request->userid);

			if($note_without_value->count()) {
				$this->update($request, $note_without_value[0]->id);
			} // sinon, on créé la note
			else {
				$this->create($request);
			}

			$nouvelle_note = $this->getavg($request);
			return response()->json($nouvelle_note);

		} else {
			$nouvelle_note = $this->getavg($request);
			return response()->json($nouvelle_note);

		}
	}

	private function find($recipe, $value, $userid)
	{
		$notefound = DB::table('recipe_likes')->where('id_recipe', '=', $recipe)->where('id_user', '=', $userid)
			->where('note', '=', $value)->get();
		return $notefound;
	}

	private function find_without_value($recipe, $userid)
	{
		$notefound = DB::table('recipe_likes')->where('id_recipe', '=', $recipe)->where('id_user', '=', $userid)
			->get();
		return $notefound;
	}

	private function getavg(Request $request)
	{
		return $stars = DB::table('recipe_likes')->where('id_recipe', '=', $request->recette)->avg('note');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param Request $data
	 * @return string
	 */

	public function create(Request $data)
	{

		$u_id = $data->userid;

		DB::table('recipe_likes')
			->insertGetId(
				['id_user' => $u_id, 'id_recipe' => $data->recette, 'note' => $data->note]
			);
		return response("note_new", 200);
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
	 * @return int
	 */
	public function update(Request $request, $id)
	{
		$note = DB::table('recipe_likes')->where('id', '=', $id)->update(['note' => $request->note]);
		return $note;
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
