<?php

namespace App\Http\Controllers\Recipe;

use App\Categunivers;
use App\Difficulty;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Recipe;
use App\RecipeNote;
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
        $this->authorize('index', Recipe::class);

        $medias = Categunivers::all();
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
        $this->authorize('create', Recipe::class);

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
        $universe = Univers::where(['name' => $request->univers])->get();
        if ($universe->isNotEmpty()) {
            $recipe->universes()->attach($universe[0]);
        } else {
            $universe = new Univers(['name' => $request->univers]);
            $recipe->universes()->save($universe);
        }

        // SLUG & UID
        $uid = $recipe->generateUid($recipe->id);
        $slug = $recipe->slugUpdate($recipe->id, $uid);

        $recipe->insertIngredients($request);
        $recipe->insertSteps($request);
        $recipe->insertPicture($request, true);

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
        $this->authorize('view', Recipe::class);

        $recipe = Recipe::where('slug', $slug)->firstOrFail();
        $type = TypeRecipe::where('id', $recipe->type)->first();
        $pictureSet = $recipe->medias()->get();
        if ($pictureSet->isNotEmpty()) {
            $picturesOfAuthor = $pictureSet->filter(function ($value) use ($recipe) {
                if ($value->users()->first()->id === $recipe->id_user) {
                    return $value;
                }
            });
            $picturesOfUsers = $pictureSet->filter(function ($value) use ($recipe) {
                if ($value->users()->first()->id !== $recipe->id_user) {
                    return $value;
                }
            });
        } else {
            $picturesOfAuthor = collect([]);
            $picturesOfUsers = collect([]);
        }

        // STARS
        if($recipe->notes->count() > 0) {
            $stars1 = $recipe->notes->avg('note');
        }
        else {
            $stars1 = 1;
        }

        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);

        // RATING
        $countrating = $recipe->notes->count();
        if ($countrating == null || $countrating == 0) {
            $countrating = 1;
        }
        $nom = User::where('id', $recipe->id_user)->value('name');
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
        )->with('controller', $this);
    }


    /**
     * @param $slug
     *
     * @return Factory|View
     */
    public function edit($slug)
    {
        $recette = Recipe::where('slug', $slug)->firstOrFail();
        $univers = Univers::where('id', '=', $recette->univers)->select('name')->first();
        $types_univ = DB::table('categunivers')->get();
        $difficulty = DB::table('difficulty')->get();
        $types_plat = DB::table('type_recipes')->get();

        return view(
            'recipes.edit',
            [
                compact('univers', 'difficulty', 'recette'),
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
     * @throws ValidationException
     */
    public function update(StoreRecipeRequest $request, Recipe $recipe)
    {
        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $recipe->update([
            'univers' => Univers::updateOrCreate(['name' => $request->univers]),
        ]);

        //Filtering the comment
        $comm = app('profanityFilter')->filter(htmlentities(clean($request->comment)));

        //Vegetarian switch
        $vege = clean($request->vegan) == 'on' ? true : false;

        // If user is author
        // If main picture is replaced, remove and insert
        // If other picture is replaced, remove and insert

        // If insert : insert
        // If removed : remove
        if (Auth::user()->id == $recipe->id_user) {
            $recipe->insertPicture($request);
        }

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
        return $recipe->delete();
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function random()
    {
        $rand = Recipe::where('validated', 1)->inRandomOrder()->first();
        if ($rand) {
            return redirect()->route('recipe.show', ['recipe' => $rand->slug]);
        } else {
            return redirect('/');
        }
    }
}
