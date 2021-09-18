<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Render Home page
     * @return Response Inertia Render Response
     */
    public function index(): Response
    {
       return Inertia::render('Home');
    }
}
