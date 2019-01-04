<?php

namespace App\Http\Controllers\Recipe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $medias = DB::table('categunivers')->get();

	    if($medias !== null) {
		    // On charge les données dans la vue
		    return view('media.index', array('medias' => $medias ))->with(['controller' => $this]);
	    } else {
		    abort(404);
	    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $medias = DB::table('categunivers')->where("name", "=", $id)->first();
	    if($medias != null) {
		    $recipes =  DB::table('recipes')->where("type_univers", "=", $medias->id)->latest()->paginate(12);
		    // On charge les données dans la vue
		    return view('media.show', array('medias' => $medias, 'recipes' => $recipes))->with(['controller' => $this]);
	    } else {
		    abort(404);
	    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
