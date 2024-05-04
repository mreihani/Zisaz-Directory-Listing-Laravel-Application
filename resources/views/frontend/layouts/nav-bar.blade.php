<div class="{{($isDesktopBannerShown || $isMobileBannerShown) ? 'top-notification-banner-wrapper' : ''}}" style="{{$isDesktopBannerShown ? 'margin-bottom: 150px;' : ''}}">

    @if($isDesktopBannerShown)
        @include('frontend.layouts.banners.top-notification-banner-desktop')
    @endif

    @if($isMobileBannerShown)
        @include('frontend.layouts.banners.top-notification-banner-mobile')
    @endif

    <header class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" data-scroll-header>

        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand ms-0 ms-xl-4" href="{{route('home-page')}}">
                <img class="d-block" src="{{asset('assets/frontend/img/logo/zsaz.png')}}" width="90" alt="جابان">
            </a>
    
            <div class="container-fluid d-flex flex-column align-items-center">
                
                <div class="d-flex align-items-center w-100">
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
        
                            @if(Route::currentRouteName() == 'get-activities')
                                <!-- Search bar-->
                                <li class="nav-item dropdown d-none d-lg-block d-sm-none">
                                    @livewire('frontend.pages.activity.activity-all.components.hero')
                                </li>
                            @elseif(Route::currentRouteName() == 'home-page')
                                <!-- Search bar-->
                                <li class="nav-item dropdown d-none d-lg-block d-sm-none">
                                    @livewire('frontend.pages.home.components.hero')
                                </li>
                            @else    
                                <!-- Menu items-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link {{Route::currentRouteName() == 'blog-all' ? 'active' : ''}}" href="{{route('blog-all')}}">
                                        مقالات
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link {{Route::currentRouteName() == 'about-us' ? 'active' : ''}}" href="{{route('about-us')}}">
                                        درباره ما
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link {{Route::currentRouteName() == 'contact-us' ? 'active' : ''}}" href="{{route('contact-us')}}">
                                        تماس با ما
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link {{Route::currentRouteName() == 'faq' ? 'active' : ''}}" href="{{route('faq')}}">
                                        سوالات متداول
                                    </a>
                                </li>
                            @endif 
        
                        </ul>
                    </div>
                </div>

                <div class="container-fluid d-flex mb-lg-0 d-none d-lg-block d-sm-none">

                    <div class="">
                        <ul class="navbar-nav navbar-nav-scroll">
                            <li class="nav-item dropdown" class="mt-1">
                                <a class="nav-link dropdown-toggle align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fi-align-justify me-1"></i>
                                    دسته بندی
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li class="dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="{{route('get-activities', ['activity_type' => 'ads_registration'])}}">
                                            آگهی ها
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li>
                                                <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'selling', 'type' => 'selling'])}}">
                                                    مصالح و تجهیزات ساختمانی
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="">
                                                    خدمات مهندسی و پیمانکاری
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'employment'])}}">
                                                    کار و استخدام
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-dark">
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'employment', 'type' => 'employee'])}}">
                                                            کارجو
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'employment', 'type' => 'employer'])}}">
                                                            کارفرما
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'investment'])}}">
                                                    شراکت و سرمایه گذاری
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-dark">
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'investment', 'type' => 'invested'])}}">
                                                            سرمایه پذیر
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'investment', 'type' => 'investor'])}}">
                                                            سرمایه گذار
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item" href="#">
                                            کسب و کار ها
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item" href="#">
                                            پروژه ها
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item" href="#">
                                            مزایده و مناقصه
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-item" href="#">
                                            متخحصصین و نیروی انسانی
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>  
                    </div>

                    <div class="">
                        <a class="btn btn-primary btn-sm rounded-pill ms-2 order-lg-3" href="{{route('user.create-activity.index', ['type' => 'selling'])}}">
                            ثبت آگهی
                        </a>

                        <a class="btn btn-primary btn-sm rounded-pill ms-2" href="">
                            ثبت مزایده و مناقصه
                        </a>

                        <a class="btn btn-primary btn-sm rounded-pill ms-2" href="{{route('user.create-activity.index', ['type' => 'resume'])}}">
                            ثبت تخصص و تجربه
                        </a>

                        <a class="btn btn-primary btn-sm rounded-pill ms-2" href="">
                            ثبت پروژه
                        </a>

                        <a class="btn btn-primary btn-sm rounded-pill ms-2" href="{{route('user.create-activity.index', ['type' => 'custom_page'])}}">
                            ثبت فروشگاه / شرکت
                        </a>
                    </div>

                </div>
            </div>

            <div class="d-flex flex-md-row flex-column">

                <div class="d-flex">
                    <ul class="navbar-nav navbar-nav-scroll me-2" style="max-width: 250px;">
                        @if($myAccountHeaderAuth)
                            @livewire('frontend.auth.header.my-account-header-auth')
                        @else 
                            @livewire('frontend.auth.header.my-account-header-guest')   
                        @endif
                    </ul>
    
                    <ul class="navbar-nav navbar-nav-scroll d-lg-none">
                        <li class="nav-item dropdown" class="mt-1">
                            <a class="nav-link dropdown-toggle align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fi-align-justify me-1"></i>
                                دسته بندی
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="">
                                        آگهی ها
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li>
                                            <a class="dropdown-item" href="{{route('get-activities', ['r_name' => 'selling', 'type' => 'selling'])}}">
                                                فروش کالا
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="">
                                                کار و استخدام
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li>
                                                    <a class="dropdown-item" href="{{route('get-activities', ['r_name' => 'employment', 'type' => 'employer'])}}">
                                                        کارجو
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{route('get-activities', ['r_name' => 'employment', 'type' => 'employee'])}}">
                                                        کارفرما
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="">
                                                شراکت و سرمایه گذاری
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li>
                                                    <a class="dropdown-item" href="{{route('get-activities', ['r_name' => 'investment', 'type' => 'invested'])}}">
                                                        سرمایه پذیر
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{route('get-activities', ['r_name' => 'investment', 'type' => 'investor'])}}">
                                                        سرمایه گذار
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-item" href="#">
                                        کسب و کار ها
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-item" href="#">
                                        پروژه ها
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-item" href="#">
                                        مزایده و مناقصه
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-item" href="#">
                                        متخحصصین و نیروی انسانی
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul> 
                </div>
                

                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary btn-sm rounded-pill ms-2" href="">
                        پشتیبانی
                    </a>

                    <a class="btn btn-primary btn-sm rounded-pill ms-2" href="{{route('user.create-activity.index')}}">
                        ثبت فعالیت
                    </a>
                </div>
            </div>

        </div>

        <!-- toaster -->
        @livewire('frontend.layouts.toast')

    </header>

</div>

