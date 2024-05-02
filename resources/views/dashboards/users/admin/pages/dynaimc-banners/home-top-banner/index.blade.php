@extends('dashboards.users.admin.master')
@section('main')

<div class="container-xxl">
    @if(session()->has('success'))
        <div class="alert alert-icon alert-success alert-bg alert-inline show-code-action mt-3 mb-0">
            <i style="color:#50cd89" class="fas fa-check"></i> {{session('success')}}
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
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" id="showBannerSwitch" type="checkbox" name="is_banner_shown">
                            <label class="form-check-label" for="showBannerSwitch">
                                وضعیت نمایش بنر
                            </label>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="mb-3 mt-3 col-md-6">
                            <label class="form-label" for="banner-image-desktop">
                                انتخاب تصویر بنر برای دسکتاپ
                                <span class="text-danger">*</span>
                                (ابعاد بنر باید 2800x100 پیکسل باشد)
                            </label>
                            <input class="form-control" id="banner-image-desktop" type="file" name="banner_image_desktop">
                            @error("banner_image_desktop")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 mt-3 col-md-6">
                            <label class="form-label" for="banner-image-mobile">
                                انتخاب تصویر بنر برای موبایل
                                <span class="text-danger">*</span>
                                (ابعاد بنر باید 1400x50 پیکسل باشد)
                            </label>
                            <input class="form-control" id="banner-image-mobile" type="file" name="banner_image_mobile">
                            @error("banner_image_mobile")
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
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