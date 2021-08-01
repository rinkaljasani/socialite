<?php

namespace App\Http\Controllers\Auth;
use Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //for google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        // $user->token;
    }

    
    //for facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // $user->token;
    }


    //for github login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    // Github callback
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();
        // $user->token;
    }
}
