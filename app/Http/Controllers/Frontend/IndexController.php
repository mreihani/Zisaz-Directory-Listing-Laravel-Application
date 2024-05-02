<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;

class IndexController extends Controller
{
    /**
     * Handle user logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Logout the user
        auth()->guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the homepage
        return redirect('/');
    }
    
    /**
     * Render the homepage view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function homePage(Request $request) {
        return view('frontend.pages.home.index');
    }

    public function userLogin(Request $request) {
        if(auth()->check()) {
            return redirect(route('user.dashboard.profile-settings.index'));
        }
        return view('frontend.pages.home.index');
    }

    public function aboutUs() {
        return view('frontend.pages.about-us.index');
    }

    public function BlogAll() {
        return view('frontend.pages.blog.blog-all.index');
    }

    public function BlogSingle() {
        return view('frontend.pages.blog.blog-single.index');
    }

    public function contactUs() {
        return view('frontend.pages.contact-us.index');
    }

    public function faq() {
        return view('frontend.pages.faq.index');
    }

    // activity single page
    public function activity($slug) {
        $activity = Activity::where('slug', $slug)->with('subactivity')->get()->first() ?: abort(404);
        
        // get similar items for carousel element
        $similarItemsCount = $activity->subactivity->where('ads_type', $activity->subactivity->ads_type)->count();
        $similarItems = $activity->subactivity
        ->latest()
        ->where('id', '!=', $activity->subactivity->id)
        ->where('ads_type', $activity->subactivity->ads_type)
        ->get()
        ->take(10);

        return view('frontend.pages.activity.activity-single.index', compact('activity', 'similarItems', 'similarItemsCount'));
    }

    // get all ads with type
    public function getActivties(Request $request) {

        $activityType = $request->activity_type;
        $adsType = $request->ads_type;
        $relationName = $request->r_name;
       
        // load all activities e.g. /activities
        if(empty($request->all())) {
            $activities = Activity::with('subactivity')->get()->pluck('subactivity');
            return view('frontend.pages.activity.activity-all.index', compact('activities'));
        }

        // load all activities with only activity_type parameter e.g. /activities?activity_type=ads_registration
        if(is_null($adsType) && is_null($relationName)) {
            $activities = Activity::where('activity_type', $activityType)->get()->pluck('subactivity');
            return view('frontend.pages.activity.activity-all.index', compact('activities'));
        }

        // load all activities with activity_type & relation name parameter e.g. /activities?activity_type=ads_registration&r_name=selling
        if(is_null($adsType) && !is_null($relationName)) {
            $activities = Activity::where('activity_type', $activityType)->with($relationName)->get()->pluck($relationName)->filter();
            return view('frontend.pages.activity.activity-all.index', compact('activities'));
        }

        // load all activities with activity_type & ads_type parameter e.g. /activities?activity_type=ads_registration&ads_type=investor
        $activities = Activity::where('activity_type', $activityType)->with('subactivity')->get()->pluck('subactivity')->where('ads_type', $adsType);
        return view('frontend.pages.activity.activity-all.index', compact('activities'));
    }
}
