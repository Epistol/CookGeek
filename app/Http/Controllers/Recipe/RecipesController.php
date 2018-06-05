<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/
use App\Http\Controllers\Controller;
use App\Providers\UniverseProvider;
use App\RecipeImg;
use App\Recipes;
use App\Univers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\SchemaOrg\Schema;
use Carbon\Carbon;

class RecipesController extends Controller
{


    /**
     * Show the profile for the given user.
     *
     * @return Response
     */


    public function index()
    {
        $universcateg = DB::table('categunivers')->get();
        $recettesrand = array();

        // Pour chaque categ, on va charger la dernière recette postée
        foreach ($universcateg as $u) {
            $recettes = DB::table('recipes')->where('type_univers', '=', $u->id)->orderBy('updated_at', 'desc')->first();
            $recettesrand[$u->id] = $recettes;
        }
        $recettes = collect($recettesrand);

        $recipes = DB::table('recipes')->latest()->paginate(12);


        // On charge les données dans la vue
        return view('recipes.index', array('recettes' => $recettes, 'universcateg' => $universcateg, 'recipes' => $recipes))->with(['controller' => $this]);
    }


    /**
     *  Index des recettes par type de média
     * @param $type
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function indexmediatype($type)
    {

        $universcateg = DB::table('categunivers')->where("name", "=", $type)->get();

        if ($universcateg != null) {
            $recipes = DB::table('recipes')->where("type_univers", "=", $universcateg[0]->id)->latest()->paginate(12);

            // On charge les données dans la vue
            return view('types.index', array('universcateg' => $universcateg[0], 'recipes' => $recipes))->with(['controller' => $this]);

        } else {
            return back();
        }

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


    /** TODO finish
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($numero)
    {
        $recette = DB::table('recipes')->where("id", "=", $numero)->get();

        if ($recette != "" || $recette != NULL) {
            if ($recette[0]->id_user != Auth::id()) {
                return back();
            } else {
                $univers = DB::table("univers")->where("id", "=", $recette[0]->univers)->select('name')->get();
                $types_univ = DB::table('categunivers')->get();
                $difficulty = DB::table('difficulty')->get();
                $types_plat = DB::table('type_recipes')->get();
                return view('recipes.edit', array('univers' => $univers[0]->name, 'types' => $types_univ, 'difficulty' => $difficulty, 'types_plat' => $types_plat, 'recette' => $recette[0]));
            }
        } else {
            return back();
        }

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /*        $input = $request->all();
                dd($input);*/
        $recipe = new Recipes();

        // User ID :
        if (isset(Auth::user()->id)) {
            $iduser = Auth::user()->id;
        }

        // Minutes
        $prep_minute = $recipe->verify_time($request->prep_minute);
        $cook_minute = $recipe->verify_time($request->cook_minute);
        $rest_minute = $recipe->verify_time($request->rest_minute);

        // Heures
        $prep_heure = $recipe->verify_time($request->prep_heure);
        $cook_heure = $recipe->verify_time($request->cook_heure);
        $rest_heure = $recipe->verify_time($request->rest_heure);


        $prep = $recipe->return_time($prep_heure, $prep_minute);
        $cook = $recipe->return_time($cook_heure, $cook_minute);
        $rest = $recipe->return_time($rest_heure, $rest_minute);


        $univers = $this->first_found_universe($request->universe);


        //Filtering the comment
        $comm = app('profanityFilter')->filter($request->comment);
        //Vegetarian switch
        $vege = $request->vegan == "on" ? true : false;
        //Inserting the recipe
        $idRecette = $this->insert_recipe($request->title, $request->vegan, $request->difficulty, $request->categ_plat, $request->cost, $prep, $cook, $rest, $request->unite_part, $request->value_part, $univers, $request->type, $iduser, $vege, $request->video, $comm);


        // Partie SLUG
        $slug = $this->slugtitre($request, $idRecette);

        DB::table('recipes')
            ->where('id', $idRecette)
            ->update(['slug' => app('profanityFilter')->filter($slug)]);


        // Partie ingrédients
//        TODO : clean that
        foreach ($request->ingredient as $key => $ingredient) {

            $id_ingredient_ajout = DB::table('ingredients')->where('name', '=', $ingredient)->get();
            // Si ingrédient inexistant, alors on ajoute à la db et on recupère l'id
            if ($id_ingredient_ajout->isEmpty()) {
                $in = app('profanityFilter')->filter($ingredient);
                if (preg_match("/^(?:.*)[\*\*](?:.*)$/", $in)) {
                    $in = '';
                }

                $ingredientID = DB::table('ingredients')->insertGetId(
                    ['name' => $in]
                );
            } else {
                $ingredientID = $id_ingredient_ajout->first();
                $ingredientID = $ingredientID->id;
            }
            // Pour chaque ingrédient, on l'associe à la recette

            DB::table('recipes_ingredients')->insertGetId(
                ['id_recipe' => $idRecette,
                    'id_ingredient' => $ingredientID,
                    'qtt' => app('profanityFilter')->filter($request->qtt_ingredient[$key]),
                ]);


        }

        // Gestion des étapes
        foreach ($request->step as $key => $step) {
            DB::table('recipes_steps')->insertGetId(
                ['recipe_id' => $idRecette,
                    'step_number' => $key,
                    'instruction' => app('profanityFilter')->filter($request->step[$key]),

                ]);
        }


        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if (!empty($request->resume)) {
            $file = $request->resume;
            if ($file->getError() == 0) {
                $photoName = time() . '.' . $file->getClientOriginalExtension();
                $this->ajouter_image($photoName, $iduser, $idRecette);
                $file->move(public_path('recipes/' . $idRecette . '/' . $iduser . '/'), $photoName);
            }
        }


        return redirect()->route('recipe.show', ['post' => $slug]);
    }


    /*TEST
    TEST
    TEST*/

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function test()
    {
        return view('recipes.test');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_test(Request $request)
    {
        $input = $request->all();
        dd($input['resume']->getError());


        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $file = $request->resume;

        if ($input['resume']->getError() == 0) {
            $photoName = time() . '.' . $file->getClientOriginalExtension();
            $this->ajouter_image($photoName);
            $file->move(public_path('test/'), $photoName);
        }


//        return redirect()->route('recipe.show', ['post' => $slug]);
    }

    /** TODO _ UPDATING
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $input = $request->all();

        // User ID :
        $iduser = Auth::user()->id;

        // Verification des champs null


        // Minutes
        $prep_minute = (new \App\Recipes)->verify_time($request->prep_minute);
        $cook_minute = (new \App\Recipes)->verify_time($request->cook_minute);
        $rest_minute = (new \App\Recipes)->verify_time($request->rest_minute);
        // Heures
        $prep_heure = (new \App\Recipes)->verify_time($request->prep_heure);
        $cook_heure = (new \App\Recipes)->verify_time($request->cook_heure);
        $rest_heure = (new \App\Recipes)->verify_time($request->rest_heure);


        $prep = ($prep_heure * 60) + $prep_minute;
        $cook = ($cook_heure * 60) + $cook_minute;
        $rest = ($rest_heure * 60) + $rest_minute;

        $univers = DB::table('univers')->select('id')->where('name', 'like', '%' . $request->universe . '%')->get();

        // Si aucun univers n'est associé à la recherche
        if ($univers->isEmpty()) {

            $string = $request->universe;

            // On l'ajoute à la DB
            $id_univers = DB::table('univers')->insertGetId(
                ['name' => $string]
            );
            $univers = $id_univers;

        } else {
            $univers = $univers->first();
            $univers = $univers->id;
        }

        $comm = $request->comment;
        if ($request->vegan == "on") {
            $vege = true;
        } else {
            $vege = false;
        }

        $idRecette = $this->insert_recipe($request->title, $request->vegan, $request->difficulty, $request->categ_plat, $request->cost, $prep, $cook, $rest, $request->unite_part, $request->value_part, $univers, $request->type, $iduser, $vege, $request->video, $comm);


        // Partie SLUG
        $slug = $this->slugtitre($request, $idRecette);

        DB::table('recipes')
            ->where('id', $idRecette)
            ->update(['slug' => $slug]);


        // Partie ingrédients

//            $id_ingr = array();
//            $id_qtt = array();

        foreach ($request->ingredient as $key => $ingredient) {
            $id_ingredient_ajout = DB::table('ingredients')->where('name', '=', $ingredient)->get();
            // Si ingrédient inexistant, alors on ajoute à la db et on recupère l'id
            if ($id_ingredient_ajout->isEmpty()) {
                $in = $ingredient;

                $ingredientID = DB::table('ingredients')->insertGetId(
                    ['name' => $in]
                );
            } else {
                $ingredientID = $id_ingredient_ajout->first();
                $ingredientID = $ingredientID->id;
            }
            // Pour chaque ingrédient, on l'associe à la recette

            DB::table('recipes_ingredients')->insertGetId(
                ['id_recipe' => $idRecette,
                    'id_ingredient' => $ingredientID,
                    'qtt' => $request->qtt_ingredient[$key],
                ]);
        }

        // Gestion des étapes
        foreach ($request->step as $key => $step) {
            DB::table('recipes_steps')->insertGetId(
                ['recipe_id' => $idRecette,
                    'step_number' => $key,
                    'instruction' => $request->step[$key],

                ]);
        }

        // Parties image
        $this->validate($request, [
            'resume' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->resume['size'] != 0 || $request->resume['size'] != NULL) {
            $photoName = time() . '.' . $request->resume->getClientOriginalExtension();
            $this->ajouter_image($photoName, $iduser, $idRecette);
            $request->resume->move(public_path('recipes/' . $idRecette . '/' . $iduser . '/'), $photoName);
        }
        return redirect()->route('recipe.show', ['post' => $slug]);
    }

    /** DISPLAYING A SELECTED RECIPE
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {

        $recette = Recipes::where('slug', $slug)->first();

        $ingredients = DB::table('recipes_ingredients')->where('id_recipe', '=', $recette->id)->get();
        $steps = DB::table('recipes_steps')->where('recipe_id', '=', $recette->id)->get();
        $typeuniv = DB::table('categunivers')->where('id', '=', $recette->type_univers)->first();

        $images = RecipeImg::where(['recipe_id' => $recette->id, ['user_id', '!=', $recette->id_user]])->get();

        $firstimg = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->where('user_id', '=', $recette->id_user)->first();

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


        // On charge les données dans la vue
        return view('recipes.show', array(
            'recette' => $recette,
            'ingredients' => $ingredients,
            'steps' => $steps,
            'images' => $images,
            'firstimg' => $firstimg,
            'typeuniv' => $typeuniv,
            'stars' => $stars,
            "countrating" => $countrating,
            'stars1' => $stars1,
            'nom' => $nom,
            'preptimeiso' => $preptimeiso,
            'cooktimeiso' => $cooktimeiso,
            'totaliso' => $totaliso,


        ))->with(['controller' => $this]);
    }


    public function random()
    {
        $rand = DB::table('recipes')
            ->inRandomOrder()
            ->first();
        $sl = $rand->slug;

        return redirect()->route('recipe.show', ['post' => $sl]);
        // TODO
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
     * @param $requt
     * @param $idrecipe
     * @return string
     */
    private function slugtitre($requt, $idrecipe)
    {
        $titreslug = str_slug($requt->title, '-');
        return $titreslug . "-" . $idrecipe;
    }


    /**
     * @param $rq
     * @param $userid
     * @param $recipe
     */
    private function ajouter_image($rq, $userid, $recipe)
    {
        DB::table('recipe_imgs')->insertGetId(
            ['recipe_id' => $recipe,
                'image_name' => $rq,
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
    public function insert_recipe($title, $vegan, $diff, $categ_plate, $cost, $prep, $cook, $rest, $unit, $value, $universe, $type, $iduser, $vege, $video_link, $comm)
    {
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
                'vegetarien' => $vege,
                'video' => app('profanityFilter')->filter($video_link),
                'commentary_author' => $comm,
                'created_at' => now(),
                'updated_at' => now(),

            ]
        );
        return $idRecette;
    }

    /**
     * @param $text
     * @return mixed
     */
    public function first_found_universe($text)
    {
        $univ = DB::table('univers')->select('id')->where('name', 'like', '%' . $text . '%')->get();

        if ($univ->isEmpty()) {
            $string = app('profanityFilter')->filter($text);

            if (preg_match("/^(?:.*)[\*\*](?:.*)$/", $string)) {
                $string = '';
            }

            // Adding to the DB
            $id_univers = DB::table('univers')->insertGetId(
                ['name' => $string]
            );
            $univ = $id_univers;

        } else {
            $univ = $univ->first();
            $univ = $univ->id;
        }

        return $univ;
    }


}
