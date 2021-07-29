<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Render Profile basic page
     * @return Response Inertia Render Response
     */
    public function renderProfileBasic(): Response
    {
        return Inertia::render('Profile/Basic');
    }
}
