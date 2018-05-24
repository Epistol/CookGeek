<?php

namespace App\Http\Controllers\Api;

use App\Recipes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{

    public function search($recherche)
    {
        $rq = $recherche;
        $pieces = explode(" ", $rq);
        if($rq != null){
	
	       
	        
	        
            foreach ($pieces as $p){
	            $orders = Recipes::search($p)->get();
	            dd($orders);
	            
                // Searching in recipes
                // TODO : Réduire le nombre de champs retournés par element ?
                $recipe = DB::table('recipes')->where('title', 'like', '%'.$p.'%')->paginate(10);
                $ingredient = DB::table('ingredients')->where('name', 'like', '%'.$p.'%')->paginate(10);
                $categunivers = DB::table("categunivers")->where('name', 'like', '%'.$p.'%')->paginate(10);
                $type_recipes = DB::table("type_recipes")->where('name', 'like', '%'.$p.'%')->paginate(10);
                $univers = DB::table("univers")->where('name', 'like', '%'.$p.'%')->paginate(10);
            }
        }
        else {
                // Searching in recipes
                // TODO : Réduire le nombre de champs retournés par element ?
                $recipe = DB::table('recipes')->paginate(10);
                $ingredient = DB::table('ingredients')->paginate(10);
                $categunivers = DB::table("categunivers")->paginate(10);
                $type_recipes = DB::table("type_recipes")->paginate(10);
                $univers = DB::table("univers")->paginate(10);
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


        $response = array();
        $elements = array($recipe, $ingredient, $categunivers, $type_recipes, $univers );
        $titres = array('recipe', 'ingredient', 'categunivers', 'type_recipes', 'univers' );

        foreach ($elements as $key => $el){
            if($el->isNotEmpty()){
                $response[$titres[$key]] = $el;
            }
        }
        return $response;

    }

    public function index(Request $request){
        dd($request);
    }
}
