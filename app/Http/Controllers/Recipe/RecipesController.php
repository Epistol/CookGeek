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


    public function store(Request $request){
        $input = $request->all();

        // User ID :
        $iduser = Auth::user()->id;

        // Verification des champs null
        // TODO : à finir

        // Minutes
        $prep_minute = $this->verify_time($request->prep_minute);
        $cook_minute = $this->verify_time($request->cook_minute);
        $rest_minute = $this->verify_time($request->rest_minute);
        // Heures
        $prep_heure = $this->verify_time($request->prep_heure);
        $cook_heure = $this->verify_time($request->cook_heure);
        $rest_heure = $this->verify_time($request->rest_heure);



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

            ]
        );

        // Partie SLUG
        $slug = $this->slugtitre($request, $idRecette);


        dd($slug);
        DB::table('recipes')
            ->where('id', $idRecette)
            ->update(['slug' => $slug]);


        // Partie ingrédients

        // TODO finir le traitement
        $id_ingr = array();

        foreach ($request->ingredient as $key => $ingredient){
            $id = DB::table('ingredients')->where('name','=', $ingredient)->get();
            // Si ingrédient inexistant, alors on ajoute à la db et on recupère l'id
            if($id->isEmpty()){

                $id_ingredient_ajout = DB::table( 'ingredients' )->insertGetId(
                    [ 'name' => $ingredient ]
                );
                $id_ingr = $id_ingredient_ajout;
            }
            dd($id);

            $id_ingr[] = [ '$key' =>  '$ingredient'];
        }

        dd($id_ingr);




        foreach($id_ingr as $id_i){
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
        $slug = $titreslug."-".$idrecipe;
        return $slug;
    }

    private function verify_time($time){
        if (empty($time) || !isset($time) || $time == NULL ) {
            return  0;
        }

        else {
            return $time;
        }
    }



}
