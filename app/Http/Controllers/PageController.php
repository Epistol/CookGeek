<?php

namespace App\Http\Controllers;

use App\Page;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

		return view('admin.page.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$page = new Page;
		$page->name = request('name') ;
		$page->slug = strtolower(preg_replace('/\s+/', '-', request('name')));
		$page->content = request('content') ;
		$page->save();

		return redirect()->route('page.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Page  $page
	 * @return \Illuminate\Http\Response
	 */
	public function show(Page $page)
	{
		return view('admin.page.show', ['page' => Page::findOrFail($page)]);
	}

	public function show_contact(Page $page)
	{
		return view('admin.page.show', ['page' => Page::findOrFail('3')]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Page  $page
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Page $page)
	{
		$page = Page::find($page);
		/*dd($page);*/
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
		$task = Page::findOrFail($page);

		$this->validate($request, [
			'name' => 'required',
			'content' => 'required'
		]);

		$input = $request->all();

		$task->fill($input)->save();

		return redirect('admin/page')->with('status', 'Profile updated!');
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
