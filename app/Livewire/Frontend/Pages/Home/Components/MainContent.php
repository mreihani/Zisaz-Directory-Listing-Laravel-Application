<?php

namespace App\Livewire\Frontend\Pages\Home\Components;

use Livewire\Component;
use App\Models\Frontend\UserModels\Activity\Activity;

class MainContent extends Component
{
    public function render()
    {
        // load selling ads with eager loading
        $sellingAds = Activity::where('activity_type','ads_registration')->has('selling')->with('selling')->get();
        
        // load employee ads with eager loading
        $employeeAds = Activity::where('activity_type','ads_registration')->withWhereHas('employment', function($q){
            $q->where('employment_ads_type', '=', 'employee');
        })->get();

        // load emoployer ads with eager loading
        $employerAds = Activity::where('activity_type','ads_registration')->withWhereHas('employment', function($q){
            $q->where('employment_ads_type', '=', 'employer');
        })->get();

        // load investor ads with eager loading
        $investorAds = Activity::where('activity_type','ads_registration')->withWhereHas('investment', function($q){
            $q->where('investment_ads_type', '=', 'investor');
        })->get();

        // load invested ads with eager loading
        $investedAds = Activity::where('activity_type','ads_registration')->withWhereHas('investment', function($q){
            $q->where('investment_ads_type', '=', 'invested');
        })->get();


        // load all ads with eager loading
        $adsRegistrations = Activity::where('activity_type','ads_registration')->with('subactivity')->get();
        
        return view('frontend.pages.home.livewire-components.main-content', compact(
            'sellingAds',
            'employeeAds',
            'employerAds',
            'investorAds',
            'investedAds',
            'adsRegistrations'
        ));
    }
}
