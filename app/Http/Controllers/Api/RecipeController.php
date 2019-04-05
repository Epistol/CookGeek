<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Signalements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function get_picture(Request $request)
    {
        $recipe_id = strip_tags(clean($request->recipeid));

        $pic = DB::table('recipe_imgs')
                 ->where('recipe_id', '=', $recipe_id)
                 ->first();

        // si un id existe, on le supprime et renvoie false
        if ($pic) {
            return response()->json($pic);
        } else {
            return response()->json(false);
        }
    }

    public function get_ingredients(Request $request)
    {
        $recipe_id = $request->recipeid;

        $ingr = DB::table('recipes_ingredients')
                  ->join('ingredients', 'recipes_ingredients.id_ingredient', '=', 'ingredients.id')
                  ->where('id_recipe', '=', $recipe_id)
                  ->get();

        // si un id existe, on le supprime et renvoie false
        if ($ingr) {
            return response()->json($ingr);
        } else {
            return response()->json(false);
        }
    }

    public function get_steps(Request $request)
    {
        $recipe_id = $request->recipeid;

        $steps = DB::table('recipes_steps')
                   ->where('recipe_id', '=', $recipe_id)
                   ->get();

        $all = [];

        // cleaning :

        foreach ($steps as $index => $step) {
            $all[$index]['id']          = $step->id;
            $all[$index]['recipe_id']   = $step->recipe_id;
            $all[$index]['step_number'] = $step->step_number;
            $all[$index]['instruction'] = strip_tags(clean($step->instruction));
        }

        // si un id existe, on le supprime et renvoie false
        if ($steps) {
            return response()->json($all);
        } else {
            return response()->json(false);
        }
    }

    public function alerte(Request $request)
    {
        $recipe_id    = intval(strip_tags(clean($request->recipeid)));
        $type_alerte  = strip_tags(clean($request->type_alerte));
        $userid       = intval(strip_tags(clean($request->userid)));
        $user_content = strip_tags(clean($request->user_content));

        $signalement               = new Signalements();
        $signalement->recipe_id    = $recipe_id;
        $signalement->user_id      = $userid;
        $signalement->option       = $type_alerte;
        $signalement->user_content = clean($user_content);
        $signalement->status       = 0;
        $signalement->save();

        // si un id existe, on le supprime et renvoie false
        if ($signalement) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
