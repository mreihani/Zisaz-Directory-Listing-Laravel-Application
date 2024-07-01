<?php

namespace App\Http\Controllers\Frontend\FrontEndPages;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Frontend\UserModels\Activity\Activity;

class ActivityPagesController extends Controller
{
     // activity single page
     public function activity($slug) {

        if(auth()->check() && auth()->user()->role === 'admin') {
            $activity = Activity::queryWithAllVerificationStatuses()->where('slug', $slug)->with('subactivity')->get()->first() ?: abort(404);
        } else {
            $activity = Activity::where('slug', $slug)->with('subactivity')->get()->first() ?: abort(404);
        }
        
        // get similar items for carousel element
        $similarItemsCount = $activity->subactivity->where('type', $activity->subactivity->type)->count();
        $similarItems = $activity->subactivity
        ->latest()
        ->where('id', '!=', $activity->subactivity->id)
        ->where('type', $activity->subactivity->type)
        ->get()
        ->take(10);

        return view('frontend.pages.activity.activity-single.index', compact('activity', 'similarItems', 'similarItemsCount'));
    }

    // get all ads with type
    public function getActivties(Request $request) {

        $activityType = $request->activity_type;
        $type = $request->type;
        $relationName = $request->r_name;
       
        // load all activities e.g. /activities
        if(empty($request->all())) {
            $activities = Activity::with('subactivity')->latest()->get()->pluck('subactivity');
            return view('frontend.pages.activity.activity-all.index', compact('activities'));
        }

        // load all activities with only activity_type parameter e.g. /activities?activity_type=ads_registration
        if(is_null($type) && is_null($relationName)) {
            $activities = Activity::where('activity_type', $activityType)->latest()->get()->pluck('subactivity');
            return view('frontend.pages.activity.activity-all.index', compact('activities'));
        }

        // load all activities with activity_type & relation name parameter e.g. /activities?activity_type=ads_registration&r_name=selling
        if(is_null($type) && !is_null($relationName)) {
            $activities = Activity::where('activity_type', $activityType)->with($relationName)->latest()->get()->pluck($relationName)->filter();
            return view('frontend.pages.activity.activity-all.index', compact('activities'));
        }

        // load all activities with activity_type & type parameter e.g. /activities?activity_type=ads_registration&type=investor
        $activities = Activity::where('activity_type', $activityType)->with('subactivity')->latest()->get()->pluck('subactivity')->where('type', $type);
        return view('frontend.pages.activity.activity-all.index', compact('activities'));
    }
}
