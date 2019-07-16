<?php

namespace App\Http\Controllers;

use App\Categunivers;
use App\Univers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/**
 * Class UniversController
 * @package App\Http\Controllers
 */
class UniversController extends Controller
{
    /**
     * @var PictureController
     */
    private $pictureService;

    /**
     * UniversController constructor.
     */
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
        // on va charger les univers les plus vus de chaque types

        // 1) Charger les types (anime, manga, etc)
        $categunivers = Categunivers::all();

        if ($categunivers != null) {
            // On charge les données dans la vue
            return view('univers.index', ['cateunivers' => $categunivers]);
        } else {
            return back();
        }
    }

    /**
     * @param $categ
     * @return \Illuminate\Support\Collection
     */
    public function get_all_universes_in_categ($categ)
    {
        // trouver les univers ayant des recettes de la catégorie (anime, manga, etc)
        return DB::table('recipes')->select('univers')->where('type_univers', '=', $categ)
                      ->where('validated', '=', 1)->distinct()->orderByDesc('nb_views')->get();
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
    public function show($name)
    {
        // on va charger les univers les plus vus de chaque types
        // 1) Charger les types (anime, manga, etc)
        $univers = Univers::where('name', strip_tags(clean($name)))->firstOrFail();

        $categunivers = Categunivers::all();

        if ($univers != null) {
            // On charge les données dans la vue
            return view('univers.show', [
                'univers'    => $univers, 'pictureService' => $this->pictureService,
                'categories' => $categunivers
            ]);
        } else {
            return back();
        }
    }
}
