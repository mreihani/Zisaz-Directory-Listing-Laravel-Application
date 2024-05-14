@extends('frontend.master')
@section('main')

<!-- Page content-->
<section class="container mt-5 mb-lg-5 mb-4 pt-5 pb-lg-5">
    <!-- Breadcrumb-->
    <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home-page')}}">خانه</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">
                    خدمات مهندسی و پیمانکاری
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                خدمات مهندسی و پیمانکاری
            </li>
        </ol>
    </nav>
    <div class="row gy-5 pt-lg-2">
        <div class="col-lg-7">
            <div class="d-flex flex-column">

                <!-- Ads Images (carousel)-->
                @if($activity->adsImages->count())
                    <!-- Carousel with slides count-->
                    <div class="order-lg-1 order-2">
                        <div class="tns-carousel-wrapper">
                            <div class="tns-slides-count text-light">
                                <i class="fi-image fs-lg me-2"></i>
                                <div class="pe-1">
                                    <span class="tns-current-slide fs-5 fw-bold"></span>
                                    <span class="fs-5 fw-bold">/</span>
                                    <span class="tns-total-slides fs-5 fw-bold"></span>
                                </div>
                            </div>
                            <div class="tns-carousel-inner" data-carousel-options="{&quot;navAsThumbnails&quot;: true, &quot;navContainer&quot;: &quot;#thumbnails&quot;, &quot;gutter&quot;: 12, &quot;responsive&quot;: {&quot;0&quot;:{&quot;controls&quot;: false},&quot;500&quot;:{&quot;controls&quot;: true}}}">
                                @foreach($activity->adsImages as $adsImageItem)
                                    <div>
                                        <img class="rounded-3" src="{{asset($adsImageItem->image)}}" alt="Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Thumbnails nav-->
                        <ul class="tns-thumbnails" id="thumbnails">
                            @foreach($activity->adsImages as $adsImageItem)
                                <li class="tns-thumbnail">
                                    <img src="{{asset($adsImageItem->image)}}" alt="Thumbnail">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Page title + Features-->
                <div class="order-lg-2 order-1 mt-3">
                    <h1 class="h2 mb-2">
                        {{$activity->subactivity->item_title}}
                    </h1>
                    @if($activity->subactivity->address)
                        <p class="mb-2 pb-1 fs-base">
                            {{$activity->subactivity->address}}
                        </p>
                    @endif
                </div>
            </div>
            <!-- Overview-->
            @if($activity->subactivity->item_description)
                <h2 class="h5">
                    توضیحات
                </h2>
                <p class="mb-4 pb-2">
                    {{$activity->subactivity->item_description}}
                </p>
            @endif
        
        </div>
        <!-- Sidebar with details-->
        <aside class="col-lg-5">
            <div class="ps-lg-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <span class="badge bg-success me-2 mb-2">
                            تایید شده
                        </span>
                        <span class="badge bg-info me-2 mb-2">
                            جدید
                        </span>
                    </div>
                    <div class="text-nowrap">
                        <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="tooltip" title="نشان کردن">
                            <i class="fi-bookmark"></i>
                        </button>
                        <div class="dropdown d-inline-block" data-bs-toggle="tooltip" title="اشتراک گذاری">
                            <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="dropdown">
                                <i class="fi-share"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end my-1">
                                <button class="dropdown-item" type="button">
                                    <i class="fi-facebook fs-base opacity-75 me-2"></i>
                                    فیسبوک
                                </button>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-twitter fs-base opacity-75 me-2"></i>
                                    توییتر
                                </button>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-instagram fs-base opacity-75 me-2"></i>
                                    اینستاگرام
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Property details-->
                <div class="card border-0 bg-secondary mb-4">
                    <div class="card-body">
                        <h5 class="mb-0 pb-3">مشخصات</h5>
                        <ul class="list-unstyled mt-n2 mb-0">
                            @if($activity->activityGroups->count())
                                <li class="mt-2 mb-0">
                                    <b>زمینه فعالیت: </b>
                                    {{$activity->activityGroups->pluck('title')->implode('، ')}}
                                </li>
                            @endif
                            @if($activity->activityGroups->count())
                                <li class="mt-2 mb-0">
                                    <b>استان های که پیمانکار می تواند در آن جا فعالیت کند: </b>
                                    {{$activity->province->pluck('title')->implode('، ')}}
                                </li>
                            @endif
                            @if($activity->paymentMethod->count())
                                <li class="mt-2 mb-0">
                                    <b>روش پرداخت: </b>
                                    {{$activity->paymentMethod->pluck('title')->implode('، ')}}
                                </li>
                            @endif
                            @if($activity->subactivity->ads_have_discount)
                                <li class="mt-2 mb-0">
                                    <b>آیا آگهی شامل تخفیف می شود؟: </b>
                                    {{$activity->subactivity->ads_have_discount == 1 ? 'بله' : 'خیر'}}
                                </li>
                            @endif
                            <li class="mt-2 mb-0 d-flex">
                                <b>تلفن:&nbsp;</b>
                                @livewire('frontend.auth.login.open-login-modal', ['phone' => $activity->user->phone])
                            </li>
                            @if($activity->subactivity->website_address 
                            || $activity->subactivity->whatsapp_address 
                            || $activity->subactivity->telegram_address 
                            || $activity->subactivity->eitaa_address)
                                <li class="mt-2 mb-0">
                                    <b class="me-2">وبسایت و شبکه های اجتماعی: </b>
                                    
                                    @if($activity->subactivity->website_address)
                                        <a href="{{$activity->subactivity->website_address}}" class="me-2 text-decoration-none">
                                            <i class="fi-globe"></i>
                                        </a>  
                                    @endif
                                    @if($activity->subactivity->whatsapp_address)
                                        <a href="{{$activity->subactivity->whatsapp_address}}" class="me-2 text-decoration-none">
                                            <i class="fi-whatsapp"></i>
                                        </a>  
                                    @endif
                                    @if($activity->subactivity->telegram_address)
                                        <a href="{{$activity->subactivity->telegram_address}}" class="me-2 text-decoration-none">
                                            <i class="fi-telegram"></i>
                                        </a>  
                                    @endif
                                    @if($activity->subactivity->eitaa_address)
                                        <a href="{{$activity->subactivity->eitaa_address}}" class="me-2 text-decoration-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3584.55 3673.6" width="15">
                                                <g id="Isolation_Mode" data-name="Isolation Mode">
                                                  <path d="M1071.43,2.75H2607.66C3171,2.75,3631.82,462.91,3631.82,1026.2v493.93c-505,227-1014.43,1348.12-1756.93,1104.51-61.16,43.46-202.11,222.55-212,358.43-257.11-34.24-553.52-328.88-517.95-646.62C717,2026.91,1070.39,1455.5,1409.74,1225.51c727.32-492.94,1737.05-69,1175.39,283.45-341.52,214.31-1071.84,355.88-995.91-170.24-200.34,57.78-328.58,431.34-87.37,626-223.45,219.53-180.49,623.07,58.36,755.57,241.56-625.87,1082.31-544.08,1422-1291.2,255.57-562-123.34-1202.37-880.91-1104C1529.56,399.34,993.64,881.63,725.62,1453.64,453.68,2034,494.15,2811.15,1052.55,3202.82c657.15,460.92,1356.78,34.13,1780.52-523.68,249.77-328.78,468-693,798.75-903.37v875.72c0,563.28-460.88,1024.86-1024.16,1024.86H1071.43c-563.29,0-1024.16-460.87-1024.16-1024.16V1026.9C47.27,463.61,508.14,2.74,1071.43,2.74Z" transform="translate(-47.27 -2.74)" fill="#fd390e" fill-rule="evenodd"/>
                                                </g>
                                            </svg>
                                        </a>  
                                    @endif
                                </li>
                            @endif
                            @if($activity->subactivity->inquirer)
                                <li class="mt-2 mb-0">
                                    <b>استعلام کننده: </b>
                                    @if($activity->subactivity->inquirer == "private_company")
                                    شرکت خصوصی
                                    @elseif($activity->subactivity->inquirer == "public_company")
                                    شرکت دولتی
                                    @elseif($activity->subactivity->inquirer == "individual")
                                    شخص حقیقی
                                    @endif
                                </li>
                            @endif
                            @if($activity->subactivity->inquiry_number)
                                <li class="mt-2 mb-0">
                                    <b>شماره استعلام: </b>
                                    {{$activity->subactivity->inquiry_number}}
                                </li>
                            @endif
                            @if($activity->subactivity->inquiry_exp_date_start && $activity->subactivity->inquiry_exp_date_end)
                                <li class="mt-2 mb-0">
                                    <b>تاریخ اعتبار استعلام: </b>
                                    {{$activity->subactivity->inquiry_exp_date_start}}
                                    الی
                                    {{$activity->subactivity->inquiry_exp_date_end}}
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                @if($activity->license->count())
                    <a class="btn btn-lg btn-primary w-100 mb-3" href="{{route('get-license-item-zip', [$activity->id])}}">
                        <i class="fi-download-file"></i>
                        دانلود مدارک
                    </a>
                @endif
                
                <!-- Post meta-->
                <ul class="d-flex mb-4 list-unstyled fs-sm">
                    <li class="me-3 pe-3 border-end">زمان انتشار: 
                        <b> 
                            {{jdate($activity->subactivity->updated_at)->ago()}}    
                        </b>
                    </li>
                    <li class="me-3 pe-3 border-end">شماره آگهی: 
                        <b>
                            {{$activity->id}}
                        </b>
                    </li>
                    <li class="me-3 pe-3">بازدید: <b>100 نفر</b></li>
                </ul>
            </div>
        </aside>
    </div>
</section>


<!-- Recently viewed-->
@if($similarItemsCount > 4)
    <section class="container mb-5 pb-2 pb-lg-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h3 mb-0">
                آگهی های مشابه
            </h2>
            <a class="btn btn-link fw-normal p-0" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'contractor', 'type' => 'contractor'])}}">
                مشاهده همه
                <i class="fi-arrow-long-left ms-2"></i>
            </a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
            <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">

                @foreach($similarItems as $similarItem)
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover">
                                <a class="img-overlay" href="{{route('activity', $similarItem->activity->slug)}}"></a>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="نشان کردن">
                                        <i class="fi-bookmark"></i>
                                    </button>
                                </div>
                                <img src="{{$similarItem->activity->adsImagesUrl()}}" alt="Image">
                            </div>
                                <div class="card-body position-relative pb-3">
                                <h3 class="h6 mb-2 fs-base">
                                    <a class="nav-link stretched-link" href="{{route('activity', $similarItem->activity->slug)}}">{{$similarItem->item_title}}</a>
                                </h3>
                                <p class="mb-2 fs-sm text-muted">
                                    {{$similarItem->address}}
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                                <span class="d-inline-block mx-1 px-2 fs-sm">
                                    {{jdate($similarItem->activity->updated_at)->ago()}}
                                    <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            
            </div>
        </div>
    </section>
@endif

@endsection