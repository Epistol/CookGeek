<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

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
     *
     * @return string
     */
    public function username()
    {
        $identity = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        request()->merge([$fieldName => $identity]);

        return $fieldName;
    }

    public function redirectToProvider($driver)
    {
        if ($driver !== 'twitter') {
            return Socialite::driver($driver)->with(["prompt" => "select_account"])->redirect();
        } elseif ($driver == 'instagram') {
            return Socialite::with('Instagram')->redirect();
        } else {
            return Socialite::driver($driver)->redirect();
        }
    }

    /**
     * Obtain the user information from provider.
     *
     * @param $driver
     *
     * @return Response
     */
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return redirect()->route('login');
        }
        $existingUser = User::where('email', $user->getEmail())
            ->where('provider_name', $driver)->first();
        if ($existingUser) {
            auth()->login($existingUser, true);

            if ($existingUser->provider_name == 'twitter') {
                if ($existingUser->img !== $user->avatar_original) {
                    $existingUser->update([
                        'img' => $user->avatar_original,
                    ]);
                    $existingUser->save();
                }
            } else {
                if ($existingUser->img !== $user->getAvatar()) {
                    $existingUser->update([
                        'img' => $user->getAvatar()
                    ]);
                    $existingUser->save();
                }
            }

            if ($existingUser->pseudo !== $user->getNickname()) {
                // if no user have this pseudo
                if (User::where('pseudo', $user->getNickname())->count() === 0) {
                    $pseudo = $user->getNickname();
                    $existingUser->pseudo = $pseudo;
                    $existingUser->save();
                    $existingUser->update(['pseudo' => $pseudo]);
//                    dd($existingUser->pseudo);
                }
            }
            if ($existingUser->email !== $user->getEmail()) {
                // if no user have this mail
                if (User::where('email', $user->getEmail())->count() === 0) {
                    $existingUser->update([
                        'email' => $user->getEmail()
                    ]);
                    $existingUser->save();
                }
            }
        } else {
            $existingUserOther = User::where('email', $user->getEmail())->first();
            if ($existingUserOther) {
                // An account already exist with the email given
                return redirect(route('login'))
                    ->with('status', __('account.already-exit'));
            } else {
                if ($driver == 'twitter') {
                    $avatar = $user->avatar_original;
                } else {
                    $avatar = $user->getAvatar();
                }
                $newUser = new User;
                $newUser->provider_name = $driver;
                $newUser->provider_id = $user->getId();
                $newUser->name = $user->getName() ?: null;
                $newUser->email = $user->getEmail();
                $newUser->pseudo = $user->getNickname();
                $newUser->email_verified_at = now();
                $newUser->img = $avatar;
                $newUser->lang = config('app.locale');
                $newUser->save();
                // TODO : if role exist
                $newUser->assignRole('user');
                auth()->login($newUser, true);
            }
        }

        return redirect($this->redirectPath());
    }


    /**
     * Validate the user login.
     *
     * @param Request $request
     *
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
