<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityAll\Components;

use Livewire\Component;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;

class MainContent extends Component
{
    // این رو از کنترولر اصلی دریافت می کنه برای وقتی که پارامتر کوئری داشته باشی
    public $activities;
    
    // فیلتر  دسته بندی سایدبار برای آگهی ها
    public $sidebarCategoryFilterCollectionAds;
    public $type;

    // filter categoy items
    // مربوط به آگهی ها می شود
    public $actGrpsEngAdsArray;
    public $actGrpsManagerAdsArray;
    public $actGrpsTechnicalAdsArray;
    public $actGrpsShopArray;
    public $actGrpsAuctionArray;
    public $actGrpsTenderBuyArray;
    public $actGrpsTenderProjectArray;
    public $actGrpsInquiryBuyProjectArray;
    public $actGrpsInquiryProjectArray;
    public $actGrpsContractorArray;

    // سرچ بار
    public $searchResults;

    public function mount() {
       
        // set initial value of sidebar category filter to null for ads
        $this->sidebarCategoryFilterCollection = null;

        // set initial value of search bar results to null
        $this->searchResults = null;

        // load filter category items
        // مربوط به آگهی ها می شود
        $this->actGrpsTechnicalAdsArray = ActCat::find(14)->activityGroup;
        $this->actGrpsEngAdsArray = ActCat::find(15)->activityGroup;
        $this->actGrpsManagerAdsArray = ActCat::find(16)->activityGroup;
        $this->actGrpsShopArray = ActCat::find(19)->activityGroup;
        $this->actGrpsAuctionArray = ActCat::find(20)->activityGroup;
        $this->actGrpsTenderBuyArray = ActCat::find(21)->activityGroup;
        $this->actGrpsTenderProjectArray = ActCat::find(22)->activityGroup;
        $this->actGrpsInquiryBuyProjectArray = ActCat::find(23)->activityGroup;
        $this->actGrpsInquiryProjectArray = ActCat::find(24)->activityGroup;
        $this->actGrpsContractorArray = ActCat::find(25)->activityGroup;
    }

    // فیلتر صفحه اصلی برای آیتم هایی که دسته بندی ست نشده روشون
    // مثل سرمایه گذار و سرمایه پذیر
    public function loadSpecificCategory($categoryFilter, $type) {
        $this->searchResults = null;
        $this->type = $type;
        $this->sidebarCategoryFilterCollectionAds = $categoryFilter::where('type', $type)->get()->pluck('activity');
    }

    // فیلتر سایدبار برای آگهی ها
    public function loadSpecificCategorySidebarFilterAds($actGrpsId, $type) {
        $this->searchResults = null;
        $this->type = $type;
        $this->sidebarCategoryFilterCollectionAds = ActGrp::find($actGrpsId)->activity;
    }

    // سرچ بار
    protected $listeners = [
        'searchResults' => 'searchResults',
    ];
    public function searchResults($searchResults) {
        $this->sidebarCategoryFilterCollection = null;
        $this->searchResults = Activity::find($searchResults);
    }

    public function render()
    {
        return view('frontend.pages.activity.activity-all.livewire-components.main-content');
    }
}
