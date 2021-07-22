<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RegisterController extends Controller
{
    /**
     * Render Auth-Register page
     * @return Response Inertia Render Response
     */
    public function renderRegister(): Response
    {
        return Inertia::render('Authentication/Register');
    }
}
