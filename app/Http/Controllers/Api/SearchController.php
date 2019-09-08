<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Recipe;
use App\Univers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class SearchController
 * @package App\Http\Controllers\Api
 */
class SearchController extends Controller
{
    /**
     * @param $recherche
     *
     * @return array
     *
     *
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
    public function search($recherche)
    {
        $rq = $recherche;
        $pieces = explode(' ', $rq);
        $recipe = [];
        if ($rq !== null) {
            foreach ($pieces as $p) {
                // Searching in recipes
                $ingredient = DB::table('ingredients')->where('name', 'like', '%' . strip_tags($p) . '%')
                    ->paginate(10);
                $media = DB::table('categunivers')->where('name', 'like', '%' . strip_tags($p) . '%')
                    ->paginate(10);
                $type_recipes = DB::table('type_recipes')->where('name', 'like', '%' . strip_tags($p) . '%')
                    ->paginate(10);
                $univers = DB::table('univers')->where('name', 'like', '%' . strip_tags($p) . '%')
                    ->paginate(10);
                if ($univers) {
                    foreach ($univers as $univer) {
                        if ($ingredient) {
                            $recipe_ingredients = $this->load_recipe_ingredient($ingredient);
                        } else {
                            $recipe = DB::table('recipes')->where('univers', $univer->id)
                                ->orwhere('title', 'like', '%' . strip_tags($p) . '%')
                                ->where('validated', 1)->paginate(10);
                        }
                    }
                }

                if ($ingredient) {
                    $recipe_ingredients = $this->load_recipe_ingredient($ingredient);
                }
                $recipe = $this->load_recipes_titre($p);
            }
        } else {
            // Searching in recipes
            // ? TODO : Réduire le nombre de champs retournés par element ?
            $recipe = Recipe::getPaginate(true, 10);
            $ingredient = Ingredient::paginate(10);
            $media = DB::table('categunivers')->paginate(10);
            $type_recipes = DB::table('type_recipes')->paginate(10);
            $univers = Univers::paginate(10);
        }

        return collect([
            'recipe' => $recipe, 'ingredient' => $ingredient, 'categunivers' => $media,
            'type_recipes' => $type_recipes, 'univers' => $univers, 'value' => strip_tags($rq)
        ]);

    }

    /**
     * @param $ingredient
     * @return array
     */
    private function load_recipe_ingredient($ingredient)
    {
        if ($ingredient->isNotEmpty()) {
            $liste_recipes = [];
            foreach ($ingredient as $key => $ingredien) {
                $recipe_ingredients = DB::table('recipes_ingredients')->where('id_ingredient', $ingredien->id)
                    ->get();
                foreach ($recipe_ingredients as $recipe_ingredient) {
                    $recipe = DB::table('recipes')->where('id', $recipe_ingredient->id_recipe)
                        ->paginate(8);
                    $liste_recipes[$key] = $recipe;
                }
            }

            return $liste_recipes;
        }
    }

    /**
     * @param $titre
     * @return mixed
     */
    private function load_recipes_titre($titre)
    {
        return Recipe::where('title', 'like', '%' . strip_tags($titre) . '%')
            ->where('validated', 1)
            ->paginate(10);

    }

    /**
     * @param Request $recherche
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_univers(Request $recherche)
    {
        $searchquery = strip_tags($recherche->searchquery);
        $univers = DB::table('univers')
            ->where('name', 'like', '%' . strip_tags($searchquery) . '%')
            ->join('recipes', 'univers.id', 'recipes.univers')
            ->where('validated', 1)
            ->get();

        return response()->json($univers);
    }

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        return abort(404);
        //		dd($request);
    }
}
