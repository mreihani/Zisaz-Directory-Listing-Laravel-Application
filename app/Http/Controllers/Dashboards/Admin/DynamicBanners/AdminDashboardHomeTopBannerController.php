<?php

namespace App\Http\Controllers\Dashboards\Admin\DynamicBanners;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;

class AdminDashboardHomeTopBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('dashboards.users.admin.pages.dynaimc-banners.home-top-banner.index', compact('user'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner_image_desktop' => 'required',
            'banner_image_mobile' => 'required',
        ],[
            'banner_image_desktop.required' => 'لطفا تصویر بنر دسکتاپ را بارگذاری نمایید',
            'banner_image_mobile.required' => 'لطفا تصویر بنر موبایل را بارگذاری نمایید',
        ]);
      
        $this->uploadBannerImageHandler($validated['banner_image_desktop'], $validated['banner_image_mobile']);
      
        return redirect(route('admin.dashboard.dynamic-banners.home-top-banner.index'))->with('success', 'تنظیمات مورد نظر با موفقیت ذخیره گردید.');
    }

    /**
     * Upload images hander
     */
    private function uploadBannerImageHandler($bannerImageDesktop, $bannerImageMobile) {

        // Remove exsting profile image
        // if(
        //     auth()->user()->userProfile
        //     && auth()->user()->userProfile->profile_image
        //     ) {
        //     unlink(auth()->user()->userProfile->profile_image);
        // }

        $dir = 'storage/upload/home-page-banners/';

        $unique_image_name_desktop = hexdec(uniqid());
        $filename = $unique_image_name_desktop . '.' . $bannerImageDesktop->extension();
        // $bannerImageDesktop = Image::make($bannerImageDesktop);
        Storage::disk('public')->put('upload/home-page-banners/', $bannerImageDesktop);

        $unique_image_name_mobile = hexdec(uniqid());
        $filename = $unique_image_name_mobile . '.' . $bannerImageMobile->extension();
        // $bannerImageMobile = Image::make($bannerImageMobile);
        Storage::disk('public')->put('upload/home-page-banners/', $bannerImageMobile);

        //return $dir . '/' . $filename;
    }
}
