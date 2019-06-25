<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\RecipeNote;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public const TABLE = 'recipes_note';
    public const ID_RECIPE = 'id_recipe';
    public const ID_USER = 'id_user';
    public const NOTE = 'note';

    public function checknote(Request $request)
    {
        if ($request->userid === -1) {
            return response()->json(false);
        }
        $note_system = $this->find($request->recette, $request->note, $request->userid);

        // si la note n'existe pas, on l'ajoute au systeme
        if ($note_system->isEmpty()) {
            // on vérifie d'abord qu'aucune note avec cette recette et cet user n'existe, si oui, on l'update
            $note_without_value = $this->findWithoutValue($request->recette, $request->userid);

            if ($note_without_value->count()) {
                $this->update($request, $note_without_value[0]->id);
            } else {
                // sinon, on créé la note
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
        $notefound = DB::table(self::TABLE)
            ->where(self::ID_RECIPE, $recipe)
            ->where(self::ID_USER, $userid)
            ->where(self::NOTE, $value)
            ->get();

        return $notefound;
    }

    private function findWithoutValue($recipe, $userid)
    {
        $notefound = DB::table(self::TABLE)
            ->where(self::ID_RECIPE, $recipe)
            ->where(self::ID_USER, $userid)
            ->get();

        return $notefound;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return int
     */
    public function update(Request $request, $id)
    {
        $note = DB::table(self::TABLE)
            ->where('id', $id)
            ->update([self::NOTE => $request->note]);

        return $note;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $data
     *
     * @return string
     */
    public function create(Request $data)
    {
        DB::table(self::TABLE)
            ->insertGetId(
                [
                    self::ID_USER => $data->userid,
                    self::ID_RECIPE => $data->recette,
                    self::NOTE => $data->note
                ]
            );

        return response('note_new', 200);
    }

    private function getavg(Request $request)
    {
        return $stars = DB::table(self::TABLE)
            ->where(self::ID_RECIPE, $request->recette)
            ->avg(self::NOTE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
