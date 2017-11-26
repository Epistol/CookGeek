<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // we will be back to this soon! TODO

        $rq = $request->q;
        $pieces = explode(" ", $rq);

        foreach ($pieces as $p){
            // Searching in recipes
            $recipe = DB::table('recipes')->where('title', 'like', $p.'%')->get();
            $ingredient = DB::table('ingredients')->where('name', 'like', $p.'%')->get();
            $categ = DB::table('categunivers')->where('name', 'like', $p.'%')->get();
            $type_recipe = DB::table('type_recipes')->where('name', 'like', $p.'%')->get();
            $univers = DB::table('univers')->where('name', 'like', $p.'%')->get();
        }

        /*
         *  Detail de la proc :
         *   On va chercher dans tout les mots passés en param
         *  si il y'a :
         *  - un nom de recette
         * - un ingredient
         * - une catégorie
         * - un type de recette
         * - un univers
         *
         *  Dans les cas de résultat , on affiche la recherche avancée + résultat
         *
         *
         *  Pour les recettes :
         *      - on affiche la liste de recettes dispo
         *  Pour les ingredients :
         *      - on affiche les ingrédients choisis et les recettes
         *  Pour la catégorie :
         *      - on affiche la liste de résultat avec la catégorie choisie
         * Pour le type de recette :
         *      - on affiche la liste de résultat avec le type choisi
         * Pour l'univers :
         *      - on affiche la liste de résultat en triant par categ
         */
        if($recipe->isNotEmpty()){
            dd($recipe);
        }
        if($ingredient->isNotEmpty()){

        }

    }
}
