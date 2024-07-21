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

class AdminDashboardUsersActivitiesProjectRejectedController extends Controller
{
    public function __construct() {
        $this->middleware('can:project_index,user')->only(['index','search']);
        $this->middleware('can:project_destroy,user')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $projects = Project::queryWithVerifyStatusRejected()->paginate(10);

        return view('dashboards.users.admin.pages.users-activities.projects.rejected.index.index', compact('user', 'projects'));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $project = Project::queryWithVerifyStatusRejected()->findOrFail($request->project);
        $project->delete();

        return redirect(route('admin.dashboard.users-activities.project.rejected.index'))->with('success', 'پروژه مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $projects = Project::queryWithVerifyStatusRejected()->withWhereHas('projectInfo', function($query) use($searchString) {
            $query->where('title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.projects.rejected.search.index', compact('user',  'projects', 'searchString')); 
    }
    
}
