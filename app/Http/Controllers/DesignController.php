<?php
	
	namespace App\Http\Controllers;
	
	use http\Exception;
	use Illuminate\Http\Request;
	
	class DesignController extends Controller
	{
		
		public function __construct()
		{
			$this->middleware('auth');
		}
		
		public function index()
		{
			try {
				return view('design.welcome');
			} catch (Exception $e) {
				report($e);
			}
			return view('design.welcome');
			
		}
	}
