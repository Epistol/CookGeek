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
use Illuminate\Support\Facades\Hash;
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
        return view('user.user_space.index');
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
    public function password()
    {
        return view('user.user_space.password');
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
        $errors = collect([]);
        $user = $request->user();
        // Let's check if a password is set :
        if (!Hash::check($request->mdp_now, Auth::user()->getAuthPassword())) {
            return redirect()->back()->with('errors', __('errors.account.no_password'));
        }

        // Let's check if a new password is set :
        if ($request->mdp_now && $request->new_mdp_check) {
            if (Hash::check($request->new_mdp, $request->new_mdp_check)) {
                $user->update(['password' => Hash::make($request->new_mdp_check)]);
            }
        }
        // Change pseudo
        if ($request->pseudo) {
            if (Auth::user()->pseudo !== $request->pseudo) {
                if (User::where('pseudo', $request->pseudo)->count() > 0) {
                    $errors->push(['pseudo' => __('errors.account.pseudo')]);
                } else {
                    $user->update(['pseudo' => cleanInput($request->pseudo)]);
                }
            }
        }

        // Change email
        if ($request->email) {
            if (Auth::user()->email !== $request->email) {
                if (User::where('email', $request->email)->count > 0) {
                    $errors->push(['email' => __('errors.account.email_taken')]);
                } else {
                    $user->update(['email' => cleanInput($request->email)]);
                }
            }
        }

        // Change user picture
        if ($request->resume) {
            Auth::user()->insertPicture($request);
        }

        // RGPD
        if ($request->no_traitement_donnees) {
            $refus = $request->no_traitement_donnees;
            $traitement = $refus == true ? false : true;
            $user->update(['traitement_donnees' => $traitement]);
        }

        if ($errors->count() > 0) {
            $request->session()->flash('alert', $errors);
        }

        return redirect(route('account.param'));
    }

    /**
     * @param $param
     *
     * @return bool
     */
    private function isDirty($param)
    {
        return isset($param) || $param == '' ? false : true;
    }

    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function favorites(Request $request)
    {
        // load only the recipes that the user liked
        $recipes = Recipe::whereHas('likes', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->paginate(25);

        return view('user.user_space.favorites.index', compact('recipes'));
    }

    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function recipes(Request $request)
    {
        $recipes = Auth::user()->recipes()->paginate(12);
        return view('user.user_space.recipes.index', compact('recipes'));
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
            )->first();

        return $l_id ? 'liked' : false;
    }
}
