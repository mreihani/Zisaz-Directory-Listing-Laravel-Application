<?php

namespace App\Http\Controllers\Frontend\FrontEndPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
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

        $activity->setSeoMeta();

        // get similar items for carousel element
        $similarItemsCount = $activity->withWhereHas('subactivity', function($query) use($activity) {
            $query->where('type', $activity->subactivity->type);
        })->count();

        $similarItems = $activity->withWhereHas('subactivity', function($query) use($activity) {
            $query->where('id', '!=', $activity->subactivity->id)->where('type', $activity->subactivity->type);
        })->get()->take(10)->pluck('subactivity');
    
        return view('frontend.pages.activity.activity-single.index', compact('activity', 'similarItems', 'similarItemsCount'));
    }

    // get all ads with type
    public function getActivties(Request $request) {
       
        $activities = Activity::with('subactivity')->latest()->get()->pluck('subactivity');
        
        return view('frontend.pages.activity.activity-all.all-types.index', compact('activities'));
    }
}
