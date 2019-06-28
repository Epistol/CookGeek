<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{
    private $apisearch;

    /**
     * SearchController constructor.
     *
     * @param Api\SearchController $apisearch
     */
    public function __construct(Api\SearchController $apisearch)
    {
        $this->apisearch = $apisearch;
    }

    /**
     * @param $id
     *
     * @return bool|string
     */
    public function check_liked($id)
    {
        $u_id = Auth::id();
        $l_id = DB::table('user_recipe_likes')
            ->where(
                ['user_id' => $u_id, 'recipe_id' => $id]
            )->first();

        return $l_id ? 'liked' : false;
    }

    /**
     * @param Request $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $rq = $request->q;
        $result = collect($this->apisearch->search($rq));

        return view('search.result', [
            'result' => $result
        ]);
    }
}
