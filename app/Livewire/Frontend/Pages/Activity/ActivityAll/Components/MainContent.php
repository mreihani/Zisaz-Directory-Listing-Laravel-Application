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

    // آیتم های فیلتر دسته بندی داخل تایل در صفحه اصلی
    public $categoryFilter;
    public $type;
    public $filteredCollection;

    // فیلتر  دسته بندی سایدبار برای آگهی ها
    public $sidebarCategoryFilterCollectionAds;

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

        // load all ads with eager loading
        // $this->adsRegistrations = Activity::where('activity_type','ads_registration')->with('subactivity')->orderBy('updated_at', 'DESC')->get();

        // load filter category items
        // مربوط به آگهی ها می شود
        $this->actGrpsTechnicalAdsArray = ActCat::find(14)->activityGroup;
        $this->actGrpsEngAdsArray = ActCat::find(15)->activityGroup;
        $this->actGrpsManagerAdsArray = ActCat::find(16)->activityGroup;
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
        return view('frontend.pages.activity.activity-all.livewire-components.main-content');
    }
}
