<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\Type_recipe;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
     * @return Factory|View
     */
    public function index()
    {
        $recipes = Recipe::paginate(10);

        return view('admin.recipes.index', [
            'recipes' => $recipes,
        ])->with(['controller' => $this]);
    }

    public function edit($id)
    {
        $recipe = Recipe::where('id', $id)->get();

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
    }

    public function update($content)
    {
        $recipe = Recipe::where('slug', $content)->first();

        return view('admin.recipes.edit', [
            'recipe' => $recipe,
        ])->with(['controller' => $this]);
    }
}
