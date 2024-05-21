<div>
    <!-- home page category section -->
    <section class="position-relative bg-white rounded-xxl-4 zindex-5">
        <div class="container pb-5">
            <div class="row">
                <div class="home-page-category-circles">

                    <a class="text-decoration-none text-dark text-center" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'selling', 'type' => 'selling'])}}">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/selling.jpg')}}" alt="selling">    
                        <span>
                            مصالح و تجهیزات
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'employment'])}}">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/employment.jpg')}}" alt="employment">    
                        <span>
                            کار و استخدام
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'investment'])}}">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/investment.jpg')}}" alt="investment">    
                        <span>
                            سرمایه گذاری و شراکت
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'bid'])}}">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/auction.jpg')}}" alt="bid">    
                        <span>
                            مزایده و مناقصه
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'inquiry'])}}">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/tender.jpg')}}" alt="tender">    
                        <span>
                            استعلام قیمت
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'contractor'])}}">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/eng_manager.jpg')}}" alt="eng_manager">    
                        <span>
                            خدمات مهندسی و پیمانکاری
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/technical.svg')}}" alt="technical">    
                        <span>
                            نیروهای فنی ساختمان
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="">
                        <div>
                            <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/projects.svg')}}" alt="projects">    
                            <span>
                                پروژه های خاص
                            </span>
                        </div>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/custom_page.jpg')}}" alt="custom_page">    
                        <span>
                            فروشگاه ها / شرکت ها
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- two banners -->
    @if($isMiddleOneBannerShown)
        <section class="position-relative bg-white rounded-xxl-4 zindex-5">
            <div class="container pt-1 pb-5">
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <a href="{{$middleOneRightLinkUrl}}">
                            <img class="d-block rounded-3" src="{{$middleOneRightBannerImageAddress}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-6 mt-2">
                        <a href="{{$middleOneLeftLinkUrl}}">
                            <img class="d-block rounded-3" src="{{$middleOneLeftBannerImageAddress}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Carousel with slides count-->
    @if($isSlideOneShown)
        <section class="position-relative bg-white rounded-xxl-4 zindex-5">
            <div class="container pt-4 pb-2">
                <div class="row">
                    <div class="order-lg-1 order-2">
                        <div class="tns-carousel-wrapper">
                            <div class="tns-carousel-inner" data-carousel-options="{&quot;autoplay&quot;: true, &quot;navAsThumbnails&quot;: false,  &quot;gutter&quot;: 12, &quot;responsive&quot;: {&quot;0&quot;:{&quot;controls&quot;: false},&quot;500&quot;:{&quot;controls&quot;: true}}}">
                                @if($firstSlideImageAddress != '')
                                    <div class="d-flex justify-content-center">
                                        <a href="{{$firstSlideLinkUrl}}">
                                            <img class="rounded-3" src="{{$firstSlideImageAddress}}" alt="Image">
                                        </a>
                                    </div>
                                @endif
                                @if($secondSlideImageAddress != '')
                                    <div class="d-flex justify-content-center">
                                        <a href="{{$secondSlideLinkUrl}}">
                                            <img class="rounded-3" src="{{$secondSlideImageAddress}}" alt="Image">
                                        </a>
                                    </div>
                                @endif
                                @if($thirdSlideImageAddress != '')
                                    <div class="d-flex justify-content-center">
                                        <a href="{{$thirdSlideLinkUrl}}">
                                            <img class="rounded-3" src="{{$thirdSlideImageAddress}}" alt="Image">
                                        </a>
                                    </div>
                                @endif
                                @if($fourthSlideImageAddress != '')
                                    <div class="d-flex justify-content-center">
                                        <a href="{{$fourthSlideLinkUrl}}">
                                            <img class="rounded-3" src="{{$fourthSlideImageAddress}}" alt="Image">
                                        </a>
                                    </div>
                                @endif
                                @if($fifthSlideImageAddress != '')
                                    <div class="d-flex justify-content-center">
                                        <a href="{{$fifthSlideLinkUrl}}">
                                            <img class="rounded-3" src="{{$fifthSlideImageAddress}}" alt="Image">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- List of all jobs -->
    <section class="position-relative bg-white rounded-xxl-4 zindex-5 mt-5">

        <div class="container pb-5">
            <div class="pb-2">
                <h5 class="pb-3">کلیه آگهی ها</h5>
                
                @if(count($adsRegistrations))
                    <div class="row row-cols-xl-3 row-cols-sm-2 row-cols-1 gy-4 gx-3 gx-xxl-4 py-4">

                        @foreach ($adsRegistrations as $adsRegistrationItem)
            
                            <!-- Item-->
                            <div class="col pb-sm-2">
                                <div class="position-relative">
                                    <div class="position-relative mb-3">
                                        <button class="btn btn-icon btn-light-primary btn-xs text-primary rounded-circle position-absolute top-0 end-0 m-3 zindex-5" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="نشان کردن" data-bs-original-title="نشان کردن">
                                            <i class="fi-bookmark"></i>
                                        </button>
                                        <img class="rounded-3" src="{{$adsRegistrationItem->adsImagesUrl()}}" alt="Article img">
                                    </div>
                                    <h3 class="mb-2 fs-lg">
                                        <a class="nav-link stretched-link" href="{{route('activity', $adsRegistrationItem->slug)}}">
                                            {{$adsRegistrationItem->subactivity->item_title}}
                                        </a>
                                    </h3>
                                    <ul class="list-inline mb-0 fs-sm">
                                        <li class="list-inline-item pe-1">
                                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                            {{jdate($adsRegistrationItem->updated_at)->ago()}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
            
                        @endforeach
                    </div>
                @else
                    <div class="mx-2">
                        <div class="alert alert-accent" role="alert">
                            هیچ موردی یافت نشد!
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        
        
    </section>
</div>