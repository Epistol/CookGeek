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
	public function index()
	{

		$pages= Page::all();
		Carbon::setLocale('fr');
		$location = geoip()->getLocation($ip = null);
		return view('admin.page.index', ['pages'=>$pages, 'lieu'=>$location->iso_code]);

	}

	/**
	 * Création d'une nouvelle page
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	    if(Auth::check()){
            return view('admin.page.create');
        }
        else {
	        return back();
        }



	}
    private function slugtitre($titre, $idrecipe){
        $titreslug= str_slug($titre, '-');
        $slug = $titreslug."-".$idrecipe;
        return $slug;
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

        $idRecette = DB::table('pages')->insertGetId(
            ['name' => $request->name,
                'content' => $request->contenu,
                'author_id' =>Auth::id(),
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
	 * @param  \App\Page  $page
	 * @return \Illuminate\Http\Response
	 */
	public function show(Page $page)
	{
//        dd($page);

		return view('admin.page.show', ['page' => $page]);
	}


    public function show_contact()
    {
        $page = Page::where('name', 'Contact')->first();
//        dd($page);

        return view('admin.page.show', ['page' => $page]);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Page  $page
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Page $page)
	{
		// show the edit form and pass the nerd
		return view('admin.page.edit', ['page' => $page]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Page  $page
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Page $page)
	{


//		$this->validate($request, [
//			'name' => 'required',
//			'content' => 'required'
//		]);
		$page->name = $request->name;
		$page->content = $request->contenu;
		$page->slug = $this->slugtitre($request->name, $page->id) ;


        $page->save();

		return redirect(route('page.index'))->with('status', 'Profile updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Page  $page
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Page $page)
	{
		$page2 = Page::findOrFail($page);

		$page2->delete();

		return redirect('admin/page')->with('status', 'Page supprimée !');
	}
}
