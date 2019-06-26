<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class RecipesAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
    }

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
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(25);

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
        $recipe = Recipe::where('id', $id)->first();
        return view("admin.recipes.edit", [
            'recipe' => $recipe
        ])->with(['controller' => $this]);
    }

    public function update(Request $request, Recipe $recipe)
    {
        foreach ($request->request as $index => $requestElement) {
            if ($index !== '_token' && $index !== '_method') {
                $recipe->$index = $requestElement;
            }
        }
        $recipe->save();
        return view('admin.recipes.edit', [
            'recipe' => $recipe,
        ])->with(['controller' => $this]);
    }

    /**
     * @param Request $request
     */
    public function validatePicture(Request $request)
    {
        Log::debug('User : ', ['id' => Auth::user()->id, 'name' => Auth::user()->name]);
        if ($request->validate == true) {
            Log::debug('Action : validated the picture of recipe.',
                ['imgId' => $request->imgId, 'recipeId' => $request->recipeId]);
        } else {
            Log::debug('Action : unvalidated the picture of recipe.',
                ['imgId' => $request->imgId, 'recipeId' => $request->recipeId]);
        }
        Log::debug('____');
        //TODO finish

        if ($request->recipeId && $request->imgId) {
            if ($request->validate == 'true') {
                DB::table('mediables')
                    ->where('media_id', $request->imgId)
                    ->update(['valid' => 1]);
                return response()->json(['message' => 'Picture validated']);
            } else {
                DB::table('mediables')
                    ->where('media_id', $request->imgId)
                    ->update(['valid' => 0]);
                return response()->json(['message' => 'Picture invalidated']);
            }
        }
    }
}
