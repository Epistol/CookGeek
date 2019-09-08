<?php

namespace App\Http\Controllers;

use App\Like;
use App\Recipe;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        $likes = Recipe::find(intval($request->recipeid))->likes()->where('user_id', Auth::user()->id)->count();
        return response()->json(intval($likes));
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function toggleLikeRecipe(Request $request)
    {
        $recipe = Recipe::find(intval(strip_tags($request->recipeid)));
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
        $recipe = Recipe::find(strip_tags($recipe_id));
        $recipe->likes()->save($like);

        if ($like) {
            return response()->json(['message' => 'Recipe liked', 'status' => 'ok', 'value' => 1]);
        } else {
            return response()->json(['message' => 'Error happened while liking', 'status' => 'error', 'value' => 0]);
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
        if ($recipe->likes()->where('user_id', Auth::user()->id)->get()) {
            $recipe->likes()->where('user_id', Auth::user()->id)->detach();
            $recipe->likes()->where('user_id', Auth::user()->id)->delete();
            $likesGet = $recipe->likes()->where('user_id', Auth::user()->id)->get();
            foreach ($likesGet as $index => $like) {
                $like->delete();
            }
            return response()->json(['message' => 'Recipe unliked', 'status' => 'ok', 'value' => 0]);
        } else {
            return response()->json(['message' => 'Impossible to unlike : no like set for user',
                'value' => 1,
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
        $likes = Recipe::find(intval($request->recipeid))->likes()->count();
        return response()->json(intval($likes));
    }
}
