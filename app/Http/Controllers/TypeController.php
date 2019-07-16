<?php

namespace App\Http\Controllers;

use App\TypeRecipe;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $all_types = DB::table('type_recipes')->get();

        return view('types.superindex', ['types' => $all_types]);
    }

    public function alltypes()
    {
        return DB::table('type_recipes')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return view('types.show', ['type' => TypeRecipe::where('name', $id)->first()]);
    }
}
