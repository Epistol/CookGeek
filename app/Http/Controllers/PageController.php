<?php

namespace App\Http\Controllers;

use App\Page;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Liste des pages
     *
     * @return \Illuminate\Http\Response
     */

    public function accueil()
    {
        $universcateg = DB::table('categunivers')->get();
        $recettesrand = array();

        // Pour chaque categ, on va charger la dernière recette postée
        foreach ($universcateg as $u) {
            $recettes = DB::table('recipes')->where('type_univers', '=', $u->id)->orderBy('updated_at', 'desc')->first();
            $recettesrand[$u->id] = $recettes;
        }
        $recettes = collect($recettesrand);
        // Petit texte sur l'accueil
        $heartbeat = DB::table("heartbeat")->latest()->first();
        // Recettes
        $recipes = DB::table('recipes')->latest()->paginate(12);


        // On charge les données dans la vue
        return view('welcome', array('recettes' => $recettes, 'universcateg' => $universcateg, 'recipes' => $recipes, 'heartbeat' => $heartbeat))->with(['controller' => $this]);
    }

    public function index()
    {

        $pages = Page::all();
        Carbon::setLocale('fr');
        $location = geoip()->getLocation($ip = null);
        return view('admin.page.index', ['pages' => $pages, 'lieu' => $location->iso_code]);

    }

    public function cookie(){
        return view("admin.page.cookie");
    }

    /**
     * Création d'une nouvelle page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Auth::check() ? view('admin.page.create') : back();


    }

    private function slugtitre($titre, $idrecipe)
    {
        $titreslug = str_slug($titre, '-');
        return $titreslug . "-" . $idrecipe;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idRecette = DB::table('pages')->insertGetId(
            ['name' => $request->name,
                'content' => $request->contenu,
                'author_id' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),

            ]
        );

        // Partie SLUG
        $slug = $this->slugtitre($request->name, $idRecette);

        DB::table('pages')
            ->where('id', $idRecette)
            ->update(['slug' => $slug]);


        return redirect()->route('page.show', $idRecette);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.page.show', ['page' => $page]);
    }


    public function show_contact()
    {
        $page = Page::where('name', 'Contact')->first();
        return view('admin.page.show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {


        $page->name = $request->name;
        $page->content = $request->contenu;
        $page->slug = $this->slugtitre($request->name, $page->id);

        $page->save();

        return redirect(route('page.index'))->with('status', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page2 = Page::findOrFail($page);
        $page2->delete();
        return redirect('admin/page')->with('status', 'Page supprimée !');
    }

    public function store_gf(Request $request)
    {

        if ($request->contenu == "") {
            $request->contenu = "GF18";
        }
        $idRecette = DB::table('form18')->insertGetId(
            ['email' => $request->email,
                'contenu' => $request->contenu,
                'created_at' => now(),
                'updated_at' => now(),

            ]
        );

        return redirect()->route('index')->with('status', "Bien enregistré, merci ! <3 ");


    }
}
