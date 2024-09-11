<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\PrivateWebsites;

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
use App\Models\Frontend\UserModels\PrivateSite\Psite;
use App\Services\CustomPaginationServices\PaginationService;
use App\Http\Requests\Dashboards\Admin\UsersActivities\PrivateWebsites\Pending\UsersActivitiesPrivateWebsitePendingUpdateRequest;

class AdminDashboardUsersActivitiesPrivateWebsitePendingController extends Controller
{
    public function __construct() {
        $this->middleware('can:psite_index,user')->only(['index','search']);
        $this->middleware('can:psite_edit,user')->only(['edit','update']);
        $this->middleware('can:psite_destroy,user')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $psites = Psite::queryWithVerifyStatusPending()->paginate(10);
      
        return view('dashboards.users.admin.pages.users-activities.private-websites.pending.index.index', compact('user', 'psites'));  
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $psite = Psite::queryWithAllVerificationStatuses()->findOrFail($id)
        ->with([
            'info',
            'contactUs',
            'promotionalVideo',
            'licenses',
            'licenses.psiteLicenseItem',
            'members',
            'members.psiteMemberItem',
            ])
        ->first();

        dd($psite);

        $user = $psite->user;
       
        // load dynamic ads section
        $ads = !is_null($user->activity) ? $user->activity()->with('subactivity')->get()->pluck('subactivity')->filter()->take(12) : collect([]);

        // load project section
        $projects = $user->project->take(12);

        return view('dashboards.users.admin.pages.users-activities.private-websites.pending.edit.index', compact(
            'user',
            'psite',
            'ads', 
            'projects', 
        ));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersActivitiesPrivateWebsitePendingUpdateRequest $request)
    {
        $validated = $request->validated();

        $psite = Psite::queryWithVerifyStatusPending()->findOrFail($request->psite);
        
        // Update after successful validation
        $psite->update([
            'verify_status' => $validated['verify_status'] == 'verified' ? 'verified' : 'rejected',
            'reject_description' => Purify::clean($validated['reject_description']),
        ]);

        return redirect(route('admin.dashboard.users-activities.private-website.pending.index'))->with('success', 'کسب و کار مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $psite = Psite::queryWithVerifyStatusPending()->findOrFail($request->psite);
        $psite->delete();

        return redirect(route('admin.dashboard.users-activities.private-website.pending.index'))->with('success', 'کسب و کار مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $psites = Psite::queryWithVerifyStatusPending()->withWhereHas('info', function($query) use($searchString) {
            $query->where('title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.private-websites.pending.search.index', compact('user',  'psites', 'searchString')); 
    }
    
}
