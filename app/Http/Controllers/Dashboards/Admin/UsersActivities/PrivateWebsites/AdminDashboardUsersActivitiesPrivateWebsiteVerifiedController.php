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
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class AdminDashboardUsersActivitiesPrivateWebsiteVerifiedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $psites = Psite::paginate(10);

        return view('dashboards.users.admin.pages.users-activities.private-websites.verified.index.index', compact('user', 'psites'));  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psite $psite)
    {
        $psite->delete();

        return redirect(route('admin.dashboard.users-activities.private-website.verified.index'))->with('success', 'کسب و کار مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $psites = Psite::withWhereHas('hero', function($query) use($searchString) {
            $query->where('title', 'like', '%' . $searchString . '%'); 
        })->paginate(10);
        
        return view('dashboards.users.admin.pages.users-activities.private-websites.verified.search.index', compact('user',  'psites', 'searchString')); 
    }
    
}