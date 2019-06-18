<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Traits\HasMediaCDG;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IngredientController extends Controller
{
    use HasMediaCDG;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();

        return response()->json($ingredients);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // no need for now
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $ingredient       = new Ingredient();
        $ingredient->name = cleanInput($request->name);
        $ingredient->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
