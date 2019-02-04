<?php

namespace App\Http\Controllers;

use App\Page;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use Vinkla\Hashids\Facades\Hashids;

class PageController extends Controller
{

    private $pictureService;

    public function __construct()
    {
        $this->pictureService = new PictureController();
    }

	/**
	 * Liste des pages
	 *
	 * @return \Illuminate\Http\Response
	 */

	/**
	 * Création d'une nouvelle page
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return Auth::check() ? view('admin.page.create') : back();
	}


	public function index()
	{
		$pages = Page::all();
		Carbon::setLocale('fr');
		$location = geoip()->getLocation($ip = null);
		return view('admin.page.index', ['pages' => $pages, 'lieu' => $location->iso_code]);

	}

	/*	public function cookie()
		{
			return view("admin.page.cookie");
		}*/


	private function slugtitre($titre, $idrecipe)
	{
		$titreslug = str_slug(strip_tags(clean($titre)), '-');
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
		$slug = $this->slugtitre(strip_tags(clean($request->name)), $idRecette);

		DB::table('pages')
			->where('id', $idRecette)
			->update(['slug' => $slug]);

		return redirect()->route('page.index');
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

	public function show_cgu()
	{
		$page = Page::where('slug', 'like', '%cgu%')->first();
        return view('admin.page.show', ['page' => $page]);
	}

    public function show_shop()
    {
        return view('shop');
    }

	public function show_confidentiality()
	{
		$page = Page::where('id', '3')->first();
		return view('admin.page.show', ['page' => $page]);
	}


	public function show_contact()
	{
		return view('admin.page.contact');
	}

	public function store_contact(Request $request)
	{
		$captcha = $request->request->get('g-recaptcha-response');
		if($captcha !== null) {
			Mail::send(new ContactEmail($request));
			return redirect('/contact')->with('status', 'Message envoyé !');
		} else {
			return redirect()->back()->with('alert', 'Validez le recaptcha');
		}
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

		$page->name = strip_tags(clean($request->name));
		$page->content = $request->contenu;
		$page->slug = $this->slugtitre($request->name, $page->id);

		$page->save();

		return redirect(route('page.index'))->with('status', 'Page updated!');
	}

	/**s
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Page $page
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Page $page)
	{
		\App\Page::destroy($page->id);
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

	public function accueil()
	{
		$universcateg = DB::table('categunivers')->get();
        $pic = $this->pictureService;

// Petit texte sur l'accueil
		$heartbeat = DB::table("heartbeat")->latest()->first();
// Recettes
		$recipes = DB::table('recipes')->where('validated', '=', 1)->latest()->paginate(12);
		$univers_list = DB::table('univers')->where('name', 'NOT LIKE', "%script%")
			->join('recipes', 'univers.id', '=', 'recipes.univers')
			->where('recipes.validated', '=', 1)
			->inRandomOrder()
			->paginate('12');

// On charge les données dans la vue
		return view('welcome', array('univers' => $univers_list, 'universcateg' => $universcateg, 'recipes' => $recipes, 'heartbeat' => $heartbeat, 'picturectrl' => $pic))->with(['controller' => $this]);
	}


	public function sum_time($val)
	{
		$format = '%1$02d';
		// si il y'a + d'1heure
		if($val > 60) {
			$somme_h = $val / 60;
			$somme_m = $val - ((int)$somme_h * 60);
			// si le nb de minute est supérieur a 0, on les affiches
			if($somme_m > 0) {
				return sprintf($format, $somme_h) . " h " . sprintf($format, $somme_m) . " min";
			} else {
				return sprintf($format, $somme_h) . " h ";
			}

		} else {
			$somme_h = 0;
			$somme_m = $val - ((int)$somme_h * 60);
			// si le nb de minute est supérieur a 0, on affiche qqch
			if($somme_m > 0) {
				return sprintf($format, $somme_m) . " min";
			} else {
				return '';
			}

		}
	}

	public function sum_time_home($val)
	{
		$format = '%1$02d';
		// si il y'a + d'1heure
		if($val > 60) {
			$somme_h = $val / 60;
			$somme_m = $val - ((int)$somme_h * 60);
			// si le nb de minute est supérieur a 0, on les affiches
			if($somme_m > 0) {
				return sprintf($format, $somme_h) . " h " . sprintf($format, $somme_m);
			} else {
				return sprintf($format, $somme_h) . " h ";
			}

		} else {
			$somme_h = 0;
			$somme_m = $val - ((int)$somme_h * 60);
			// si le nb de minute est supérieur a 0, on affiche qqch
			if($somme_m > 0) {
				return sprintf($format, $somme_m) . " min";
			} else {
				return '';
			}

		}
	}


}
