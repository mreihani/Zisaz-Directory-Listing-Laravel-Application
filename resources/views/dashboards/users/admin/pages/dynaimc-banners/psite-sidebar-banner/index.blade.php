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
                تنظیمات اسلایدر یک در صفحه کسب و کار
            </h5>

            <div class="card-header flex-column flex-md-row">

                <form action="{{route('admin.dashboard.dynamic-banners.psite-slider-one-banner.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check form-switch mb-3">
                                <input {{($psiteFirstSliderSlideOne && $psiteFirstSliderSlideOne->display_banner == 1) ? 'checked' : ''}} class="form-check-input" id="showBannerSwitch" type="checkbox" name="display_banner">
                                <label class="form-check-label" for="showBannerSwitch">
                                    فعال سازی اسلایدر
                                </label>
                            </div>
                        </div>
                       
                        <div class="row">   
                            <div class="col-md-6">
                                <label class="form-label" for="slide-image-one">
                                    انتخاب تصویر اسلاید اول
                                    <span class="text-danger">*</span>
                                    (ابعاد تصویر باید 302x184 پیکسل باشد)
                                </label>
                                <input class="form-control" id="slide-image-one" type="file" name="slider_image_one">
                                <input type="hidden" name="custom_validation">
                                @error("custom_validation")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
    
                                <div class="mt-3">
                                    <label class="form-label" for="slide-one">
                                        لینک اسلاید اول را وارد نمایید
                                    </label>
                                    <input class="form-control" id="slide-one" type="text" name="slider_url_one" value="{{old('slider_url_one', $psiteFirstSliderSlideOne ? $psiteFirstSliderSlideOne->url : '')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if($psiteFirstSliderSlideOne)
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($psiteFirstSliderSlideOne->image)}}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <hr class="mt-4">

                        <div class="row">   
                            <div class="col-md-6">
                                <label class="form-label" for="slide-image-two">
                                    انتخاب تصویر اسلاید دوم
                                    <span class="fw-normal">(اختیاری)</span>
                                    (ابعاد تصویر باید 302x184 پیکسل باشد)
                                </label>
                                <input class="form-control" id="slide-image-two" type="file" name="slider_image_two">
    
                                <div class="mt-3">
                                    <label class="form-label" for="slide-two">
                                        لینک اسلاید دوم را وارد نمایید
                                    </label>
                                    <input class="form-control" id="slide-two" type="text" name="slider_url_two" value="{{old('slider_url_two', $psiteFirstSliderSlideTwo ? $psiteFirstSliderSlideTwo->url : '')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if($psiteFirstSliderSlideTwo)
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($psiteFirstSliderSlideTwo->image)}}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <hr class="mt-4">

                        <div class="row">   
                            <div class="col-md-6">
                                <label class="form-label" for="slide-image-three">
                                    انتخاب تصویر اسلاید سوم
                                    <span class="fw-normal">(اختیاری)</span>
                                    (ابعاد تصویر باید 302x184 پیکسل باشد)
                                </label>
                                <input class="form-control" id="slide-image-three" type="file" name="slider_image_three">
    
                                <div class="mt-3">
                                    <label class="form-label" for="slide-three">
                                        لینک اسلاید سوم را وارد نمایید
                                    </label>
                                    <input class="form-control" id="slide-three" type="text" name="slider_url_three" value="{{old('slider_url_three', $psiteFirstSliderSlideThree ? $psiteFirstSliderSlideThree->url : '')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if($psiteFirstSliderSlideThree)
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($psiteFirstSliderSlideThree->image)}}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <hr class="mt-4">

                        <div class="row">   
                            <div class="col-md-6">
                                <label class="form-label" for="slide-image-four">
                                    انتخاب تصویر اسلاید چهارم
                                    <span class="fw-normal">(اختیاری)</span>
                                    (ابعاد تصویر باید 302x184 پیکسل باشد)
                                </label>
                                <input class="form-control" id="slide-image-four" type="file" name="slider_image_four">
    
                                <div class="mt-3">
                                    <label class="form-label" for="slide-four">
                                        لینک اسلاید چهارم را وارد نمایید
                                    </label>
                                    <input class="form-control" id="slide-four" type="text" name="slider_url_four" value="{{old('slider_url_four', $psiteFirstSliderSlideFour ? $psiteFirstSliderSlideFour->url : '')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if($psiteFirstSliderSlideFour)
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($psiteFirstSliderSlideFour->image)}}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <hr class="mt-4">

                        <div class="row">   
                            <div class="col-md-6">
                                <label class="form-label" for="slide-image-five">
                                    انتخاب تصویر اسلاید پنجم
                                    <span class="fw-normal">(اختیاری)</span>
                                    (ابعاد تصویر باید 302x184 پیکسل باشد)
                                </label>
                                <input class="form-control" id="slide-image-five" type="file" name="slider_image_five">
    
                                <div class="mt-3">
                                    <label class="form-label" for="slide-five">
                                        لینک اسلاید پنجم را وارد نمایید
                                    </label>
                                    <input class="form-control" id="slide-five" type="text" name="slider_url_five" value="{{old('slider_url_five', $psiteFirstSliderSlideFive ? $psiteFirstSliderSlideFive->url : '')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if($psiteFirstSliderSlideFive)
                                    <div class="d-flex justify-content-center mt-4">
                                        <img class="d-block rounded-3" style="max-width: -webkit-fill-available;" src="{{asset($psiteFirstSliderSlideFive->image)}}" alt="">
                                    </div>
                                @endif
                            </div>
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