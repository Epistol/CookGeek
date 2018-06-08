<?php
	
	namespace App\Http\Controllers\User;
	
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Providers\UniverseProvider;
	use App\RecipeImg;
	use App\Recipes;
	use App\Univers;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Route;
	use Spatie\SchemaOrg\Schema;
	use Carbon\Carbon;
	
	class HomeController extends Controller
	{
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('auth');
		}
		
		/**
		 * Show the application dashboard.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
            $request->session()->flash('status', 'Task was successful!');
			// If no avatar is set, return empty :  https://api.adorable.io/avatars/{{Pseudo}}
			return view('user_space.home');
		}
		
		public function parameters()
		{
			return view('user_space.switch.param');
		}
		
		
		// Validation forms
		
		public function param_store(Request $request)
		{
			$user = $request->user();
			$user_data = ['name' => $request->pseudo, 'email' => $request->mail, 'password' => $request->mdp];
			
			
			foreach ($user_data as $column => $value) {
				if ($this->is_dirty($value)) {
					if ($column == 'password') {
						$user->$column = bcrypt($value);
					} else {
						$user->$column = $value;
					}
				}
				
			}
			$user->save();
			$request->session()->flash('status', 'Profil mis à jour ! ');
			$request->session()->reflash();
			$request->session()->keep(['status', 'Profil mis à jour !']);
			return redirect()->route('account.param');
		}
		
		public function parameters_store(Request $request)
		{
		
		}
		
		public function info_store(Request $request)
		{
		
		}
		
		private function is_dirty($param)
		{
			return empty($param) || $param == '' ? false : true;
		}
		
		
	}
