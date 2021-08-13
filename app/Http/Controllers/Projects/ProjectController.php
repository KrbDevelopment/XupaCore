<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    /**
     * Render User Projects page
     * @return Response Inertia Render Response
     */
    public function renderUserProjects(): Response
    {
        return Inertia::render('Projects/UserProjects');
    }

}
