<?php

namespace App\Http\Controllers\Frontend\FrontEndPages;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class PersonalWebsitePagesContoller extends Controller
{
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

        // load dynaimc projects section
        $projectType1 = !is_null($user->project) ? $user->project()->where('project_type', 1)->get()->filter()->take(3) : collect([]);
        $projectType2 = !is_null($user->project) ? $user->project()->where('project_type', 2)->get()->filter()->take(3) : collect([]);
        $projectType3 = !is_null($user->project) ? $user->project()->where('project_type', 3)->get()->filter()->take(3) : collect([]);
        $projectType4 = !is_null($user->project) ? $user->project()->where('project_type', 4)->get()->filter()->take(3) : collect([]);
        $projectType5 = !is_null($user->project) ? $user->project()->where('project_type', 5)->get()->filter()->take(3) : collect([]);
        $projectType6 = !is_null($user->project) ? $user->project()->where('project_type', 6)->get()->filter()->take(3) : collect([]);
        $projectType7 = !is_null($user->project) ? $user->project()->where('project_type', 7)->get()->filter()->take(3) : collect([]);
        $projectType8 = !is_null($user->project) ? $user->project()->where('project_type', 8)->get()->filter()->take(3) : collect([]);
        $projectType9 = !is_null($user->project) ? $user->project()->where('project_type', 9)->get()->filter()->take(3) : collect([]);
       
        // load dynamic ads section
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
            'showMiddleBannerImageStyle',
            'projectType1',
            'projectType2',
            'projectType3',
            'projectType4',
            'projectType5',
            'projectType6',
            'projectType7',
            'projectType8',
            'projectType9',
        ));
    }
}
