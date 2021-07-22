<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LoginController extends Controller
{
    /**
     * Render Auth-Login page
     * @return Response Inertia Render Response
     */
    public function renderLogin(): Response
    {
        return Inertia::render('Authentication/Login');
    }
}
