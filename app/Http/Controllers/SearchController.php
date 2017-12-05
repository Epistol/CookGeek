<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;

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
	    $types_univ = DB::table('categunivers')->get();
	    $difficulty = DB::table('difficulty')->get();
	    $types_plat = DB::table('type_recipes')->get();

        return view('search.result', ['result' =>  $result, 'value' =>  $rq, 'types' => $types_univ, 'difficulty' => $difficulty,'types_plat' => $types_plat] );
    }

}
