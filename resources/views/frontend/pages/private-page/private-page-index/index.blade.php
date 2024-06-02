<!DOCTYPE html>
<html lang="fa">

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="shortcut icon" type="image/x-icon" href="{{$psite->footer ? asset($psite->footer->logo) : asset('assets/frontend/img/logo/zsaz_sm.png')}}" />
        <title>
            {{ $psite->aboutUs ? $psite->aboutUs->title : 'سایت ساز زی ساز' }}
        </title>
        <link rel="shortcut icon" href="{{$psite->footer ? asset($psite->footer->logo) : asset('assets/frontend/img/logo/zsaz_sm.png')}}" type="image/svg" />
        <link rel="stylesheet" href="{{asset('assets/frontend/css/private-site-styles/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/frontend/css/private-site-styles/lineicons.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/frontend/css/private-site-styles/tiny-slider.rtl.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/frontend/css/private-site-styles/glightbox.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/frontend/css/private-site-styles/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.css')}}"/>    
    </head>

    <style>
        :root {
            --font-family: "body-font", sans-serif;
            --primary: {!! $psite->color !!};
            --primary-dark: {!! $psite->color !!};
        }
    </style>

    <script src="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.js')}}"></script>

    <body>
        <section class="navbar-area navbar-nine is-rtl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html"> 
                                <img width="50" src="{{$psite->footer ? asset($psite->footer->logo) : asset('assets/frontend/img/logo/zsaz.png')}}" alt="Logo" /> 
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNine" aria-controls="navbarNine" aria-expanded="false" aria-label="Toggle navigation"> <span class="toggler-icon"></span> <span class="toggler-icon"></span> <span class="toggler-icon"></span> </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarNine">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item"> 
                                        <a class="page-scroll active" href="#hero-area">
                                            خانه
                                        </a> 
                                    </li>
                                    @if($psite->aboutUs && !$psite->aboutUs->is_hidden)
                                        <li class="nav-item"> 
                                            <a class="page-scroll" href="#about-us">
                                                درباره ما
                                            </a>
                                        </li>
                                    @endif
                                    @if($psite->services && !$psite->services->is_hidden)
                                        <li class="nav-item"> 
                                            <a class="page-scroll" href="#services">
                                                خدمات ما
                                            </a>
                                        </li>
                                    @endif
                                    @if($psite->projects && !$psite->projects->is_hidden)
                                        <li class="nav-item"> 
                                            <a class="page-scroll" href="#portfolio">
                                                پروژه های ما
                                            </a>
                                        </li>
                                    @endif
                                    @if($psite->ads && !$psite->ads->is_hidden && $showAdsSection)
                                        <li class="nav-item"> 
                                            <a class="page-scroll" href="#ads">
                                                آگهی های ما
                                            </a>
                                        </li>
                                    @endif
                                    @if($psite->contactUs && !$psite->contactUs->is_hidden)
                                        <li class="nav-item"> 
                                            <a class="page-scroll" href="#contact-us">
                                                تماس با ما
                                            </a>
                                        </li>
                                    @endif
                                    
                                </ul>
                            </div>
                            <div class="navbar-btn d-none d-lg-inline-block"> 
                                <a class="menu-bar" href="#side-menu-left">
                                    <i class="lni lni-menu"></i>
                                </a> 
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="sidebar-left is-rtl">
            <div class="sidebar-close"> 
                <a class="close" href="#close">
                    <i class="lni lni-close"></i>
                </a> 
            </div>
            <div class="sidebar-content">
                <div class="sidebar-logo">
                    <a href="">
                        <img src="{{asset('assets/frontend/img/logo/zsaz_sm2.png')}}" alt="Logo" />
                    </a>
                </div>
                <p class="text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک و هنرمندان است..</p>
                <div class="sidebar-menu">
                    <h5 class="menu-title">دسترسی سریع</h5>
                    <ul>
                        <li><a href="javascript:void(0)">درباره ما</a></li>
                        <li><a href="javascript:void(0)">اعضای تیم</a></li>
                        <li><a href="javascript:void(0)">آخرین مطالب</a></li>
                        <li><a href="javascript:void(0)">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="sidebar-social align-items-center justify-content-center">
                    <h5 class="social-title">ما را دنبال کنید</h5>
                    <ul>
                        <li> <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a> </li>
                        <li> <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a> </li>
                        <li> <a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a> </li>
                        <li> <a href="javascript:void(0)"><i class="lni lni-youtube"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="overlay-left"></div>

        <!-- Hero section -->
        <section id="hero-area" class="header-area header-eight is-rtl">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="header-content">
                            @if($psite->hero && $psite->hero->title)
                                <h1>
                                    {{$psite->hero->title}}
                                </h1>
                            @endif
                            @if($psite->hero && $psite->hero->description)
                                <p>
                                    {{$psite->hero->description}}
                                </p>
                            @endif
                            <div class="button d-flex justify-content-start align-items-center">
                                @if($psite->contactUs)
                                    <a href="#contactUs" class="btn primary-btn">
                                        تماس بگیرید
                                    </a>
                                @endif
                                @if($psite->hero 
                                && $psite->hero->is_video_displayed 
                                && $psite->promotionalVideo 
                                && !$psite->promotionalVideo->is_hidden 
                                && $psite->promotionalVideo->video)
                                    <a href="{{asset($psite->promotionalVideo->video)}}" class="glightbox video-button mt-0">
                                        <span class="btn icon-btn rounded-full">
                                            <i class="lni lni-play"></i>
                                        </span> 
                                        <span class="text">تماشای ویدئو</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        @if($psite->hero && $psite->hero->psiteHeroSliders->count() > 1)
                            <div class="col-12 testimonial-5 pb-0 pt-0 mt-5 ">
                                <div class="hero-section-slider ">
                                    @foreach ($psite->hero->psiteHeroSliders as $heroSliderItem)
                                        <div> 
                                            <img src="{{asset($heroSliderItem->slider_image)}}" alt="" /> 
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($psite->hero && $psite->hero->psiteHeroSliders->count() == 1)
                            <div class="header-image transform-180"> 
                                <img src="{{asset($psite->hero->psiteHeroSliders->first()->slider_image)}}" alt="#" /> 
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- ./Hero section -->

        <!-- about us section -->
        @if($psite->aboutUs && !$psite->aboutUs->is_hidden)
            <section class="about-area about-five is-rtl" id="about-us">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12">
                            <div class="about-image-five">
                                <svg class="shape transform-180" width="106" height="134" viewBox="0 0 106 134" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.66654" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="1.66654" cy="132" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.333" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.333" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.333" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.333" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.333" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="16.333" cy="132" r="1.66667" fill="#DADADA" />
                                    <circle cx="30.9998" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6665" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="30.9998" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6665" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="30.9998" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6665" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="30.9998" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6665" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="31" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6668" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="31" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6668" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="31" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6668" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="31" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6668" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="31" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6668" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="31" cy="132" r="1.66667" fill="#DADADA" />
                                    <circle cx="74.6668" cy="132" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="45.6665" cy="132" r="1.66667" fill="#DADADA" />
                                    <circle cx="89.3333" cy="132" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="1.66679" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="16.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="31.0001" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="45.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.333" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="60.3335" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.333" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="88.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.333" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="117.667" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.333" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="74.6668" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.333" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="103" r="1.66667" fill="#DADADA" />
                                    <circle cx="60.333" cy="132" r="1.66667" fill="#DADADA" />
                                    <circle cx="104" cy="132" r="1.66667" fill="#DADADA" />
                                </svg> 
                                @if($psite->aboutUs->image)
                                    <img src="{{asset($psite->aboutUs->image)}}" alt="about" />
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="about-five-content">
                                <h6 class="small-title text-lg">
                                    ما را بشناسید
                                </h6>
                                
                                @if($psite->aboutUs->header_description)
                                    <h2 class="main-title fw-bold">
                                        {{$psite->aboutUs->header_description}}
                                    </h2>
                                @endif
                                
                                <div class="about-five-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @if($psite->aboutUs->about_us)
                                                <button class="nav-link active" id="nav-who-tab" data-bs-toggle="tab" data-bs-target="#nav-who" type="button" role="tab" aria-controls="nav-who" aria-selected="true">
                                                    درباره ما
                                                </button>
                                            @endif
                                            @if($psite->aboutUs->licenses)
                                                <button class="nav-link" id="nav-vision-tab" data-bs-toggle="tab" data-bs-target="#nav-vision" type="button" role="tab" aria-controls="nav-vision" aria-selected="false">
                                                    مجوز ها و افتخارات
                                                </button>
                                            @endif
                                            @if($psite->aboutUs->contact_us)
                                                <button class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-history" aria-selected="false">
                                                    تماس با ما
                                                </button>
                                            @endif
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        @if($psite->aboutUs->about_us)
                                            <div class="tab-pane fade show active" id="nav-who" role="tabpanel" aria-labelledby="nav-who-tab">
                                                <p>
                                                    {{$psite->aboutUs->about_us}}
                                                </p>
                                            </div>
                                        @endif
                                        @if($psite->aboutUs->licenses)
                                            <div class="tab-pane fade" id="nav-vision" role="tabpanel" aria-labelledby="nav-vision-tab">
                                                <p>
                                                    {{$psite->aboutUs->licenses}}
                                                </p>
                                            </div>
                                        @endif
                                        @if($psite->aboutUs->contact_us)
                                            <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                                                <p>
                                                    {{$psite->aboutUs->contact_us}}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- ./about us section -->

        <!-- services section -->
        @if($psite->services && !$psite->services->is_hidden)
            <section id="services" class="services-area services-eight is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <h2 class="fw-bold">خدمات ما</h2>
                                    @if($psite->services->header_description)
                                        <p>
                                           {{$psite->services->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($psite->services->psiteServiceItem->count())
                    <div class="container">
                        <div class="row">
                            @foreach ($psite->services->psiteServiceItem as $psiteServiceItem)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-services">
                                        {{-- <div class="service-icon"> 
                                            <i class="lni lni-capsule"></i> 
                                        </div> --}}
                                        <div class="service-content">
                                            <h4>
                                                {{$psiteServiceItem->card_title}}
                                            </h4>
                                            <p> 
                                                {{$psiteServiceItem->card_description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </section>
        @endif
        <!-- ./services section -->

        <!-- promotional video section -->
        @if($psite->promotionalVideo && !$psite->promotionalVideo->is_hidden)
            <section class="video-area video-one is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    {{-- <h6>معرفی تیم ما</h6> --}}
                                    <h2 class="fw-bold">
                                        ویدئو تبلیغاتی ما را تماشا کنید
                                    </h2>
                                    <p>
                                        {{$psite->promotionalVideo->header_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="video-content text-center">
                                <img src="{{asset($psite->promotionalVideo->thumbnail)}}" alt="Video" />
                                <a class="video-popup glightbox" href="{{asset($psite->promotionalVideo->video)}}"> 
                                    <i class="lni lni-play"></i> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- ./promotional video section -->

        <!-- projects section -->
        {{-- @if($psite->projects && !$psite->projects->is_hidden)
            <section id="portfolio" class="portfolio-area portfolio-three is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <h6>
                                        نمونه کارها
                                    </h6>
                                    <h2 class="fw-bold">
                                        آخرین پروژه های ما
                                    </h2>
                                    @if($psite->projects->header_description)
                                        <p>
                                            {{$psite->projects->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="portfolio-menu text-center">
                                <button data-filter="all" class="active">تمام پروژه ها</button>
                                <button data-filter="branding">برندینگ</button>
                                <button data-filter="marketing">بازاریابی</button>
                                <button data-filter="planning">برنامه ریزی</button>
                                <button data-filter="research">تحقیقاتی</button>
                            </div>
                        </div>
                    </div>
                    <div class="row grid">
                        <div class="col-lg-4 col-sm-6 branding-3 planning-3" data-filter="branding">
                            <div class="portfolio-style-three">
                                <div class="portfolio-image">
                                    <img src="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf1.jpg')}}" alt="image" />
                                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                        <div class="portfolio-content">
                                            <div class="portfolio-icon">
                                                <a class="image-popup-three glightbox3" href="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf1.jpg')}}"> <i class="lni lni-zoom-in"> </i> </a>
                                            </div>
                                            <div class="portfolio-icon">
                                                <a href="javascript:void(0)"> <i class="lni lni-link"> </i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h4 class="portfolio-title">
                                        <a href="javascript:void(0)">طراحی گرافیکی</a>
                                    </h4>
                                    <p class="text"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و طراحان گرافیک است. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6" data-filter="research">
                            <div class="portfolio-style-three">
                                <div class="portfolio-image">
                                    <img src="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf2.jpg')}}" alt="image" />
                                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                        <div class="portfolio-content">
                                            <div class="portfolio-icon">
                                                <a class="image-popup-three glightbox3" href="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf2.jpg')}}"> <i class="lni lni-zoom-in"> </i> </a>
                                            </div>
                                            <div class="portfolio-icon">
                                                <a href="javascript:void(0)"> <i class="lni lni-link"> </i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h4 class="portfolio-title">
                                        <a href="javascript:void(0)">توسعه دهنده وب</a>
                                    </h4>
                                    <p class="text"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و طراحان گرافیک است. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6" data-filter="marketing">
                            <div class="portfolio-style-three">
                                <div class="portfolio-image">
                                    <img src="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf3.jpg')}}" alt="image" />
                                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                        <div class="portfolio-content">
                                            <div class="portfolio-icon">
                                                <a class="image-popup-three glightbox3" href="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf3.jpg')}}"> <i class="lni lni-zoom-in"> </i> </a>
                                            </div>
                                            <div class="portfolio-icon">
                                                <a href="javascript:void(0)"> <i class="lni lni-link"> </i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h4 class="portfolio-title">
                                        <a href="javascript:void(0)">توسعه دهنده اپلیکیشن</a>
                                    </h4>
                                    <p class="text"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و طراحان گرافیک است. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6" data-filter="planning">
                            <div class="portfolio-style-three">
                                <div class="portfolio-image">
                                    <img src="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf4.jpg')}}" alt="image" />
                                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                        <div class="portfolio-content">
                                            <div class="portfolio-icon">
                                                <a class="image-popup-three glightbox3" href="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf4.jpg')}}"> <i class="lni lni-zoom-in"> </i> </a>
                                            </div>
                                            <div class="portfolio-icon">
                                                <a href="javascript:void(0)"> <i class="lni lni-link"> </i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h4 class="portfolio-title">
                                        <a href="javascript:void(0)">دیجتیال مارکتینگ</a>
                                    </h4>
                                    <p class="text"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و طراحان گرافیک است. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6" data-filter="branding">
                            <div class="portfolio-style-three">
                                <div class="portfolio-image">
                                    <img src="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf5.jpg')}}" alt="image" />
                                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                        <div class="portfolio-content">
                                            <div class="portfolio-icon">
                                                <a class="image-popup-three glightbox3" href="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf5.jpg')}}"> <i class="lni lni-zoom-in"> </i> </a>
                                            </div>
                                            <div class="portfolio-icon">
                                                <a href="javascript:void(0)"> <i class="lni lni-link"> </i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h4 class="portfolio-title">
                                        <a href="javascript:void(0)">خدمات سئو</a>
                                    </h4>
                                    <p class="text"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و طراحان گرافیک است. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6" data-filter="marketing">
                            <div class="portfolio-style-three">
                                <div class="portfolio-image">
                                    <img src="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf6.jpg')}}" alt="image" />
                                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                        <div class="portfolio-content">
                                            <div class="portfolio-icon">
                                                <a class="image-popup-three glightbox3" href="{{asset('assets/frontend/img/jaban/private-site-images/portfolio/pf6.jpg')}}"> <i class="lni lni-zoom-in"> </i> </a>
                                            </div>
                                            <div class="portfolio-icon">
                                                <a href="javascript:void(0)"> <i class="lni lni-link"> </i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h4 class="portfolio-title">
                                        <a href="javascript:void(0)">طراحی محصول</a>
                                    </h4>
                                    <p class="text"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و طراحان گرافیک است. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif --}}
        <!-- ./projects section -->

        <!-- ads section -->
        @if($psite->ads && !$psite->ads->is_hidden && $showAdsSection)
            <section id="ads" class="ads-area ads-three is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <h6>
                                        آگهی ها
                                    </h6>
                                    <h2 class="fw-bold">
                                        آخرین آگهی های ما
                                    </h2>
                                    @if($psite->ads->header_description)
                                        <p>
                                            {{$psite->ads->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ads-menu text-center">
                                <button data-filter-ads="allAds" class="active">
                                    تمام آگهی ها
                                </button>
                                @if($selling->count() && $psite->ads->is_selling)
                                    <button data-filter-ads="selling">
                                        آگهی فروش کالا
                                    </button>
                                @endif
                                @if($investment->count() && $psite->ads->is_investment)
                                    <button data-filter-ads="investment">
                                        آگهی شراکت و سرمایه گذاری
                                    </button>
                                @endif
                                @if($bid->count() && $psite->ads->is_bid)
                                    <button data-filter-ads="bid">
                                        آگهی مزایده و مناقصه
                                    </button>
                                @endif
                                @if($inquiry->count() && $psite->ads->is_inquiry)
                                    <button data-filter-ads="inquiry">
                                        آگهی استعلام قیمت
                                    </button>
                                @endif
                                @if($contractor->count() && $psite->ads->is_contractor)
                                    <button data-filter-ads="contractor">
                                        آگهی پیمانکاری
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row adsGrid">
                        @if($selling->count() && $psite->ads->is_selling)
                            @foreach ($selling as $sellingItem)
                                <div class="col-lg-4 col-sm-6 selling-3 bid-3" data-filter-ads="selling">
                                    <div class="ads-style-three">
                                        <div class="ads-image">
                                            <a href="{{route('activity', $sellingItem->activity->slug)}}">
                                                <img src="{{asset($sellingItem->activity->adsImagesUrl())}}" alt="image" />
                                            </a>
                                        </div>
                                        <div class="ads-text">
                                            <h4 class="ads-title">
                                                <a href="{{route('activity', $sellingItem->activity->slug)}}">
                                                    {{$sellingItem->item_title}}
                                                </a>
                                            </h4>
                                            <p class="text">
                                                {{$sellingItem->item_description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if($investment->count() && $psite->ads->is_investment)
                            @foreach ($investment as $investmentItem)
                                <div class="col-lg-4 col-sm-6 investment-3 bid-3" data-filter-ads="investment">
                                    <div class="ads-style-three">
                                        <div class="ads-image">
                                            <a href="{{route('activity', $investmentItem->activity->slug)}}">
                                                <img src="{{asset($investmentItem->activity->adsImagesUrl())}}" alt="image" />
                                            </a>
                                        </div>
                                        <div class="ads-text">
                                            <h4 class="ads-title">
                                                <a href="{{route('activity', $investmentItem->activity->slug)}}">
                                                    {{$investmentItem->item_title}}
                                                </a>
                                            </h4>
                                            <p class="text">
                                                {{$investmentItem->item_description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if($bid->count() && $psite->ads->is_bid)
                            @foreach ($bid as $bidItem)
                                <div class="col-lg-4 col-sm-6 bid-3 bid-3" data-filter-ads="bid">
                                    <div class="ads-style-three">
                                        <div class="ads-image">
                                            <a href="{{route('activity', $bidItem->activity->slug)}}">
                                                <img src="{{asset($bidItem->activity->adsImagesUrl())}}" alt="image" />
                                            </a>
                                        </div>
                                        <div class="ads-text">
                                            <h4 class="ads-title">
                                                <a href="{{route('activity', $bidItem->activity->slug)}}">
                                                    {{$bidItem->item_title}}
                                                </a>
                                            </h4>
                                            <p class="text">
                                                {{$bidItem->item_description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if($inquiry->count() && $psite->ads->is_inquiry)
                            @foreach ($inquiry as $inquiryItem)
                                <div class="col-lg-4 col-sm-6 inquiry-3 inquiry-3" data-filter-ads="inquiry">
                                    <div class="ads-style-three">
                                        <div class="ads-image">
                                            <a href="{{route('activity', $inquiryItem->activity->slug)}}">
                                                <img src="{{asset($inquiryItem->activity->adsImagesUrl())}}" alt="image" />
                                            </a>
                                        </div>
                                        <div class="ads-text">
                                            <h4 class="ads-title">
                                                <a href="{{route('activity', $inquiryItem->activity->slug)}}">
                                                    {{$inquiryItem->item_title}}
                                                </a>
                                            </h4>
                                            <p class="text">
                                                {{$inquiryItem->item_description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if($contractor->count() && $psite->ads->is_contractor)
                            @foreach ($contractor as $contractorItem)
                                <div class="col-lg-4 col-sm-6 contractor-3 contractor-3" data-filter-ads="contractor">
                                    <div class="ads-style-three">
                                        <div class="ads-image">
                                            <a href="{{route('activity', $contractorItem->activity->slug)}}">
                                                <img src="{{asset($contractorItem->activity->adsImagesUrl())}}" alt="image" />
                                            </a>
                                        </div>
                                        <div class="ads-text">
                                            <h4 class="ads-title">
                                                <a href="{{route('activity', $contractorItem->activity->slug)}}">
                                                    {{$contractorItem->item_title}}
                                                </a>
                                            </h4>
                                            <p class="text">
                                                {{$contractorItem->item_description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        @endif
        <!-- ./ads section -->

        <!-- licenses section -->
        @if($psite->licenses && !$psite->licenses->is_hidden && $psite->licenses->psiteLicenseItem->count())
            <section id="pricing" class="pricing-area pricing-fourteen is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    {{-- <h6>
                                        مجوز ها و افتخارات
                                    </h6> --}}
                                    <h2 class="fw-bold">
                                        مجوز ها و انتخارات ما را مشاهده بفرمایید
                                    </h2>
                                    @if($psite->licenses->header_description)
                                        <p>
                                            {{$psite->licenses->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($psite->licenses->psiteLicenseItem as $licenseItem)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="pricing-style-fourteen">
                                    <div class="light-rounded-buttons">
                                        <img src="{{asset($licenseItem->item_image)}}" alt="">
                                    </div>
                                    <p class="title mb-0">
                                        {{$licenseItem->item_description}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- ./licenses section -->

        <!-- members section -->
        @if($psite->members && !$psite->members->is_hidden && $psite->members->psiteMemberItem->count())
            <section id="team" class="team-area is-rtl">

                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    {{-- <h6>همکاران ما</h6> --}}
                                    <h2 class="fw-bold">
                                        همکاران ما را ملاحضه کنید
                                    </h2>
                                    @if($psite->members->header_description)
                                        <p>
                                            {{$psite->members->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        @foreach ($psite->members->psiteMemberItem as $memberItem)
                            <div class="col-lg-4 col-sm-6">
                                <div class="team-style-six text-center">
                                    <div class="team-image"> 
                                        <img src="{{asset($memberItem->item_image)}}" alt="Team" /> 
                                    </div>
                                    <div class="team-content">
                                        <h4 class="team-name">
                                            {{$memberItem->item_fullname}}
                                        </h4> 
                                        <span class="sub-title">
                                            {{$memberItem->item_role}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- ./members section -->
        
        <!-- middle banner section -->
        @if($psite->middleBanner && !$psite->middleBanner->is_hidden)
            <section id="call-action" class="call-action is-rtl" style="{{$showMiddleBannerImageStyle}}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
                            <div class="inner-content">
                                @if($psite->middleBanner->header_title)
                                    <h2>
                                        {{$psite->middleBanner->header_title}}
                                    </h2>
                                @endif
                                @if($psite->middleBanner->header_description)
                                    <p>
                                        {{$psite->middleBanner->header_description}}
                                    </p>
                                @endif
                                <div class="light-rounded-buttons"> 
                                    <a href="javascript:void(0)" class="btn primary-btn-outline">
                                        شروع کنید
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- ./middle banner section -->

        <!-- testimonials section -->
        @if($psite->testimonials && !$psite->testimonials->is_hidden && $psite->testimonials->psiteTestimonialItem->count())
            <section id="testimonial" class="testimonial-5 is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    {{-- <h6>دیدگاه مشتریان</h6> --}}
                                    <h2 class="fw-bold">بازخورد مشتریان ما</h2>
                                    @if($psite->testimonials->header_description)
                                        <p>
                                            {{$psite->testimonials->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row testimonial-slider is-rtl">
                        @foreach ($psite->testimonials->psiteTestimonialItem as $testimonialItem)
                            <div class="col-lg-6 col-12">
                                <div class="single-testimonial">
                                    <svg class="shape1" width="62" height="31" viewBox="0 0 62 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M-1.10459e-06 -3.51286e-06C-1.46049e-06 4.07097 0.801837 8.10209 2.35973 11.8632C3.91763 15.6243 6.20107 19.0417 9.07969 21.9203C11.9583 24.7989 15.3757 27.0824 19.1368 28.6403C22.8979 30.1982 26.929 31 31 31C35.071 31 39.1021 30.1982 42.8632 28.6403C46.6243 27.0824 50.0417 24.7989 52.9203 21.9203C55.7989 19.0417 58.0824 15.6243 59.6403 11.8632C61.1982 8.10209 62 4.07098 62 -8.02757e-07L31 -8.02758e-07L-1.10459e-06 -3.51286e-06Z" fill="#FF8686" />
                                    </svg>
                                    <svg class="shape2 transform-180" width="82" height="74" viewBox="0 0 82 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="45.0005" cy="37" r="37" fill="#FE9955" />
                                        <path d="M0.175359 2.73871C1.17682 4.85939 2.2739 6.88145 3.46802 8.90242C4.46524 10.732 5.46811 12.9497 6.94627 14.4811C7.73528 15.3431 9.37218 14.4457 8.96708 13.287C8.96708 13.287 8.96566 13.1899 8.86863 13.1913C9.05846 12.8974 9.2497 12.7003 9.53657 12.4052C9.63361 12.4037 9.82627 12.304 9.92331 12.3026C10.116 12.2027 10.3072 12.0059 10.4985 11.8088C15.7794 14.5465 21.0575 17.0902 25.9574 20.3188C27.4271 21.268 28.8012 22.3157 30.081 23.5587C25.1774 26.7359 19.5257 31.8654 20.6822 37.9632C22.255 45.996 30.8275 41.5036 33.678 37.2886C37.1963 32.2874 36.94 28.0206 33.4815 23.8005C36.7525 21.8117 40.4199 20.3993 44.0133 20.5412C52.6538 20.7066 54.2222 28.4483 52.0851 34.9823C49.548 34.0486 46.6328 33.7999 44.1182 34.4189C39.5716 35.4557 35.5978 42.5017 38.8594 46.5306C42.1196 50.4625 50.1618 42.8719 51.7762 40.422C52.2515 39.7356 52.7252 38.9523 53.1021 38.1703C53.2005 38.266 53.2977 38.2645 53.396 38.3602C60.4477 42.7221 54.5176 48.729 49.6083 51.5181C48.8377 51.9175 49.5325 52.975 50.3045 52.6726C55.415 50.3659 61.3648 45.7175 57.7824 39.6551C56.8879 38.2123 55.6081 36.9692 54.0428 36.1184C56.0998 30.7503 56.0094 24.5398 51.101 20.7292C45.211 16.1562 37.6845 19.1774 32.1017 22.3646C32.0032 22.2691 32.0032 22.2691 31.9048 22.1733C26.4872 16.7199 18.8689 13.4339 12.0254 10.0395C12.5007 9.3532 12.9746 8.56968 13.4499 7.88351C13.7339 7.39393 13.627 6.71609 13.2332 6.33375C9.89298 3.56774 5.88339 1.49089 1.50686 0.875232C0.435374 0.599667 -0.325372 1.67822 0.175359 2.73871ZM33.341 27.4905C35.5295 31.1468 32.9632 34.8724 30.4799 37.6262C27.2329 41.2646 21.8818 40.372 22.8688 34.8253C23.41 32.0028 25.9005 29.7342 27.9114 27.8608C28.9646 26.8749 30.2118 25.886 31.5576 24.9929C32.2483 25.7593 32.8433 26.6243 33.341 27.4905ZM51.1458 37.131C49.8256 39.7708 47.913 41.7398 45.5099 43.3277C44.4523 44.0226 43.2964 44.6217 42.0392 44.9312C38.7541 45.9496 40.3273 40.6856 40.9868 39.3172C42.9709 35.6001 47.6329 35.8234 51.1458 37.131ZM10.7274 7.53494C10.7288 7.63198 10.6318 7.63339 10.6332 7.73043C10.3421 7.73467 10.0538 7.93314 9.86536 8.32395C9.58414 9.00745 9.20589 9.69236 8.82764 10.3774C8.63781 10.6714 8.06407 11.2621 8.25814 11.2592C8.16111 11.2607 8.06548 11.3591 8.0669 11.4561C7.46913 10.3974 6.67729 9.34112 6.07953 8.28236C5.28345 6.93515 4.48596 5.4909 3.68846 4.0465C6.12426 4.69011 8.56855 5.91625 10.7274 7.53494Z" fill="#7C451F" />
                                    </svg>
                                    <div class="inner-content">
                                        <div class="qote-icon"> 
                                            <i class="lni lni-quotation"></i> 
                                        </div>
                                        <p class="text">
                                            {{$testimonialItem->item_description}}
                                        </p>
                                        <div class="author">
                                            <div class="image"> 
                                                <img src="{{asset($testimonialItem->item_image)}}" alt="Author" /> 
                                            </div>
                                            <h4 class="name">
                                                {{$testimonialItem->item_fullname}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- ./testimonials section -->

        <!-- blog section -->
        @if($psite->blog && !$psite->blog->is_hidden)
            <div id="blog" class="latest-news-area section is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    {{-- <h6>آخرین اخبار</h6> --}}
                                    <h2 class="fw-bold">آخرین مطالب سایت</h2>
                                    @if($psite->blog->header_description)
                                        <p>
                                            {{$psite->blog->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-news">
                                <div class="image">
                                    <a href="javascript:void(0)"><img class="thumb" src="{{asset('assets/frontend/img/jaban/private-site-images/blog/1.jpg')}}" alt="بلاگ" /></a>
                                    <div class="meta-details"> <img class="thumb" src="{{asset('assets/frontend/img/jaban/private-site-images/blog/b6.jpg')}}" alt="نویسنده" /> <span>توسط تیم میتو</span> </div>
                                </div>
                                <div class="content-body">
                                    <h4 class="title">
                                        <a href="javascript:void(0)"> راه حل های عالی برای داشتن کارمندان مسئولیت پذیر </a>
                                    </h4>
                                    <p> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.  چاپگرها و متون بلکه روزنامه و مجله است. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-news">
                                <div class="image">
                                    <a href="javascript:void(0)"><img class="thumb" src="{{asset('assets/frontend/img/jaban/private-site-images/blog/2.jpg')}}" alt="بلاگ" /></a>
                                    <div class="meta-details"> <img class="thumb" src="{{asset('assets/frontend/img/jaban/private-site-images/blog/b6.jpg')}}" alt="نویسنده" /> <span>توسط تیم میتو</span> </div>
                                </div>
                                <div class="content-body">
                                    <h4 class="title">
                                        <a href="javascript:void(0)">
                                            جدیدترین متد های آموزشی برای ایجاد سایت های تجاری
                                        </a>
                                    </h4>
                                    <p> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.  چاپگرها و متون بلکه روزنامه و مجله است. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-news">
                                <div class="image">
                                    <a href="javascript:void(0)"><img class="thumb" src="{{asset('assets/frontend/img/jaban/private-site-images/blog/3.jpg')}}" alt="بلاگ" /></a>
                                    <div class="meta-details"> <img class="thumb" src="{{asset('assets/frontend/img/jaban/private-site-images/blog/b6.jpg')}}" alt="نویسنده" /> <span>توسط تیم میتون</span> </div>
                                </div>
                                <div class="content-body">
                                    <h4 class="title">
                                        <a href="javascript:void(0)">
                                            5 روش کاربردی برای فروش بیشتر محصولات در حوزه سلامت
                                        </a>
                                    </h4>
                                    <p> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.  چاپگرها و متون بلکه روزنامه و مجله است. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- ./blog section -->

        <!-- trusted customer section -->
        @if($psite->trustedCustomer && !$psite->trustedCustomer->is_hidden && $psite->trustedCustomer->psiteTrustedCustomerItem->count())
            <div id="clients" class="brand-area section is-rtl">
                <div class="section-title-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    {{-- <h6>با مشتریان ما آشنا شوید</h6> --}}
                                    <h2 class="fw-bold">مشتریان عالی ما</h2>
                                    @if($psite->trustedCustomer->header_description)
                                        <p>
                                            {{$psite->trustedCustomer->header_description}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-12">
                            <div class="clients-logos">
                                @foreach ($psite->trustedCustomer->psiteTrustedCustomerItem as $trustedCustomerItem)
                                    <div class="single-image"> 
                                        <img src="{{asset($trustedCustomerItem->item_image)}}" alt="لوگو برند" /> 
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- ./trusted customer section -->

        <!-- contact us section -->
        @if($psite->contactUs && !$psite->contactUs->is_hidden)
            <section id="contact-us" class="contact-section is-rtl">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="contact-item-wrapper">
                                <div class="row">
                                    @if($psite->contactUs->psiteContactUsOfficePhoneItems->count())
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="contact-item">
                                                <div class="contact-icon"> 
                                                    <i class="lni lni-phone"></i> 
                                                </div>
                                                <div class="contact-content">
                                                    <h4>
                                                        تلفن ثابت
                                                    </h4>
                                                    @foreach ($psite->contactUs->psiteContactUsOfficePhoneItems as $contactUsOfficePhoneItem)
                                                        <div>
                                                            <a href="tel: {{$contactUsOfficePhoneItem->phone}}">
                                                                {{$contactUsOfficePhoneItem->phone}}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($psite->contactUs->psiteContactUsMobilePhoneItems->count())
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="contact-item">
                                                <div class="contact-icon"> 
                                                    <i class="lni lni-mobile"></i> 
                                                </div>
                                                <div class="contact-content">
                                                    <h4>
                                                        تلفن همراه
                                                    </h4>
                                                    @foreach ($psite->contactUs->psiteContactUsMobilePhoneItems as $contactUsMobilePhoneItem)
                                                        <div>
                                                            <a href="tel: {{$contactUsMobilePhoneItem->phone}}">
                                                                {{$contactUsMobilePhoneItem->phone}}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($psite->contactUs->psiteContactUsEmailItems->count())
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="contact-item">
                                                <div class="contact-icon"> 
                                                    <i class="lni lni-envelope"></i> 
                                                </div>
                                                <div class="contact-content">
                                                    <h4>
                                                        ایمیل
                                                    </h4>
                                                    @foreach ($psite->contactUs->psiteContactUsEmailItems as $contactUsEmailItem)
                                                        <div>
                                                            <p>
                                                                <a class="text-dark" href="mailto:{{$contactUsEmailItem->email}}">
                                                                    {{$contactUsEmailItem->email}}
                                                                </a>
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($psite->contactUs->psiteContactUsSocialMediaItems->count())
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="contact-item">
                                                <div class="contact-icon"> 
                                                    <i class="lni lni-world"></i> 
                                                </div>
                                                <div class="contact-content">
                                                    <h4>
                                                        شبکه ها اجتماعی
                                                    </h4>
                                                    @foreach ($psite->contactUs->psiteContactUsSocialMediaItems->where('social', 'instagram') as $instagramItem)
                                                        <a class="text-dark pe-2" href="{{$instagramItem->url}}">
                                                            <i class="lni lni-instagram-filled"></i> 
                                                        </a>
                                                    @endforeach
                                                    @foreach ($psite->contactUs->psiteContactUsSocialMediaItems->where('social', 'telegram') as $telegramItem)
                                                        <a class="text-dark pe-2" href="{{$telegramItem->url}}">
                                                            <i class="lni lni-telegram-original"></i> 
                                                        </a>
                                                    @endforeach
                                                    @foreach ($psite->contactUs->psiteContactUsSocialMediaItems->where('social', 'whatsapp') as $whatsappItem)
                                                        <a class="text-dark pe-2" href="{{$whatsappItem->url}}">
                                                            <i class="lni lni-whatsapp"></i> 
                                                        </a>
                                                    @endforeach
                                                    @foreach ($psite->contactUs->psiteContactUsSocialMediaItems->where('social', 'x') as $xItem)
                                                        <a class="text-dark pe-2" href="{{$xItem->url}}">
                                                            <img width="16" src="{{asset('assets/frontend/img/jaban/x-icon/X_icon.svg.png')}}" alt="">
                                                        </a>
                                                    @endforeach
                                                    @foreach ($psite->contactUs->psiteContactUsSocialMediaItems->where('social', 'eitaa') as $eitaaItem)
                                                        <a class="text-dark pe-2" href="{{$eitaaItem->url}}">
                                                            <img width="15" src="{{asset('assets/frontend/img/jaban/eitaa-icon/eitaa-icon-black.svg')}}" alt="">
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($psite->contactUs->psiteContactUsAddressItems->count())
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="contact-item">
                                                <div class="contact-icon"> <i class="lni lni-map-marker"></i> </div>
                                                <div class="contact-content">
                                                    <h4>آدرس</h4>
                                                    @foreach ($psite->contactUs->psiteContactUsAddressItems as $contactUsAddressItem)
                                                        <div>
                                                            <p>
                                                                {{$contactUsAddressItem->address}}
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($psite->contactUs->psiteContactUsPostalCodeItems->count())
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="contact-item">
                                                <div class="contact-icon"> 
                                                    <i class="lni lni-postcard"></i>
                                                 </div>
                                                <div class="contact-content">
                                                    <h4>
                                                        کد پستی
                                                    </h4>
                                                    @foreach ($psite->contactUs->psiteContactUsPostalCodeItems as $postalCodeItem)
                                                        <div>
                                                            <p>
                                                                {{$postalCodeItem->postal_code}}
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($psite->contactUs->psiteContactUsWorkingHourItems->count())
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="contact-item">
                                                <div class="contact-icon"> <i class="lni lni-alarm-clock"></i> </div>
                                                <div class="contact-content">
                                                    <h4>زمان پاسخگویی</h4>
                                                    @foreach ($psite->contactUs->psiteContactUsWorkingHourItems as $contactUsWorkingHoursItem)
                                                        <div>
                                                            <p>
                                                                {{$contactUsWorkingHoursItem->hour_item}}
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($psite->contactUs->email)
                            <div class="col-xl-8">
                                <div class="contact-form-wrapper">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-8 mx-auto">
                                            <div class="section-title text-center">
                                                <span> در تماس باشید </span>
                                                <h2>
                                                    آماده برای شروع
                                                </h2>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک چاپگرها است.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    @livewire('frontend.pages.private-page.private-page-index.components.contact-us.index', [
                                        'emailToAddress' => $psite->contactUs->email
                                    ])
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        
            @if($psite->contactUs->lt && $psite->contactUs->ln)
                <section class="map-section map-style-9">
                    <div class="map-container" id="private-site-map-container" data-geo-ln="{{$psite->contactUs->lt}}" data-geo-lt="{{$psite->contactUs->ln}}">
                        <div class="col-12 mb-4">
                            <div id="map" style="border:0; height: 500px; width: 100%; z-index: 0;"></div>
                        </div>
                    </div>
                </section>
            @endif
        @endif
        <!-- ./contact us section -->

        @if($psite->footer)
            <footer class="footer-area footer-eleven is-rtl">
                <div class="footer-top">
                    <div class="container">
                        <div class="inner-content">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center">
                                    <div class="footer-widget f-about">
                                        <div class="logo">
                                            <a href="#"> 
                                                <img width="70" src="{{asset($psite->footer->logo)}}" alt="#" class="img-fluid" /> 
                                            </a>
                                        </div>
                                        @if($psite->aboutUs && $psite->aboutUs->title)
                                            <p class="copyright-text"> 
                                                ارائه شده توسط
                                                <a href="#" rel="nofollow">
                                                    {{$psite->aboutUs->title}}
                                                </a>
                                                در پلتفرم
                                                <a href="{{URL::to('/')}}" rel="nofollow">
                                                    زی ساز
                                                </a>
                                            </p>
                                        @endif
                                        <p class="copyright-text mt-2"> 
                                            تمامی حقوق ماده و معنوی این صفحه برای 
                                            <a href="{{URL::to('/')}}" rel="nofollow">
                                                زی ساز
                                            </a>
                                            محفوظ است
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center">
                                    <div class="footer-widget f-link">
                                        <h5>دسترسی سریع</h5>
                                        <ul>
                                            @if($psite->aboutUs && !$psite->aboutUs->is_hidden)
                                                <li>
                                                    <a href="#about-us">
                                                        درباره ما    
                                                    </a>
                                                </li>
                                            @endif
                                            @if($psite->services && !$psite->services->is_hidden)
                                                <li> 
                                                    <a href="#services">
                                                        خدمات ما
                                                    </a>
                                                </li>
                                            @endif
                                            @if($psite->projects && !$psite->projects->is_hidden)
                                                <li> 
                                                    <a href="#portfolio">
                                                        پروژه های ما
                                                    </a>
                                                </li>
                                            @endif
                                            @if($psite->ads && !$psite->ads->is_hidden && $showAdsSection)
                                                <li> 
                                                    <a href="#ads">
                                                        آگهی های ما
                                                    </a>
                                                </li>
                                            @endif
                                            @if($psite->contactUs && !$psite->contactUs->is_hidden)
                                                <li>
                                                    <a href="#contact-us">
                                                        تماس با ما
                                                    </a>
                                                </li>
                                            @endif
                                            <li class="fw-500">
                                                <a href="{{URL::to('/')}}">
                                                    <h5>
                                                        زی ساز
                                                    </h5>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center">
                                    <div class="footer-widget d-flex flex-column align-items-center">
                                        <a href="" id="container">
                                            {!! $qrCode !!}
                                        </a>
                                        <br/>
                                        <button id="download" class="btn primary-btn btn-sm text-light" onclick="downloadSVG()">
                                            دانلود qr code
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        @endif
        
        <a href="#" class="scroll-top btn-hover"> <i class="lni lni-chevron-up"></i> </a>
        <script src="{{asset('assets/frontend/js/private-site-scripts/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/private-site-scripts/glightbox.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/private-site-scripts/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/private-site-scripts/tiny-slider.rtl.js')}}" type="text/javascript"></script>

        <!-- close navbar-collapse when a clicked -->
        <script src="{{asset('assets/frontend/js/private-site-scripts/navbar.js')}}" type="text/javascript"></script>

        <!-- isotope masonry portfolio-three -->
        <script src="{{asset('assets/frontend/js/private-site-scripts/isotope-masonry.js')}}" type="text/javascript"></script>

        <!-- glightbox -->
        <script src="{{asset('assets/frontend/js/private-site-scripts/glightbox.js')}}" type="text/javascript"></script>

        <!-- hero section slider -->
        <script src="{{asset('assets/frontend/js/private-site-scripts/hero-section-slider.js')}}" type="text/javascript"></script>

        <!-- testimonial section slider -->
        <script src="{{asset('assets/frontend/js/private-site-scripts/testimonial-slider.js')}}" type="text/javascript"></script>

        <!-- qr-code svg downloader -->
        <script src="{{asset('assets/frontend/js/private-site-scripts/qrcode-svg-downloader.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/frontend/js/private-site-scripts/show-map.js')}}" type="text/javascript"></script>

        <script type="text/javascript">
            //========= glightbox
            GLightbox({
                'type': 'video',
                'source': 'local', //vimeo, youtube or local
                'width': 900,
                'autoplayVideos': true,
            });
        </script>

    </body>
</html>