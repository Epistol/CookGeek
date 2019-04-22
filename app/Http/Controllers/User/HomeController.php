<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
     * @return Response
     */
    public function index()
    {

        // If no avatar is set, return empty :  https://api.adorable.io/avatars/{{Pseudo}}
        return redirect()->route('account.param');
    }

    /**
     * @return Factory|View
     */
    public function parameters()
    {
        return view('user.user_space.switch.param');
    }

    /**
     * @return Factory|View
     */
    public function data()
    {
        return view('user.user_space.data');
    }

    // Validation forms

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function paramStore(Request $request)
    {
        $user = $request->user();
        if ($request->resume) {
            $fichier = $request->resume;
            if ($fichier->getError() == 0) {
                $photoName = time() . '.' . $fichier->getClientOriginalExtension();
                $fichier->move(public_path('user/' . Auth::id() . '/'), $photoName);
                $user->avatar = $photoName;
            }
        }

        $refus = $request->no_traitement_donnees;
        $traitement = $refus == true ? false : true;

        $user_data = [
            'name'               => $request->pseudo,
            'email'              => $request->mail,
            'password'           => $request->mdp,
            'traitement_donnees' => $traitement
        ];

        foreach ($user_data as $column => $value) {
            if ($this->isDirty($value)) {
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

    /**
     * @param $param
     *
     * @return bool
     */
    private function isDirty($param)
    {
        return empty($param) || $param == '' ? false : true;
    }

    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function favorites(Request $request)
    {
        $recettes = DB::table('recipes')
                      ->join('user_recipe_likes', 'recipes.id', '=', 'user_recipe_likes.recipe_id')
                      ->where('user_recipe_likes.user_id', '=', Auth::user()->id)
                      ->select('recipes.*')
                      ->paginate(12)
        ;

        return view(
            'user_space.favorites.index',
            [
                'recipes'        => $recettes,
                'pictureService' => $this->pictureService
            ]
        )
            ->with(['controller' => $this]);
    }

    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function recipes(Request $request)
    {
        $recettes = Recipe::where('id_user', Auth::user()->id)->paginate(12);

        return view(
            'user_space.recipes.index',
            [
                'recipes'        => $recettes,
                'pictureService' => $this->pictureService
            ]
        )->with(['controller' => $this]);
    }

    /**
     * @param $id
     *
     * @return bool|string
     */
    public function checkLiked($id)
    {
        $l_id = DB::table('user_recipe_likes')
                  ->where(
                      ['user_id' => Auth::id(), 'recipe_id' => $id]
                  )->first()
        ;

        return $l_id ? 'liked' : false;
    }
}
