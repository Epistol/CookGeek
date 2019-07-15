<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Class RecipesAdmin
 * @package App\Http\Controllers\Admin
 */
class RecipesAdmin extends Controller
{
    /**
     * RecipesAdmin constructor.
     */
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
        $recipes = Recipe::orderBy('created_at', 'desc')
            ->with(['universes','types', 'user', 'typeuniverse'])
            ->paginate(25);

        return view('admin.recipes.index', [
            'recipes' => $recipes,
        ])->with(['controller' => $this]);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $recipe = Recipe::where('id', $id)->get();

        return view('admin.recipes.edit', [
            'recipe' => $recipe[0],
        ])->with(['controller' => $this]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('recipe.show', $id);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function store($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        return view("admin.recipes.edit", [
            'recipe' => $recipe
        ])->with(['controller' => $this]);
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return Factory|View
     */
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function validatePicture(Request $request)
    {
        Log::debug('User : ', ['id' => Auth::user()->id, 'name' => Auth::user()->name]);
        if ($request->validate == true) {
            Log::debug(
                'Action : validated the picture of recipe.',
                ['imgId' => $request->imgId, 'recipeId' => $request->recipeId]
            );
        } else {
            Log::debug(
                'Action : unvalidated the picture of recipe.',
                ['imgId' => $request->imgId, 'recipeId' => $request->recipeId]
            );
        }
        Log::debug('____');

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

    /**
     * Remove the specified resource from storage.
     *
     * @param Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);
        $recipe->delete();
        return redirect()->back();
    }
}
