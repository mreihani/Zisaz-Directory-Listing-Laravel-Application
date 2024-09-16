<?php

namespace App\Http\Controllers\Frontend\FrontEndPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Frontend\UserModels\Mag\MagPost;
use App\Models\Frontend\Banners\BannerProjectPage;
use App\Models\Frontend\UserModels\Project\Project;

class ProjectPagesController extends Controller
{
    // load project single page
    public function project($slug) {

        if(auth()->check() && auth()->user()->role === 'admin') {
            $project = Project::queryWithAllVerificationStatuses()->where('slug', $slug)
            ->with([
                'projectImages',
                'projectInfo',
                'projectFacility',
                'projectContact',
                'projectVideo',
                'welfareFacility',
                ])
            ->first();
        } else {
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
        }

        // check if all four project page/sections has been filled and saved by the user
        if(!$project || !$project->projectInfo || !$project->projectFacility || !$project->projectContact) {
            abort(404);
        }

        $project->setSeoMeta();

        // load mag
        $mags = MagPost::with('magazineCategory')->latest()->get()->take(3);

        // banner on the sidebar
        $projectFirstSliderSlideOne = BannerProjectPage::where('position', 'project_first_slider_slide_one')->first();
        $projectFirstSliderSlideTwo = BannerProjectPage::where('position', 'project_first_slider_slide_two')->first();
        $projectFirstSliderSlideThree = BannerProjectPage::where('position', 'project_first_slider_slide_three')->first();
        $projectFirstSliderSlideFour = BannerProjectPage::where('position', 'project_first_slider_slide_four')->first();
        $projectFirstSliderSlideFive = BannerProjectPage::where('position', 'project_first_slider_slide_five')->first();

        // constructor similar projects
        $similarProjects = $project->user->project->where('id', '!=', $project->id)->take(6);

        return view('frontend.pages.project.project-index.index', compact(
            'project', 
            'mags', 
            'projectFirstSliderSlideOne',
            'projectFirstSliderSlideTwo', 
            'projectFirstSliderSlideThree',
            'projectFirstSliderSlideFour',
            'projectFirstSliderSlideFive',
            'similarProjects'
        ));
    }
}
