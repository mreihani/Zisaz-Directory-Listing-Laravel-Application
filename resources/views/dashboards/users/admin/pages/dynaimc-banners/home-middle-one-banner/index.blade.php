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
                تنظیمات بنر میانی یک در صفحه اصلی
            </h5>

            <div class="card-header flex-column flex-md-row">

                <form action="{{route('admin.dashboard.dynamic-banners.home-middle-one-banner.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check form-switch mb-3">
                                <input {{($homeMiddleOneRightBanner && $homeMiddleOneRightBanner->display_banner == 1) ? 'checked' : ''}} class="form-check-input" id="showBannerSwitch" type="checkbox" name="display_banner">
                                <label class="form-check-label" for="showBannerSwitch">
                                    فعال سازی
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="banner-image-right">
                                انتخاب تصویر بنر راست
                                <span class="text-danger">*</span>
                                (ابعاد بنر باید 624x294 پیکسل باشد)
                            </label>
                            <input class="form-control" id="banner-image-right" type="file" name="banner_image_right">
                            <input type="hidden" name="custom_validation_right">
                            @error("custom_validation_right")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                            <div class="mt-3">
                                <label class="form-label" for="url-right">
                                    لینک بنر راست را وارد نمایید
                                </label>
                                <input class="form-control" id="url-right" type="text" name="url_right" value="{{old('url_right', $homeMiddleOneRightBanner ? $homeMiddleOneRightBanner->url : '')}}">
                            </div>

                            @if($homeMiddleOneRightBanner)
                                <div class="d-flex justify-content-center mt-4">
                                    <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($homeMiddleOneRightBanner->image)}}" alt="">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label" for="banner-image-left">
                                انتخاب تصویر بنر چپ
                                <span class="text-danger">*</span>
                                (ابعاد بنر باید 624x294 پیکسل باشد)
                            </label>
                            <input class="form-control" id="banner-image-left" type="file" name="banner_image_left">
                            <input type="hidden" name="custom_validation_left">
                            @error("custom_validation_left")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                            <div class="mt-3">
                                <label class="form-label" for="url-left">
                                    لینک بنر چپ را وارد نمایید
                                </label>
                                <input class="form-control" id="url-left" type="text" name="url_left" value="{{old('url_left', $homeMiddleOneLeftBanner ? $homeMiddleOneLeftBanner->url : '')}}">
                            </div>

                            @if($homeMiddleOneLeftBanner)
                                <div class="d-flex justify-content-center mt-4">
                                    <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($homeMiddleOneLeftBanner->image)}}" alt="">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
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