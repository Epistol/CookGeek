<?php

namespace App\Http\Controllers;

use App\Categunivers;
use App\Mail\ContactEmail;
use App\Page;
use App\Recipe;
use App\Univers;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * @var PictureController
     */
    private $pictureService;

    /**
     * PageController constructor.
     *
     */
    public function __construct()
    {
        $this->pictureService = new PictureController();
    }

    /**
     * Création d'une nouvelle page.
     *
     * @return Response
     */
    public function create()
    {
        return Auth::check() ? view('page.create') : back();
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $pages = Page::all();
        Carbon::setLocale('fr');
        $location = geoip()->getLocation($ip = null);

        return view('page.index', ['pages' => $pages, 'lieu' => $location->iso_code]);
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
        $idRecette = DB::table('pages')->insertGetId(
            [
                'name'       => $request->name,
                'content'    => $request->contenu,
                'author_id'  => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // Partie SLUG
        $slug = $this->slugtitre(strip_tags($request->name), $idRecette);

        Page::where('id', $idRecette)
          ->update(['slug' => $slug]);

        return redirect()->route('page.index');
    }

    /**
     * @param $titre
     * @param $idrecipe
     *
     * @return string
     */
    private function slugtitre($titre, $idrecipe)
    {
        $titreslug = str_slug(strip_tags($titre), '-');

        return $titreslug . '-' . $idrecipe;
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     *
     * @return Response
     */
    public function show(Page $page)
    {
        return view('page.show', ['page' => $page]);
    }

    /**
     * @return Factory|View
     */
    public function show_cgu()
    {
        $page = Page::where('slug', 'like', '%cgu%')->first();

        return view('page.show', ['page' => $page]);
    }

    /**
     * @return Factory|View
     */
    public function show_shop()
    {
        return view('shop');
    }

    /**
     * @return Factory|View
     */
    public function show_confidentiality()
    {
        $page = Page::where('id', '3')->first();

        return view('page.show', ['page' => $page]);
    }

    /**
     * @return Factory|View
     */
    public function show_contact()
    {
        return view('page.contact');
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store_contact(Request $request)
    {
        $captcha = $request->request->get('g-recaptcha-response');
        if ($captcha !== null) {
            Mail::send(new ContactEmail($request));
            return redirect('/contact')->with('status', 'Message envoyé !');
        } else {
            return redirect()->back()->with('errors', 'Validez le recaptcha');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     *
     * @return Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page    $page
     *
     * @return Response
     */
    public function update(Request $request, Page $page)
    {
        $page->name    = strip_tags($request->name);
        $page->content = $request->contenu;
        $page->slug    = $this->slugtitre($request->name, $page->id);

        $page->save();

        return redirect(route('page.index'))->with('status', 'Page updated!');
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param Page $page
     *
     * @return Response
     */
    public function destroy(Page $page)
    {
        Page::destroy($page->id);

        return redirect('/admin/page')->with('status', 'Page supprimée !');
    }

    /*public function store_gf(Request $request)
    {

        if($request->contenu == "") {
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
    }*/

    /**
     * @return Factory|View
     */
    public function accueil()
    {
        $universcateg = Categunivers::get();
        $pic          = $this->pictureService;

        // Petit texte sur l'accueil
        $heartbeat = DB::table('heartbeat')->latest()->first();
        // Recettes
        $recipes      = Recipe::where('validated', 1)->latest()->paginate(12);

        $univers_list = Univers::where('name', 'NOT LIKE', '%script%')
                          ->join('recipes', 'univers.id', '=', 'recipes.univers')
                          ->where('recipes.validated', 1)
                          ->inRandomOrder()
                          ->paginate('12');

        // On charge les données dans la vue
        return view('welcome', [
            'univers'   => $univers_list, 'universcateg' => $universcateg, 'recipes' => $recipes,
            'heartbeat' => $heartbeat, 'picturectrl' => $pic
        ])->with(['controller' => $this]);
    }

    /**
     * @param $val
     *
     * @return string
     */
    public function sum_time($val)
    {
        $format = '%1$02d';
        // si il y'a + d'1heure
        if ($val > 60) {
            $somme_h = $val / 60;
            $somme_m = $val - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on les affiches
            if ($somme_m > 0) {
                return sprintf($format, $somme_h) . ' h ' . sprintf($format, $somme_m) . ' min';
            } else {
                return sprintf($format, $somme_h) . ' h ';
            }
        } else {
            $somme_h = 0;
            $somme_m = $val - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on affiche qqch
            if ($somme_m > 0) {
                return sprintf($format, $somme_m) . ' min';
            } else {
                return '';
            }
        }
    }

    /**
     * @param $val
     *
     * @return string
     */
    public function sum_time_home($val)
    {
        $format = '%1$02d';
        // si il y'a + d'1heure
        if ($val > 60) {
            $somme_h = $val / 60;
            $somme_m = $val - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on les affiches
            if ($somme_m > 0) {
                return sprintf($format, $somme_h) . ' h ' . sprintf($format, $somme_m);
            } else {
                return sprintf($format, $somme_h) . ' h ';
            }
        } else {
            $somme_h = 0;
            $somme_m = $val - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on affiche qqch
            if ($somme_m > 0) {
                return sprintf($format, $somme_m) . ' min';
            } else {
                return '';
            }
        }
    }
}
