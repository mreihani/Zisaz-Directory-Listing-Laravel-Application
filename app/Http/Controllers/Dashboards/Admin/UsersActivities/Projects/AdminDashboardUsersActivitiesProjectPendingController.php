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
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\UserModels\Project\Project;
use App\Services\CustomPaginationServices\PaginationService;
use App\Http\Requests\Dashboards\Admin\UsersActivities\Projects\Pending\UsersActivitiesProjectPendingUpdateRequest;


class AdminDashboardUsersActivitiesProjectPendingController extends Controller
{
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

        return view('dashboards.users.admin.pages.users-activities.projects.pending.edit.index', compact(
            'user',
            'project',
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