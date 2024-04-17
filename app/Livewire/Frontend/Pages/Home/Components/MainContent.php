<?php

namespace App\Livewire\Frontend\Pages\Home\Components;

use Livewire\Component;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;

class MainContent extends Component
{
    // آیتم های فیلتر دسته بندی داخل تایل در صفحه اصلی
    public $categoryFilter;
    public $type;
    public $filteredCollection;

    // فیلتر  دسته بندی سایدبار برای آگهی ها
    public $sidebarCategoryFilterCollectionAds;

    public $sellingAds;
    public $employeeAds;
    public $employerAds;
    public $investorAds;
    public $investedAds;
    public $adsRegistrations;

    // filter categoy items
    // مربوط به آگهی ها می شود
    public $actGrpsEngAdsArray;
    public $actGrpsManagerAdsArray;
    public $actGrpsTechnicalAdsArray;
    public $actGrpsShopArray;

    public function mount() {

        // set initial value of category filter to null
        $this->categoryFilter = null;

        // set initial value of sidebar category filter to null for ads
        $this->sidebarCategoryFilterCollection = null;

        // load selling ads with eager loading
        $this->sellingAds = Activity::where('activity_type','ads_registration')->has('selling')->with('selling')->get()->take(3);
                
        // load employee ads with eager loading
        $this->employeeAds = Activity::where('activity_type','ads_registration')->withWhereHas('employment', function($q){
            $q->where('ads_type', '=', 'employee');
        })->get()->take(3);

        // load emoployer ads with eager loading
        $this->employerAds = Activity::where('activity_type','ads_registration')->withWhereHas('employment', function($q){
            $q->where('ads_type', '=', 'employer');
        })->get()->take(3);

        // load investor ads with eager loading
        $this->investorAds = Activity::where('activity_type','ads_registration')->withWhereHas('investment', function($q){
            $q->where('ads_type', '=', 'investor');
        })->get()->take(3);

        // load invested ads with eager loading
        $this->investedAds = Activity::where('activity_type','ads_registration')->withWhereHas('investment', function($q){
            $q->where('ads_type', '=', 'invested');
        })->get();

        // load all ads with eager loading
        $this->adsRegistrations = Activity::where('activity_type','ads_registration')->with('subactivity')->get();

        // load filter category items
        // مربوط به آگهی ها می شود
        $this->actGrpsEngAdsArray = ActGrp::find([190,191,192,193,194,195,196,197,198]);
        $this->actGrpsManagerAdsArray = ActGrp::find([221,222,223,224,225,226,227,228,229,230,231]);
        $this->actGrpsTechnicalAdsArray = ActGrp::find([169,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,154,155,156,157,158,159,160,161,162,163,164,165,166,167]);
        $this->actGrpsShopArray = ActCat::find(19)->activityGroup;
    }

    // فیلتر صفحه اصلی برای لود نشدن 3 مورد
    public function loadSpecificCategory($categoryFilter, $type) {
        $this->categoryFilter = $categoryFilter;
        $this->type = $type;
        $this->filteredCollection = $categoryFilter::where('ads_type', $type)->get();
    }

    // فیلتر سایدبار برای آگهی ها
    public function loadSpecificCategorySidebarFilterAds($actGrpsId, $type) {
        $this->type = $type;
        $this->sidebarCategoryFilterCollectionAds = ActGrp::find($actGrpsId)->activity;
    }

    public function render()
    {
        return view('frontend.pages.home.livewire-components.main-content');
    }
}
