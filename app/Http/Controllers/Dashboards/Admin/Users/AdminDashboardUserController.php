<?php

namespace App\Http\Controllers\Dashboards\Admin\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboards\Admin\Media;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Dashboards\Admin\User\UserStoreRequest;
use App\Http\Requests\Dashboards\Admin\User\UserUpdateRequest;

class AdminDashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $users = User::where('phone_verified', 1)->paginate(10);

        return view('dashboards.users.admin.pages.users.index.index', compact('user', 'users'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        return view('dashboards.users.admin.pages.users.create.index', compact('user'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        
        // Create user after successful validation
        $user = User::updateOrCreate(
            ['phone' => Purify::clean($validated['phone'])],
            [
                'firstname' => Purify::clean($validated['firstname']),
                'lastname' => Purify::clean($validated['lastname']),
                'phone' => Purify::clean($validated['phone']),
                'email' => !empty($validated['email']) ? Purify::clean($validated['email']) : null,
                'role' => $validated['account_type'] == 'admin' ? 'admin' : 'construction',
                'password' => $validated['account_type'] == 'admin' ? Hash::make($validated['password']) : null,
                'phone_verified' => 1,
            ]
        );
        
        return redirect(route('admin.dashboard.users.index'))->with('success', 'کاربر مورد نظر با موفقیت ایجاد گردید.');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $user = auth()->user();

        $selectedUser = User::findOrFail($id);

        return view('dashboards.users.admin.pages.users.edit.index', compact('user', 'selectedUser'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();
        
        // Update user after successful validation
        $user->update([
            'firstname' => Purify::clean($validated['firstname']),
            'lastname' => Purify::clean($validated['lastname']),
            'phone' => Purify::clean($validated['phone']),
            'email' => !empty($validated['email']) ? Purify::clean($validated['email']) : null,
            'role' => $validated['account_type'] == 'admin' ? 'admin' : 'construction',
            'password' => $validated['account_type'] == 'admin' ? Hash::make($validated['password']) : null,
            'phone_verified' => 1,
        ]);

        return redirect(route('admin.dashboard.users.index'))->with('success', 'کاربر مورد نظر با موفقیت بروز رسانی گردید.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // delete user
        $user->delete();

        return redirect(route('admin.dashboard.users.index'))->with('success', 'کاربر مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {
        $user = auth()->user();

        $searchString = trim($request->q);
        
        $users = User::
        where('phone_verified', 1)
        ->whereRaw("CONCAT(firstname, ' ', lastname) like ?", ['%' . $searchString . '%'])
        ->orWhere('phone', 'like', '%' . $searchString . '%')
        ->orWhere('email', 'like', '%' . $searchString . '%')
        ->paginate(10);

        return view('dashboards.users.admin.pages.users.search.index', compact('user',  'users', 'searchString')); 
    }
    
}
