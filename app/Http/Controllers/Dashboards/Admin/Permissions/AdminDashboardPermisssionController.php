<?php

namespace App\Http\Controllers\Dashboards\Admin\Permissions;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Purify\Facades\Purify;
use App\Models\Frontend\ReferenceData\AdminRole\AdminRole;

class AdminDashboardPermisssionController extends Controller
{
    public function __construct() {
        $this->middleware('can:permissions_index,user')->only(['index']);
        $this->middleware('can:permissions_store,user')->only(['store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $seniorSupportRole = AdminRole::where('title', 'senior_support')->first()->permission->pluck('id')->toArray();
        $supportLevelOneRole = AdminRole::where('title', 'support_level_one')->first()->permission->pluck('id')->toArray();
        $marketerRole = AdminRole::where('title', 'marketer')->first()->permission->pluck('id')->toArray();
        $editorRole = AdminRole::where('title', 'editor')->first()->permission->pluck('id')->toArray();
       
        return view('dashboards.users.admin.pages.permissions.index.index', compact('user','seniorSupportRole','supportLevelOneRole','marketerRole','editorRole'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // update or create senior support user role
        $seniorSupportRole = AdminRole::where('title', 'senior_support')->first();
        if($request->has('senior_support')) {
            $seniorSupportArray = [];
            foreach ($request->senior_support as $key => $value) {
                if($value === 'on') {
                    $seniorSupportArray[] = $key;
                }
            }
            
            $seniorSupportRole->permission()->sync($seniorSupportArray, true);
        } else {
            $seniorSupportRole->permission()->detach();
        }

        // update or create support level one user role
        $supportLevelOneRole = AdminRole::where('title', 'support_level_one')->first();
        if($request->has('support_level_one')) {
            $supportLevelOne = [];
            foreach ($request->support_level_one as $key => $value) {
                if($value === 'on') {
                    $supportLevelOne[] = $key;
                }
            }

            $supportLevelOneRole->permission()->sync($supportLevelOne, true);
        } else {
            $supportLevelOneRole->permission()->detach();
        }

        // update or create marketer user role
        $marketerRole = AdminRole::where('title', 'marketer')->first();
        if($request->has('marketer')) {
            $marketerArray = [];
            foreach ($request->marketer as $key => $value) {
                if($value === 'on') {
                    $marketerArray[] = $key;
                }
            }
            
            $marketerRole->permission()->sync($marketerArray, true);
        } else {
            $marketerRole->permission()->detach();
        }

        // update or create editor user role
        $editorRole = AdminRole::where('title', 'editor')->first();
        if($request->has('editor')) {
            $editorArray = [];
            foreach ($request->editor as $key => $value) {
                if($value === 'on') {
                    $editorArray[] = $key;
                }
            }
            
            $editorRole->permission()->sync($editorArray, true);
        } else {
            $editorRole->permission()->detach();
        }
        
        return redirect(route('admin.dashboard.permissions.index'))->with('success', 'اطلاعات با موفقیت ذخیره گردید.');
    }
}
