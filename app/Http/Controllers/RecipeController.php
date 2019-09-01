<?php

namespace App\Http\Controllers\Recipe;

use App\Categunivers;
use App\Difficulty;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Recipe;
use App\Traits\HasTimes;
use App\Traits\HasUserInput;
use App\TypeRecipe;
use App\Univers;

use App\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

/**
 * Class RecipeController
 * @package App\Http\Controllers\Recipe
 */
class RecipeController extends Controller
{
    use HasUserInput, HasTimes;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Categunivers::all();
        $recipes = Recipe::getLastPaginate(true, false, 12);

        // On charge les données dans la vue
        return view(
            'recipes.index',
            compact('medias', 'recipes')
        );
    }

    /**
     * Show the form for creating a new resource
     * @return Factory|View
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if (Gate::denies('create', Recipe::class)) {
            return redirect(route('recipe.index'));
        }

        $types_univ = Categunivers::all();
        $difficulty = Difficulty::all();
        $types_plat = TypeRecipe::all();

        return view('recipes.create', [
            'types' => $types_univ,
            'difficulty' => $difficulty,
            'types_plat' => $types_plat
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRecipeRequest $request
     *
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(StoreRecipeRequest $request)
    {
        if (Gate::denies('create', Recipe::class)) {
            return redirect(route('recipe.index'));
        }

        // Insert recipe
        $recipe = new Recipe;
        $recipe = $recipe->easyInsert($request);
        $recipe->saveOrFail();
        // SLUG & UID
        $recipe->slugUpdate($recipe->generateUid($recipe->id));

        $recipe->insertIngredients($request);
        $recipe->insertSteps($request);
        $recipe->insertPicture($request, true);
        $recipe->insertUniverse($request);

        return redirect()->route('recipe.show', $recipe->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     *
     * @return Factory|View
     */
    public function show($slug)
    {
        $recipe = Recipe::where('slug', $slug)
            ->with(['universes', 'types', 'typeuniverse'])
            ->firstOrFail();

        if (Gate::denies('view', $recipe)) {
            return redirect(route('recipe.index'));
        }
        $type = TypeRecipe::where('id', $recipe->type)->first();
        $pictureSet = $recipe->medias()->get();
        if ($pictureSet->isNotEmpty()) {
            $picturesOfAuthor = $recipe->getAuthorPictures();
            $picturesOfUsers = $recipe->getNonAuthorPictures();
        } else {
            $picturesOfAuthor = collect([]);
            $picturesOfUsers = collect([]);
        }
        $nom = User::find($recipe->id_user)->value('name');
        $related = $recipe->moreLikeThis(4);

        return view(
            'recipes.show',
            compact(
                'recipe',
                'related',
                'picturesOfAuthor',
                'picturesOfUsers',
                'nom',
                'type'
            )
        );
    }

    /**
     * @param $slug
     *
     * @return Factory|View
     */
    public function edit($slug)
    {
        $recipe = Recipe::where('slug', $slug)->firstOrFail();
        if (Gate::denies('update', $recipe)) {
            return redirect(route('recipe.show', $recipe->slug));
        }
        $univers = $recipe->universes;
        $types_univ = Categunivers::all();
        $difficulty = DB::table('difficulty')->get();
        $types_plat = DB::table('type_recipes')->get();
        $type = TypeRecipe::where('id', $recipe->type)->first();
        if ($recipe->notes->count() > 0) {
            $stars1 = $recipe->notes->avg('note');
        } else {
            $stars1 = 1;
        }

        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);

        $nom = User::find($recipe->id_user)->value('name');
        $related = $recipe->moreLikeThis(4);
        return view(
            'recipes.edit',
            compact(
                'univers',
                'difficulty',
                'recipe',
                'type',
                'nom',
                'related'
            ),
            [
                'types' => $types_univ,
                'types_plat' => $types_plat,
            ]
        );
    }

    /**
     * @param StoreRecipeRequest $request
     * @param Recipe $recipe
     *
     * @return RedirectResponse
     * @throws Throwable
     * @throws ValidationException
     */
    public function update(StoreRecipeRequest $request, Recipe $recipe)
    {
        if (Gate::denies('update', Recipe::class)) {
            return redirect(route('recipe.index'));
        }
        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'title' => 'required'
        ]);

        $recipe->update([
            'univers' => Univers::updateOrCreate([
                'name' => $this->cleanInput($request->univers)
            ]),
        ]);
        $recipe = $recipe->easyInsert($request);
        $recipe->update();
        // TODO : following code is C/C of create
        // SLUG & UID
        $recipe->updateIngredients($request);
        // TODO : update steps linked to insert steps
//        $recipe->updateSteps($request);
        // TODO : pictures that weren't here before are added, otherwise it's updated
//        $recipe->insertPicture($request, true);

        return redirect()->route('recipe.show', ['post' => $recipe->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Recipe $recipe
     *
     * @return bool|Exception
     */
    public function destroy(Recipe $recipe)
    {
        if (Gate::denies('delete', Recipe::class)) {
            return redirect(route('recipe.index'));
        }
        try {
            if ($recipe->delete()) {
                return true;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function random()
    {
        $rand = Recipe::validated(1)->inRandomOrder()->first();
        if ($rand) {
            return redirect()->route('recipe.show', ['recipe' => $rand->slug]);
        } else {
            return redirect(route('index'));
        }
    }
}
