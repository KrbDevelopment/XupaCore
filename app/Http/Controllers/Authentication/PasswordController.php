<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PasswordController extends Controller
{
    /**
     * Render Auth-ForgotPassword page
     * @return Response Inertia Render Response
     */
    public function renderPasswordForgot(): Response
    {
        return Inertia::render('Authentication/ForgotPassword');
    }

    /**
     * Render Auth-ResetPassword page
     * @return Response Inertia Render Response
     */
    public function renderPasswordReset(): Response
    {
        return Inertia::render('Authentication/ResetPassword');
    }
}
