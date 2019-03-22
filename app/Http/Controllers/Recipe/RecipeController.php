<?php

namespace App\Http\Controllers\Recipe;

use App\Categunivers;
use App\Difficulty;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Ingredient;

use App\Jobs\PictureThumbnail;
use App\Pictures;
use App\Recipe;
use App\RecipesSteps;
use App\Traits\HasTimes;
use App\Traits\HasUserInput;
use App\TypeRecipe;
use App\Univers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            [
                'universcateg' => $medias,
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
        $recipe->title = $request->title;
        $recipe->vegetarien = $request->vegan == 'on' ? true : false;
        $recipe->difficulty = intval($request->difficulty);
        $recipe->type = intval($request->categ_plat);
        $recipe->cost = intval($request->cost);
        $recipe->prep_time = $this->getUnifiedTime($request->prep_minute, $request->prep_heure);
        $recipe->cook_time = $this->getUnifiedTime($request->cook_minute, $request->cook_heure);
        $recipe->rest_time = $this->getUnifiedTime($request->rest_minute, $request->rest_heure);
        $recipe->nb_guests = $request->unite_part;
        $recipe->guest_type = $request->value_part;
        $recipe->type_univers = intval($request->type);
        $recipe->id_user = Auth::user()->id;
        $recipe->video = $request->video;
        $recipe->commentary_author = $request->comment;
        $recipe->validated = 0;
        $recipe->saveOrFail();

        $universe = $recipe->universes()->firstOrCreate(
            ['name' => $request->univers],
            ['first_creator' => Auth::user()->id]
        );

        // SLUG & UID
        $uid = $recipe->generateUid($recipe->id);
        $slug = $recipe->slugUpdate($recipe->id, $uid);

        // Storing ingredients and attach to the recipe
        foreach ($request->ingredient as $key => $ingredient) {
            $ingredient = Ingredient::firstOrCreate(['name' => $ingredient]);
            $recipe->ingredients()->attach(
                $ingredient,
                ['quantity' => self::cleanInput($request->qtt_ingredient[$key])]
            );
        }

        // Storing steps and attach to the recipe
        foreach ($request->step as $key => $step) {
            $newStep = RecipesSteps::firstOrCreate(
                [
                    'instruction' => $request->step[$key]
                ]
            );
            $recipe->steps()->attach(
                $newStep,
                ['step_number' => $key]
            );
        }

        if (!empty($request->resume)) {
            $file = $request->resume;
            if ($file->getError() == 0) {
                $path = $file->store('public/uploads');
                $media = $recipe->addMedia($path)
                    ->toMediaCollection('recipes/' . $recipe->id);
                PictureThumbnail::dispatch($recipe, $media, 'thumbnail');
                PictureThumbnail::dispatch($recipe, $media, 'indexRecipe');
                PictureThumbnail::dispatch($recipe, $media, 'thumbSquare', 250);
                PictureThumbnail::dispatch($recipe, $media, 'original');
            }
        }

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
        $recette = Recipe::where('slug', $slug)->first();

        if (!$recette) {
            $alert = '';

            return abort(404);
        }
        if (Auth::guest()) {
            $alert = '';
            if ($recette->validated === 0) {
                return abort(404);
            }
        } else {
            if ($recette->id_user === Auth::user()->id) {
                if ($recette->validated === 0) {
                    $alert = 'non_valid';
                } else {
                    $alert = '';
                }
            } else {
                $alert = '';
                if ($recette->validated === 0) {
                    return abort(404);
                }
            }
        }

        $ingredients = DB::table('recipes_ingredients')->where('id_recipe', '=', $recette->id)
            ->join('ingredients', 'recipes_ingredients.id_ingredient', '=', 'ingredients.id')
            ->get();

        $steps = DB::table('recipes_steps')->where('recipe_id', '=', $recette->id)->get();
        $typeuniv = DB::table('categunivers')->where('id', '=', $recette->type_univers)->first();

        $validPictures = Pictures::loadRecipePicturesValid($recette);

        if (!Auth::guest()) {
            $userPicturesNonValid = $this->pictureService->loaduserPicturesNonValid($recette, Auth::id());
        } else {
            $userPicturesNonValid = '';
        }

        // STARS
        $stars1 = DB::table('recipe_likes')->where('id_recipe', '=', $recette->id)->avg('note');
        if ($stars1 == null) {
            $stars1 = 1;
        }

        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);

        // RATING

        $countrating = DB::table('recipe_likes')
            ->where('id_recipe', '=', $recette->id)
            ->count();
        if ($countrating == null || $countrating == 0) {
            $countrating = 1;
        }
        $id_auteur = $recette->id_user;
        $nom = DB::table('users')->where('id', $id_auteur)->value('name');

        // TIMES ISO

        $preptimeiso = 'PT' . $this->sumerise($recette->prep_time);
        $cooktimeiso = 'PT' . $this->sumerise($recette->cook_time);
//            $resttimeiso = "PT".$this->sumerise($recette->rest_time);

        $totaliso = 'PT' . $this->sumerise($recette->prep_time + $recette->cook_time + $recette->rest_time);

        $related = $this->morLikeThis($recette, 4);

        if ($alert === 'non_valid') {
            // On charge les données dans la vue
            return view('recipes.show', [
                'recette' => $recette,
                'ingredients' => $ingredients,
                'steps' => $steps,
                'related' => $related,
                'validPictures' => $validPictures,
                'nonValidPictures' => $userPicturesNonValid,
                'picturectrl' => $this->pictureService,
                'typeuniv' => $typeuniv,
                'stars' => $stars,
                'countrating' => $countrating,
                'stars1' => $stars1,
                'nom' => $nom,
                'preptimeiso' => $preptimeiso,
                'cooktimeiso' => $cooktimeiso,
                'totaliso' => $totaliso,
            ])->with('controller', $this)->with('status', "Votre recette n'est pas encore publiée, mais c'est pour bientôt !");
        } else {
            // On charge les données dans la vue
            return view('recipes.show', [
                'recette' => $recette,
                'ingredients' => $ingredients,
                'steps' => $steps,
                'related' => $related,
                'picturectrl' => $this->pictureService,
                'validPictures' => $validPictures,
                'nonValidPictures' => $userPicturesNonValid,
                'typeuniv' => $typeuniv,
                'stars' => $stars,
                'countrating' => $countrating,
                'stars1' => $stars1,
                'nom' => $nom,
                'preptimeiso' => $preptimeiso,
                'cooktimeiso' => $cooktimeiso,
                'totaliso' => $totaliso,
            ])->with('controller', $this);
        }
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($slug)
    {
        $recette = Recipe::where('slug', $slug)->first();

        if ($recette != '' || $recette != null) {
            if ($recette->id_user != Auth::id()) {
                return back();
            } else {
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
        } else {
            return back();
        }
    }


    /**
     * @param StoreRecipeRequest $request
     * @param                    $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(StoreRecipeRequest $request, $id)
    {
        $input = $request->all();
        $recipe = Recipe::where('id', '=', $id)->firstOrFail();

        // User ID :
        if (isset(Auth::user()->id)) {
            $iduser = Auth::user()->id;
        }

        $collection_time = Recipe::getTimes($request->prep_minute, $request->cook_minute, $request->rest_minute, $request->prep_heure, $request->cook_heure, $request->rest_heure);

        $prep = $collection_time->get('prep');
        $cook = $collection_time->get('cook');
        $rest = $collection_time->get('rest');

        $univers = $this->first_found_universe(strip_tags(clean($request->univers)));

        //Filtering the comment
        $comm = app('profanityFilter')->filter(htmlentities(clean($request->comment)));

        //Vegetarian switch
        $vege = clean($request->vegan) == 'on' ? true : false;

        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if (!empty($request->resume)) {
            $file = $request->resume;
            if ($file->getError() == 0) {
                $photoName = time() . '.' . $file->getClientOriginalExtension();
                $this->ajouter_image($photoName, $iduser, $id);
                $file->move(public_path('recipes/' . $id . '/' . $iduser . '/'), $photoName);
            }
        }

        //Inserting the recipe
        $idRecette = $this->edit_recipe($id, strip_tags(clean($request->title)), $request->vegan, intval($request->difficulty), intval($request->categ_plat), intval($request->cost), intval($prep), intval($cook), intval($rest), $request->unite_part, strip_tags(clean($request->value_part)), intval($univers), intval($request->type), intval($iduser), clean($request->video), clean($comm));

        // Partie ingrédients
        if ($request->ingredient !== null) {
            foreach ($request->ingredient as $key => $ingredient) {
                $this->editIngredient($key, strip_tags(clean($ingredient)), $id, strip_tags(clean($request->qtt_ingredient[$key])));
            }
        }
        if ($request->ingredient_removed !== null) {
            foreach ($request->ingredient_removed as $key => $ingredient) {
                $this->removeIngredients($key, strip_tags(clean($request->ingredient_removed)), $id, strip_tags(clean($request->qtt_removed_ingredient[$key])));
            }
        }

        // On enlève les ingrédients qui ne sont plus utilisé

        // Gestion des étapes
        foreach ($request->step as $key => $step) {
            if ($step) {
                $steps_old = DB::table('recipes_steps')->where('instruction', '=', strip_tags(clean($step)))->update(['instruction' => $step]);
            }
        }

        return redirect()->route('recipe.show', ['post' => $recipe->slug]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function load_picture($recette)
    {
        $firstimg = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->where('user_id', '=', $recette->id_user)->orderBy('updated_at', 'desc')->first();
        if ($firstimg !== null) {
            $url = url('/recipes/' . $recette->id . '/' . intval($recette->id_user) . '/' . strip_tags(clean($firstimg->image_name)));
            $retour = collect($url);
        } else {
            $images = Pictures::where(['recipe_id' => $recette->id, ['user_id', '!=', $recette->id_user]])->get();
            $retour = collect($images);
        }

        return $retour;
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

    private function editIngredient($index, $ingredient, $idRecette, $qtt)
    {
        if ($ingredient) {
            $id_ingredient_ajout = DB::table('ingredients')->where('name', '=', $ingredient)->get();

            // Si ingrédient inexistant, alors on ajoute à la db et on recupère l'id
            if ($id_ingredient_ajout->isEmpty()) {
                $in = app('profanityFilter')->filter($ingredient);
                if (preg_match("/^(?:.*)[\*\*](?:.*)$/", $in)) {
                    $in = '';
                }
                $ingredientID = $in ? DB::table('ingredients')->insertGetId(
                    ['name' => $in]
                ) : $id_ingredient_ajout;
            } else {
                $ingredientIDRetour = $id_ingredient_ajout->first();
                $ingredientID = $ingredientIDRetour->id;
            }

            // Pour chaque ingrédient, on l'associe à la recette
            $test = DB::table('recipes_ingredients')->where('id_ingredient', '=', $ingredientID)->get();

            if ($test->isNotEmpty()) {
                $recingr = DB::table('recipes_ingredients')->where('id', '=', $test[0]->id)->update(
                    ['id_ingredient' => $ingredientID,
                        'qtt' => app('profanityFilter')->filter($qtt),
                    ]
                );
            } else {
                $recingr = DB::table('recipes_ingredients')->where('id_recipe', '=', $idRecette)->insertGetId(
                    ['id_recipe' => $idRecette,
                        'id_ingredient' => $ingredientID,
                        'qtt' => app('profanityFilter')->filter($qtt),
                    ]
                );
            }
        }
    }

    private function removeIngredients($index, $ingredient, $idRecette, $qtt)
    {
        // On supprime les ingrédients assigné à la recette
        $id_ingredient = DB::table('ingredients')->where('name', '=', $ingredient)->first();

        $ingredient_recette = DB::table('recipes_ingredients')->where('id_ingredient', '=', $id_ingredient->id)->where('id_recipe', '=', $idRecette)->where('qtt', '=', $qtt)->first();
        if ($ingredient_recette !== null) {
            DB::table('recipes_ingredients')->where('id_ingredient', '=', $id_ingredient->id)->where('qtt', '=', $qtt)->delete();
        }
    }

    private function morLikeThis($recipe, $nbRecipes)
    {
        $nbWanted = intval($nbRecipes);
        $related = Recipe::where('type', '=', $recipe->type)
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
