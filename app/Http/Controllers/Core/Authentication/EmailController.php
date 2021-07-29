<?php

namespace App\Http\Controllers\Core\Authentication;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailController extends Controller
{
    use VerifiesEmails;

    /**
     * Render Auth-ForgotPassword page
     * @return Response Inertia Render Response
     */
    public function renderEmailVerify(Request $request): Response
    {
        return Inertia::render('Authentication/VerifyEmail', [
            'expires' => $request->expires,
            'hash' => $request->hash,
            'id' => $request->id,
            'signature' => $request->signature
        ]);
    }

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
