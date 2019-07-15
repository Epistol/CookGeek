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
        /* if(Auth::user()){
             $recipes = Recipe::getLastPaginate(false, false, 12);
         }*/
        $recipes = Recipe::getLastPaginate(true, false, 12);

        // On charge les données dans la vue
        return view(
            'recipes.index',
            [
                'medias' => $medias,
                'recipes' => $recipes
            ]
        )->with(['controller' => $this]);
    }

    /**
     * Show the form for creating a new resource
     * @return Factory|View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/');
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
        $this->authorize('create', Recipe::class);

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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($slug)
    {
        $recipe = Recipe::where('slug', $slug)->firstOrFail();

        $type = TypeRecipe::where('id', $recipe->type)->first();
        $pictureSet = $recipe->medias()->get();
        if ($pictureSet->isNotEmpty()) {
            $picturesOfAuthor = $recipe->getAuthorPictures();
            $picturesOfUsers = $recipe->getNonAuthorPictures();
        } else {
            $picturesOfAuthor = collect([]);
            $picturesOfUsers = collect([]);
        }

        // STARS
//        dd($recipe->notes);
        if ($recipe->notes->count() > 0) {
            $stars1 = $recipe->notes->avg('note');
        } else {
            $stars1 = 1;
        }

        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);

        // RATING
        $countrating = $recipe->notes->count();
        if ($countrating == null || $countrating == 0) {
            $countrating = 1;
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
                'stars',
                'countrating',
                'stars1',
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
        $this->authorize('update', $recipe);

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

        // RATING
        $countrating = $recipe->notes->count();
        if ($countrating == null || $countrating == 0) {
            $countrating = 1;
        }
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
                'related',
                'stars',
                'countrating'
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
        $this->authorize('update', Recipe::class);

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
     * @return bool|null
     * @throws Exception
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', Recipe::class);

        return $recipe->delete();
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
