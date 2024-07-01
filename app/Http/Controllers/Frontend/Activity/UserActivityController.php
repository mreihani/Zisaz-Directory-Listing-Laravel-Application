<?php

namespace App\Http\Controllers\Frontend\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class UserActivityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('frontend.pages.activity.activity-create.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $activity = Activity::queryWithAllVerificationStatuses()->findOrFail($request->activity);

        // check if user is authorized to edit activity item
        if(!auth()->check() || auth()->user()->id != $activity->user->id) {
            abort(403);
        }
 
        return view('frontend.pages.activity.activity-edit.index', compact('activity'));
    }

    /**
     * Undelete the soft deleted item
     */
    public function restore(Request $request)
    {
        $activity = Activity::queryWithAllVerificationStatuses()->withTrashed()->findOrFail($request->activity);

        // check if user is authorized to restore activity item
        if(!auth()->check() || auth()->user()->id != $activity->user->id) {
            abort(403);
        }

        $activity->restore();

        $activity->update([
            'verify_status' => 'pending'
        ]);

        return redirect()->route('user.dashboard.saved-ads.index');
    }

    /**
     * Soft-delete the specified item.
     */
    public function destroy(Request $request)
    {
        $activity = Activity::queryWithAllVerificationStatuses()->findOrFail($request->activity);

        // check if user is authorized to delete activity item
        if(!auth()->check() || auth()->user()->id != $activity->user->id) {
            abort(403);
        }

        $activity->delete();

        return redirect()->route('user.dashboard.saved-ads.index');
    }
}
