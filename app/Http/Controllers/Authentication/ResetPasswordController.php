<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Render Auth-ResetPassword page
     * @return Response Inertia Render Response
     */
    public function renderPasswordReset(Request $request): Response
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required'
        ]);

        return Inertia::render('Authentication/ResetPassword', [
            'token' => $request->token,
            'email' => $request->email
        ]);
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
