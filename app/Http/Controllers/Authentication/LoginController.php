<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Laravel\Socialite\Facades\Socialite;
use Abraham\TwitterOAuth\TwitterOAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Where to redirect users after login.
        $this->redirectTo = route('home');

        $this->middleware('guest')->except('logout');
    }

    /**
     * Render Auth-Login page
     * @return Response Inertia Render Response
     */
    public function renderLogin(): Response
    {
        return Inertia::render('Authentication/Login');
    }

    // Socialite Login
    public function loginFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isRegistered = User::where('social_facebook', $user->id)->first();

            if ($isRegistered) {
                Auth::login($isRegistered);
                return redirect(route('home'));
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_facebook' => $user->id
                ]);

                Auth::login($newUser);
                return redirect(route('home'));
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function loginGithub() {}
    public function callbackGithub() {}
}
