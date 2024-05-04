@extends('dashboards.users.admin.master')
@section('main')

<div class="container-xxl">
    @if(session()->has('success'))
        <div class="alert alert-icon alert-success alert-bg alert-inline show-code-action mt-3 mb-0">
            <i style="color:#50cd89" class="fas fa-check"></i> {{session('success')}}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-icon alert-warning alert-bg alert-inline show-code-action mt-3 mb-0">
            <i class="fa-solid fa-xmark-circle"></i> {{session('error')}}
        </div>
    @endif
</div>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="content-wrapper">
        <div class="card">

            <h5 class="card-header">
                تنظیمات بنر تبلیغاتی بالای صفحه اصلی
            </h5>

            <div class="card-header flex-column flex-md-row">

                <form action="{{route('admin.dashboard.dynamic-banners.home-top-banner.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input {{($homeTopBannerDesktop && $homeTopBannerDesktop->display_banner == 1) ? 'checked' : ''}} class="form-check-input" id="showBannerSwitchDesktop" type="checkbox" name="display_banner_desktop">
                                    <label class="form-check-label" for="showBannerSwitchDesktop">
                                        فعال سازی در دسکتاپ
                                    </label>
                                </div>

                                <label class="form-label" for="banner-image-desktop">
                                    انتخاب تصویر بنر برای دسکتاپ
                                    <span class="text-danger">*</span>
                                    (ابعاد بنر باید 2800x100 پیکسل باشد)
                                </label>
                                <input class="form-control" id="banner-image-desktop" type="file" name="banner_image_desktop">
                                <input type="hidden" name="custom_validation_desktop">
                                @error("custom_validation_desktop")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <div class="mt-3">
                                    <label class="form-label" for="url-desktop">
                                        لینک بنر دسکتاپ را وارد نمایید
                                    </label>
                                    <input class="form-control" id="url-desktop" type="text" name="url_desktop" value="{{old('url_desktop', $homeTopBannerDesktop ? $homeTopBannerDesktop->url : '')}}">
                                </div>
                            </div>

                            @if($homeTopBannerDesktop)
                                <div class="d-flex justify-content-center mt-4">
                                    <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($homeTopBannerDesktop->image)}}" alt="">
                                </div>
                            @endif
                        </div>

                        <hr class="mt-3">

                        <div class="mb-3 mt-3 col-md-12">
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input {{($homeTopBannerMobile && $homeTopBannerMobile->display_banner == 1) ? 'checked' : ''}} class="form-check-input" id="showBannerSwitchMobile" type="checkbox" name="display_banner_mobile">
                                    <label class="form-check-label" for="showBannerSwitchMobile">
                                        فعال سازی در موبایل
                                    </label>
                                </div>

                                <label class="form-label" for="banner-image-mobile">
                                    انتخاب تصویر بنر برای موبایل
                                    <span class="text-danger">*</span>
                                    (ابعاد بنر باید 1400x50 پیکسل باشد)
                                </label>
                                <input class="form-control" id="banner-image-mobile" type="file" name="banner_image_mobile">
                                <input type="hidden" name="custom_validation_mobile">
                                @error("custom_validation_mobile")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <div class="mt-3">
                                    <label class="form-label" for="url-mobile">
                                        لینک بنر موبایل را وارد نمایید
                                    </label>
                                    <input class="form-control" id="url-mobile" type="text" name="url_mobile" value="{{old('url_mobile', $homeTopBannerMobile ? $homeTopBannerMobile->url : '')}}">
                                </div>
                            </div>

                            @if($homeTopBannerMobile)
                                <div class="d-flex justify-content-center mt-4">
                                    <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($homeTopBannerMobile->image)}}" alt="">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-md-end mt-3">
                            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a class="btn btn-secondary create-new btn-secondary waves-effect waves-light me-2" href="{{route('admin.dashboard.index')}}">
                                        <span>
                                            <i class="ti ti-circle-x me-sm-1"></i> 
                                            <span class="d-none d-sm-inline-block">
                                                انصراف
                                            </span>
                                        </span>
                                    </a> 
                                    <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" type="submit">
                                        <span>
                                            <i class="ti ti-device-floppy me-sm-1"></i> 
                                            <span class="d-none d-sm-inline-block">
                                                ذخیره
                                            </span>
                                        </span>
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection