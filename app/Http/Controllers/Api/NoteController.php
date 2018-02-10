<?php

namespace App\Http\Controllers\Api;

use App\UserRecipeLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $data
     * @return string
     */






    public function create(Request $data)
    {


            $u_id = Auth::id();

            // Check if user hasn't faved it yet :

            $id =  DB::table('recipe_likes')
                ->where(
                ['id_user' => $u_id, 'id_recipe' => $data->recette]
            )->first();

            // IF it's noted, then we update it
            if($id != "" || $id != NULL ){
                $id2 =  DB::table('recipe_likes')->where('id_user', $u_id)->where('id_recipe', $data->recette)
                    ->update(['note' => $data->note]);

                // we return the new-like state
                return response("note_update", 200);
            }

            // si aucune note n'est deja enregistrée pour cette recette
        else {
            DB::table('recipe_likes')
                ->insertGetId(
                    [ 'id_user' => $u_id , 'id_recipe' => $data->recette, 'note' => $data->note]
                );
            return response("note_new", 200);
        }






    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
