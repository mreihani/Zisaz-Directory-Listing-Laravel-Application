<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\Projects;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboards\Admin\Media;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\UserModels\Project\Project;


class AdminDashboardUsersActivitiesProjectDeletedController extends Controller
{
    public function __construct() {
        $this->middleware('can:project_index,user')->only(['index','search']);
        $this->middleware('can:project_restore,user')->only(['restore']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $projects = Project::onlyTrashed()->queryWithAllVerificationStatuses()->paginate(10);

        return view('dashboards.users.admin.pages.users-activities.projects.deleted.index.index', compact('user', 'projects'));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Request $request)
    {
        $project = Project::queryWithAllVerificationStatuses()->withTrashed()->findOrFail($request->project);
        $project->restore();

        $project->update([
            'verify_status' => 'pending'
        ]);

        return redirect(route('admin.dashboard.users-activities.project.deleted.index'))->with('success', 'پروژه مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $projects = Project::onlyTrashed()->queryWithAllVerificationStatuses()->withWhereHas('projectInfo', function($query) use($searchString) {
            $query->where('title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.projects.deleted.search.index', compact('user',  'projects', 'searchString')); 
    }
    
}
