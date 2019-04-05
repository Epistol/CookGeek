<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PictureController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    private $pictureService;

    public function __construct()
    {
        $this->pictureService = new PictureController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $medias = DB::table('categunivers')->get();

        if ($medias !== null) {
            // On charge les données dans la vue
            return view('media.index', ['medias' => $medias])->with(['controller' => $this]);
        } else {
            abort(404);
        }
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
        $media = DB::table('categunivers')->where('name', '=', $id)->first();
        if ($media != null) {
            $recipes = DB::table('recipes')->where('type_univers', '=', $media->id)->where('validated', '=', 1)
                         ->latest()->paginate(12);
            // On charge les données dans la vue
            return view('media.show', [
                'media'   => $media, 'pictureService' => $this->pictureService,
                'recipes' => $recipes
            ])->with(['controller' => $this]);
        } else {
            abort(404);
        }
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
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
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
