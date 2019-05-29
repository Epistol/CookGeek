<?php

namespace App\Http\Controllers\Recipe;

use App\Categunivers;
use App\Difficulty;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Recipe;
use App\RecipeLike;
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
use Sightengine\SightengineClient;
use Throwable;

/**
 * Class RecipeController
 * @package App\Http\Controllers\Recipe
 */
class RecipeController extends Controller
{
    use HasUserInput, HasTimes;

    /**
     * RecipeController constructor.
     *
     */
    public function __construct()
    {
        $this->authorizeResource(Recipe::class, 'recipe');
    }

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
        if (!Auth::guard()->check()) {
            return redirect('/login');
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
        // Insert recipe
        $recipe = new Recipe;
        $recipe = $recipe->easyInsert($request);
        $universe = Univers::firstOrCreate(['name' => $request->univers]);
        $recipe->universes()->attach($universe);

        $recipe->saveOrFail();

        // SLUG & UID
        $uid = $recipe->generateUid($recipe->id);
        $slug = $recipe->slugUpdate($recipe->id, $uid);

        $recipe->insertIngredients($request);
        $recipe->insertSteps($request);
        foreach ($request->picture as $picture) {
            if (!empty($picture)) {
                $SightEngine = new SightengineClient(env('SIGHTENGINEUSER'), env('SIGHTENGINEKEY'));

//                $imageCheck = $SightEngine->check(['nudity', 'wad', 'offensive', 'face-attributes', 'text'])
//                                          ->set_file($picture);

                //analyze the locally stored image for nudity

                $newPicture = $this->addMedia($picture)
                    ->toMediaCollection('main');
//                $imageCheck = $SightEngine->check(['nudity', 'wad', 'offensive', 'face-attributes', 'text'])
//                                          ->set_url($newPicture->url);
//                dd($imageCheck->nudity);

                $recipe->image()->attach($newPicture, ['status' => 'draft']);
            }
        }

        return redirect()->route('recipe.show', $slug);
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
        $recette = Recipe::where('slug', $slug)->firstOrFail();
        $type = TypeRecipe::where('id', $recette->type)->first();
        $pictures = $recette->image();
        dd($pictures);
        $picturesOfAuthor = $recette->image()->where('user_id', Auth::user()->id)->get();
        $picturesOfUsers = $recette->image()->where('user_id', '!=', Auth::user()->id)->get();

        // STARS
        $stars1 = RecipeLike::where('id_recipe', $recette->id)->avg('note');
        if ($stars1 == null) {
            $stars1 = 1;
        }
        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);

        // RATING
        $countrating = RecipeLike::where('id_recipe', $recette->id)->count();
        if ($countrating == null || $countrating == 0) {
            $countrating = 1;
        }
        $nom = User::where('id', $recette->id_user)->value('name');
        $related = $recette->moreLikeThis(4);

        return view('recipes.show', [
            compact(
                'recette',
                'related',
                'picturesOfAuthor',
                'picturesOfUsers',
                'stars',
                'countrating',
                'stars1',
                'nom',
                'media',
                'type'
            )
        ])->with('controller', $this);
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
