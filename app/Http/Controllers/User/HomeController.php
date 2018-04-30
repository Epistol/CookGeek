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
    public function index()
    {
        // If no avatar is set, return empty :  https://api.adorable.io/avatars/{{Pseudo}}
        return view('user_space.home');
    }

    public function data()
    {
        return view('user_space.switch.data');
    }

    public function parameters()
    {
        return view('user_space.switch.param');
    }

    public function info()
    {
        return view('user_space.switch.info');
    }


}
