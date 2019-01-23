<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	/**
	 * Check either username or email.
	 * @return string
	 */
	public function username()
	{
		$identity = request()->get('identity');
		$fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
		request()->merge([$fieldName => $identity]);
		return $fieldName;
	}

    /**
     * Validate the user login.
     * @param Request $request
     * @throws ValidationException
     */
	protected function validateLogin(Request $request)
	{

		$this->validate(
			$request,
			[
				'identity' => 'required|string',
				'password' => 'required|string',
			],
			[
				'identity.required' => 'Pseudo ou email est requis',
				'password.required' => 'Mot de passe requis',
			]
		);
	}





	/**
	 * @param Request $request
	 */
	protected function sendFailedLoginResponse(Request $request)
	{
		$request->session()->put('login_error', trans('auth.failed'));
		throw ValidationException::withMessages(
			[
				'error' => [trans('auth.failed')],
			]
		);
	}


}
