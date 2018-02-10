<?php

namespace App\Http\Controllers\Api;

use App\UserRecipeLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
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

            $id =  DB::table('user_recipe_likes')
                ->where(
                ['user_id' => $u_id, 'recipe_id' => $data->recette]
            )->first();

            // IF it's liked, then we add it
            if($id == ""  || $id == NULL){
                $id2 =  DB::table('user_recipe_likes')
                    ->insertGetId(
                        [ 'user_id' => $u_id , 'recipe_id' => $data->recette]
                    );
                // we return the new-like state
                return response("liked", 200);
            }

            // if it was already liked
        else {
            DB::table('user_recipe_likes')->where('user_id', '=', $u_id)->where('recipe_id', '=', $data->recette)->delete();
            return response("unliked", 200);
        }




        // Error handling
        if($id == "" || $id == NULL){
            return response('Nop', 500);
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
