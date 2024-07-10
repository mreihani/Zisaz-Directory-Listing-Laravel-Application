<?php

namespace App\Http\Controllers\Dashboards\Admin\UsersActivities\PrivateWebsites;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboards\Admin\Media;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class AdminDashboardUsersActivitiesPrivateWebsiteDeletedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $psites = Psite::onlyTrashed()->queryWithAllVerificationStatuses()->paginate(10);

        return view('dashboards.users.admin.pages.users-activities.private-websites.deleted.index.index', compact('user', 'psites'));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(Request $request)
    {
        $psite = Psite::queryWithAllVerificationStatuses()->withTrashed()->findOrFail($request->psite);
        $psite->restore();

        $psite->update([
            'verify_status' => 'pending'
        ]);

        return redirect(route('admin.dashboard.users-activities.private-website.deleted.index'))->with('success', 'کسب و کار مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $psites = Psite::onlyTrashed()->queryWithAllVerificationStatuses()->withWhereHas('hero', function($query) use($searchString) {
            $query->where('title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.private-websites.deleted.search.index', compact('user',  'psites', 'searchString')); 
    }
    
}
