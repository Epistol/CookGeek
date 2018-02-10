<?php

namespace App\Http\Controllers;

use App\UserRecipeLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Search;

class SearchController extends Controller
{
    private $apisearch;

    public function __construct(Api\SearchController $apisearch)
    {
        $this->apisearch = $apisearch;
    }

    public function check_liked($id){
        $u_id = Auth::id();
        $l_id =  DB::table('user_recipe_likes')
            ->where(
                ['user_id' => $u_id, 'recipe_id' => $id]
            )->first();
        if($l_id){
            return "liked";
        }
        else {
            return false;
        }

    }
    public function index(Request $request)
    {

        $rq = $request->q;

        $result = $this->apisearch->search($rq);
/*        // Anime, cartes, comics, etc
        $types_univ = DB::table('categunivers')->get();
        $difficulty = DB::table('difficulty')->get();
        // Entree plats desserts
        $types_plat = DB::table('type_recipes')->get();*/

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



                    $valeurs["images"] = $images_first;
                }
            }
            else {
                $retour[$key] = null;
            }
        }


        foreach ($search_type as $key => $s){
            $valeurs[$s] = $retour[$key];
        }


        return view('search.result',$valeurs)->with(['controller'=>$this]);

    }
}


