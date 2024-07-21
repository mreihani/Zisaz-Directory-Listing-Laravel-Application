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
use App\Rules\Dashboards\Banners\HomeBanners\BannerImageMobileValidationRule;
use App\Rules\Dashboards\Banners\HomeBanners\BannerImageDesktopValidationRule;

class AdminDashboardHomeTopBannerController extends Controller
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

        $homeTopBannerDesktop = BannerHomePage::where('position', 'home_top_banner_desktop')->first();
        $homeTopBannerMobile = BannerHomePage::where('position', 'home_top_banner_mobile')->first();
        
        return view('dashboards.users.admin.pages.dynaimc-banners.home-top-banner.index', compact('user', 'homeTopBannerDesktop', 'homeTopBannerMobile'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'custom_validation_desktop' => new BannerImageDesktopValidationRule($request),
            'custom_validation_mobile' => new BannerImageMobileValidationRule($request),
        ]);
      
        $filenameDesktop = $this->uploadBannerDesktopImageHandler($request->banner_image_desktop);
        $filenameMobile = $this->uploadBannerMobileImageHandler($request->banner_image_mobile);
        
        // desktop crud operation
        if(!is_null($filenameDesktop)) {
            // insert desktop banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_top_banner_desktop',
            ],[
                'position' => 'home_top_banner_desktop',
                'image' => $filenameDesktop,
                'display_banner' => $request->display_banner_desktop == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_desktop),
            ]);
        } else {
            // insert desktop banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_top_banner_desktop',
            ],[
                'position' => 'home_top_banner_desktop',
                'display_banner' => $request->display_banner_desktop == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_desktop),
            ]);
        }

        // mobile crud operation
        if(!is_null($filenameMobile)) {
            // insert mobile banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_top_banner_mobile',
            ],[
                'position' => 'home_top_banner_mobile',
                'image' => $filenameMobile,
                'display_banner' => $request->display_banner_mobile == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_mobile),
            ]);
        } else {
            // insert mobile banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_top_banner_mobile',
            ],[
                'position' => 'home_top_banner_mobile',
                'display_banner' => $request->display_banner_mobile == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_mobile),
            ]);
        }

        return redirect(route('admin.dashboard.dynamic-banners.home-top-banner.index'))->with('success', 'تنظیمات مورد نظر با موفقیت ذخیره گردید.');
    }

    private function uploadBannerDesktopImageHandler($bannerImageDesktop) {

        // return null if no image has been selected
        if(is_null($bannerImageDesktop)) {
            return null;
        }

        // Remove exsting desktop banner image
        if(BannerHomePage::where('position', 'home_top_banner_desktop')->exists()) {
            unlink(BannerHomePage::where('position', 'home_top_banner_desktop')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading desktop image
        $uniqueImageNameDesktop = hexdec(uniqid());
        $filenameDesktop = $uniqueImageNameDesktop . '.' . $bannerImageDesktop->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameDesktop, file_get_contents($bannerImageDesktop));
      
        return $dir . '/' . $filenameDesktop;
    }

    private function uploadBannerMobileImageHandler($bannerImageMobile) {

        // return null if no image has been selected
        if(is_null($bannerImageMobile)) {
            return null;
        }

        // Remove exsting mobile banner image
        if(BannerHomePage::where('position', 'home_top_banner_mobile')->exists()) {
            unlink(BannerHomePage::where('position', 'home_top_banner_mobile')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading mobile image
        $uniqueImageNameMobile = hexdec(uniqid());
        $filenameMobile = $uniqueImageNameMobile . '.' . $bannerImageMobile->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameMobile, file_get_contents($bannerImageMobile));
      
        return $dir . '/' . $filenameMobile;
    }
}
