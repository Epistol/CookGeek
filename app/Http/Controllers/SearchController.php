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
    private $pictureService;

    /**
     * SearchController constructor.
     * @param Api\SearchController $apisearch
     */
    public function __construct(Api\SearchController $apisearch)
	{
		$this->apisearch = $apisearch;
        $this->pictureService = new PictureController();
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
	{
		$rq = $request->q;
		$result = collect($this->apisearch->search($rq));
		return view('search.result', array('result' => $result, 'pictureService' => $this->pictureService))->with(['controller' => $this]);

	}
}


