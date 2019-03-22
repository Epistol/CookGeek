<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\Type_recipe;
use Illuminate\Support\Facades\DB;

class RecipesAdmin extends Controller
{
    /**
     * @return mixed
     */
    public function getType()
    {
        $mytypeid = $this->type;

        return (new Type_recipe())->getnamefromid($mytypeid);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $recipes = DB::table('recipes')->latest()->paginate(10);

        return view('admin.recipes.index', [
            'recipes' => $recipes,
        ])->with(['controller' => $this]);
    }

    public function edit($id)
    {
        $recipe = \App\Recipe::where('id', '=', $id)->get();

        return view('admin.recipes.edit', [
            'recipe' => $recipe[0],
        ])->with(['controller' => $this]);
    }

    public function show($id)
    {
        return redirect()->route('recipe.show', $id);
    }

    public function store($id)
    {
        $recipe = Recipe::where('id', '=', $id)->first();
        return view("admin.recipes.edit", [
            'recipe' => $recipe
        ])->with(['controller' => $this]);

        return view('admin.recipes.edit', ['recipe' => $recipe,])->with(['controller' => $this]);
    }

    public function update($content)
    {
        die();
        $recipe = DB::table('recipes')->where('slug', '=', $content)->first();

        return view('admin.recipes.edit', [
            'recipe' => $recipe,
        ])->with(['controller' => $this]);
    }
}
