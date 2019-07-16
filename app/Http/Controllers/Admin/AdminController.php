<?php

namespace App\Http\Controllers\Admin;

use App\Firewall;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Recipe;
use App\Univers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TCG\Voyager\Facades\Voyager;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $recipes = Recipe::where('validated', 0)->paginate(25);
        // Retrieve posts with at least one comment containing words like foo%...
        $recipePictures = Recipe::whereHas('medias', function ($query) {
            $query->where('valid', 0);
        })->get();
        // New universes created this month
        $universes = Univers::where('created_at', '>=', Carbon::now()->subMonth());

        return view('admin.index', compact('recipes', 'recipePictures', 'universes'));
    }

    public function ban()
    {
        $user_ip = Firewall::getAllIps();
        $bans = User::onlyBanned()->get();

        $blacklist = Firewall::getAllIps()->filter(function ($item) {
            return $item->whitelisted == false;
        });
        $whitelist = Firewall::getAllIps()->filter(function ($item) {
            return $item->whitelisted == true;
        });

        return view('admin.ban.index', compact('blacklist', 'whitelist', 'user_ip', 'bans'));
    }

}
