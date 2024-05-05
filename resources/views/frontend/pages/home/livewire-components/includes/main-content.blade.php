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

                    <a class="text-decoration-none text-dark text-center" href="">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/auction.jpg')}}" alt="auction">    
                        <span>
                            مزایده و مناقصه
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/tender.jpg')}}" alt="tender">    
                        <span>
                            استعلام قیمت
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/eng_manager.jpg')}}" alt="eng_manager">    
                        <span>
                            پیمانکاران
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="">
                        <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/technical.jpg')}}" alt="technical">    
                        <span>
                            نیروهای فنی ساختمان
                        </span>
                    </a>

                    <a class="text-decoration-none text-dark text-center" href="">
                        <div>
                            <img class="d-block rounded-circle mx-auto mx-md-0 mb-2" src="{{asset('assets/frontend/img/jaban/categories/projects.jpg')}}" alt="projects">    
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
    <section class="position-relative bg-white rounded-xxl-4 zindex-5 mt-3">
        <div class="container pb-5">
            <div class="pb-2">
                <h5 class="pb-3">کلیه آگهی ها</h5>
                
                @if(count($adsRegistrations))
                    <div class="row">
                        @foreach ($adsRegistrations as $adsRegistrationItem)
            
                            <!-- Item-->
                            <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                                <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                                    <a class="card-img-top" href="{{route('activity', $adsRegistrationItem->slug)}}" style="background-image: url('{{$adsRegistrationItem->adsImagesUrl()}}');"></a>
                                    <div class="d-flex flex-column justify-content-between p-3">
                                        <h4 class="fs-6 pt-1 mb-2">
                                            <a class="nav-link" href="{{route('activity', $adsRegistrationItem->slug)}}">
                                                {{$adsRegistrationItem->subactivity->item_title}}
                                            </a>
                                        </h4>
                                        <a class="text-decoration-none" href="{{route('activity', $adsRegistrationItem->slug)}}">
                                            <div class="text-body fs-xs">
                                                <span class="me-2 pe-1">
                                                    {{jdate($adsRegistrationItem->updated_at)->ago()}}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
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