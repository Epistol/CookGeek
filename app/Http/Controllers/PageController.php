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

class PageController extends Controller
{
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
		$page = Page::where('slug', 'cgu-2')->first();
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
}
