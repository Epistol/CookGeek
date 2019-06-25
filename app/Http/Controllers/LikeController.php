<?php

namespace App\Http\Controllers;

use App\Like;
use App\Recipe;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class LikeController
 * @package App\Http\Controllers\Api
 */
class LikeController extends Controller
{
    /**
     * @param Request $request
     *
     * @return bool|string
     */
    public function checkLikedRecipe(Request $request)
    {
        $u_id = intval(strip_tags(clean($request->userid)));

        $l_id = DB::table(self::TABLE)
            ->where([
                ['user_id', $u_id],
                ['recipe_id', intval(strip_tags(clean($request->recipeid)))],
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
     * @return JsonResponse
     */
    public function toggleLikeRecipe(Request $request)
    {
        $recipe = Recipe::find(intval(strip_tags(clean($request->recipeid))));
        $likes = $recipe->likes->where('user_id', Auth::user()->id);

        // si un id existe, on le supprime et renvoie false
        if ($likes->count() > 0) {
            return response()->json($this->destroyLikeRecipe($recipe, $likes));
        } else {
            // si n'existe pas, on le créé et renvoie true
            $retour = $this->likeRecipe($request->recipeid);
            return response()->json($retour);
        }
    }

    /**
     * @param $recipe_id
     *
     * @return ResponseFactory|Response
     */
    private function likeRecipe($recipe_id)
    {
        $like = new Like(['user_id' => Auth::user()->id]);
        $recipe = Recipe::find(strip_tags(clean($recipe_id)));
        $recipe->likes()->save($like);

        if ($like) {
            return response()->json(['message' => 'Recipe liked', 'status' => 'ok']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $recipe
     * @param $likes
     * @return bool
     */
    public function destroyLikeRecipe($recipe, $likes)
    {
        if ($likesGet = $recipe->likes()->where('user_id', Auth::user()->id)->get()) {
            $recipe->likes()->where('user_id', Auth::user()->id)->detach();
            $recipe->likes()->where('user_id', Auth::user()->id)->delete();
            foreach ($likesGet as $index => $like) {
                $like->delete();
            }
            return response()->json(['message' => 'Recipe unliked', 'status' => 'ok']);
        } else {
            return response()->json(['message' => 'Impossible to unlike : no like set for user',
                'status' => 'error']);
        }
    }


    /**
     * @param Request $request
     *
     * @return bool|string
     */
    public function nbLikeRecipe(Request $request)
    {
        $recipe_id = intval(strip_tags(clean($request->recipeid)));
        $l_id = DB::table(self::TABLE)
            ->where([
                ['recipe_id', $recipe_id],
            ])
            ->count();

        return response()->json(intval($l_id));
    }
}
