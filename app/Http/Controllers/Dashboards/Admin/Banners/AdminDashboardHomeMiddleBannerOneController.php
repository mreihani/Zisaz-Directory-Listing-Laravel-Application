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


class AdminDashboardHomeMiddleBannerOneController extends Controller
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

        $homeMiddleOneRightBanner = BannerHomePage::where('position', 'home_middle_one_right_banner')->first();
        $homeMiddleOneLeftBanner = BannerHomePage::where('position', 'home_middle_one_left_banner')->first();
        
        return view('dashboards.users.admin.pages.dynaimc-banners.home-middle-one-banner.index', compact('user', 'homeMiddleOneRightBanner', 'homeMiddleOneLeftBanner'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'custom_validation_right' => new BannerImageHomeMiddleOneRightValidationRule($request),
            'custom_validation_left' => new BannerImageHomeMiddleOneLeftValidationRule($request),
        ]);
      
        $filenameHomeMiddleOneRight = $this->uploadBannerHomeMiddleOneRightImageHandler($request->banner_image_right);
        $filenameHomeMiddleOneLeft = $this->uploadBannerHomeMiddleOneLeftImageHandler($request->banner_image_left);
        
        // desktop crud operation
        if(!is_null($filenameHomeMiddleOneRight)) {
            // insert desktop banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_middle_one_right_banner',
            ],[
                'position' => 'home_middle_one_right_banner',
                'image' => $filenameHomeMiddleOneRight,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_right),
            ]);
        } else {
            // insert desktop banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_middle_one_right_banner',
            ],[
                'position' => 'home_middle_one_right_banner',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_right),
            ]);
        }

        // mobile crud operation
        if(!is_null($filenameHomeMiddleOneLeft)) {
            // insert mobile banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_middle_one_left_banner',
            ],[
                'position' => 'home_middle_one_left_banner',
                'image' => $filenameHomeMiddleOneLeft,
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_left),
            ]);
        } else {
            // insert mobile banner into db
            BannerHomePage::updateOrCreate([
                'position' => 'home_middle_one_left_banner',
            ],[
                'position' => 'home_middle_one_left_banner',
                'display_banner' => $request->display_banner == 'on' ? 1 : 0,
                'url' => Purify::clean($request->url_left),
            ]);
        }

        return redirect(route('admin.dashboard.dynamic-banners.home-middle-one-banner.index'))->with('success', 'تنظیمات مورد نظر با موفقیت ذخیره گردید.');
    }

    private function uploadBannerHomeMiddleOneRightImageHandler($bannerImageRight) {

        // return null if no image has been selected
        if(is_null($bannerImageRight)) {
            return null;
        }

        // Remove exsting desktop banner image
        if(BannerHomePage::where('position', 'home_middle_one_right_banner')->exists()) {
            unlink(BannerHomePage::where('position', 'home_middle_one_right_banner')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading desktop image
        $uniqueImageNameRight = hexdec(uniqid());
        $filenameHomeMiddleOneRight = $uniqueImageNameRight . '.' . $bannerImageRight->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameHomeMiddleOneRight, file_get_contents($bannerImageRight));
      
        return $dir . '/' . $filenameHomeMiddleOneRight;
    }

    private function uploadBannerHomeMiddleOneLeftImageHandler($bannerImageLeft) {

        // return null if no image has been selected
        if(is_null($bannerImageLeft)) {
            return null;
        }

        // Remove exsting mobile banner image
        if(BannerHomePage::where('position', 'home_middle_one_left_banner')->exists()) {
            unlink(BannerHomePage::where('position', 'home_middle_one_left_banner')->first()->image);
        }

        // setting directory
        $dir = 'storage/upload/frontend-pages-banners';

        // uploading mobile image
        $uniqueImageNameLeft = hexdec(uniqid());
        $filenameHomeMiddleOneLeft = $uniqueImageNameLeft . '.' . $bannerImageLeft->extension();
        Storage::disk('public')->put('upload/frontend-pages-banners/' . $filenameHomeMiddleOneLeft, file_get_contents($bannerImageLeft));
      
        return $dir . '/' . $filenameHomeMiddleOneLeft;
    }
}
