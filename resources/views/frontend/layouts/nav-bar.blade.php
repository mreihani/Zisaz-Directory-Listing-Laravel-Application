<div>
    <header class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" data-scroll-header>

        <div class="container">
            <a class="navbar-brand ms-0 ms-xl-4" href="{{route('home-page')}}">
                <img class="d-block" src="{{asset('assets/frontend/img/logo/logo-light.svg')}}" width="90" alt="جابان">
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <a class="btn btn-primary btn-sm rounded-pill ms-2 order-lg-3" href="{{route('user.create-activity.index')}}">
                <i class="fi-plus me-2"></i>
                یک فعالیت ایجاد کن
            </a>

            <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
    
                    @if($myAccountHeaderAuth)
                        @livewire('frontend.auth.header.my-account-header-auth')
                    @else 
                        @livewire('frontend.auth.header.my-account-header-guest')   
                    @endif

                    @if(Route::currentRouteName() == 'home-page')
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

        <!-- toaster -->
        @livewire('frontend.layouts.toast')

    </header>

</div>

