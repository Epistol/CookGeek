<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/
use App\Http\Controllers\Controller;
use App\Recipe_img;
use App\RecipeImg;
use App\Recipes;
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

            $string = app('profanityFilter')->filter($request->universe);

            if (preg_match("/^(?:.*)[\*\*](?:.*)$/", $string)) {
                $string = '';
            }

            // On l'ajoute à la DB
            $id_univers = DB::table('univers')->insertGetId(
                ['name' => $string]
            );
            $univers = $id_univers;

        } else {
            $univers = $univers->first();
            $univers = $univers->id;
        }

        $comm = app('profanityFilter')->filter($request->comment);
        if ($request->vegan == "on") {
            $vege = true;
        } else {
            $vege = false;
        }

        // Insert recette
        $idRecette = DB::table('recipes')->insertGetId(
            ['title' => app('profanityFilter')->filter($request->title),
                'vegetarien' => $request->vegan,
                'difficulty' => $request->difficulty,
                'type' => $request->categ_plat,
                'cost' => $request->cost,
                'prep_time' => $prep,
                'cook_time' => $cook,
                'rest_time' => $rest,
                'nb_guests' => $request->unite_part,
                'guest_type' => app('profanityFilter')->filter($request->value_part),
                'univers' => app('profanityFilter')->filter($univers),
                'type_univers' => app('profanityFilter')->filter($request->type),
                'id_user' => $iduser,
                'slug' => '',
                'vegetarien' => $vege,
                'video' => app('profanityFilter')->filter($request->video),
                'commentary_author' => $comm,
                'created_at' => now(),
                'updated_at' => now(),

            ]
        );

        // Partie SLUG
        $slug = $this->slugtitre($request, $idRecette);

        DB::table('recipes')
            ->where('id', $idRecette)
            ->update(['slug' => app('profanityFilter')->filter($slug)]);


        // Partie ingrédients

//        $id_ingr = array();
//        $id_qtt = array();

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
//        dd($request->resume);
        if ($request->resume['error'] == 0) {

            $photoName = time() . '.' . $request->resume->getClientOriginalExtension();
            $this->ajouter_image($photoName, $iduser, $idRecette);
            $request->resume->move(public_path('recipes/' . $idRecette . '/' . $iduser . '/'), $photoName);
        }
        return redirect()->route('recipe.show', ['post' => $slug]);
    }


    /** TODO
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

        // Insert recette
        $idRecette = DB::table('recipes')->insertGetId(
            ['title' => $request->title,
                'vegetarien' => $request->vegan,
                'difficulty' => $request->difficulty,
                'type' => $request->categ_plat,
                'cost' => $request->cost,
                'prep_time' => $prep,
                'cook_time' => $cook,
                'rest_time' => $rest,
                'nb_guests' => $request->unite_part,
                'guest_type' => $request->value_part,
                'univers' => $univers,
                'type_univers' => $request->type,
                'id_user' => $iduser,
                'slug' => '',
                'vegetarien' => $vege,
                'video' => $request->video,
                'commentary_author' => $comm,
                'created_at' => now(),
                'updated_at' => now(),

            ]
        );

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

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {

        $recette = Recipes::where('slug', $slug)->first();

        $ingredients = DB::table('recipes_ingredients')
            ->where('id_recipe', '=', $recette->id)
            ->get();
        $steps = DB::table('recipes_steps')
            ->where('recipe_id', '=', $recette->id)
            ->get();
        $typeuniv = DB::table('categunivers')
            ->where('id', '=', $recette->type_univers)
            ->first();

        $images = RecipeImg::where(['recipe_id' => $recette->id, ['user_id', '!=', $recette->id_user]])->get();

        $firstimg = DB::table('recipe_imgs')
            ->where('recipe_id', '=', $recette->id)
            ->where('user_id', '=', $recette->id_user)
            ->first();

        $stars1 = DB::table('recipe_likes')
            ->where('id_recipe', '=', $recette->id)
            ->avg('note');
        if ($stars1 == NULL) {
            $stars1 = 1;
        }
        $stars = number_format($stars1, 1, '.', '');
        $stars = explode('.', $stars, 2);
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

    public function check_liked($id)
    {
        $u_id = Auth::id();
        $l_id = DB::table('user_recipe_likes')
            ->where(
                ['user_id' => $u_id, 'recipe_id' => $id]
            )->first();
        if ($l_id) {
            return "liked";
        } else {
            return false;
        }

    }


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

    private function slugtitre($requt, $idrecipe)
    {
        $titreslug = str_slug($requt->title, '-');
        return $titreslug . "-" . $idrecipe;
    }


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


}
