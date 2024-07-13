<?php

namespace App\Http\Controllers\Dashboards\Admin\Visits;

use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
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
        $ip = trim($request->ip);
        $device = trim($request->device);
        $platform = trim($request->platform);
        $browser = trim($request->browser);
        $country = trim($request->country);
        $province = trim($request->province);
        $city = trim($request->city);
        $startDate = !empty($request->startDate) ? Jalalian::fromFormat('Y-m-d', trim($request->startDate))->toCarbon() : ''; 
        $endDate = !empty($request->endDate) ? Jalalian::fromFormat('Y-m-d', trim($request->endDate))->toCarbon() : ''; 
        
        $visits = Visit::query()
        ->when($ip, function ($query) use ($ip) {
            $query->where('ip', $ip);
        })
        ->when($device, function ($query) use ($device) {
            $query->where('device', $device);
        })
        ->when($platform, function ($query) use ($platform) {
            $query->where('platform', $platform);
        })
        ->when($browser, function ($query) use ($browser) {
            $query->where('browser', $browser);
        })
        ->when($country, function ($query) use ($country) {
            $query->where('country', $country);
        })
        ->when($province, function ($query) use ($province) {
            $query->where('province', $province);
        })
        ->when($city, function ($query) use ($city) {
            $query->where('city', $city);
        })
        ->when($startDate, function ($query) use ($startDate) {
            $query->whereRaw("DATE(created_at) >= ?", [$startDate->format('Y-m-d')]);
        })
        ->when($endDate, function ($query) use ($endDate) {
            $query->whereRaw("DATE(created_at) <= ?", [$endDate->format('Y-m-d')]);
        })
        ->when($searchString, function ($query) use ($searchString) {
            $query->whereHas('user', function ($query) use ($searchString) {
                $query->whereRaw("CONCAT(firstname, ' ', lastname) like ?", ['%' . $searchString . '%']);
            });
        })
        ->paginate(10)
        ->appends($request->except('page'));

        return view('dashboards.users.admin.pages.visits.search.index', compact('user',  'visits', 'searchString')); 
    }
}
