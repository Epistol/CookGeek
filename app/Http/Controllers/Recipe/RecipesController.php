<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/
use App\Http\Controllers\Controller;
use App\Recipe_img;
use App\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        foreach ($universcateg as $u){
            $recettes = DB::table('recipes')->where('type_univers','=',$u->id )->orderBy('updated_at', 'desc')->first();
            $recettesrand[$u->id] = $recettes;
        }
        $recettes = collect($recettesrand);

        // On charge les données dans la vue
        return view('recipes.index', array( 'recettes' => $recettes, 'universcateg' => $universcateg) );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(){
        $types_univ = DB::table('categunivers')->get();
        $difficulty = DB::table('difficulty')->get();
        $types_plat = DB::table('type_recipes')->get();
        return view('recipes.add', array( 'types' => $types_univ, 'difficulty' => $difficulty, 'types_plat' => $types_plat ) );
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
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


        $prep = ( $prep_heure * 60 ) + $prep_minute;
        $cook = ( $cook_heure * 60 ) + $cook_minute;
        $rest = ( $rest_heure * 60 ) + $rest_minute;

        $univers = DB::table('univers')->select('id')->where('name', 'like', '%'.$request->universe.'%')->get();

        // Si aucun univers n'est associé à la recherche
        if($univers->isEmpty()) {
            // On l'ajoute à la DB
            $id_univers = DB::table( 'univers' )->insertGetId(
                [ 'name' => $request->universe ]
            );

            $univers  = $id_univers;
        }

        $univers = $univers->first();

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
                'univers' => $univers->id,
                'type_univers' => $request->type,
                'id_user' => $iduser,
                'slug' => '',
                'vegetarien' => $request->vegan,
                'commentary_author' => $request->comment,
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

        $id_ingr = array();
        $id_qtt = array();

        foreach ($request->ingredient as $key => $ingredient){
            $id_ingredient_ajout = DB::table('ingredients')->where('name','=', $ingredient)->get();
            // Si ingrédient inexistant, alors on ajoute à la db et on recupère l'id
            if($id_ingredient_ajout->isEmpty()){
                $ingredientID = DB::table( 'ingredients' )->insertGetId(
                    [ 'name' => $ingredient ]
                );
            }
            else {
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
        foreach ($request->step as $key => $step){
            DB::table('recipes_steps')->insertGetId(
                ['recipe_id' => $idRecette,
                    'step_number' => $key,
                    'instruction' => $request->step[$key],

                ]);
        }

        // Parties image


        $this->validate($request, [
            'resume' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $photoName = time().'.'.$request->resume->getClientOriginalExtension();
        $img = $this->ajouter_image($photoName, $iduser, $idRecette);
        $request->resume->move(public_path('recipes/'.$idRecette.'/'.$iduser.'/'), $photoName);

        return redirect()->route('recipe.show', ['post' => $slug]);
    }

    public function show($slug){

        $recette = Recipes::where('slug', $slug)->first();

        $ingredients =  DB::table('recipes_ingredients')
            ->where('id_recipe', '=', $recette->id)
            ->get();
        $steps =  DB::table('recipes_steps')
            ->where('recipe_id', '=', $recette->id)
            ->get();
        $typeuniv =  DB::table('categunivers')
            ->where('id', '=', $recette->type_univers)
            ->first();

        $images =  Recipe_img::where(['recipe_id' => $recette->id, ['user_id' , '!=',  $recette->id_user]])->get();

        $firstimg = DB::table('recipe_imgs')
            ->where('recipe_id', '=', $recette->id)
            ->where('user_id', '=', $recette->id_user)
            ->first();

        $stars = DB::table('recipe_likes')
            ->where('id_recipe', '=', $recette->id)
            ->avg('note');
        $stars = number_format($stars, 1, '.', '');
        $stars =  explode('.', $stars, 2);



        // On charge les données dans la vue
        return view('recipes.show', array( 'recette' => $recette, 'ingredients' => $ingredients, 'steps' => $steps, 'images' => $images, 'firstimg' => $firstimg, 'typeuniv'  => $typeuniv, 'stars' => $stars) );
    }


    private function slugtitre($requt, $idrecipe){
        $titreslug= str_slug($requt->title, '-');
        $slug = $titreslug."-".$idrecipe;
        return $slug;
    }


    private function ajouter_image($rq, $userid, $recipe){
        DB::table('recipe_imgs')->insertGetId(
            ['recipe_id' => $recipe,
                'image_name' => $rq,
                'user_id' => $userid,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }


}
