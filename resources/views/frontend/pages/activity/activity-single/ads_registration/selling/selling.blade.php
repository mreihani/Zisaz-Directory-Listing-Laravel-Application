@extends('frontend.master')
@section('main')

<!-- Page content-->
<section class="position-relative bg-white rounded-xxl-4 zindex-5" style="margin-top: 90px;">
    <div class="container pt-4 pb-5 mb-md-4">
        <!-- Breadcrumb-->
        <nav class="pb-4 my-2" aria-label="Breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('home-page')}}">خانه</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="">آگهی فروش</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">آگهی فروش کالا</li>
            </ol>
        </nav>
        <div class="row">
            <!-- Signle job content-->
            <div class="col-lg-7 position-relative pe-lg-5 mb-5 mb-lg-0" style="z-index: 1025;">
                <div class="d-flex justify-content-between mb-2">
                    <h2 class="h4 mb-0 font-vazir">
                        {{$activity->subactivity->item_title}}
                    </h2>
                    <div class="text-end">
                        <span class="badge bg-faded-accent rounded-pill fs-sm mb-2">ویژه</span>
                        <div class="fs-sm text-muted">
                            {{jdate($activity->subactivity->updated_at)->ago()}}
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled fs-sm mb-4">
                    <li class="d-flex align-items-center mb-2">
                        <i class="fi-list text-muted me-2"></i>
                        <span>
                            {{$activity->activityGroups->first()->title}}
                        </span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fi-globe text-muted me-2"></i>
                        @if($activity->subactivity->manufacturer == "iran_overseas")
                            <span>
                                ایرانی و خارجی
                            </span>
                        @elseif($activity->subactivity->manufacturer == "iran")
                            <span>
                                ایرانی
                            </span>
                        @else
                            <span>
                                خارجی
                            </span>
                        @endif
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fi-map-pin text-muted me-2"></i>
                       
                        <span>
                            {{$activity->subactivity->city->province->title}}
                        </span>

                        ،&nbsp;

                        <span>
                            {{$activity->subactivity->city->title}}
                        </span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fi-cash fs-base text-muted me-2"></i>
                        @if($activity->subactivity->price && !$activity->subactivity->price_by_agreement)
                            <span>
                                {{$activity->subactivity->price}}
                                تومان
                            </span>
                        @else    
                            <span>
                                توافقی
                            </span>
                        @endif
                    </li>
                    
                    <li class="d-flex align-items-center mb-2">
                        <i class="fi-phone fs-base text-muted me-2"></i>

                        @livewire('frontend.auth.login.open-login-modal', ['phone' => $activity->user->phone])
                    </li>
                </ul>
                <hr class="mb-4">

                @if($activity->subactivity->product_brand)
                    <h3 class="h6">برند کالا: </h3>
                    <p class="line-h18">
                        {{$activity->subactivity->product_brand}}
                    </p>
                @endif

                @if($activity->subactivity->item_description)
                    <h3 class="h6">توضیحات: </h3>
                    <p class="line-h18">
                        {{$activity->subactivity->item_description}}
                    </p>
                @endif
                   
                @if($activity->adsStats->count())
                    <h3 class="h6 pt-2">وضعیت آگهی: </h3>
                    <ul class="list-unstyled">
                        @foreach ($activity->adsStats as $adsStatusItem)
                            <li class="d-flex">
                                <span class="text-primary fs-lg me-2">•</span>
                                {{$adsStatusItem->title}}
                            </li> 
                        @endforeach
                    </ul>
                @endif

                @if($activity->paymentMethod->count())
                    <h3 class="h6 pt-2">روش پرداخت: </h3>
                    <ul class="list-unstyled">
                        @foreach ($activity->paymentMethod as $paymentMethodItem)
                            <li class="d-flex">
                                <span class="text-primary fs-lg me-2">•</span>
                                {{$paymentMethodItem->title}}
                            </li> 
                        @endforeach
                    </ul>
                @endif

                @if($activity->subactivity->address)
                    <h3 class="h6 pt-2">آدرس: </h3>
                    <p class="line-h18">
                        {{$activity->subactivity->address}}
                    </p>
                @endif

                @if($activity->subactivity->lt && $activity->subactivity->ln)
                    <!-- Map-->
                    <div class="row" id="jaban-map-container" wire:ignore>
                        <div class="col-12 mb-4 mt-3">
                            <div id="map" style="height: 400px;" x-init="
                                let marker; 
                                const map = new L.Map('map', {
                                    key: 'web.e4b772dc75484285a83a98d6466a4c10',
                                    maptype: 'neshan',
                                    poi: false,
                                    traffic: false,
                                    center: [@js($activity->subactivity->lt), @js($activity->subactivity->ln)],
                                    zoom: 14,
                                }); 
                                L.marker([@js($activity->subactivity->lt), @js($activity->subactivity->ln)]).addTo(map);
                                ">
                            </div>
                        </div>
                    </div>
                @endif

                <hr class="my-4">
            </div>

            <!-- Sticky sidebar-->
            <aside class="col-lg-5" style="margin-top: -6rem;">
                <div class="sticky-top" style="padding-top: 6rem;">

                    <!-- Ads Images (carousel)-->
                    @if($activity->adsImages->count())
                        <div class="card card-flush pb-3 pb-lg-0 mb-4">
                            <div class="card-body">
                            <h4 class="h5">
                                تصاویر محصول
                            </h4>
                            <div class="tns-carousel-wrapper mx-n3 ads-images-carousel-wrapper">
                                <div class="tns-carousel-inner d-block" data-carousel-options="{&quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;controlsContainer&quot;: &quot;#externalControls&quot;}">
                                    @foreach($activity->adsImages as $adsImageItem)
                                        <article class="px-3 pb-4">
                                            <div class="card border-0 shadow-sm">
                                                <img class="d-block cursor-pointer" src="{{asset($adsImageItem->image)}}" alt="Image">
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tns-carousel-controls justify-content-center mt-n2" id="externalControls">
                                <button class="me-3" type="button"><i class="fi-chevron-left fs-xs"></i></button>
                                <button type="button"><i class="fi-chevron-right fs-xs"></i></button>
                            </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Subscription-->
                    <div class="card shadow-sm p-lg-3 mb-3 mb-lg-0">
                        <div class="card-body p-lg-4">
                            <h2 class="h4 font-vazir">عضویت در خبرنامه</h2>
                            <p>هیچ گونه به روزرسانی شغلی و اطلاعات مربوط به موقعیت های خالی را از دست ندهید!</p>
                            <form class="form-group rounded-pill mb-3">
                                <div class="input-group"><span class="input-group-text text-muted"><i class="fi-mail text-muted"></i></span>
                                    <input class="form-control" type="text" placeholder="پست الکترونیکی">
                                </div>
                                <button class="btn btn-primary rounded-pill" type="button">ثبت</button>
                            </form>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agree">
                                <label class="form-check-label" for="agree">من با دریافت خبرهای جدید از سایت موافقم.</label>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex align-items-end">
                                <div class="fs-md me-3">آیا به دنبال یه شغل مناسب هستید؟<br>دریافت آخرین فرصت های شغلی در کانال تلگرام</div>
                                <a class="btn btn-icon btn-translucent-primary btn-xs rounded-circle" href="#">
                                    <i class="fi-telegram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </aside>
        </div>
    </div>
</section>

@if($similarItemsCount > 3)
    <!-- Related Ads-->
    <section class="container pt-md-2 pb-5 mb-md-4">
        <div class="d-sm-flex align-items-center justify-content-between pb-4 mb-sm-2">
            <h2 class="h4 mb-sm-0 font-vazir">آگهی های مشابه</h2>
            <a class="btn btn-link fw-normal p-0" 
                href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'selling', 'ads_type' => 'selling'])}}">
                مشاهده همه
                <i class="fi-arrow-long-left ms-2"></i>
            </a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 16},&quot;600&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 16},&quot;768&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 24},&quot;992&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 24}}}">
                @foreach($similarItems as $similarItem)
                    <!-- Item-->
                    <div class="pb-4">
                        <div class="card bg-secondary card-hover h-100">
                            <div class="card-body pb-3">
                                
                                <div class="d-flex align-items-center mb-2">
                                    <img class="me-2" src="{{asset('assets/frontend/img/job-board/company/it-pro.png')}}" width="24" alt="IT Pro Logo">
                                    <span class="fs-sm text-dark opacity-80 px-1">پرشین سیر</span>
                                    <span class="badge bg-faded-danger rounded-pill fs-sm ms-auto">فوری</span>
                                </div>

                                <h3 class="h6 card-title pt-1 mb-2">
                                    <a class="text-nav stretched-link text-decoration-none" href="{{route('activity', $similarItem->activity->slug)}}">
                                        {{$similarItem->item_title}}
                                    </a>
                                </h3>
                                <p class="fs-sm mb-0">
                                    {{$similarItem->item_description}}
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between border-0 pt-0">
                                <div class="fs-sm">
                                    <span class="text-nowrap me-3">
                                        <i class="fi-map-pin text-muted me-1"> </i>
                                        <span>
                                            {{$similarItem->city->title}}
                                        </span>
                                    </span>
                                    <span class="text-nowrap me-3">
                                        <i class="fi-cash fs-base text-muted me-1"></i>
                                        @if($similarItem->price && !$similarItem->price_by_agreement)
                                            <span>
                                                {{$similarItem->price}}
                                                تومان
                                            </span>
                                        @else    
                                            <span>
                                                توافقی
                                            </span>
                                        @endif
                                    </span>
                                </div>
                                <button class="btn btn-icon btn-light btn-xs text-primary shadow-sm rounded-circle content-overlay" type="button" data-bs-toggle="tooltip" title="نشان کردن">
                                    <i class="fi-bookmark"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@endsection

