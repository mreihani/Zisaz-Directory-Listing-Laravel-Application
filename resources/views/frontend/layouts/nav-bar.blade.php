<div>
    <header class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" data-scroll-header>
        <div class="container">
            <a class="navbar-brand ms-0 ms-xl-4" href="{{route('home-page')}}">
                <img class="d-block" src="{{asset('assets/frontend/img/logo/logo-light.svg')}}" width="116" alt="Finder">
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <a class="btn btn-primary btn-sm rounded-pill ms-2 order-lg-3" href="{{route('resume-builder')}}">
                <i class="fi-plus me-2"></i>رزومه ساز
            </a>
           
            <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
    
                    @if($myAccountHeaderAuth)
                        @livewire('frontend.auth.header.my-account-header-auth')
                    @else 
                        @livewire('frontend.auth.header.my-account-header-guest')   
                    @endif

                    <!-- Menu items-->
                    <li class="nav-item dropdown">
                        <a class="nav-link {{Route::currentRouteName() == 'jobs' ? 'active' : ''}}" href="{{route('jobs')}}">
                            آگهی ها استخدام
                        </a>
                    </li>
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
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#signin-modal" data-bs-toggle="modal">
                            <i class="fi-user me-2"></i>
                            ورود
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</div>
