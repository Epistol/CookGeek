<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api;

class SearchController extends Controller
{
    private $apisearch;

    public function __construct(Api\SearchController $apisearch)
    {
        $this->apisearch = $apisearch;
    }
    public function postSearch(Request $request)
    {
        $rq = $request->q;
        $result = $this->apisearch->search($rq);
        return view('search.result',$result);
    }

}
