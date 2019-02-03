<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/

use App\Categunivers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PictureController;
use App\Http\Requests\StoreRecipe;
use App\RecipeImg;
use App\Recipe;
use App\Univers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;


class RecipeController extends Controller
{

    private $pictureService;

    // TODO : a dégager
    public function __construct()
    {
        $this->pictureService = new PictureController();
    }


    /**
     * Show the profile for the given user.
     *
     * @return Response
     */

    public function index()

    {
        $medias = Categunivers::get();
        $recipes = Recipe::getLastPaginate(true,false,12);

        // On charge les données dans la vue
        return view('recipes.index', array('universcateg' => $medias, 'pictureService' => $this->pictureService, 'recipes' => $recipes))->with(['controller' => $this]);
    }





    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $types_univ = DB::table('categunivers')->get();
        $difficulty = DB::table('difficulty')->get();
        $types_plat = DB::table('type_recipes')->get();
        return view('recipes.add', array('types' => $types_univ, 'difficulty' => $difficulty, 'types_plat' => $types_plat));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($slug)
    {
        $recette = DB::table('recipes')->where("slug", "=", $slug)->first();

        if ($recette != "" || $recette != NULL) {
            if ($recette->id_user != Auth::id()) {
                return back();
            } else {
                $univers = DB::table("univers")->where("id", "=", $recette->univers)->select('name')->first();
                $types_univ = DB::table('categunivers')->get();
                $difficulty = DB::table('difficulty')->get();
                $types_plat = DB::table('type_recipes')->get();
                return view('recipes.edit', array('univers' => $univers, 'types' => $types_univ, 'difficulty' => $difficulty, 'types_plat' => $types_plat, 'recette' => $recette));
            }
        } else {
            return back();
        }

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreRecipe $request)
    {

        // User ID :
        if (isset(Auth::user()->id)) {
            $iduser = Auth::user()->id;
        }

        $collection_time = Recipe::getTimes($request->prep_minute, $request->cook_minute, $request->rest_minute, $request->prep_heure, $request->cook_heure, $request->rest_heure);

        $prep = $collection_time->get('prep');
        $cook =  $collection_time->get('cook');
        $rest =  $collection_time->get('rest');

        $univers = $this->first_found_universe(strip_tags(clean($request->univers)));
        //Filtering the comment
        $comm = app('profanityFilter')->filter(strip_tags(clean($request->comment)));
        //Vegetarian switch
        $vege = clean($request->vegan) == "on" ? true : false;

        //Inserting the recipe
        $idRecette = $this->insert_recipe(
            strip_tags(clean($request->title)),
            $vege,
            intval($request->difficulty),
            intval($request->categ_plat),
            intval($request->cost),
            intval($prep),
            intval($cook),
            intval($rest),
            $request->unite_part,
            strip_tags(clean($request->value_part)),
            intval($univers),
            intval($request->type),
            intval($iduser),
            clean($request->video),
            $comm);

        // SLUG & UID
        $uid = $this->generate_uid($idRecette);
        $slug = $this->slugUpdate($idRecette, $uid, $request);

        // Partie ingrédients
        foreach ($request->ingredient as $key => $ingredient) {
            $this->rangerIngredient($key, strip_tags(clean($ingredient)), $idRecette, strip_tags(clean($request->qtt_ingredient[$key])));
        }

        // Gestion des étapes
        foreach ($request->step as $key => $step) {
            if ($step) {
                DB::table('recipes_steps')->insertGetId(
                    ['recipe_id' => $idRecette,
                        'step_number' => $key,
                        'instruction' => clean(app('profanityFilter')->filter($request->step[$key])),
                    ]);
            }
        }

        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if (!empty($request->resume)) {
            $file = $request->resume;
            if ($file->getError() == 0) {
                $path = $file->store('public/uploads');
                $hashedName = $request->resume->hashName();
                $ext = pathinfo($hashedName, PATHINFO_EXTENSION);
                $filename = basename($hashedName, "." . $ext);
                $this->pictureService->addFirstPictureRecipe($path, $filename, $idRecette, $uid, $iduser);
            }
        }

        return redirect()->route('recipe.show', $slug);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(StoreRecipe $request, $id)
    {


        $input = $request->all();

        $recipe = Recipe::where('id', '=', $id)->firstOrFail();

        // User ID :
        if (isset(Auth::user()->id)) {
            $iduser = Auth::user()->id;
        }


        $collection_time = Recipe::getTimes($request->prep_minute, $request->cook_minute, $request->rest_minute, $request->prep_heure, $request->cook_heure, $request->rest_heure);

        $prep = $collection_time->get('prep');
        $cook =  $collection_time->get('cook');
        $rest =  $collection_time->get('rest');

        $univers = $this->first_found_universe(strip_tags(clean($request->univers)));

        //Filtering the comment
        $comm = app('profanityFilter')->filter(htmlentities(clean($request->comment)));

        //Vegetarian switch
        $vege = clean($request->vegan) == "on" ? true : false;

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


    public function load_picture($recette)
    {
        $firstimg = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->where('user_id', '=', $recette->id_user)->orderBy('updated_at', 'desc')->first();
        if ($firstimg !== null) {
            $url = url("/recipes/" . $recette->id . "/" . intval($recette->id_user) . "/" . strip_tags(clean($firstimg->image_name)));
            $retour = collect($url);
        } else {
            $images = RecipeImg::where(['recipe_id' => $recette->id, ['user_id', '!=', $recette->id_user]])->get();
            $retour = collect($images);
        }
        return $retour;
    }

    static function load_img($recette)
    {
        $controller = new RecipeController();
        return $controller->load_picture($recette);
    }

    /** TODO _ UPDATING
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    /** DISPLAYING A SELECTED RECIPE
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {

        $recette = Recipe::where('slug', $slug)->first();

        if (!$recette) {
            $alert = "";
            return abort(404);
        }
        if (Auth::guest()) {
            $alert = "";
            if ($recette->validated === 0) {
                return abort(404);
            }
        } else {
            if ($recette->id_user === Auth::user()->id) {
                if ($recette->validated === 0) {
                    $alert = "non_valid";
                } else {
                    $alert = '';
                }
            } else {
                $alert = '';
                if ($recette->validated === 0)
                    return abort(404);
            }
        }


        $ingredients = DB::table('recipes_ingredients')->where('id_recipe', '=', $recette->id)
            ->join('ingredients', 'recipes_ingredients.id_ingredient', '=', 'ingredients.id')
            ->get();

        $steps = DB::table('recipes_steps')->where('recipe_id', '=', $recette->id)->get();
        $typeuniv = DB::table('categunivers')->where('id', '=', $recette->type_univers)->first();

        $validPictures = RecipeImg::loadRecipePicturesValid($recette);

        if (!Auth::guest()) {
            $userPicturesNonValid = $this->pictureService->loaduserPicturesNonValid($recette, Auth::id());
        } else {
            $userPicturesNonValid = '';
        }

        // STARS
        $stars1 = DB::table('recipe_likes')->where('id_recipe', '=', $recette->id)->avg('note');
        if ($stars1 == NULL) {
            $stars1 = 1;
        }

        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);

        // RATING

        $countrating = DB::table('recipe_likes')
            ->where('id_recipe', '=', $recette->id)
            ->count();
        if ($countrating == NULL || $countrating == 0) {
            $countrating = 1;
        }
        $id_auteur = $recette->id_user;
        $nom = DB::table('users')->where('id', $id_auteur)->value('name');

        // TIMES ISO


        $preptimeiso = "PT" . $this->sumerise($recette->prep_time);
        $cooktimeiso = "PT" . $this->sumerise($recette->cook_time);
//            $resttimeiso = "PT".$this->sumerise($recette->rest_time);

        $totaliso = "PT" . $this->sumerise($recette->prep_time + $recette->cook_time + $recette->rest_time);

        $related = $this->morLikeThis($recette, 4);

        if ($alert === "non_valid") {
            // On charge les données dans la vue
            return view('recipes.show', array(
                'recette' => $recette,
                'ingredients' => $ingredients,
                'steps' => $steps,
                'related' => $related,
                'validPictures' => $validPictures,
                'nonValidPictures' => $userPicturesNonValid,
                'picturectrl' => $this->pictureService,
                'typeuniv' => $typeuniv,
                'stars' => $stars,
                "countrating" => $countrating,
                'stars1' => $stars1,
                'nom' => $nom,
                'preptimeiso' => $preptimeiso,
                'cooktimeiso' => $cooktimeiso,
                'totaliso' => $totaliso,
            ))->with('controller', $this)->with('status', "Votre recette n'est pas encore publiée, mais c'est pour bientôt !");
        } else {
            // On charge les données dans la vue
            return view('recipes.show', array(
                'recette' => $recette,
                'ingredients' => $ingredients,
                'steps' => $steps,
                'related' => $related,
                'picturectrl' => $this->pictureService,
                'validPictures' => $validPictures,
                'nonValidPictures' => $userPicturesNonValid,
                'typeuniv' => $typeuniv,
                'stars' => $stars,
                "countrating" => $countrating,
                'stars1' => $stars1,
                'nom' => $nom,
                'preptimeiso' => $preptimeiso,
                'cooktimeiso' => $cooktimeiso,
                'totaliso' => $totaliso,
            ))->with('controller', $this);
        }

    }


    public function random()
    {
        $rand = Recipe::where('validated', 1)->inRandomOrder()->first();
        if ($rand) {
            $sl = $rand->slug;
            return redirect()->route('recipe.show', ['recipe' => $sl]);
        } else {
            $sl = null;
            return redirect('/');
        }
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function check_liked($id)
    {
        $u_id = Auth::id();
        $l_id = DB::table('user_recipe_likes')
            ->where(
                ['user_id' => $u_id, 'recipe_id' => $id]
            )->first();
        return $l_id ? "liked" : false;
    }


    /**
     * @param $val
     * @return string
     */
    private function sumerise($val)
    {
        // si il y'a + d'1heure
        if ($val > 60) {
            $somme_h = $val / 60;
            $somme_m = $val - ((int)$somme_h * 60);
            return $somme_h . "H" . $somme_m . "M";
        } else {
            $somme_h = 0;
            $somme_m = $val - ((int)$somme_h * 60);
            return $somme_m . "M";

        }
    }

    /**
     * @param $requete
     * @param $recipe_id
     * @return string
     */
    private function slugtitre($requete, $uid)
    {
        $titreslug = str_slug(strip_tags(clean($requete->title)) . "-" . $uid, '-');
        return $titreslug;
    }

    private function generate_uid($recipe_id)
    {
        return Hashids::encode($recipe_id); // Used for encoding
    }


    /**
     * @param $rq
     * @param $userid
     * @param $recipe
     */
    private function ajouter_image($rq, $userid, $recipe)
    {
        DB::table('recipe_imgs')->updateOrInsert(
            ['recipe_id' => $recipe,
                'image_name' => strip_tags(clean($rq)),
                'user_id' => $userid,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }

    /**
     * @param $title
     * @param $vegan
     * @param $diff
     * @param $categ_plate
     * @param $cost
     * @param $prep
     * @param $cook
     * @param $rest
     * @param $unit
     * @param $value
     * @param $universe
     * @param $type
     * @param $iduser
     * @param $vege
     * @param $video_link
     * @param $comm
     * @return mixed
     */
    public function insert_recipe($title, $vegan, $diff, $categ_plate, $cost, $prep, $cook, $rest, $unit, $value, $universe, $type, $iduser, $video_link, $comm)
    {


        // Si titre vide :

        if ($title == null || $title == '') {
            return redirect()->back();
        }

        // Insert recette
        $idRecette = DB::table('recipes')->insertGetId(
            ['title' => app('profanityFilter')->filter($title),
                'vegetarien' => $vegan,
                'difficulty' => $diff,
                'type' => $categ_plate,
                'cost' => $cost,
                'prep_time' => $prep,
                'cook_time' => $cook,
                'rest_time' => $rest,
                'nb_guests' => $unit,
                'guest_type' => app('profanityFilter')->filter($value),
                'univers' => app('profanityFilter')->filter($universe),
                'type_univers' => app('profanityFilter')->filter($type),
                'id_user' => $iduser,
                'slug' => '',
                'video' => app('profanityFilter')->filter(strip_tags(clean($video_link))),
                'commentary_author' => strip_tags(clean($comm)),
                'validated' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        if ($idRecette == false) {
            return redirect()->back();
        }

        return $idRecette;
    }

    /**
     * @param $title
     * @param $vegan
     * @param $diff
     * @param $categ_plate
     * @param $cost
     * @param $prep
     * @param $cook
     * @param $rest
     * @param $unit
     * @param $value
     * @param $universe
     * @param $type
     * @param $iduser
     * @param $vege
     * @param $video_link
     * @param $comm
     * @return mixed
     */
    public function edit_recipe($recette_id, $title, $vegan, $diff, $categ_plate, $cost, $prep, $cook, $rest, $unit, $value, $universe, $type, $iduser, $video_link, $comm)
    {
        // Get recette
        $recette = DB::table('recipes')
            ->where('id', '=', $recette_id)
            ->update(
                ['title' => app('profanityFilter')->filter($title),
                    'vegetarien' => $vegan,
                    'difficulty' => $diff,
                    'type' => $categ_plate,
                    'cost' => $cost,
                    'prep_time' => $prep,
                    'cook_time' => $cook,
                    'rest_time' => $rest,
                    'nb_guests' => $unit,
                    'guest_type' => clean(app('profanityFilter')->filter($value)),
                    'univers' => app('profanityFilter')->filter($universe),
                    'type_univers' => app('profanityFilter')->filter($type),
                    'id_user' => $iduser,
                    'video' => clean(app('profanityFilter')->filter($video_link)),
                    'commentary_author' => clean($comm),
                    'created_at' => now(),
                    'validated' => 0,
                    'updated_at' => now(),
                ]
            );

        Log::info("Recette id : " . $recette_id . "maj, a revalider");

        return $recette;
    }


    /**
     * @param $text
     * @return mixed
     */
    public function first_found_universe($text)
    {
        if ($text !== "") {
            $univnew = new Univers();
            $univ = $univnew::FirstOrCreate(['name' => strip_tags(clean($text)), 'first_creator' => Auth::user()->id]);
            return $univ->id;

        } else {
            return 0;
        }
    }

    private function slugUpdate($idRecipe, $uid, $request)
    {
        // Partie SLUG
        $slug = $this->slugtitre($request, $uid);
        DB::table('recipes')
            ->where('id', $idRecipe)
            ->update(['slug' => app('profanityFilter')->filter($slug), 'hashid' => $uid]);
        return $slug;
    }

    private function rangerIngredient($index, $ingredient, $idRecette, $qtt)
    {
        if ($ingredient) {
            $id_ingredient_ajout = DB::table('ingredients')->where('name', '=', $ingredient)->get();
            // Si ingrédient inexistant, alors on ajoute à la db et on recupère l'id
            if ($id_ingredient_ajout->isEmpty()) {
                $in = app('profanityFilter')->filter($ingredient);
                if (preg_match("/^(?:.*)[\*\*](?:.*)$/", $in)) {
                    $in = '';
                }
                if ($in) {
                    $ingredientID = DB::table('ingredients')->insertGetId(
                        ['name' => $in]
                    );
                } else {
                    $ingredientID = $id_ingredient_ajout;
                }
            } else {
                $ingredientIDRetour = $id_ingredient_ajout->first();
                $ingredientID = $ingredientIDRetour->id;
            }

            // Pour chaque ingrédient, on l'associe à la recette

            DB::table('recipes_ingredients')->insertGetId(
                ['id_recipe' => $idRecette,
                    'id_ingredient' => $ingredientID,
                    'qtt' => app('profanityFilter')->filter($qtt),
                ]);

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
                    ]);
            } else {
                $recingr = DB::table('recipes_ingredients')->where('id_recipe', '=', $idRecette)->insertGetId(
                    ['id_recipe' => $idRecette,
                        'id_ingredient' => $ingredientID,
                        'qtt' => app('profanityFilter')->filter($qtt),
                    ]);
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