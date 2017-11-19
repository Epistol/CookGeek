<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/
use App\Http\Controllers\Controller;
use App\Recette;
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
        return 'CDG'; /*view('user.profile', ['user' => User::findOrFail($id)]);*/
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(){
        $types_univ = DB::table('categunivers')->get();
        $difficulty = DB::table('difficulty')->get();
        $types_plat = DB::table('type_recipe')->get();
        return view('recipes.add', array( 'types' => $types_univ, 'difficulty' => $difficulty, 'types_plat' => $types_plat ) );
    }


    /**
     * @param Request $request
     */
    public function store(Request $request){
        $input = $request->all();

        // User ID :
        $iduser = Auth::user()->id;

        // Verification des champs null


        // Minutes
        $prep_minute = (new \App\Recette)->verify_time($request->prep_minute);
        $cook_minute = (new \App\Recette)->verify_time($request->cook_minute);
        $rest_minute = (new \App\Recette)->verify_time($request->rest_minute);
        // Heures
        $prep_heure = (new \App\Recette)->verify_time($request->prep_heure);
        $cook_heure = (new \App\Recette)->verify_time($request->cook_heure);
        $rest_heure = (new \App\Recette)->verify_time($request->rest_heure);


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

        return redirect()->route('recipe.show', ['post' => $idRecette]);
    }

    public function show($slug){
        return $slug;
    }


    private function slugtitre($requt, $idrecipe){
        $titreslug= str_slug($requt->title, '-');
        $slug = $titreslug."-".$idrecipe;
        return $slug;
    }


    private function ajouter_image($rq, $userid, $recipe){
        DB::table('recipe_img')->insertGetId(
            ['recipe_id' => $recipe,
                'image_name' => $rq,
                'user_id' => $userid,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }


}
