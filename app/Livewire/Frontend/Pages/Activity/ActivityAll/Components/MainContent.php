<?php

namespace App\Livewire\Frontend\Pages\Activity\ActivityAll\Components;

use Livewire\Component;
use App\Models\Frontend\Banners\BannerAdsPage;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Models\Frontend\ReferenceData\Category\Category;
use App\Models\Frontend\ReferenceData\ProvinceAndCity\Province;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActCat;
use App\Models\Frontend\ReferenceData\Construction\Skill\ActGrp;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;

class MainContent extends Component
{
    public $adsFirstSliderSlideOne;
    public $adsFirstSliderSlideTwo;
    public $adsFirstSliderSlideThree;
    public $adsFirstSliderSlideFour;
    public $adsFirstSliderSlideFive;

    public $selectedSortOption;

    // این رو از کنترولر اصلی دریافت می کنه برای وقتی که پارامتر کوئری داشته باشی
    public $activities;
    
    // فیلتر  دسته بندی سایدبار برای آگهی ها
    public $sidebarFilterCollection;

    // categories
    public $parentCategories;
    public $subCategories;

    // filter categoy items
    // مربوط به آگهی ها می شود
    // public $actGrpsEngAdsArray;
    // public $actGrpsManagerAdsArray;
    // public $actGrpsTechnicalAdsArray;
    // public $actGrpsShopArray;
    // public $actGrpsAuctionArray;
    // public $actGrpsTenderBuyArray;
    // public $actGrpsTenderProjectArray;
    // public $actGrpsInquiryBuyProjectArray;
    // public $actGrpsInquiryProjectArray;
    // public $actGrpsContractorArray;

    // public $selectedSellingCategory;
    // public $selectedEmployeeCategory;
    // public $selectedEmployerCategory;
    // public $selectedAuctionCategory;
    // public $selectedTenderBuyCategory;
    // public $selectedTenderProjectCategory;
    // public $selectedInquiryBuyProjectCategory;
    // public $selectedInquiryProjectCategory;
    // public $selectedContractorCategory;

    // public $selectedInvested;
    // public $selectedInvestor;

    public $provinces;
    public $selectedProvinceId;
    public $cities;
    public $selectedCityId;

    public function mount() {

        // بارگذاری بنر بالای صفحه
        $this->adsFirstSliderSlideOne = BannerAdsPage::where('position', 'ads_first_slider_slide_one')->first();
        $this->adsFirstSliderSlideTwo = BannerAdsPage::where('position', 'ads_first_slider_slide_two')->first();
        $this->adsFirstSliderSlideThree = BannerAdsPage::where('position', 'ads_first_slider_slide_three')->first();
        $this->adsFirstSliderSlideFour = BannerAdsPage::where('position', 'ads_first_slider_slide_four')->first();
        $this->adsFirstSliderSlideFive = BannerAdsPage::where('position', 'ads_first_slider_slide_five')->first();
       
        // set initial value of sidebar category filter to null for ads
        $this->sidebarCategoryFilterCollection = null;

        // parent categories
        $this->parentCategories = Category::where('parent', 0)->get();
        // sub categories
        $this->subCategories = [];

        // load filter category items
        // مربوط به آگهی ها می شود
        // $this->actGrpsTechnicalAdsArray = ActCat::find(14)->activityGroup;
        // $this->actGrpsEngAdsArray = ActCat::find(15)->activityGroup;
        // $this->actGrpsManagerAdsArray = ActCat::find(16)->activityGroup;
        // $this->actGrpsShopArray = ActCat::find(19)->activityGroup;
        // $this->actGrpsAuctionArray = ActCat::find(20)->activityGroup;
        // $this->actGrpsTenderBuyArray = ActCat::find(21)->activityGroup;
        // $this->actGrpsTenderProjectArray = ActCat::find(22)->activityGroup;
        // $this->actGrpsInquiryBuyProjectArray = ActCat::find(23)->activityGroup;
        // $this->actGrpsInquiryProjectArray = ActCat::find(24)->activityGroup;
        // $this->actGrpsContractorArray = ActCat::find(25)->activityGroup;

        // $this->selectedSellingCategory = [];
        // $this->selectedEmployeeCategory = [];
        // $this->selectedEmployerCategory = [];
        // $this->selectedAuctionCategory = [];
        // $this->selectedTenderBuyCategory = [];
        // $this->selectedTenderProjectCategory = [];
        // $this->selectedInquiryBuyProjectCategory = [];
        // $this->selectedInquiryProjectCategory = [];
        // $this->selectedContractorCategory = [];

        // $this->selectedInvested = null;
        // $this->selectedInvestor = null;

        $this->provinces = Province::all();
        $this->cities = [];
        $this->selectedProvinceId = '';
        $this->selectedCityId = '';
    }

    // ایجاد آرایه ای از آیتم های انتخاب شده
    private function selectedCategoryArray($categoryArray) {

        $selectedArray = [];

        foreach ($categoryArray as $key => $item) {
            if($item) {
                $selectedArray[] = $key;
            }
        }

        return $selectedArray;
    } 

    public function loadCitiesByProvinceChange() {
        $selectedProvinceId = $this->selectedProvinceId;
        $this->cities = Province::find($selectedProvinceId)->city;
        $this->selectedCityId = $this->cities->first()->id;
    }

    public function selectedCategory($id) {
        $this->subCategories = Category::findOrFail($id)->child;
    }

    public function showAllItems() {
        $this->subCategories = [];
    }

    public function handleFilterButton() {
       
        // $selectedSellingCategoryArray = !empty($this->selectedCategoryArray($this->selectedSellingCategory)) ? $this->selectedCategoryArray($this->selectedSellingCategory) : null;
        // $selectedEmployeeCategoryArray = !empty($this->selectedCategoryArray($this->selectedEmployeeCategory)) ? $this->selectedCategoryArray($this->selectedEmployeeCategory) : null;
        // $selectedEmployerCategoryArray = !empty($this->selectedCategoryArray($this->selectedEmployerCategory)) ? $this->selectedCategoryArray($this->selectedEmployerCategory) : null;
        // $selectedAuctionCategoryArray = !empty($this->selectedCategoryArray($this->selectedAuctionCategory)) ? $this->selectedCategoryArray($this->selectedAuctionCategory) : null;
        // $selectedTenderBuyCategoryArray = !empty($this->selectedCategoryArray($this->selectedTenderBuyCategory)) ? $this->selectedCategoryArray($this->selectedTenderBuyCategory) : null;
        // $selectedTenderProjectCategoryArray = !empty($this->selectedCategoryArray($this->selectedTenderProjectCategory)) ? $this->selectedCategoryArray($this->selectedTenderProjectCategory) : null;
        // $selectedInquiryBuyProjectCategoryArray = !empty($this->selectedCategoryArray($this->selectedInquiryBuyProjectCategory)) ? $this->selectedCategoryArray($this->selectedInquiryBuyProjectCategory) : null;
        // $selectedInquiryProjectCategoryArray = !empty($this->selectedCategoryArray($this->selectedInquiryProjectCategory)) ? $this->selectedCategoryArray($this->selectedInquiryProjectCategory) : null;
        // $selectedContractorCategoryArray = !empty($this->selectedCategoryArray($this->selectedContractorCategory)) ? $this->selectedCategoryArray($this->selectedContractorCategory) : null;
        // $selectedInvested = $this->selectedInvested ? $this->selectedInvested : null;
        // $selectedInvestor = $this->selectedInvestor ? $this->selectedInvestor : null;
        $selectedCityId = !empty($this->selectedCityId) ? $this->selectedCityId : null;
      
        if($this->selectedSortOption === 'newest' || is_null($this->selectedSortOption)) {
            $selectedSortOption = 'desc';
        } else {
            $selectedSortOption = 'asc';
        }

        // $this->sidebarFilterCollection = Activity::query()
        // ->when(
        //     // اینجا تمامی دسته بندی ها به صورت گروهی با این متد دریافت می شود
        // $selectedSellingCategoryArray 
        // || $selectedEmployeeCategoryArray 
        // || $selectedEmployerCategoryArray
        // || $selectedAuctionCategoryArray
        // || $selectedTenderBuyCategoryArray
        // || $selectedTenderProjectCategoryArray
        // || $selectedInquiryBuyProjectCategoryArray
        // || $selectedInquiryProjectCategoryArray
        // || $selectedContractorCategoryArray
        // || $selectedInvested
        // || $selectedInvestor
        
        // , function ($query) use (
        // $selectedSellingCategoryArray, 
        // $selectedEmployeeCategoryArray, 
        // $selectedEmployerCategoryArray, 
        // $selectedAuctionCategoryArray,
        // $selectedTenderBuyCategoryArray,
        // $selectedTenderProjectCategoryArray,
        // $selectedInquiryBuyProjectCategoryArray,
        // $selectedInquiryProjectCategoryArray,
        // $selectedContractorCategoryArray,
        // $selectedInvested,
        // $selectedInvestor) {
        //     // here first we implement AND condition using this $query->where() method below
        //     // we implement AND for all 11 categories together below, however, inside each of them we use orWhere to include each possible category
        //     $query->where(function ($query) use (
        //     $selectedSellingCategoryArray, 
        //     $selectedEmployeeCategoryArray, 
        //     $selectedEmployerCategoryArray, 
        //     $selectedAuctionCategoryArray,
        //     $selectedTenderBuyCategoryArray,
        //     $selectedTenderProjectCategoryArray,
        //     $selectedInquiryBuyProjectCategoryArray,
        //     $selectedInquiryProjectCategoryArray,
        //     $selectedContractorCategoryArray,
        //     $selectedInvested,
        //     $selectedInvestor) {

        //         // دسته بندی فروش کالا
        //         if ($selectedSellingCategoryArray) {
        //             $query->orWhereHas('selling', function($q){
        //                 $q->where('type','selling');
        //             })->whereHas('activityGroups', function ($q) use ($selectedSellingCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedSellingCategoryArray);
        //             });
        //         }

        //         // دسته بندی استخدام - کارجو
        //         if ($selectedEmployeeCategoryArray) {
        //             $query->orWhereHas('employment', function($q){
        //                 $q->where('type','employee');
        //             })->whereHas('activityGroups', function ($q) use ($selectedEmployeeCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedEmployeeCategoryArray);
        //             });
        //         }

        //         // دسته بندی استخدام - کارفرما
        //         if($selectedEmployerCategoryArray) {
        //             $query->orWhereHas('employment', function($q){
        //                 $q->where('type','employer');
        //             })->whereHas('activityGroups', function ($q) use ($selectedEmployerCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedEmployerCategoryArray);
        //             });
        //         }

        //         // دسته بندی مزایده
        //         if($selectedAuctionCategoryArray) {
        //             $query->orWhereHas('bid', function($q){
        //                 $q->where('type','auction');
        //             })->whereHas('activityGroups', function ($q) use ($selectedAuctionCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedAuctionCategoryArray);
        //             });
        //         }

        //         // دسته بندی مناقصه خرید
        //         if($selectedTenderBuyCategoryArray) {
        //             $query->orWhereHas('bid', function($q){
        //                 $q->where('type','tender_buy');
        //             })->whereHas('activityGroups', function ($q) use ($selectedTenderBuyCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedTenderBuyCategoryArray);
        //             });
        //         }

        //         // دسته بندی مناقصه اجرای پروژه
        //         if($selectedTenderProjectCategoryArray) {
        //             $query->orWhereHas('bid', function($q){
        //                 $q->where('type','tender_project');
        //             })->whereHas('activityGroups', function ($q) use ($selectedTenderProjectCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedTenderProjectCategoryArray);
        //             });
        //         }

        //         // دسته بندی استعلام قیمت خرید
        //         if($selectedInquiryBuyProjectCategoryArray) {
        //             $query->orWhereHas('inquiry', function($q){
        //                 $q->where('type','inquiry_buy');
        //             })->whereHas('activityGroups', function ($q) use ($selectedInquiryBuyProjectCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedInquiryBuyProjectCategoryArray);
        //             });
        //         }

        //         // دسته بندی استعلام قیمت پروژه
        //         if($selectedInquiryProjectCategoryArray) {
        //             $query->orWhereHas('inquiry', function($q){
        //                 $q->where('type','inquiry_project');
        //             })->whereHas('activityGroups', function ($q) use ($selectedInquiryProjectCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedInquiryProjectCategoryArray);
        //             });
        //         }

        //         // دسته بندی پیمانکاران
        //         if($selectedContractorCategoryArray) {
        //             $query->orWhereHas('contractor', function($q){
        //                 $q->where('type','contractor');
        //             })->whereHas('activityGroups', function ($q) use ($selectedContractorCategoryArray) {
        //                 $q->whereIn('act_grp_id', $selectedContractorCategoryArray);
        //             });
        //         }

        //         // دسته بندی سرمایه پذیر
        //         if($selectedInvested) {
        //             $query->orWhereHas('investment', function($q){
        //                 $q->where('type','invested');
        //             });
        //         }

        //         // دسته بندی سرمایه گذار
        //         if($selectedInvestor) {
        //             $query->orWhereHas('investment', function($q){
        //                 $q->where('type','investor');
        //             });
        //         }

        //     });
        // })
        // ->when($selectedCityId, function ($query) use ($selectedCityId) {
        //     // فیلتر مربوط به شهر یا مکان آگهی
        //     $query->withWhereHas('subactivity', function($q) use ($selectedCityId) {
        //         $q->whereHas('city', function ($q) use ($selectedCityId) {
        //             $q->where('id', $selectedCityId);
        //         });
        //     });
        // })
        // ->when($selectedSortOption, function ($query) use ($selectedSortOption) {
        //     //  فیلتر مربوط به جدیدترین یا قدیمی ترین آگهی
        //     $query->orderBy('updated_at', $selectedSortOption);
        // })
        // ->get();
    }

    public function resetFilterButton() {
        // $this->selectedSellingCategory = [];
        // $this->selectedEmployeeCategory = [];
        // $this->selectedEmployerCategory = [];
        // $this->selectedAuctionCategory = [];
        // $this->selectedTenderBuyCategory = [];
        // $this->selectedTenderProjectCategory = [];
        // $this->selectedInquiryBuyProjectCategory = [];
        // $this->selectedInquiryProjectCategory = [];
        // $this->selectedContractorCategory = [];
        // $this->selectedInvested = null;
        // $this->selectedInvestor = null;

        $this->cities = [];
        $this->selectedProvinceId = '';
        $this->selectedCityId = '';

        $this->selectedSortOption = 'newest';
    }

    public function render()
    {
        return view('frontend.pages.activity.activity-all.all-types.livewire-components.main-content');
    }
}
