<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Recipe\RecipeController;
use App\Ingredient;
use App\Recipe;
use App\RecipeIngredient;
use Illuminate\Http\Request;

class RecipesIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = RecipeIngredient::whereIn('id_recipe', function ($query) {
            $query->where('validated', 1)->from('recipes')->select('id');
        })->groupBy('id_ingredient')->get();

        return view('ingredients.index', array('ingredients' => $all));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $recipe = Recipe::find($request->recipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {

//        $listRecipes = Recipe::whereIn('validated', 1);

        $ingredient = Ingredient::getbyName($name);
        $listeRecipeID = RecipeIngredient::where('id_ingredient', $ingredient->id)->whereIn('id_recipe', function ($query) {
            $query->where('validated', 1)->from('recipes')->select('id');
        })->select('id_recipe')->groupBy('id_recipe')->paginate(15);


        return view('ingredients.show', array('ingredient' => $ingredient, 'recipes' => $listeRecipeID));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
