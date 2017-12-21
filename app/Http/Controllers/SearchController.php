<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Search;

class SearchController extends Controller
{
    private $apisearch;

    public function __construct(Api\SearchController $apisearch)
    {
        $this->apisearch = $apisearch;
    }
    public function postSearch(Request $request)
    {

        $rq = $request->q;

        $result = $this->apisearch->search($rq);
        // Anime, cartes, comics, etc
        $types_univ = DB::table('categunivers')->get();
        $difficulty = DB::table('difficulty')->get();
        // Entree plats desserts
        $types_plat = DB::table('type_recipes')->get();

        $search_type =  array('recipe', 'ingredient', 'categunivers', 'type_recipes', 'univers' );
        $valeurs = ["value" => $rq];

        foreach ($search_type as $key => $item) {
            if (array_key_exists($item, $result)) {
                $retour[$key] = $result[$item];
                if (array_key_exists('recipe', $result)) {
                    foreach ($result['recipe'] as $key => $recip){
                        $images_first[$recip->id] =  DB::table('recipe_imgs')
                            ->where('recipe_id', '=', $recip->id)
                            ->where('user_id', '=', $recip->id_user)
                            ->first();
                    }

                    dd($images_first);
//                    $valeurs[""] = $firstimg->first()->image_name;
                }
            }
            else {
                $retour[$key] = null;
            }
        }


        foreach ($search_type as $key => $s){
            $valeurs[$s] = $retour[$key];
        }




//            dd($result['recipe']);
        /* foreach ($result['recipe']->items as $recip){
             $first_img = DB::table('recipe_imgs')
                 ->where('recipe_id', '=', $recip->id)
                 ->where('user_id', '=', $recip->id_user)
                 ->first();
         }


     }*/

        return view('search.result',$valeurs);

    }
}


