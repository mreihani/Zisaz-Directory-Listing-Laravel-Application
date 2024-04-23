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

    // سرچ بار
    public $searchResults;

    public function mount() {
       
        // set initial value of category filter to null
        $this->filteredCollection = null;

        // set initial value of sidebar category filter to null for ads
        $this->sidebarCategoryFilterCollection = null;

        // set initial value of search bar results to null
        $this->searchResults = null;

        // load selling ads with eager loading
        $this->sellingAds = Activity::where('activity_type','ads_registration')->has('selling')->with('selling')->orderBy('updated_at', 'DESC')->get()->take(3);
                
        // load employee ads with eager loading
        $this->employeeAds = Activity::where('activity_type','ads_registration')->withWhereHas('employment', function($q){
            $q->where('ads_type', '=', 'employee');
        })->orderBy('updated_at', 'DESC')->get()->take(3);

        // load emoployer ads with eager loading
        $this->employerAds = Activity::where('activity_type','ads_registration')->withWhereHas('employment', function($q){
            $q->where('ads_type', '=', 'employer');
        })->orderBy('updated_at', 'DESC')->get()->take(3);

        // load investor ads with eager loading
        $this->investorAds = Activity::where('activity_type','ads_registration')->withWhereHas('investment', function($q){
            $q->where('ads_type', '=', 'investor');
        })->orderBy('updated_at', 'DESC')->get()->take(3);

        // load invested ads with eager loading
        $this->investedAds = Activity::where('activity_type','ads_registration')->withWhereHas('investment', function($q){
            $q->where('ads_type', '=', 'invested');
        })->orderBy('updated_at', 'DESC')->get()->take(3);

        // load all ads with eager loading
        $this->adsRegistrations = Activity::where('activity_type','ads_registration')->with('subactivity')->orderBy('updated_at', 'DESC')->get();

        // load filter category items
        // مربوط به آگهی ها می شود
        $this->actGrpsEngAdsArray = ActGrp::find([190,191,192,193,194,195,196,197,198]);
        $this->actGrpsManagerAdsArray = ActGrp::find([221,222,223,224,225,226,227,228,229,230,231]);
        $this->actGrpsTechnicalAdsArray = ActGrp::find([169,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,154,155,156,157,158,159,160,161,162,163,164,165,166,167]);
        $this->actGrpsShopArray = ActCat::find(19)->activityGroup;
    }

    // فیلتر صفحه اصلی که دکمه مشاهده بیشتر دارد
    public function loadSpecificCategory($categoryFilter, $type) {
        $this->sidebarCategoryFilterCollectionAds = null;
        $this->categoryFilter = $categoryFilter;
        $this->type = $type;
        $this->filteredCollection = $categoryFilter::where('ads_type', $type)->orderBy('updated_at', 'DESC')->get();
    }

    // فیلتر سایدبار برای آگهی ها
    public function loadSpecificCategorySidebarFilterAds($actGrpsId, $type) {
        $this->filteredCollection = null;
        $this->type = $type;
        $this->sidebarCategoryFilterCollectionAds = ActGrp::find($actGrpsId)->activity;
    }

    // سرچ بار
    protected $listeners = [
        'searchResults' => 'searchResults',
    ];
    public function searchResults($searchResults) {
        $this->searchResults = Activity::find($searchResults);
    }

    public function render()
    {
        return view('frontend.pages.home.livewire-components.main-content');
    }
}
