<?php

namespace App\Http\Controllers\Frontend\FrontEndPages;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Frontend\UserModels\Mag\MagPost;
use App\Models\Frontend\Banners\BannerPsitePage;
use App\Models\Frontend\UserModels\PrivateSite\Psite;

class PersonalWebsitePagesContoller extends Controller
{
    // load users private websites
    public function site($slug) {

        if(auth()->check() && auth()->user()->role === 'admin') {
            $psite = Psite::queryWithAllVerificationStatuses()->where('slug', $slug)
            ->with([
                'info',
                'contactUs',
                'promotionalVideo',
                'licenses',
                'licenses.psiteLicenseItem',
                'members',
                'members.psiteMemberItem',
                ])
            ->first();
        } else {
            $psite = Psite::where('slug', $slug)
            ->with([
                'info',
                'contactUs',
                'promotionalVideo',
                'licenses',
                'licenses.psiteLicenseItem',
                'members',
                'members.psiteMemberItem',
                ])
            ->first();
        }

        if(!$psite) {
            abort(404);
        }

        $psite->setSeoMeta();

        // load five types of ads items related to the user
        $user = $psite->user;

        // load dynamic ads section
        $ads = !is_null($user->activity) ? $user->activity()->with('subactivity')->get()->pluck('subactivity')->filter()->take(6) : collect([]);

        // load project section
        $projects = $user->project->take(6);

        // load mag
        $mags = MagPost::with('magazineCategory')->latest()->get()->take(3);

        // banner on the sidebar
        $psiteFirstSliderSlideOne = BannerPsitePage::where('position', 'psite_first_slider_slide_one')->first();
        $psiteFirstSliderSlideTwo = BannerPsitePage::where('position', 'psite_first_slider_slide_two')->first();
        $psiteFirstSliderSlideThree = BannerPsitePage::where('position', 'psite_first_slider_slide_three')->first();
        $psiteFirstSliderSlideFour = BannerPsitePage::where('position', 'psite_first_slider_slide_four')->first();
        $psiteFirstSliderSlideFive = BannerPsitePage::where('position', 'psite_first_slider_slide_five')->first();

        return view('frontend.pages.private-page.private-page-index.index', compact(
            'psite', 
            'ads', 
            'projects', 
            'mags', 
            'psiteFirstSliderSlideOne',
            'psiteFirstSliderSlideTwo', 
            'psiteFirstSliderSlideThree',
            'psiteFirstSliderSlideFour',
            'psiteFirstSliderSlideFive',
        ));
    }
}
