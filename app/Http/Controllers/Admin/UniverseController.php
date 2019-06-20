<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pictures;
use App\Univers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UniverseController extends Controller
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
        $univers = Univers::get();

        return view('admin.univers.index', ['univers' => $univers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        $univers = Univers::where('id', $id)->first();
        $prefill = Pictures::loadUniversPicturesValid($univers);
        dd($prefill);

        return view('admin.univers.edit', ['univers' => $univers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
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
