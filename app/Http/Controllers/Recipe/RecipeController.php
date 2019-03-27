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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    use HasUserInput, HasTimes;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
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
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(StoreRecipeRequest $request)
    {
        // Insert recette
        $recipe = new Recipe;
        $recipe = $recipe->easyInsert($request);
        $universe = $recipe->universes()->firstOrCreate(
            ['name' => $request->univers],
            ['first_creator' => Auth::user()->id]
        );
        $recipe->saveOrFail();

        // SLUG & UID
        $uid = $recipe->generateUid($recipe->id);
        $slug = $recipe->slugUpdate($recipe->id, $uid);

        $recipe->insertIngredients($request);
        $recipe->insertSteps($request);
        $recipe->insertPicture($request->resume);

        return redirect()->route('recipe.show', $slug);
    }


    /**
     * Display the specified resource.
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $recette = Recipe::where($slug)->firstOrFail();

        // STARS
        $stars1 = RecipeLike::where('id_recipe', $recette->id)->avg('note');
        if ($stars1 == null) {
            $stars1 = 1;
        }
        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);

        // RATING
        $countrating = RecipeLike::where('id_recipe', '=', $recette->id)->count();
        if ($countrating == null || $countrating == 0) {
            $countrating = 1;
        }
        $nom = User::where('id', $recette->id_user)->value('name');
        $related = $this->morLikeThis($recette, 4);

        return view('recipes.show', [
            'recette' => $recette,
            'related' => $related,
            'stars' => $stars,
            'countrating' => $countrating,
            'stars1' => $stars1,
            'nom' => $nom,
        ])->with('controller', $this);
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
            ['univers' => $univers,
                'types' => $types_univ,
                'difficulty' => $difficulty,
                'types_plat' => $types_plat,
                'recette' => $recette]
        );
    }


    /**
     * @param StoreRecipeRequest $request
     * @param Recipe             $recipe
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(StoreRecipeRequest $request, Recipe $recipe)
    {
        $recipe->update([
            'univers' => Univers::updateOrCreate(['name' => $request->univers]),
        ]);

        //Filtering the comment
        $comm = app('profanityFilter')->filter(htmlentities(clean($request->comment)));

        //Vegetarian switch
        $vege = clean($request->vegan) == 'on' ? true : false;

        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

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
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Recipe $recipe)
    {
        return $recipe->delete();
    }

    public function random()
    {
        $rand = Recipe::where('validated', 1)->inRandomOrder()->first();
        if ($rand) {
            return redirect()->route('recipe.show', ['recipe' => $rand->slug]);
        } else {
            return redirect('/');
        }
    }


    private function morLikeThis($recipe, $nbRecipes)
    {
        $nbWanted = intval($nbRecipes);
        $related = Recipe::where('type', $recipe->type)
            ->where('id', '!=', $recipe->id)->where('validated', 1)->inRandomOrder()->limit($nbWanted)
            ->get();

        $total = $related->count();

        // I want to execute theses commands
        if ($total < $nbWanted) {
            $relatedUniverse = Recipe::where('univers', $recipe->univers)->where('validated', 1)
                ->where('id', '!=', $recipe->id)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedUniverse);
            $total = $total + $relatedUniverse->count();
        }

        if ($total < $nbWanted) {
            $relatedSameAuthor = Recipe::where('validated', 1)
                ->where('id', '!=', $recipe->id)
                ->where('id_user', $recipe->id_user)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedSameAuthor);
            $total = $total + $relatedSameAuthor->count();
        }

        if ($total < $nbWanted) {
            $relatedSameAuthor = Recipe::where('validated', 1)
                ->where('id', '!=', $recipe->id)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedSameAuthor);
            $total = $total + $relatedSameAuthor->count();
        }

        return $related;
    }
}
