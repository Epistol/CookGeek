<?php

namespace App\Http\Controllers\Admin;

use App\Type_recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Recipes;

class RecipesAdmin extends Controller
{
    /**
     * @return mixed
     */
    public function getType()
    {
        $mytypeid = $this->type;
        return (new Type_recipe)->getnamefromid($mytypeid);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $recipes = DB::table('recipes')->latest()->paginate(10);
        return view("admin.recipes.index", array(
            'recipes' => $recipes
        ))->with(['controller' => $this]);
    }

    public function edit($id){
    	$recipe = \App\Recipes::where('id', '=', $id)->get();
	    return view("admin.recipes.edit", array(
		    'recipe' => $recipe[0]
	    ))->with(['controller' => $this]);
    }

	public function store($id){
		$recipe = DB::table('recipes')->where('id', '=' , $id)->first();
		return view("admin.recipes.edit", array(
			'recipe' => $recipe
		))->with(['controller' => $this]);
	}

	public function update($content){
        dd($content);
        $recipe = DB::table('recipes')->where('id', '=' , $id)->first();
        return view("admin.recipes.edit", array(
            'recipe' => $recipe
        ))->with(['controller' => $this]);
    }
}
