<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    /**
     * Create Project
     * @param Request $request
     * @return RedirectResponse
     */
    public function createProject(Request $request): RedirectResponse
    {
        $request->validate([
           'title' => 'required|string|max:255',
           'slogan' => 'required|string|max:255',
           'description' => 'required|string',

           'thumbnail' => 'nullable|image|max:5120',
           'logo' => 'nullable|image|max:5120',

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
        $project->thumbnail = $this->storeThumbnail($request->thumbnail);
        $project->logo = $this->storeLogo($request->logo);
        $project->website_title = $request->website_title;
        $project->website_link = $request->website_link;
        $project->location_address = $request->location_address;
        $project->location_city = $request->location_city;

        $project->save();

        return back();
    }

    /**
     * Update Project
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function updateProject(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'description' => 'required|string',

            'thumbnail' => 'nullable|image|max:5120',
            'logo' => 'nullable|image|max:5120',

            'website_title' => 'nullable|string|max:255',
            'website_link' => 'nullable|string|max:255',

            'location_address' => 'nullable|string|max:255',
            'location_city' => 'nullable|string|max:255',
        ]);


        $thumbnail = $project->thumbnail;
        $logo = $project->logo;
        if ($request->thumbnail) { $thumbnail = $project->setThumbnail($request->thumbnail); }
        if ($request->logo) { $logo = $project->setLogo($request->logo); }

        $project->update([
           'title' =>  $request->title,
           'slogan' =>  $request->slogan,
           'description' =>  $request->description,
           'thumbnail' =>  $thumbnail,
           'logo' => $logo,
           'website_title' =>  $request->website_title,
           'website_link' =>  $request->website_link,
           'location_address' =>  $request->location_address,
           'location_city' =>  $request->location_city,

        ]);

        $project->save();

        return back();
    }

    /**
     * Project Thumbnails
     */

    /**
     * Set Project thumbnail helper
     * @param $image Image Request Image (must be validated)
     * @return string|null String with the path of the image
     */
    public function storeThumbnail($image): ?string
    {
        if (!$image) return null;
        return $image->store('project_thumbnails');
    }

    /**
     * Update Project thumbnail
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function updateThumbnail(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'thumbnail'=>'required|image|max:5120'
        ]);

        $project->setThumbnail($request->file("thumbnail"));
        $project->save();

        return back();
    }

    /**
     * Get Project Thumbnail helper
     * @param Project $project
     * @return StreamedResponse|null
     */
    public function getThumbnail(Project $project): ?StreamedResponse
    {
        $thumbnail = $project->getThumbnail();
        if (!$thumbnail) return null;
        return $thumbnail;
    }

    /**
     * Project Logos
     */

    /**
     * Set Project logo helper
     * @param $image Image Request Image (must be validated)
     * @return string|null String with the path of the image
     */
    public function storeLogo($image): ?string
    {
        if (!$image) return null;
        return $image->store('project_logos');
    }

    /**
     * Update Project logos
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function updateLogo(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'logo'=>'required|image|max:5120'
        ]);

        $project->setLogo($request->file("logo"));
        $project->save();

        return back();
    }

    /**
     * Get Project Logo helper
     * @param Project $project
     * @return StreamedResponse|null
     */
    public function getLogo(Project $project): ?StreamedResponse
    {
        $logo = $project->getLogo();
        if (!$logo) return null;
        return $logo;
    }

}
