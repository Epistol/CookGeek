<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     *
     * @return string
     */
    public function create(Request $data)
    {
        $u_id = Auth::id();

        // Check if user hasn't faved it yet :

        $id = Like::where(
            [
                'user_id' => $u_id,
                'recipe_id' => strip_tags(clean($data->recette))
            ]
            )->first();

        // IF it's liked, then we add it
        if ($id == '' || $id == null) {
            $id2 = DB::table('user_recipe_likes')
                ->insertGetId(
                    ['user_id' => $u_id, 'recipe_id' => strip_tags(clean($data->recette))]
                );
            // we return the new-like state
            return response('liked', 200);
        } // if it was already liked
        else {
            DB::table('user_recipe_likes')->where('user_id', '=', $u_id)->where('recipe_id', '=', strip_tags(clean($data->recette)))->delete();

            return response('unliked', 200);
        }
    }

    public function create_only($u_id, $recipe_id)
    {

        // Check if user hasn't faved it yet :
        $id2 = DB::table('user_recipe_likes')
            ->insertGetId(
                ['user_id' => strip_tags(clean($u_id)), 'recipe_id' => strip_tags(clean($recipe_id))]
            );
        if ($id2) {
            return response($id2);
        }
        // we return the new-like state
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        if (DB::table('user_recipe_likes')->where('id', '=', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param Request $request
     *
     * @return bool|string
     */
    public function check_liked(Request $request)
    {
        $u_id = intval(strip_tags(clean($request->userid)));

        $l_id = DB::table('user_recipe_likes')
            ->where([
                ['user_id', '=', $u_id],
                ['recipe_id', '=', intval(strip_tags(clean($request->recipeid)))],
            ])
            ->first();
        if ($l_id) {
            return response()->json($l_id);
        } else {
            return response()->json(false);
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggle_like(Request $request)
    {
        $u_id = intval(strip_tags(clean($request->userid)));
        $l_id = DB::table('user_recipe_likes')
            ->where([
                ['user_id', '=', $u_id],
                ['recipe_id', '=', intval(strip_tags(clean($request->recipeid)))],
            ])
            ->first();

        // si un id existe, on le supprime et renvoie false
        if ($l_id) {
            if ($this->destroy($l_id->id)) {
                return response()->json(false);
            }
        } // si n'existe pas, on le créé et renvoie true
        else {
            $retour = $this->create_only($u_id, $request->recipeid);

            return response()->json($retour);
        }
    }

    /**
     * @param Request $request
     *
     * @return bool|string
     */
    public function nbLike(Request $request)
    {
        $recipe_id = intval(strip_tags(clean($request->recipeid)));
        $l_id = DB::table('user_recipe_likes')
            ->where([
                ['recipe_id', '=', $recipe_id],
            ])
            ->count();

        return response()->json(intval($l_id));
    }
}
