<?php

namespace App\Http\Controllers\Dashboards\Admin\Visits;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboards\Admin\Visit;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Pagination\LengthAwarePaginator;


class AdminDashboardVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $visits = Visit::paginate(10);

        return view('dashboards.users.admin.pages.visits.index.index', compact('user', 'visits'));  
    }

    /**
     * Display a listing of the resource.
     */
    public function history(Request $request)
    {
        $visitorUser = User::findOrFail($request->userId);

        $user = auth()->user();
        $visits = Visit::where('user_id', $visitorUser->id)->paginate(10)->appends(['userId' => $visitorUser->id]);

        return view('dashboards.users.admin.pages.visits.history.index', compact('user', 'visits', 'visitorUser'));  
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);

        $visits = Visit::
        withWhereHas('user', function($query) use($searchString) {
            $query->whereRaw("CONCAT(firstname, ' ', lastname) like ?", ['%' . $searchString . '%']);
        })->paginate(10)->appends(['q' => $searchString]);

        return view('dashboards.users.admin.pages.visits.search.index', compact('user',  'visits', 'searchString')); 
    }
}
