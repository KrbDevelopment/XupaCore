<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailController extends Controller
{
    /**
     * Render Auth-ForgotPassword page
     * @return Response Inertia Render Response
     */
    public function renderEmailVerify(): Response
    {
        return Inertia::render('Authentication/VerifyEmail');
    }
}
