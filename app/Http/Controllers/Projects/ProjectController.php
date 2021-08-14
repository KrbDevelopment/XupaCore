<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        return Inertia::render('Projects/UserProjects', [
        'projects' => Project::paginate(15)
        ]);
    }

    public function createProject(Request $request) {
        $request->validate([
           'title' => 'required|string|max:255',
           'slogan' => 'required|string|max:255',
           'description' => 'required|string',

           'thumbnail' => 'nullable|string',
           'logo' => 'nullable|string',

           'website_title' => 'nullable|string|max:255',
           'website_link' => 'nullable|string|max:255',

           'location_address' => 'nullable|string|max:255',
           'location_city' => 'nullable|string|max:255',
        ]);

        $project = new Project;

        $project->user_id = auth()->user()->id;

        $project->title = $request->title;
        $project->slogan = $request->slogan;
        $project->description = $request->description;
        $project->thumbnail = $request->thumbnail;
        $project->logo = $request->logo;
        $project->website_title = $request->website_title;
        $project->website_link = $request->website_link;
        $project->location_address = $request->location_address;
        $project->location_city = $request->location_city;

        $project->save();

        return back();
    }

}
