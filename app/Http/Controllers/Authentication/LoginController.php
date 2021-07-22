<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

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
}
