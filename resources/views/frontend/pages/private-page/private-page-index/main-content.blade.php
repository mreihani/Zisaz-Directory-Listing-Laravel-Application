<div class="container pt-5 pb-lg-4 mt-5 mb-sm-2">
    
    <!-- Page content-->
    <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 col-md-5 pe-xl-4 mb-5">
            <!-- Address nav-->
            <div class="card card-body border-0 shadow-sm pb-5 me-lg-1">
                <div class="d-flex d-md-block d-lg-flex align-items-start pt-lg-2 mb-4">
                    <img class="rounded-circle" src="{{asset($psite->info->logo)}}" width="48" alt="">
                    <div class="pt-md-2 pt-lg-0 ps-3 ps-md-0 ps-lg-3">
                        <h2 class="fs-lg mb-0">
                            {{$psite->info->title}}
                        </h2>
                        <span class="">
                            <svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-rosette-discount-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                            </svg>
                            این واحد دارای پروانه کسب می باشد
                        </span>
                        <ul class="list-unstyled fs-sm mt-3 mb-0">
                            @if(!empty($psite->contactUs->phone))
                                <li>
                                    <a class="nav-link fw-normal p-0" href="tel:{{$psite->contactUs->phone}}">
                                        <i class="fi-phone opacity-60 me-2"></i>
                                        {{$psite->contactUs->phone}}
                                    </a>
                                </li>
                            @endif
                            @if(!empty($psite->contactUs->email))
                                <li>
                                    <a class="nav-link fw-normal p-0" href="mailto:{{$psite->contactUs->email}}">
                                        <i class="fi-mail opacity-60 me-2"></i>
                                        {{$psite->contactUs->email}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                
                <div>
                    <img class="rounded" src="{{asset($psite->info->business_banner)}}" width="360" height="200" alt="">
                </div>
                
                @if(!empty($psite->licenses) && count($psite->licenses->psiteLicenseItem) && !$psite->licenses->is_hidden) 
                    <div class="tns-carousel-wrapper tns-controls-static tns-nav-outside mt-4">
                        <div class="row g-2 g-md-3 gallery" data-thumbnails="true" >
                            <div class="tns-carousel-inner text-center" data-carousel-options="{&quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 2000, &quot;gutter&quot;: 16}">
                                @foreach ($psite->licenses->psiteLicenseItem as $item)
                                    <div class="d-flex justify-content-center">
                                        <a class="gallery-item rounded rounded-md-3" href="{{asset($item->item_image)}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;مجوز&lt;/h6&gt;">
                                            <img style="height: 118px; width:auto;" class="rounded-3" src="{{asset($item->item_image_sm)}}" alt="Gallery thumbnail">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Map-->
                @if(!empty($psite->contactUs) && $psite->contactUs->lt && $psite->contactUs->ln)
                    <div class="card border-0">
                        <div class="row" id="jaban-map-container">
                            <div class="col-12 mb-4 mt-3">
                                <div class="rounded" id="map" style="height: 220px;" x-init="
                                    let marker; 
                                    const map = new L.Map('map', {
                                        key: 'web.e4b772dc75484285a83a98d6466a4c10',
                                        maptype: 'neshan',
                                        poi: false,
                                        traffic: false,
                                        center: [@js($psite->contactUs->lt), @js($psite->contactUs->ln)],
                                        zoom: 14,
                                    }); 
                                    L.marker([@js($psite->contactUs->lt), @js($psite->contactUs->ln)]).addTo(map);
                                    ">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!empty($psite->contactUs))
                    <div>
                        <i class="fi-map-pin"></i>
                        نشانی:
                        {{$psite->contactUs->address}}
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="alert alert-info d-flex" role="alert">
                        <div class="col-6 d-flex flex-column">
                            <span class="fw-bolder text-dark">
                                لینک فروشگاه
                            </span>
                            <span class="text-wrap">
                                <a class="text-info text-decoration-none" href="{{Request::root()}}/portal/{{$psite->slug}}">
                                    {{Request::root()}}/portal/{{$psite->slug}}
                                </a>
                            </span>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <button id="copyUrlBtn" class="btn btn-icon bg-info btn-xs text-white rounded-circle shadow-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="کپی لینک" data-bs-original-title="کپی لینک">
                                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-copy">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                    <path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap mt-4">
                    <a class="btn btn-sm btn-translucent-success mx-1 my-1" href="#">
                        آگهی ها
                    </a>
                    <a class="btn btn-sm btn-translucent-success mx-1 my-1" href="#">
                        پروژه ها
                    </a>
                    <a class="btn btn-sm btn-translucent-success mx-1 my-1" href="#">
                        خدمات
                    </a>
                    <a class="btn btn-sm btn-translucent-success mx-1 my-1" href="#">
                        همکاران
                    </a>
                    <a class="btn btn-sm btn-translucent-success mx-1 my-1" href="#">
                        تماس با ما
                    </a>
                    <a class="btn btn-sm btn-translucent-success mx-1 my-1" href="#">
                        مجله زی ساز
                    </a>
                </div>
            </div>

            <!-- About us nav-->
            <div class="card card-body border-0 shadow-sm pb-5 me-lg-1 mt-3">
                
                @if(!empty($psiteFirstSliderSlideOne) && $psiteFirstSliderSlideOne->display_banner)
                    <div class="tns-carousel-wrapper tns-controls-static tns-nav-outside mt-4">
                        <div class="tns-carousel-inner text-center" data-carousel-options="{&quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 2000, &quot;gutter&quot;: 16}">

                            @if(!empty($psiteFirstSliderSlideOne))
                                <div>
                                    <a href="{{asset($psiteFirstSliderSlideOne->url)}}">
                                        <img class="rounded-3" src="{{asset($psiteFirstSliderSlideOne->image)}}" alt="Carousel image">
                                    </a>
                                </div>
                            @endif

                            @if(!empty($psiteFirstSliderSlideTwo))
                                <div>
                                    <a href="{{asset($psiteFirstSliderSlideTwo->url)}}">
                                        <img class="rounded-3" src="{{asset($psiteFirstSliderSlideTwo->image)}}" alt="Carousel image">
                                    </a>
                                </div>
                            @endif

                            @if(!empty($psiteFirstSliderSlideThree))
                                <div>
                                    <a href="{{asset($psiteFirstSliderSlideThree->url)}}">
                                        <img class="rounded-3" src="{{asset($psiteFirstSliderSlideThree->image)}}" alt="Carousel image">
                                    </a>
                                </div>
                            @endif

                            @if(!empty($psiteFirstSliderSlideFour))
                                <div>
                                    <a href="{{asset($psiteFirstSliderSlideFour->url)}}">
                                        <img class="rounded-3" src="{{asset($psiteFirstSliderSlideFour->image)}}" alt="Carousel image">
                                    </a>
                                </div>
                            @endif

                            @if(!empty($psiteFirstSliderSlideFive))
                                <div>
                                    <a href="{{asset($psiteFirstSliderSlideFive->url)}}">
                                        <img class="rounded-3" src="{{asset($psiteFirstSliderSlideFive->image)}}" alt="Carousel image">
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                @endif

                <div class="mt-1">
                    <div class="fw-bolder text-dark">
                        درباره ما
                    </div>
                    <div>
                        {{$psite->info->about_us}}
                    </div>
                </div>

                @if(!empty($psite->contactUs->instagram) 
                || !empty($psite->contactUs->telegram) 
                || !empty($psite->contactUs->whatsapp) 
                || !empty($psite->contactUs->x) 
                || !empty($psite->contactUs->linkedin) 
                || !empty($psite->contactUs->eitaa))
                    <div class="mt-4">
                        <div class="fw-bolder text-dark mb-2">
                            شبکه های اجتماعی
                        </div>

                        @if(!empty($psite->contactUs->instagram))
                            <a class="btn btn-icon btn-light my-1" href="{{$psite->contactUs->instagram}}">
                                <i class="fi-instagram text-body"></i>
                            </a>
                        @endif

                        @if(!empty($psite->contactUs->telegram))
                            <a class="btn btn-icon btn-light my-1" href="{{$psite->contactUs->telegram}}">
                                <i class="fi-telegram text-body"></i>
                            </a>
                        @endif

                        @if(!empty($psite->contactUs->whatsapp))
                            <a class="btn btn-icon btn-light my-1" href="{{$psite->contactUs->whatsapp}}">
                                <img width="16" src="{{asset('assets/frontend/img/jaban/x-icon/X_icon.svg.png')}}" alt="">
                            </a>
                        @endif

                        @if(!empty($psite->contactUs->x))
                            <a class="btn btn-icon btn-light my-1" href="{{$psite->contactUs->x}}">
                                <i class="fi-whatsapp text-body"></i>
                            </a>
                        @endif

                        @if(!empty($psite->contactUs->linkedin))
                            <a class="btn btn-icon btn-light my-1" href="{{$psite->contactUs->linkedin}}">
                                <i class="fi-linkedin text-body"></i>
                            </a>
                        @endif

                        @if(!empty($psite->contactUs->eitaa))
                            <a class="btn btn-icon btn-light my-1" href="{{$psite->contactUs->eitaa}}">
                                <img width="15" src="{{asset('assets/frontend/img/jaban/eitaa-icon/eitaa-icon-black.svg')}}" alt="">
                            </a>
                        @endif
                    </div>
                @endif
                
            </div>
        </aside>
        
        <div class="col-lg-8 col-md-7 mb-5">
            
            <!-- Ads Content-->
            @if($ads->count())
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2">
                        <div class="h5 mb-0">
                            آگهی ها
                        </div>
                        <div>
                            <a class="text-decoration-none text-dark" href="#">
                                بیشتر
                                <i class="fi-chevron-right" style="font-size: 10px;"></i>
                            </a>
                        </div>
                    </div>
        
                    <!-- Item-->
                    <div class="py-4 responsive-two-column-grid">
                        @foreach ($ads as $adsItem)
            
                            <!-- Item-->
                            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4 mx-2">
                                <a class="card-img-top" href="{{route('activity', $adsItem->activity->slug)}}" style="background-image: url('{{$adsItem->activity->adsImagesUrl()}}');"></a>
                                <div class="card-body position-relative pb-3 d-flex flex-column justify-content-between">

                                    @if($adsItem->type == 'selling')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی فروش کالا
                                        </h4>
                                    @elseif($adsItem->type == 'employee')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی استخدام (کارجو)
                                        </h4>
                                    @elseif($adsItem->type == 'employer')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی استخدام (کارفرما)
                                        </h4>
                                    @elseif($adsItem->type == 'investor')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی شراکت و سرمایه گذاری (سرمایه گذار)
                                        </h4>
                                    @elseif($adsItem->type == 'invested')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی شراکت و سرمایه گذاری (سرمایه پذیر)
                                        </h4>
                                    @elseif($adsItem->type == 'auction')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی مزایده
                                        </h4>
                                    @elseif($adsItem->type == 'tender_buy')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی مناقصه (خرید)
                                        </h4>
                                    @elseif($adsItem->type == 'tender_project')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی مناقصه (اجرای پروژه)
                                        </h4>
                                    @elseif($adsItem->type == 'inquiry_buy')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی استعلام قیمت (خرید)
                                        </h4>
                                    @elseif($adsItem->type == 'inquiry_project')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی استعلام قیمت (اجرای پروژه)
                                        </h4>
                                    @elseif($adsItem->type == 'contractor')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            آگهی پیمانکاری
                                        </h4>
                                    @endif

                                    <h3 class="h6 mb-2 fs-base">
                                        <a class="nav-link" href="{{route('activity', $adsItem->activity->slug)}}">
                                            {{$adsItem->item_title}}
                                        </a>
                                    </h3>
                                    
                                    <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                                        <span class="d-inline-block me-4 fs-sm me-3 pe-3">
                                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                            {{jdate($adsItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </div>
                            </div>
            
                        @endforeach
                    </div>
                </div>
            @endif
        
            <!-- Projects Content-->
            @if($projects->count())
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2">
                        <div class="h5 mb-0">
                            پروژه ها
                        </div>
                        <div>
                            <a class="text-decoration-none text-dark" href="#">
                                بیشتر
                                <i class="fi-chevron-right" style="font-size: 10px;"></i>
                            </a>
                        </div>
                    </div>
        
                    <!-- Item-->
                    <div class="py-4 responsive-two-column-grid">
                        @foreach ($projects as $projectItem)
            
                            <!-- Item-->
                            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4 mx-2" >
                                <a class="card-img-top" href="{{route('project', $projectItem->slug)}}" style="background-image: url('{{asset($projectItem->projectImages->first()->image_sm)}}');"></a>
                                <div class="card-body position-relative pb-3 d-flex flex-column justify-content-between">
                
                                    @if($projectItem->project_type == '1')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه مسکونی
                                        </h4>
                                    @elseif($projectItem->project_type == '2')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تجاری
                                        </h4>
                                    @elseif($projectItem->project_type == '3')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تجاری مسکونی
                                        </h4>
                                    @elseif($projectItem->project_type == '4')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تجاری اداری
                                        </h4>
                                    @elseif($projectItem->project_type == '5')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تفریحی و ورزشی
                                        </h4>
                                    @elseif($projectItem->project_type == '6')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه پزشکی درمانی
                                        </h4>
                                    @elseif($projectItem->project_type == '7')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه آموزشی
                                        </h4>
                                    @elseif($projectItem->project_type == '8')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه کشاورزی و صنعتی
                                        </h4>
                                    @elseif($projectItem->project_type == '9')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            سایر پروژه ها
                                        </h4>
                                    @endif
                                      
                                    <h3 class="h6 mb-2 fs-base">
                                        <a class="nav-link" href="{{route('project', $projectItem->slug)}}">
                                            {{$projectItem->projectInfo->title}}
                                        </a>
                                    </h3>
                                    
                                    <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                                        <span class="d-inline-block me-4 fs-sm me-3 pe-3">
                                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                            {{jdate($projectItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </div>
                            </div>
            
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Video Content-->
            @if(!empty($psite->promotionalVideo) && !is_null($psite->promotionalVideo->video) && !$psite->promotionalVideo->is_hidden) 
                <div class="ratio ratio-16x9 mt-5">
                    <video class="rounded-3" width="750" height="441" controls>
                        <source src="{{asset($psite->promotionalVideo->video)}}" type="video/mp4">
                    </video>
                </div>
            @endif
                
            <!-- Members Content-->
            @if(!empty($psite->members) && !$psite->members->is_hidden && !empty($psite->members->psiteMemberItem) && count($psite->members->psiteMemberItem) )
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2">
                        <div class="h5 mb-0">
                            همکاران ما
                        </div>
                    </div>
        
                    <section class="container mb-5 pb-2 pb-lg-5 px-5">
                        <!-- Team carousel-->
                        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
                            <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
                                <!-- Team slide-->
                                @foreach ($psite->members->psiteMemberItem as $memberItem)
                                    <div class="col">
                                        <div class="card border-0 shadow-sm">
                                            <img class="card-img-top" src="{{asset($memberItem->item_image)}}" alt="team">
                                            <div class="card-body text-center">
                                                <h3 class="h5 card-title mb-2">
                                                    {{$memberItem->item_fullname}}
                                                </h3>
                                                <span class="d-inline-block fs-sm">
                                                    {{$memberItem->item_role}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            @endif

            @if($mags->count())
                <!-- Mag Content-->
                <section class="container mb-5 pb-lg-5">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-2">
                        <h2 class="h3 mb-sm-0 ">
                            مجله زی ساز
                        </h2>
                        <a class="btn btn-link fw-normal me-sm-3 p-0" href="{{route('get-mags')}}">
                            مشاهده همه
                            <i class="fi-arrow-long-left ms-2"></i>
                        </a>
                    </div>
                    <!-- Carousel-->
                    <div class="tns-carousel-wrapper tns-nav-outside">
                        <div class="tns-carousel-inner d-block" data-carousel-options="{&quot;controls&quot;: false, &quot;gutter&quot;: 24, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1,&quot;nav&quot;:true},&quot;500&quot;:{&quot;items&quot;:2},&quot;850&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}}}">

                            @foreach($mags as $mag)
                                <!-- Item-->
                                <article>
                                    <a class="d-block mb-3" href="{{route('mag', $mag->slug)}}">
                                        <img class="rounded-3" src="{{asset($mag->image_sm)}}" alt="Post image">
                                    </a>
                                    <a class="fs-sm text-uppercase text-decoration-none" href="{{route('mag', $mag->slug)}}">
                                        {{$mag->title}}
                                    </a>
                                    <h3 class="fs-base pt-1">
                                        <a class="nav-link" href="{{route('mag', $mag->slug)}}">
                                            {!! \Illuminate\Support\Str::limit($mag->body, 100, '...') !!}
                                        </a>
                                    </h3>
                                    <a class="d-flex align-items-center text-decoration-none" href="{{route('mag', $mag->slug)}}">
                                        <div class="ps-2">
                                            <div class="d-flex text-body fs-xs">
                                                <span class="me-2 pe-1">
                                                    <i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>
                                                    {{jdate($mag->updated_at)->format('%A, %d %B %y')}}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                            
                        </div>
                    </div>
                </section>

            @endif
        </div>
    </div>
</div>

<script>
    const copyUrlBtn = document.getElementById('copyUrlBtn');

    // Get the parent element of the button (div with class 'row')
    const parentElement = copyUrlBtn.closest('.row');

    // Find the anchor tag within the parent element
    const anchorTag = parentElement.querySelector('a');

    // Get the href attribute value of the anchor tag
    const hrefLink = anchorTag.getAttribute('href');

    copyUrlBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(hrefLink);
    });
</script>
