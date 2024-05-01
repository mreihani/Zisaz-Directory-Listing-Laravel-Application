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
    public function getAds(Request $request) {
        $adsType = $request->ads_type;
        $relationName = $request->r_name;
       
        // stop users enter irrelevant relationship
        if(!in_array($relationName, ['selling', 'employment', 'investment'])) {
            abort(404);
        }
        // stop users enter irrelevant ads type
        if(!in_array($adsType, ['selling', 'employee', 'employer', 'investor', 'invested'])) {
            abort(404);
        }

        $activities = Activity::withWhereHas($relationName, function($q) use($adsType) {
            $q->where('ads_type', $adsType);
        })->orderBy('updated_at', 'DESC')->get();

        return view('frontend.pages.activity.activity-all.ads_registration.index', compact('activities'));
    }

    public function category(Request $request) {
        return view('frontend.pages.category.index');
    }
}
