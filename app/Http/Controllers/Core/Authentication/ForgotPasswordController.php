<?php

namespace App\Http\Controllers\Core\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Render Auth-ForgotPassword page
     * @return Response Inertia Render Response
     */
    public function renderPasswordForgot(): Response
    {
        return Inertia::render('Authentication/ForgotPassword');
    }
}
