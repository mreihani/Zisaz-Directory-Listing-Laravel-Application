<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\UserModels\PrivateSite\Psite;
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

    public function support() {
        return view('frontend.pages.support.index');
    }

    // load users private websites
    public function site($slug) {
        $psite = Psite::where('slug', $slug)
        ->with([
            'licenses',
            'licenses.psiteLicenseItem',
            'aboutUs',
            'blog',
            'contactUs',
            'contactUs.psiteContactUsAddressItems',
            'contactUs.psiteContactUsOfficePhoneItems',
            'contactUs.psiteContactUsMobilePhoneItems',
            'contactUs.psiteContactUsEmailItems',
            'contactUs.psiteContactUsSocialMediaItems',
            'contactUs.psiteContactUsPostalCodeItems',
            'contactUs.psiteContactUsWorkingHourItems',
            'footer',
            'hero',
            'hero.psiteHeroSliders',
            'members',
            'members.psiteMemberItem',
            'middleBanner',
            'promotionalVideo',
            'services',
            'services.psiteServiceItem',
            'testimonials',
            'testimonials.psiteTestimonialItem',
            'trustedCustomer.psiteTrustedCustomerItem',
            'projects',
            'ads'
            ])
        ->first();

        // check if footer has been saved and logo has been uploaded
        if(!$psite || !$psite->footer || !$psite->footer->logo) {
            abort(404);
        }

        $qrCode = QrCode::size(150)->generate(URL::to('/site') . '/' . $psite->slug);

        // load five types of ads items related to the user
        $user = $psite->user;
        
        $selling = !is_null($user->activity) ? $user->activity()->with('selling')->get()->pluck('selling')->filter()->take(3) : collect([]);
        $investment = !is_null($user->activity) ? $user->activity()->with('investment')->get()->pluck('investment')->filter()->take(3) : collect([]);
        $bid = !is_null($user->activity) ? $user->activity()->with('bid')->get()->pluck('bid')->filter()->take(3) : collect([]);
        $inquiry = !is_null($user->activity) ? $user->activity()->with('inquiry')->get()->pluck('inquiry')->filter()->take(3) : collect([]);
        $contractor = !is_null($user->activity) ? $user->activity()->with('contractor')->get()->pluck('contractor')->filter()->take(3) : collect([]);

        // check if there is at least one item available
        if($selling->count() || $investment->count() || $bid->count() || $inquiry->count() || $contractor->count()) {
            $showAdsSection = true;
        } else {
            $showAdsSection = false;
        }

        // create dynamic background style for the middle banner section
        $middleBannerImageUrl = ($psite->middleBanner && !$psite->middleBanner->is_hidden && $psite->middleBanner->image) ? asset($psite->middleBanner->image) : null;
        $showMiddleBannerImageStyle = !is_null($middleBannerImageUrl) ? "background-image: url('$middleBannerImageUrl'); height: 100%; width: 100%; background-size: cover;" : '';
        
        return view('frontend.pages.private-page.private-page-index.index', compact(
            'psite', 
            'qrCode', 
            'selling', 
            'investment', 
            'bid', 
            'inquiry', 
            'contractor',
            'showAdsSection',
            'showMiddleBannerImageStyle'
        ));
    }
}
