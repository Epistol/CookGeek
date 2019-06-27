<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pictures;
use App\Univers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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
        $univers = Univers::all();
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

        return view('admin.univers.edit', ['univers' => $univers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // Do not allow any shady characters
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.universe.edit', $id))
                ->withInput()
                ->withErrors($validator);
        }

        $universe = Univers::find($id);
        if ($request->name) {
            if ($request->name !== $universe->name) {
                if (cleanInput($request->name) !== '') {
                    $universe->update(['name' => cleanInput($request->name)]);
                }
            }
        }
        if ($request->contenu) {
            if (cleanInput($request->contenu) !== '') {
                $universe->update(['contenu' => cleanInput($request->contenu)]);
            }
        }
        return redirect(route('admin.universe.edit', $id))->with('status', 'Univers mis à jour');

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
