<?php

namespace App\Http\Controllers\Dashboards\Admin\Banners;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\Banners\BannerProjectPage;
use App\Rules\Dashboards\Banners\ProjectBanners\BannerImageProjectSliderOneImageOneValidationRule;


class AdminDashboardProjectSliderOneController extends Controller
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

        $projectFirstSliderSlideOne = BannerProjectPage::where('position', 'project_first_slider_slide_one')->first();
        $projectFirstSliderSlideTwo = BannerProjectPage::where('position', 'project_first_slider_slide_two')->first();
        $projectFirstSliderSlideThree = BannerProjectPage::where('position', 'project_first_slider_slide_three')->first();
        $projectFirstSliderSlideFour = BannerProjectPage::where('position', 'project_first_slider_slide_four')->first();
        $projectFirstSliderSlideFive = BannerProjectPage::where('position', 'project_first_slider_slide_five')->first();
        
        return view('dashboards.users.admin.pages.dynaimc-banners.project-sidebar-banner.index', compact(
            'user',
            'projectFirstSliderSlideOne',
            'projectFirstSliderSlideTwo', 
            'projectFirstSliderSlideThree',
            'projectFirstSliderSlideFour',
            'projectFirstSliderSlideFive',
        ));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'custom_validation' => new BannerImageProjectSliderOneImageOneValidationRule($request),
        ]);
     
        // slide one operation
        $filenameProjectSlideOne = $this->uploadSlideOneImageHandler($request->slider_image_one);
        $this->isertIntoDbSlideOne($filenameProjectSlideOne, $request);

        // slide two operation
        $filenameProjectSlideTwo = $this->uploadSlideTwoImageHandler($request->slider_image_two);
        $this->isertIntoDbSlideTwo($filenameProjectSlideTwo, $request);
        
        // slide three operation
        $filenameProjectSlideThree = $this->uploadSlideThreeImageHandler($request->slider_image_three);
        $this->isertIntoDbSlideThree($filenameProjectSlideThree, $request);

        // slide four operation
        $filenameProjectSlideFour = $this->uploadSlideFourImageHandler($request->slider_image_four);
        $this->isertIntoDbSlideFour($filenameProjectSlideFour, $request);

        // slide five operation
        $filenameProjectSlideFive = $this->uploadSlideFiveImageHandler($request->slider_image_five);
        $this->isertIntoDbSlideFive($filenameProjectSlideFive, $request);

        return redirect(route('admin.dashboard.dynamic-banners.project-slider-one-banner.index'))->with('success', 'تنظیمات مورد نظر با موفقیت ذخیره گردید.');
    }

    // slide one operation
    private function uploadSlideOneImageHandler($sliderImageOne) {

        // return null if no image has been selected
        if(is_null($sliderImageOne)) {
            return null;
        }

        // Remove exsting slider banner image
        if(BannerProjectPage::where('position', 'project_first_slider_slide_one')->exists()) {
            unlink(BannerProjectPage::where('position', 'project_first_slider_slide_one')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideOne = hexdec(uniqid());
        $filenameProjectSlideOne = $uniqueImageSlideOne . '.' . $sliderImageOne->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameProjectSlideOne, file_get_contents($sliderImageOne));
      
        return $dir . '/' . $filenameProjectSlideOne;
    }
    private function isertIntoDbSlideOne($filenameProjectSlideOne, $request) {
        // slider crud operation
        if(!is_null($filenameProjectSlideOne)) {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_one',
            ],[
                'position' => 'project_first_slider_slide_one',
                'image' => $filenameProjectSlideOne,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_one),
            ]);
        } else {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_one',
            ],[
                'position' => 'project_first_slider_slide_one',
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
        if(BannerProjectPage::where('position', 'project_first_slider_slide_two')->exists()) {
            unlink(BannerProjectPage::where('position', 'project_first_slider_slide_two')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideTwo = hexdec(uniqid());
        $filenameProjectSlideTwo = $uniqueImageSlideTwo . '.' . $sliderImageTwo->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameProjectSlideTwo, file_get_contents($sliderImageTwo));
      
        return $dir . '/' . $filenameProjectSlideTwo;
    }
    private function isertIntoDbSlideTwo($filenameProjectSlideTwo, $request) {

        // check if valid image has been uploaded
        $projectFirstSliderSlideTwo = BannerProjectPage::where('position', 'project_first_slider_slide_two')->first();
        if(!$projectFirstSliderSlideTwo && is_null($request->slider_image_two)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameProjectSlideTwo)) {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_two',
            ],[
                'position' => 'project_first_slider_slide_two',
                'image' => $filenameProjectSlideTwo,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_two),
            ]);
        } else {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_two',
            ],[
                'position' => 'project_first_slider_slide_two',
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
        if(BannerProjectPage::where('position', 'project_first_slider_slide_three')->exists()) {
            unlink(BannerProjectPage::where('position', 'project_first_slider_slide_three')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideThree = hexdec(uniqid());
        $filenameProjectSlideThree = $uniqueImageSlideThree . '.' . $sliderImageThree->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameProjectSlideThree, file_get_contents($sliderImageThree));
      
        return $dir . '/' . $filenameProjectSlideThree;
    }
    private function isertIntoDbSlideThree($filenameProjectSlideThree, $request) {

        // check if valid image has been uploaded
        $projectFirstSliderSlideThree = BannerProjectPage::where('position', 'project_first_slider_slide_three')->first();
        if(!$projectFirstSliderSlideThree && is_null($request->slider_image_three)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameProjectSlideThree)) {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_three',
            ],[
                'position' => 'project_first_slider_slide_three',
                'image' => $filenameProjectSlideThree,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_three),
            ]);
        } else {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_three',
            ],[
                'position' => 'project_first_slider_slide_three',
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
        if(BannerProjectPage::where('position', 'project_first_slider_slide_four')->exists()) {
            unlink(BannerProjectPage::where('position', 'project_first_slider_slide_four')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFour = hexdec(uniqid());
        $filenameProjectSlideFour = $uniqueImageSlideFour . '.' . $sliderImageFour->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameProjectSlideFour, file_get_contents($sliderImageFour));
      
        return $dir . '/' . $filenameProjectSlideFour;
    }
    private function isertIntoDbSlideFour($filenameProjectSlideFour, $request) {

        // check if valid image has been uploaded
        $projectFirstSliderSlideFour = BannerProjectPage::where('position', 'project_first_slider_slide_four')->first();
        if(!$projectFirstSliderSlideFour && is_null($request->slider_image_four)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameProjectSlideFour)) {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_four',
            ],[
                'position' => 'project_first_slider_slide_four',
                'image' => $filenameProjectSlideFour,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_four),
            ]);
        } else {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_four',
            ],[
                'position' => 'project_first_slider_slide_four',
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
        if(BannerProjectPage::where('position', 'project_first_slider_slide_five')->exists()) {
            unlink(BannerProjectPage::where('position', 'project_first_slider_slide_five')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading slider image
        $uniqueImageSlideFive = hexdec(uniqid());
        $filenameProjectSlideFive = $uniqueImageSlideFive . '.' . $sliderImageFive->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameProjectSlideFive, file_get_contents($sliderImageFive));
      
        return $dir . '/' . $filenameProjectSlideFive;
    }
    private function isertIntoDbSlideFive($filenameProjectSlideFive, $request) {

        // check if valid image has been uploaded
        $projectFirstSliderSlideFive = BannerProjectPage::where('position', 'project_first_slider_slide_five')->first();
        if(!$projectFirstSliderSlideFive && is_null($request->slider_image_five)) {
            return;
        }

        // slider crud operation
        if(!is_null($filenameProjectSlideFive)) {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_five',
            ],[
                'position' => 'project_first_slider_slide_five',
                'image' => $filenameProjectSlideFive,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        } else {
            // insert slider banner into db
            BannerProjectPage::updateOrCreate([
                'position' => 'project_first_slider_slide_five',
            ],[
                'position' => 'project_first_slider_slide_five',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->slider_url_five),
            ]);
        }
    }
}
