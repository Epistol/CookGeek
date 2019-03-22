<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PictureController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $pictureService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->pictureService = new PictureController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // If no avatar is set, return empty :  https://api.adorable.io/avatars/{{Pseudo}}
        return redirect()->route('account.param');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function parameters()
    {
        return view('user.user_space.switch.param');
    }

    // Validation forms

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
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
            'name' => $request->pseudo,
            'email' => $request->mail,
            'password' => $request->mdp,
            'traitement_donnees' => $traitement];

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function favorites(Request $request)
    {
        $user_id = Auth::user()->id;

        $recettes = DB::table('recipes')
            ->join('user_recipe_likes', 'recipes.id', '=', 'user_recipe_likes.recipe_id')
            ->where('user_recipe_likes.user_id', '=', $user_id)
            ->select('recipes.*')
            ->paginate(12);

        return view(
            'user_space.favorites.index',
            [
                'recipes' => $recettes,
                'pictureService' => $this->pictureService
            ]
        )
            ->with(['controller' => $this]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recipes(Request $request)
    {
        $user_id = Auth::user()->id;

        $recettes = DB::table('recipes')
            ->where('id_user', '=', $user_id)->paginate(12);

        return view(
            'user_space.recipes.index',
            ['recipes' => $recettes,
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
        $u_id = Auth::id();
        $l_id = DB::table('user_recipe_likes')
            ->where(
                ['user_id' => $u_id, 'recipe_id' => $id]
            )->first();

        return $l_id ? 'liked' : false;
    }
}
