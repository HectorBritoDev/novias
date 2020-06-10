<?php

namespace App\Http\Controllers\Auth;

use App\Departamento;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
     * Redirect the user to the instagram authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('instagram')->redirect();
    }

    /**
     * Obtain the user information from instagram.
     * @return \Illuminate\Http\Response
     *
     */
    public function handleProviderCallback()
    {
        $instagram_user = Socialite::driver('instagram')->user();

        $user = User::where('nickname', $instagram_user->getNickname())->first();

        if ($user) {
            Auth::login($user, true);
            return redirect($this->redirectTo);

        } else {

            $departamentos = Departamento::All();
            return view('auth.register', compact('instagram_user', 'departamentos'));

        }
    }

}
