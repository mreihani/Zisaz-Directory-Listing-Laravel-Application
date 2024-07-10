<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\All;

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

class AdminDashboardUsersActivitiesAdsAllDeletedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $activities = Activity::onlyTrashed()->queryWithAllVerificationStatuses()->with('subactivity')->paginate(10);

        return view('dashboards.users.admin.pages.users-activities.ads.all.deleted.index.index', compact('user', 'activities'));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Request $request)
    {
        $activity = Activity::queryWithAllVerificationStatuses()->withTrashed()->findOrFail($request->activity);

        $activity->restore();

        $activity->update([
            'verify_status' => 'pending'
        ]);
        
        return redirect(route('admin.dashboard.users-activities.ads.all.deleted.index'))->with('success', 'آگهی مورد نظر با موفقیت بازیابی گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $activities = Activity::onlyTrashed()->queryWithAllVerificationStatuses()->withWhereHas('subactivity', function($query) use($searchString) {
            $query->where('item_title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.ads.all.deleted.search.index', compact('user',  'activities', 'searchString')); 
    }
}
