<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AccountController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Render Accounts overview page
     * @return Response Inertia Render Response
     */
    public function renderAccountsOverview(): Response
    {
        return Inertia::render('Accounts/Overview',  [
            'accounts' => User::all()
        ]);
    }
}
