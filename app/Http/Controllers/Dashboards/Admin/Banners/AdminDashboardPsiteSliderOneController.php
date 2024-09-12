<?php

namespace App\Http\Controllers\Dashboards\Admin\Banners;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\Banners\BannerPsitePage;
use App\Rules\Dashboards\Banners\PsiteBanners\BannerImagePsiteSliderOneImageOneValidationRule;

class AdminDashboardPsiteSliderOneController extends Controller
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

        $psiteFirstSliderSlideOne = BannerPsitePage::where('position', 'psite_first_slider_slide_one')->first();
        $psiteFirstSliderSlideTwo = BannerPsitePage::where('position', 'psite_first_slider_slide_two')->first();
        $psiteFirstSliderSlideThree = BannerPsitePage::where('position', 'psite_first_slider_slide_three')->first();
        $psiteFirstSliderSlideFour = BannerPsitePage::where('position', 'psite_first_slider_slide_four')->first();
        $psiteFirstSliderSlideFive = BannerPsitePage::where('position', 'psite_first_slider_slide_five')->first();
        
        return view('dashboards.users.admin.pages.dynaimc-banners.psite-sidebar-banner.index', compact(
            'user',
            'psiteFirstSliderSlideOne',
            'psiteFirstSliderSlideTwo', 
            'psiteFirstSliderSlideThree',
            'psiteFirstSliderSlideFour',
            'psiteFirstSliderSlideFive',
        ));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'custom_validation' => new BannerImagePsiteSliderOneImageOneValidationRule($request),
        ]);
     
        // slide one operation
        $filenamePsiteSlideOne = $this->uploadSlideOneImageHandler($request->slider_image_one);
        $this->isertIntoDbSlideOne($filenamePsiteSlideOne, $request);

        // slide two operation
        $filenamePsiteSlideTwo = $this->uploadSlideTwoImageHandler($request->slider_image_two);
        $this->isertIntoDbSlideTwo($filenamePsiteSlideTwo, $request);
        
        // slide three operation
        $filenamePsiteSlideThree = $this->uploadSlideThreeImageHandler($request->slider_image_three);
        $this->isertIntoDbSlideThree($filenamePsiteSlideThree, $request);

        // slide four operation
        $filenamePsiteSlideFour = $this->uploadSlideFourImageHandler($request->slider_image_four);
        $this->isertIntoDbSlideFour($filenamePsiteSlideFour, $request);

        // slide five operation
        $filenamePsiteSlideFive = $this->uploadSlideFiveImageHandler($request->slider_image_five);
        $this->isertIntoDbSlideFive($filenamePsiteSlideFive, $request);

        return redirect(route('admin.dashboard.dynamic-banners.psite-slider-one-banner.index'))->with('success', 'تنظیمات مورد نظر با موفقیت ذخیره گردید.');
    }

    // slide one operation
    private function uploadSlideOneImageHandler($sliderImageOne) {

        // return null if no image has been selected
        if(is_null($sliderImageOne)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerPsitePage::where('position', 'psite_first_slider_slide_one')->exists()) {
            unlink(BannerPsitePage::where('position', 'psite_first_slider_slide_one')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideOne = hexdec(uniqid());
        $filenamePsiteSlideOne = $uniqueImageSlideOne . '.' . $sliderImageOne->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenamePsiteSlideOne, file_get_contents($sliderImageOne));
      
        return $dir . '/' . $filenamePsiteSlideOne;
    }
    private function isertIntoDbSlideOne($filenamePsiteSlideOne, $request) {
        // slider crud operation
        if(!is_null($filenamePsiteSlideOne)) {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_one',
            ],[
                'position' => 'psite_first_slider_slide_one',
                'image' => $filenamePsiteSlideOne,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_one),
            ]);
        } else {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_one',
            ],[
                'position' => 'psite_first_slider_slide_one',
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
        if(BannerPsitePage::where('position', 'psite_first_slider_slide_two')->exists()) {
            unlink(BannerPsitePage::where('position', 'psite_first_slider_slide_two')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideTwo = hexdec(uniqid());
        $filenamePsiteSlideTwo = $uniqueImageSlideTwo . '.' . $sliderImageTwo->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenamePsiteSlideTwo, file_get_contents($sliderImageTwo));
      
        return $dir . '/' . $filenamePsiteSlideTwo;
    }
    private function isertIntoDbSlideTwo($filenamePsiteSlideTwo, $request) {

        // check if valid image has been uploaded
        $psiteFirstSliderSlideTwo = BannerPsitePage::where('position', 'psite_first_slider_slide_two')->first();
        if(!$psiteFirstSliderSlideTwo && is_null($request->slider_image_two)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenamePsiteSlideTwo)) {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_two',
            ],[
                'position' => 'psite_first_slider_slide_two',
                'image' => $filenamePsiteSlideTwo,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_two),
            ]);
        } else {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_two',
            ],[
                'position' => 'psite_first_slider_slide_two',
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
        if(BannerPsitePage::where('position', 'psite_first_slider_slide_three')->exists()) {
            unlink(BannerPsitePage::where('position', 'psite_first_slider_slide_three')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideThree = hexdec(uniqid());
        $filenamePsiteSlideThree = $uniqueImageSlideThree . '.' . $sliderImageThree->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenamePsiteSlideThree, file_get_contents($sliderImageThree));
      
        return $dir . '/' . $filenamePsiteSlideThree;
    }
    private function isertIntoDbSlideThree($filenamePsiteSlideThree, $request) {

        // check if valid image has been uploaded
        $psiteFirstSliderSlideThree = BannerPsitePage::where('position', 'psite_first_slider_slide_three')->first();
        if(!$psiteFirstSliderSlideThree && is_null($request->slider_image_three)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenamePsiteSlideThree)) {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_three',
            ],[
                'position' => 'psite_first_slider_slide_three',
                'image' => $filenamePsiteSlideThree,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_three),
            ]);
        } else {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_three',
            ],[
                'position' => 'psite_first_slider_slide_three',
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
        if(BannerPsitePage::where('position', 'psite_first_slider_slide_four')->exists()) {
            unlink(BannerPsitePage::where('position', 'psite_first_slider_slide_four')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFour = hexdec(uniqid());
        $filenamePsiteSlideFour = $uniqueImageSlideFour . '.' . $sliderImageFour->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenamePsiteSlideFour, file_get_contents($sliderImageFour));
      
        return $dir . '/' . $filenamePsiteSlideFour;
    }
    private function isertIntoDbSlideFour($filenamePsiteSlideFour, $request) {

        // check if valid image has been uploaded
        $psiteFirstSliderSlideFour = BannerPsitePage::where('position', 'psite_first_slider_slide_four')->first();
        if(!$psiteFirstSliderSlideFour && is_null($request->slider_image_four)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenamePsiteSlideFour)) {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_four',
            ],[
                'position' => 'psite_first_slider_slide_four',
                'image' => $filenamePsiteSlideFour,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_four),
            ]);
        } else {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_four',
            ],[
                'position' => 'psite_first_slider_slide_four',
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
        if(BannerPsitePage::where('position', 'psite_first_slider_slide_five')->exists()) {
            unlink(BannerPsitePage::where('position', 'psite_first_slider_slide_five')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFive = hexdec(uniqid());
        $filenamePsiteSlideFive = $uniqueImageSlideFive . '.' . $sliderImageFive->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenamePsiteSlideFive, file_get_contents($sliderImageFive));
      
        return $dir . '/' . $filenamePsiteSlideFive;
    }
    private function isertIntoDbSlideFive($filenamePsiteSlideFive, $request) {

        // check if valid image has been uploaded
        $psiteFirstSliderSlideFive = BannerPsitePage::where('position', 'psite_first_slider_slide_five')->first();
        if(!$psiteFirstSliderSlideFive && is_null($request->slider_image_five)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenamePsiteSlideFive)) {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_five',
            ],[
                'position' => 'psite_first_slider_slide_five',
                'image' => $filenamePsiteSlideFive,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        } else {
            // insert slider banner into db
            BannerPsitePage::updateOrCreate([
                'position' => 'psite_first_slider_slide_five',
            ],[
                'position' => 'psite_first_slider_slide_five',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        }
    }
}
