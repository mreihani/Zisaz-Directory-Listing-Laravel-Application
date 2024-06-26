<div class="{{($isDesktopBannerShown || $isMobileBannerShown) ? 'top-notification-banner-wrapper' : ''}}" 
style="{{$isDesktopBannerShown ? 'margin-bottom: 100px;' : ''}}">

    @if($isDesktopBannerShown)
        @include('frontend.layouts.banners.top-notification-banner-desktop')
    @endif

    @if($isMobileBannerShown)
        @include('frontend.layouts.banners.top-notification-banner-mobile')
    @endif

    <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top border-bottom" data-scroll-header>
      
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand ms-0 ms-xl-4" href="{{route('home-page')}}">
                <img class="d-block" src="{{asset('assets/frontend/img/logo/zsaz2.png')}}" width="150" alt="زی ساز">
            </a>
    
            <div class="container d-flex flex-column align-items-center">
                
                <div class="d-flex align-items-center w-100">
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll d-flex align-items-center" style="max-height: 35rem;">

                            <li class="nav-item dropdown" class="mt-1">
                                <a class="nav-link dropdown-toggle align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fi-align-justify me-1"></i>
                                    دسته ها
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light">
                                    <li class="dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="{{route('get-activities', ['activity_type' => 'ads_registration'])}}">
                                            آگهی ها
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-light">
                                            <li>
                                                <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'selling', 'type' => 'selling'])}}">
                                                    مصالح و تجهیزات ساختمانی
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'contractor'])}}">
                                                    خدمات مهندسی و پیمانکاری
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'employment'])}}">
                                                    کار و استخدام
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-light">
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
                                                <ul class="dropdown-menu dropdown-menu-light">
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
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'bid'])}}">
                                                    مزایده و مناقصه
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-light">
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'bid', 'type' => 'auction'])}}">
                                                            مزایده
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle" href="">
                                                            مناقصه
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-light">
                                                            <li>
                                                                <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'bid', 'type' => 'tender_buy'])}}">
                                                                    مناقصه خرید
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'bid', 'type' => 'tender_project'])}}">
                                                                    مناقصه اجرای پروژه
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'inquiry'])}}">
                                                    استعلام قیمت
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-light">
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'inquiry', 'type' => 'inquiry_buy'])}}">
                                                            خرید
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-activities', ['activity_type' => 'ads_registration', 'r_name' => 'inquiry', 'type' => 'inquiry_project'])}}">
                                                            اجرای پروژه
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
                                    <a class="nav-link {{Route::currentRouteName() == 'get-mags' ? 'active' : ''}}" href="{{route('get-mags')}}">
                                        مجله زی ساز
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
               
            </div>

            <div class="d-flex flex-md-row flex-column">

                <div class="d-flex justify-content-center">
                    <ul class="navbar-nav navbar-nav-scroll me-2 d-none d-lg-block" style="max-width: 250px;">
                        @if($myAccountHeaderAuth)
                            @livewire('frontend.auth.header.my-account-header-auth')
                        @else 
                            @livewire('frontend.auth.header.my-account-header-guest')   
                        @endif
                    </ul>
    
                    <!-- add search box for mobile !-->
                    <ul class="navbar-nav navbar-nav-scroll d-lg-none">
                        @if(Route::currentRouteName() == 'get-activities')
                            <!-- Search bar-->
                            <li>
                                @livewire('frontend.pages.activity.activity-all.components.hero')
                            </li>
                        @elseif(Route::currentRouteName() == 'home-page')
                            <!-- Search bar-->
                            <li>
                                @livewire('frontend.pages.home.components.hero')
                            </li>
                        @endif
                    </ul> 
                </div>

                <div class="d-flex justify-content-center align-items-center d-none d-lg-flex">
                    <a class="btn btn-sm " href="{{route('about-us')}}" role="button">
                        درباره زی ساز
                    </a>
                    
                    <a class="btn btn-sm " href="{{route('support')}}" role="button">
                        پشتیبانی
                    </a>

                    <a class="btn btn-primary btn-sm rounded-pill ms-2" href="{{route('user.personal-website.create')}}">
                        ثبت کسب و کار
                    </a>

                    <a class="btn btn-primary btn-sm rounded-pill ms-2" href="{{route('user.activity.create', ['type' => 'ads'])}}">
                        ثبت آگهی
                    </a>
                </div>

            </div>

        </div>

        <!-- toaster -->
        @livewire('frontend.layouts.toast')

    </header>

</div>

