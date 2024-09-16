<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\Projects;

use App\Models\User;
use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboards\Admin\Media;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Mag\MagPost;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\Banners\BannerProjectPage;
use App\Models\Frontend\UserModels\Project\Project;
use App\Services\CustomPaginationServices\PaginationService;
use App\Http\Requests\Dashboards\Admin\UsersActivities\Projects\Pending\UsersActivitiesProjectPendingUpdateRequest;


class AdminDashboardUsersActivitiesProjectPendingController extends Controller
{
    public function __construct() {
        $this->middleware('can:project_index,user')->only(['index','search']);
        $this->middleware('can:project_edit,user')->only(['edit','update']);
        $this->middleware('can:project_destroy,user')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $projects = Project::queryWithVerifyStatusPending()->paginate(10);
      
        return view('dashboards.users.admin.pages.users-activities.projects.pending.index.index', compact('user', 'projects'));  
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $project = Project::queryWithVerifyStatusPending()->findOrFail($id);
        $user = auth()->user();

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

        return view('dashboards.users.admin.pages.users-activities.projects.pending.edit.index', compact(
            'user',
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersActivitiesProjectPendingUpdateRequest $request)
    {
        $validated = $request->validated();

        $project = Project::queryWithVerifyStatusPending()->findOrFail($request->project);
        
        // Update after successful validation
        $project->update([
            'verify_status' => $validated['verify_status'] == 'verified' ? 'verified' : 'rejected',
            'reject_description' => Purify::clean($validated['reject_description']),
        ]);

        return redirect(route('admin.dashboard.users-activities.project.pending.index'))->with('success', 'پروژه مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $project = Project::queryWithVerifyStatusPending()->findOrFail($request->project);
        $project->delete();

        return redirect(route('admin.dashboard.users-activities.project.pending.index'))->with('success', 'پروژه مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $projects = Project::queryWithVerifyStatusPending()->withWhereHas('projectInfo', function($query) use($searchString) {
            $query->where('title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.projects.pending.search.index', compact('user',  'projects', 'searchString')); 
    }
}
