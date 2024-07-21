<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Employment;

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

class AdminDashboardUsersActivitiesAdsEmploymentRejectedController extends Controller
{
    public function __construct() {
        $this->middleware('can:ads_index,user')->only(['index','search']);
        $this->middleware('can:ads_destroy,user')->only(['destroy']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $activities = Activity::queryWithVerifyStatusRejected()->withWhereHas('employment', function($query) {
            $query->where('type', 'employee')
            ->orWhere('type', 'employer'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.ads.employment.rejected.index.index', compact('user', 'activities'));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $activity = Activity::queryWithVerifyStatusRejected()->findOrFail($request->activity);
        $activity->delete();

        return redirect(route('admin.dashboard.users-activities.ads.employment.rejected.index'))->with('success', 'آگهی مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $activities = Activity::queryWithVerifyStatusRejected()->withWhereHas('employment', function($query) use($searchString) {
            $query->where('item_title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.ads.employment.rejected.search.index', compact('user',  'activities', 'searchString')); 
    }
    
}
