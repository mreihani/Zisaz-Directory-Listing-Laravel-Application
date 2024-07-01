<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Selling;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboards\Admin\Media;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;
use App\Http\Requests\Dashboards\Admin\UsersActivities\Ads\Selling\Pending\UsersActivitiesAdsSellingPendingUpdateRequest;


class AdminDashboardUsersActivitiesAdsSellingPendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $activities = Activity::queryWithVerifyStatusPending()->with(['selling','user'])->paginate(10);

        return view('dashboards.users.admin.pages.users-activities.ads.selling.pending.index.index', compact('user', 'activities'));  
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $activity = Activity::queryWithVerifyStatusPending()->findOrFail($id);
        $user = auth()->user();

        return view('dashboards.users.admin.pages.users-activities.ads.selling.pending.edit.index', compact('user','activity'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersActivitiesAdsSellingPendingUpdateRequest $request)
    {
        $validated = $request->validated();

        $activity = Activity::queryWithVerifyStatusPending()->findOrFail($request->activity);
        
        // Update after successful validation
        $activity->update([
            'verify_status' => $validated['verify_status'] == 'verified' ? 'verified' : 'rejected',
            'reject_description' => Purify::clean($validated['reject_description']),
        ]);

        return redirect(route('admin.dashboard.users-activities.ads.selling.pending.index'))->with('success', 'آگهی مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $activity = Activity::queryWithVerifyStatusPending()->findOrFail($request->activity);
        $activity->delete();

        return redirect(route('admin.dashboard.users-activities.ads.selling.pending.index'))->with('success', 'آگهی مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $activities = Activity::queryWithVerifyStatusPending()->withWhereHas('selling', function($query) use($searchString) {
            $query->where('item_title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.ads.selling.pending.search.index', compact('user',  'activities', 'searchString')); 
    }
    
}
