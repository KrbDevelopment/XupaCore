<?php

namespace App\Http\Controllers\Core\Authentication;

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
use Symfony\Component\HttpFoundation\RedirectResponse;

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
    public function loginFacebook(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $isRegistered = User::where('social_facebook', $user->id)->first();

        if ($isRegistered) {
            Auth::login($isRegistered);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_facebook' => $user->id
            ]);

            Auth::login($newUser);
        }

        return redirect(route('home'));
    }

    public function loginGithub(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub() {
        $user = Socialite::driver('github')->user();
        $isRegistered = User::where('social_github', $user->id)->first();

        if ($isRegistered) {
            Auth::login($isRegistered);
        } else {
            $name = explode(' ', $user->name);
            $last = $name[sizeof($name) - 1];
            array_pop($name);
            $first = join(' ', $name);

            $newUser = User::create([
                'username' => $user->user['name'],
                'first_name' => $first,
                'last_name' => $last,
                'email' => $user->email,
                'profile_image' => $user->user['avatar_url'],
                'social_github' => $user->id
            ]);

            Auth::login($newUser);
        }

        return redirect(route('home'));
    }
}
