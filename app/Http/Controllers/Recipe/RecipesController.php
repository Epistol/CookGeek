<?php

namespace App\Http\Controllers\Recipe;

/*use App\Recipe;*/
use App\Http\Controllers\Controller;
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

    public function add(){
        $types_univ = DB::table('categunivers')->get();
        $difficulty = DB::table('difficulty')->get();
        $types_plat = DB::table('type_recipe')->get();



        return view('recipes.add', array( 'types' => $types_univ, 'difficulty' => $difficulty, 'types_plat' => $types_plat ) );
    }

    public function store(Request $request){
        $input = $request->all();

        $id_ingredients = array();

        foreach ($request->ingredient as $key => $ingredient){



            $id = DB::table('ingredients')->where('name','=', $ingredient)->get();
            dd($id->all());

            if($id->isEmpty()){

                $id_univers = DB::table( 'ingredients' )->insertGetId(
                    [ 'name' => $ingredient ]
                );
                $id = $id_univers;
            }


            $id_ingredients[] .= [ '$id' =>  '$ingredient'];


        }


        dd($id_ingredients);
        // User ID :
        $iduser = Auth::user()->id;

        // Verification des champs null

        if($request->prep_minute->isEmpty()){
            $request->prep_minute = 0;
        }
        if($request->prep_heure->isEmpty()){
            $request->prep_heure = 0;
        }
        if($request->cook_minute->isEmpty()){
            $request->cook_minute = 0;
        }
        if($request->cook_heure->isEmpty()){
            $request->cook_heure = 0;
        }
        if($request->rest_minute->isEmpty()){
            $request->rest_minute = 0;
        }
        if($request->rest_heure->isEmpty()){
            $request->rest_heure = 0;
        }
        if($request->value_part->isEmpty()){
            $request->value_part = "personnes";
        }

        $prep = ( $request->prep_heure * 60 ) + $request->prep_minute;
        $cook = ( $request->cook_heure * 60 ) + $request->cook_minute;
        $rest = ( $request->rest_heure * 60 ) + $request->rest_minute;

        $univers = DB::table('univers')->select('id')->where('name', 'like', '%'.$request->universe.'%')->get();
        // Si aucun univers n'est associé à la recherche
        if($univers == NULL || (!isset($univers))) {
            $id_univers = DB::table( 'univers' )->insertGetId(
                [ 'name' => $request->universe ]
            );
            $univers  = $id_univers;
        }


        // Insert recette
        $idRecette = DB::table('recipes')->insertGetId(
            ['title' => $request->title,
                'vegan' => $request->vegan,
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
                'vegetarien' => $request->vegan,
                'comment' => $request->comment,

            ]
        );


        // Partie SLUG

        $slug = slugtitre($request, $idRecette);


        DB::table('recipes')
            ->where('id', $idRecette)
            ->update(['slug' => $slug]);


        // Partie ingrédients

            // On associe chaque nom d'ingrédient à un ID
        $id_ingredients = array();

        foreach ($request->ingredient as $ingredient){
            $id = DB::table('ingredients')->where('name','=', $ingredient)->get();
            if(!isset($id) || $id == ''){
                $id_univers = DB::table( 'ingredients' )->insertGetId(
                    [ 'name' => $ingredient ]
                );
                $id = $id_univers;
            }
            $id_ingredients = array_add($id, $request->ingredient);
        }

        foreach($id_ingredients as $id_i){
            $idIngrRecette = DB::table('recipes_ingredients')->insertGetId(
                ['id_recipe' => $idRecette,
                'id_ingredient' => $id_i,]);

        }





        // Parties étapes



    }

    public function show($slug){
        return $slug;
    }


    private function slugtitre($requt, $idrecipe){
        $titreslug= str_slug($requt->title, '-');
        $univslug = str_slug($requt->universe, '-');
        $slug = $titreslug."-".$univslug."-".$idrecipe;

        return $slug;
    }
}
