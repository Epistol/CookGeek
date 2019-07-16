<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
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
        return redirect()->route('user.index');
    }

    /**
     * @return Factory|View
     */
    public function show($id)
    {
        Carbon::setLocale('fr');
        $user = User::select('id', 'name', 'img', 'created_at', 'updated_at')
            ->where('name', $id)->first();
        $recipes = Recipe::where('id_user', $user->id)->paginate(5);

        return view('user.show')->with('user', $user)->with('recettes', $recipes)->with(['controller' => $this]);
    }

    public function sumerise_t($val)
    {
        $format = '%1$02d';
        // si il y'a + d'1heure
        if ($val > 60) {
            $somme_h = $val / 60;
            $somme_m = $val - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on les affiches
            if ($somme_m > 0) {
                return sprintf($format, $somme_h) . ' h ' . sprintf($format, $somme_m) . ' min';
            } else {
                return sprintf($format, $somme_h) . ' h ';
            }
        } else {
            $somme_h = 0;
            $somme_m = $val - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on affiche qqch
            if ($somme_m > 0) {
                return sprintf($format, $somme_m) . ' min';
            } else {
                return '';
            }
        }
    }
}
