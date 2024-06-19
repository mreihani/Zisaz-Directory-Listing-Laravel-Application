<?php

namespace App\Http\Controllers\Frontend\SinglePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Frontend\UserModels\Project\Project;


class ProjectPagesController extends Controller
{
    // load project single page
    public function project($slug) {
        $project = Project::where('slug', $slug)
        ->with([
            'projectImages',
            'projectInfo',
            'projectFacility',
            'projectContact',
            'projectVideo',
            'welfareFacility',
            ])
        ->first();

        // check if all four project page/sections has been filled and saved by the user
        if(!$project || !$project->projectInfo || !$project->projectFacility || !$project->projectContact) {
            abort(404);
        }

        return view('frontend.pages.project.project-index.index', compact(
            'project', 
        ));
    }
}
