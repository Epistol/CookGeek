<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\UniverseProvider;
use App\RecipeImg;
use App\Recipes;
use App\Univers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\SchemaOrg\Schema;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // If no avatar is set, return empty :  https://api.adorable.io/avatars/{{Pseudo}}
        return redirect()->route("account.param");
//			return view('user_space.home');
    }

    public function parameters()
    {
        return view('user_space.switch.param');
    }


    // Validation forms

    public function param_store(Request $request)
    {

        $user = $request->user();
        $refus = $request->no_traitement_donnees;
        $traitement = $refus == true ? false : true;

        $user_data = ['name' => $request->pseudo, 'email' => $request->mail, 'password' => $request->mdp, 'traitement_donnees' => $traitement];


        foreach ($user_data as $column => $value) {
            if ($this->is_dirty($value)) {
                if ($column == 'password') {
                    $user->$column = bcrypt($value);
                } else {
                    $user->$column = $value;
                }
            }

        }
        $user->save();
        $request->session()->flash('status', 'Profil mis à jour ! ');

        return redirect()->back();

    }


    private function is_dirty($param)
    {
        return empty($param) || $param == '' ? false : true;
    }

    public function favorites(Request $request){
	    $user_id = Auth::user()->id;

	    $recettes = DB::table('recipes')
		    ->join('recipe_likes', 'recipes.id', '=', 'recipe_likes.id_recipe')
		    ->where('recipe_likes.id_user', '=', $user_id)
		    ->select('recipes.*')
		    ->paginate(12);


	    return view('user_space.favorites.index', array( 'recipes' => $recettes))->with(['controller' => $this]);
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



}
