<?php

namespace App\Http\Controllers\Dashboards\Admin\Banners;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\Banners\BannerAdsPage;
use App\Rules\Dashboards\Banners\AdsBanners\BannerImageAdsSliderOneImageOneValidationRule;


class AdminDashboardAdsSliderOneController extends Controller
{
    public function __construct() {
        $this->middleware('can:banners_index,user')->only(['index']);
        $this->middleware('can:banners_store,user')->only(['store']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $adsFirstSliderSlideOne = BannerAdsPage::where('position', 'ads_first_slider_slide_one')->first();
        $adsFirstSliderSlideTwo = BannerAdsPage::where('position', 'ads_first_slider_slide_two')->first();
        $adsFirstSliderSlideThree = BannerAdsPage::where('position', 'ads_first_slider_slide_three')->first();
        $adsFirstSliderSlideFour = BannerAdsPage::where('position', 'ads_first_slider_slide_four')->first();
        $adsFirstSliderSlideFive = BannerAdsPage::where('position', 'ads_first_slider_slide_five')->first();
        
        return view('dashboards.users.admin.pages.dynaimc-banners.ads-top-banner.index', compact(
            'user',
            'adsFirstSliderSlideOne',
            'adsFirstSliderSlideTwo', 
            'adsFirstSliderSlideThree',
            'adsFirstSliderSlideFour',
            'adsFirstSliderSlideFive',
        ));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'custom_validation' => new BannerImageAdsSliderOneImageOneValidationRule($request),
        ]);
     
        // slide one operation
        $filenameAdsSlideOne = $this->uploadSlideOneImageHandler($request->slider_image_one);
        $this->insertIntoDbSlideOne($filenameAdsSlideOne, $request);

        // slide two operation
        $filenameAdsSlideTwo = $this->uploadSlideTwoImageHandler($request->slider_image_two);
        $this->insertIntoDbSlideTwo($filenameAdsSlideTwo, $request);
        
        // slide three operation
        $filenameAdsSlideThree = $this->uploadSlideThreeImageHandler($request->slider_image_three);
        $this->insertIntoDbSlideThree($filenameAdsSlideThree, $request);

        // slide four operation
        $filenameAdsSlideFour = $this->uploadSlideFourImageHandler($request->slider_image_four);
        $this->insertIntoDbSlideFour($filenameAdsSlideFour, $request);

        // slide five operation
        $filenameAdsSlideFive = $this->uploadSlideFiveImageHandler($request->slider_image_five);
        $this->insertIntoDbSlideFive($filenameAdsSlideFive, $request);

        return redirect(route('admin.dashboard.dynamic-banners.ads-slider-one-banner.index'))->with('success', 'تنظیمات مورد نظر با موفقیت ذخیره گردید.');
    }

    // slide one operation
    private function uploadSlideOneImageHandler($sliderImageOne) {

        // return null if no image has been selected
        if(is_null($sliderImageOne)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerAdsPage::where('position', 'ads_first_slider_slide_one')->exists()) {
            unlink(BannerAdsPage::where('position', 'ads_first_slider_slide_one')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideOne = hexdec(uniqid());
        $filenameAdsSlideOne = $uniqueImageSlideOne . '.' . $sliderImageOne->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameAdsSlideOne, file_get_contents($sliderImageOne));
      
        return $dir . '/' . $filenameAdsSlideOne;
    }
    private function insertIntoDbSlideOne($filenameAdsSlideOne, $request) {
        // slider crud operation
        if(!is_null($filenameAdsSlideOne)) {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_one',
            ],[
                'position' => 'ads_first_slider_slide_one',
                'image' => $filenameAdsSlideOne,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_one),
            ]);
        } else {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_one',
            ],[
                'position' => 'ads_first_slider_slide_one',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_one),
            ]);
        }
    }

    // slide two operation
    private function uploadSlideTwoImageHandler($sliderImageTwo) {

        // return null if no image has been selected
        if(is_null($sliderImageTwo)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerAdsPage::where('position', 'ads_first_slider_slide_two')->exists()) {
            unlink(BannerAdsPage::where('position', 'ads_first_slider_slide_two')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideTwo = hexdec(uniqid());
        $filenameAdsSlideTwo = $uniqueImageSlideTwo . '.' . $sliderImageTwo->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameAdsSlideTwo, file_get_contents($sliderImageTwo));
      
        return $dir . '/' . $filenameAdsSlideTwo;
    }
    private function insertIntoDbSlideTwo($filenameAdsSlideTwo, $request) {

        // check if valid image has been uploaded
        $adsFirstSliderSlideTwo = BannerAdsPage::where('position', 'ads_first_slider_slide_two')->first();
        if(!$adsFirstSliderSlideTwo && is_null($request->slider_image_two)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameAdsSlideTwo)) {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_two',
            ],[
                'position' => 'ads_first_slider_slide_two',
                'image' => $filenameAdsSlideTwo,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_two),
            ]);
        } else {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_two',
            ],[
                'position' => 'ads_first_slider_slide_two',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_two),
            ]);
        }
    }

    // slide three operation
    private function uploadSlideThreeImageHandler($sliderImageThree) {

        // return null if no image has been selected
        if(is_null($sliderImageThree)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerAdsPage::where('position', 'ads_first_slider_slide_three')->exists()) {
            unlink(BannerAdsPage::where('position', 'ads_first_slider_slide_three')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideThree = hexdec(uniqid());
        $filenameAdsSlideThree = $uniqueImageSlideThree . '.' . $sliderImageThree->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameAdsSlideThree, file_get_contents($sliderImageThree));
      
        return $dir . '/' . $filenameAdsSlideThree;
    }
    private function insertIntoDbSlideThree($filenameAdsSlideThree, $request) {

        // check if valid image has been uploaded
        $adsFirstSliderSlideThree = BannerAdsPage::where('position', 'ads_first_slider_slide_three')->first();
        if(!$adsFirstSliderSlideThree && is_null($request->slider_image_three)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameAdsSlideThree)) {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_three',
            ],[
                'position' => 'ads_first_slider_slide_three',
                'image' => $filenameAdsSlideThree,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_three),
            ]);
        } else {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_three',
            ],[
                'position' => 'ads_first_slider_slide_three',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_three),
            ]);
        }
    }

    // slide four operation
    private function uploadSlideFourImageHandler($sliderImageFour) {

        // return null if no image has been selected
        if(is_null($sliderImageFour)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerAdsPage::where('position', 'ads_first_slider_slide_four')->exists()) {
            unlink(BannerAdsPage::where('position', 'ads_first_slider_slide_four')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFour = hexdec(uniqid());
        $filenameAdsSlideFour = $uniqueImageSlideFour . '.' . $sliderImageFour->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameAdsSlideFour, file_get_contents($sliderImageFour));
      
        return $dir . '/' . $filenameAdsSlideFour;
    }
    private function insertIntoDbSlideFour($filenameAdsSlideFour, $request) {

        // check if valid image has been uploaded
        $adsFirstSliderSlideFour = BannerAdsPage::where('position', 'ads_first_slider_slide_four')->first();
        if(!$adsFirstSliderSlideFour && is_null($request->slider_image_four)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameAdsSlideFour)) {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_four',
            ],[
                'position' => 'ads_first_slider_slide_four',
                'image' => $filenameAdsSlideFour,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_four),
            ]);
        } else {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_four',
            ],[
                'position' => 'ads_first_slider_slide_four',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_four),
            ]);
        }
    }

    // slide five operation
    private function uploadSlideFiveImageHandler($sliderImageFive) {

        // return null if no image has been selected
        if(is_null($sliderImageFive)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerAdsPage::where('position', 'ads_first_slider_slide_five')->exists()) {
            unlink(BannerAdsPage::where('position', 'ads_first_slider_slide_five')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFive = hexdec(uniqid());
        $filenameAdsSlideFive = $uniqueImageSlideFive . '.' . $sliderImageFive->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameAdsSlideFive, file_get_contents($sliderImageFive));
      
        return $dir . '/' . $filenameAdsSlideFive;
    }
    private function insertIntoDbSlideFive($filenameAdsSlideFive, $request) {

        // check if valid image has been uploaded
        $adsFirstSliderSlideFive = BannerAdsPage::where('position', 'ads_first_slider_slide_five')->first();
        if(!$adsFirstSliderSlideFive && is_null($request->slider_image_five)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameAdsSlideFive)) {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_five',
            ],[
                'position' => 'ads_first_slider_slide_five',
                'image' => $filenameAdsSlideFive,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        } else {
            // insert slider banner into db
            BannerAdsPage::updateOrCreate([
                'position' => 'ads_first_slider_slide_five',
            ],[
                'position' => 'ads_first_slider_slide_five',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        }
    }
}
