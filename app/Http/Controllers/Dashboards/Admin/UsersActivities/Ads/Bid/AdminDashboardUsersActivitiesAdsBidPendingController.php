<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Bid;

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
use App\Services\CustomPaginationServices\PaginationService;
use App\Http\Requests\Dashboards\Admin\UsersActivities\Ads\Bid\Pending\UsersActivitiesAdsBidPendingUpdateRequest;

class AdminDashboardUsersActivitiesAdsBidPendingController extends Controller
{
    public function __construct() {
        $this->middleware('can:ads_index,user')->only(['index','search']);
        $this->middleware('can:ads_edit,user')->only(['edit','update']);
        $this->middleware('can:ads_destroy,user')->only(['destroy']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $activities = Activity::queryWithVerifyStatusPending()->withWhereHas('bid', function($query) {
            $query->where('type', 'auction')
            ->orWhere('type', 'tender_buy')
            ->orWhere('type', 'tender_project'); 
        })->paginate(10);

        return view('dashboards.users.admin.pages.users-activities.ads.bid.pending.index.index', compact('user', 'activities'));  
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $activity = Activity::queryWithVerifyStatusPending()->findOrFail($id);
        $user = auth()->user();

        return view('dashboards.users.admin.pages.users-activities.ads.bid.pending.edit.index', compact('user','activity'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersActivitiesAdsBidPendingUpdateRequest $request)
    {
        $validated = $request->validated();

        $activity = Activity::queryWithVerifyStatusPending()->findOrFail($request->activity);
        
        // Update after successful validation
        $activity->update([
            'verify_status' => $validated['verify_status'] == 'verified' ? 'verified' : 'rejected',
            'reject_description' => Purify::clean($validated['reject_description']),
        ]);

        return redirect(route('admin.dashboard.users-activities.ads.bid.pending.index'))->with('success', 'آگهی مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $activity = Activity::queryWithVerifyStatusPending()->findOrFail($request->activity);
        $activity->delete();

        return redirect(route('admin.dashboard.users-activities.ads.bid.pending.index'))->with('success', 'آگهی مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $activities = Activity::queryWithVerifyStatusPending()->withWhereHas('bid', function($query) use($searchString) {
            $query->where('item_title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.ads.bid.pending.search.index', compact('user',  'activities', 'searchString')); 
    }
    
}
