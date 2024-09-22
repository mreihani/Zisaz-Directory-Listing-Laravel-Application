<?php

namespace App\Http\Controllers\Dashboards\Admin\Banners;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\Banners\BannerHomePage;
use App\Rules\Dashboards\Banners\HomeBanners\BannerImageHomeMiddleOneLeftValidationRule;
use App\Rules\Dashboards\Banners\HomeBanners\BannerImageHomeMiddleOneRightValidationRule;
use App\Rules\Dashboards\Banners\HomeBanners\BannerImageHomeSliderOneImageOneValidationRule;


class AdminDashboardHomeSliderOneController extends Controller
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

        $homeFirstSliderSlideOne = BannerHomePage::where('position', 'home_first_slider_slide_one')->first();
        $homeFirstSliderSlideTwo = BannerHomePage::where('position', 'home_first_slider_slide_two')->first();
        $homeFirstSliderSlideThree = BannerHomePage::where('position', 'home_first_slider_slide_three')->first();
        $homeFirstSliderSlideFour = BannerHomePage::where('position', 'home_first_slider_slide_four')->first();
        $homeFirstSliderSlideFive = BannerHomePage::where('position', 'home_first_slider_slide_five')->first();
        
        return view('dashboards.users.admin.pages.dynaimc-banners.home-slider-one-banner.index', compact(
            'user',
            'homeFirstSliderSlideOne',
            'homeFirstSliderSlideTwo', 
            'homeFirstSliderSlideThree',
            'homeFirstSliderSlideFour',
            'homeFirstSliderSlideFive',
        ));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'custom_validation' => new BannerImageHomeSliderOneImageOneValidationRule($request),
        ]);
     
        // slide one operation
        $filenameHomeSlideOne = $this->uploadSlideOneImageHandler($request->slider_image_one);
        $this->insertIntoDbSlideOne($filenameHomeSlideOne, $request);

        // slide two operation
        $filenameHomeSlideTwo = $this->uploadSlideTwoImageHandler($request->slider_image_two);
        $this->insertIntoDbSlideTwo($filenameHomeSlideTwo, $request);
        
        // slide three operation
        $filenameHomeSlideThree = $this->uploadSlideThreeImageHandler($request->slider_image_three);
        $this->insertIntoDbSlideThree($filenameHomeSlideThree, $request);

        // slide four operation
        $filenameHomeSlideFour = $this->uploadSlideFourImageHandler($request->slider_image_four);
        $this->insertIntoDbSlideFour($filenameHomeSlideFour, $request);

        // slide five operation
        $filenameHomeSlideFive = $this->uploadSlideFiveImageHandler($request->slider_image_five);
        $this->insertIntoDbSlideFive($filenameHomeSlideFive, $request);

        return redirect(route('admin.dashboard.dynamic-banners.home-slider-one-banner.index'))->with('success', 'تنظیمات مورد نظر با موفقیت ذخیره گردید.');
    }

    // slide one operation
    private function uploadSlideOneImageHandler($sliderImageOne) {

        // return null if no image has been selected
        if(is_null($sliderImageOne)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerHomePage::where('position', 'home_first_slider_slide_one')->exists()) {
            unlink(BannerHomePage::where('position', 'home_first_slider_slide_one')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideOne = hexdec(uniqid());
        $filenameHomeSlideOne = $uniqueImageSlideOne . '.' . $sliderImageOne->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameHomeSlideOne, file_get_contents($sliderImageOne));
      
        return $dir . '/' . $filenameHomeSlideOne;
    }
    private function insertIntoDbSlideOne($filenameHomeSlideOne, $request) {
        // slider crud operation
        if(!is_null($filenameHomeSlideOne)) {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_one',
            ],[
                'position' => 'home_first_slider_slide_one',
                'image' => $filenameHomeSlideOne,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_one),
            ]);
        } else {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_one',
            ],[
                'position' => 'home_first_slider_slide_one',
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
        if(BannerHomePage::where('position', 'home_first_slider_slide_two')->exists()) {
            unlink(BannerHomePage::where('position', 'home_first_slider_slide_two')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideTwo = hexdec(uniqid());
        $filenameHomeSlideTwo = $uniqueImageSlideTwo . '.' . $sliderImageTwo->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameHomeSlideTwo, file_get_contents($sliderImageTwo));
      
        return $dir . '/' . $filenameHomeSlideTwo;
    }
    private function insertIntoDbSlideTwo($filenameHomeSlideTwo, $request) {

        // check if valid image has been uploaded
        $homeFirstSliderSlideTwo = BannerHomePage::where('position', 'home_first_slider_slide_two')->first();
        if(!$homeFirstSliderSlideTwo && is_null($request->slider_image_two)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameHomeSlideTwo)) {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_two',
            ],[
                'position' => 'home_first_slider_slide_two',
                'image' => $filenameHomeSlideTwo,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_two),
            ]);
        } else {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_two',
            ],[
                'position' => 'home_first_slider_slide_two',
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
        if(BannerHomePage::where('position', 'home_first_slider_slide_three')->exists()) {
            unlink(BannerHomePage::where('position', 'home_first_slider_slide_three')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideThree = hexdec(uniqid());
        $filenameHomeSlideThree = $uniqueImageSlideThree . '.' . $sliderImageThree->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameHomeSlideThree, file_get_contents($sliderImageThree));
      
        return $dir . '/' . $filenameHomeSlideThree;
    }
    private function insertIntoDbSlideThree($filenameHomeSlideThree, $request) {

        // check if valid image has been uploaded
        $homeFirstSliderSlideThree = BannerHomePage::where('position', 'home_first_slider_slide_three')->first();
        if(!$homeFirstSliderSlideThree && is_null($request->slider_image_three)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameHomeSlideThree)) {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_three',
            ],[
                'position' => 'home_first_slider_slide_three',
                'image' => $filenameHomeSlideThree,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_three),
            ]);
        } else {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_three',
            ],[
                'position' => 'home_first_slider_slide_three',
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
        if(BannerHomePage::where('position', 'home_first_slider_slide_four')->exists()) {
            unlink(BannerHomePage::where('position', 'home_first_slider_slide_four')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFour = hexdec(uniqid());
        $filenameHomeSlideFour = $uniqueImageSlideFour . '.' . $sliderImageFour->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameHomeSlideFour, file_get_contents($sliderImageFour));
      
        return $dir . '/' . $filenameHomeSlideFour;
    }
    private function insertIntoDbSlideFour($filenameHomeSlideFour, $request) {

        // check if valid image has been uploaded
        $homeFirstSliderSlideFour = BannerHomePage::where('position', 'home_first_slider_slide_four')->first();
        if(!$homeFirstSliderSlideFour && is_null($request->slider_image_four)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameHomeSlideFour)) {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_four',
            ],[
                'position' => 'home_first_slider_slide_four',
                'image' => $filenameHomeSlideFour,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_four),
            ]);
        } else {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_four',
            ],[
                'position' => 'home_first_slider_slide_four',
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
        if(BannerHomePage::where('position', 'home_first_slider_slide_five')->exists()) {
            unlink(BannerHomePage::where('position', 'home_first_slider_slide_five')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFive = hexdec(uniqid());
        $filenameHomeSlideFive = $uniqueImageSlideFive . '.' . $sliderImageFive->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameHomeSlideFive, file_get_contents($sliderImageFive));
      
        return $dir . '/' . $filenameHomeSlideFive;
    }
    private function insertIntoDbSlideFive($filenameHomeSlideFive, $request) {

        // check if valid image has been uploaded
        $homeFirstSliderSlideFive = BannerHomePage::where('position', 'home_first_slider_slide_five')->first();
        if(!$homeFirstSliderSlideFive && is_null($request->slider_image_five)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameHomeSlideFive)) {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_five',
            ],[
                'position' => 'home_first_slider_slide_five',
                'image' => $filenameHomeSlideFive,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        } else {
            // insert slider banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_first_slider_slide_five',
            ],[
                'position' => 'home_first_slider_slide_five',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        }
    }
}
