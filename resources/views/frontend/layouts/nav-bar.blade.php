<div class="{{$isBannerShown ? 'top-notification-banner-wrapper' : ''}}" style="{{$isBannerShown ? 'margin-bottom: 100px;' : ''}}">

    @if($isBannerShown)
        @include('frontend.layouts.top-notification-banner')
    @endif

    <header class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" data-scroll-header>

        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand ms-0 ms-xl-4" href="{{route('home-page')}}">
                <img class="d-block" src="{{asset('assets/frontend/img/logo/logo-light.svg')}}" width="90" alt="جابان">
            </a>
    
            <div class="container d-flex flex-column align-items-center">
                
                <div class="d-flex align-items-center w-100">
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
        
                            @if(Route::currentRouteName() == 'category')
                                <!-- Search bar-->
                                <li class="nav-item dropdown d-none d-lg-block d-sm-none">
                                    @livewire('frontend.pages.category.components.hero')
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

                <div class="d-flex mt-3 mb-3 mb-lg-0">

                    <div>
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
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
                                                <a class="dropdown-item" href="{{route('get-ads', ['r_name' => 'selling', 'ads_type' => 'selling'])}}">
                                                    فروش کالا
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="">
                                                    کار و استخدام
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-dark">
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-ads', ['r_name' => 'employment', 'ads_type' => 'employer'])}}">
                                                            کارجو
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-ads', ['r_name' => 'employment', 'ads_type' => 'employee'])}}">
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
                                                        <a class="dropdown-item" href="{{route('get-ads', ['r_name' => 'investment', 'ads_type' => 'invested'])}}">
                                                            سرمایه پذیر
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('get-ads', ['r_name' => 'investment', 'ads_type' => 'investor'])}}">
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

                    <div class="d-none d-lg-block d-sm-none">
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
                <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
                    @if($myAccountHeaderAuth)
                        @livewire('frontend.auth.header.my-account-header-auth')
                    @else 
                        @livewire('frontend.auth.header.my-account-header-guest')   
                    @endif
                </ul>

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

