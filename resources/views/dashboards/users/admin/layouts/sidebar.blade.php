<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo">
      <a class="app-brand-link" href="{{URL::to('/')}}">
        <span class="app-brand-logo">
          <img width="50" src="{{asset('assets/frontend/img/logo/zsaz.png')}}" alt="zeesaz">
        </span>
        <span class="app-brand-text menu-text fw-bold">
            پیشخوان مدیر
        </span>
      </a>
      <a class="layout-menu-toggle menu-link text-large ms-auto" href="javascript:void(0);">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        
        <!-- Beginnig of Dashboard -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                پیشخوان
            </span>
        </li>
        <li class="menu-item
        {{Route::currentRouteName() == 'admin.dashboard.index' ? 'active open' : ''}}
        ">
            <a class="menu-link" href="{{route('admin.dashboard.index')}}">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>
                    پیشخوان
                </div>
            </a>
        </li>
        <!-- End of Dashboard -->

        <!-- Beginnig of User profile -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                مدیریت صفحات حساب کاربری
            </span>
        </li>
        <li class="menu-item
        {{Route::currentRouteName() == 'admin.dashboard.profile.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.account-settings.account.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.account-settings.security.index' ? 'active open' : ''}}
        " style="">
            <a class="menu-link menu-toggle" href="javascript:void(0);">
                <i class="ti ti-user text-heading me-1"></i>
                <div>حساب کاربری</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item 
                {{Route::currentRouteName() == 'admin.dashboard.profile.index' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link menu-toggle" href="javascript:void(0);">
                        <div>
                            پروفایل
                        </div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item
                        {{Route::currentRouteName() == 'admin.dashboard.profile.index' ? 'active open' : ''}}
                        ">
                            <a class="menu-link" href="{{route('admin.dashboard.profile.index')}}">
                                <div>
                                    پروفایل من
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item
                {{Route::currentRouteName() == 'admin.dashboard.account-settings.account.index' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.account-settings.security.index' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link menu-toggle" href="javascript:void(0);">
                        <div>
                            تنظیمات حساب کاربری
                        </div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item 
                        {{Route::currentRouteName() == 'admin.dashboard.account-settings.account.index' ? 'active open' : ''}}
                        ">
                            <a class="menu-link" href="{{route('admin.dashboard.account-settings.account.index')}}">
                                <div>
                                    حساب کاربری
                                </div>
                            </a>
                        </li>
                        <li class="menu-item 
                        {{Route::currentRouteName() == 'admin.dashboard.account-settings.security.index' ? 'active open' : ''}}
                        ">
                            <a class="menu-link" href="{{route('admin.dashboard.account-settings.security.index')}}">
                                <div>
                                    امنیت حساب
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!-- End of User profile -->

        <!-- Beginnig of Categories Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                مدیریت دسته بندی ها
            </span>
        </li>
        <li class="menu-item
        {{Route::currentRouteName() == 'admin.dashboard.category.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.category.create' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.category.edit-actcat' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.category.edit-actgrp' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.category.search' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.category.show-subitem' ? 'active open' : ''}}
        " style="">
            <a class="menu-link menu-toggle" href="javascript:void(0);">
                <svg class="me-1" xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-category"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v6h-6z" /><path d="M14 4h6v6h-6z" /><path d="M4 14h6v6h-6z" /><path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                <div>
                   دسته بندی ها  
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item 
                {{Route::currentRouteName() == 'admin.dashboard.category.create' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link" href="{{route('admin.dashboard.category.create')}}">
                        <div>
                            افزودن دسته بندی
                        </div>
                    </a>
                </li>
                <li class="menu-item
                {{Route::currentRouteName() == 'admin.dashboard.category.index' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.category.search' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.category.show-subitem' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link" href="{{route('admin.dashboard.category.index')}}">
                        <div>
                            مدیریت دسته بندی ها
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End of Categories Section -->

        <!-- Beginnig of home page dynamic banners section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                مدیریت بنر
            </span>
        </li>
        <li class="menu-item
        {{Route::currentRouteName() == 'admin.dashboard.dynamic-banners.home-top-banner.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.dynamic-banners.home-middle-one-banner.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.dynamic-banners.home-slider-one-banner.index' ? 'active open' : ''}}
        " style="">
            <a class="menu-link menu-toggle" href="javascript:void(0);">
                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-photo-edit">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 8h.01" />
                    <path d="M11 20h-4a3 3 0 0 1 -3 -3v-10a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v4" />
                    <path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l3 3" />
                    <path d="M14 14l1 -1c.31 -.298 .644 -.497 .987 -.596" />
                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z" />
                </svg>
                <div>بنر ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item 
                {{Route::currentRouteName() == 'admin.dashboard.dynamic-banners.home-top-banner.index' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link" href="{{route('admin.dashboard.dynamic-banners.home-top-banner.index')}}">
                        <div>
                            بنر بالای صفحه اصلی
                        </div>
                    </a>
                </li>
                <li class="menu-item 
                {{Route::currentRouteName() == 'admin.dashboard.dynamic-banners.home-middle-one-banner.index' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link" href="{{route('admin.dashboard.dynamic-banners.home-middle-one-banner.index')}}">
                        <div>
                            بنر میانی یک صفحه اصلی
                        </div>
                    </a>
                </li>
                <li class="menu-item 
                {{Route::currentRouteName() == 'admin.dashboard.dynamic-banners.home-slider-one-banner.index' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link" href="{{route('admin.dashboard.dynamic-banners.home-slider-one-banner.index')}}">
                        <div>
                            اسلایدر یک صفحه اصلی
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End of home page dynamic banners section -->

        <!-- Beginnig of Magazine Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                مدیریت مجله زی ساز
            </span>
        </li>
        <li class="menu-item
        {{Route::currentRouteName() == 'admin.dashboard.magazine.category.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.magazine.category.create' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.magazine.category.edit' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.magazine.category.search' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.magazine.post.index' ? 'active open' : ''}} 
        {{Route::currentRouteName() == 'admin.dashboard.magazine.post.create' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.magazine.post.edit' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.magazine.post.search' ? 'active open' : ''}}    
        ">
            <a class="menu-link menu-toggle" href="javascript:void(0);">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div>مدیریت مجله</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item
                {{Route::currentRouteName() == 'admin.dashboard.magazine.category.index' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.magazine.category.create' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.magazine.category.edit' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.magazine.category.search' ? 'active open' : ''}}
                ">
                    <a class="menu-link menu-toggle" href="javascript:void(0);">
                        <div>مدیریت دسته بندی ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item
                        {{Route::currentRouteName() == 'admin.dashboard.magazine.category.create' ? 'active open' : ''}}
                        ">
                            <a class="menu-link" href="{{route('admin.dashboard.magazine.category.create')}}">
                                <div>افزودن دسته بندی</div>
                            </a>
                        </li>
                        <li class="menu-item
                        {{Route::currentRouteName() == 'admin.dashboard.magazine.category.index' ? 'active open' : ''}}    
                        {{Route::currentRouteName() == 'admin.dashboard.magazine.category.search' ? 'active open' : ''}}
                        ">
                            <a class="menu-link" href="{{route('admin.dashboard.magazine.category.index')}}">
                                <div>لیست دسته بندی ها</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item
                {{Route::currentRouteName() == 'admin.dashboard.magazine.post.index' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.magazine.post.create' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.magazine.post.edit' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.magazine.post.search' ? 'active open' : ''}}
                ">
                    <a class="menu-link menu-toggle" href="javascript:void(0);">
                        <div>مدیریت مقالات</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item
                        {{Route::currentRouteName() == 'admin.dashboard.magazine.post.create' ? 'active open' : ''}}
                        ">
                            <a class="menu-link" href="{{route('admin.dashboard.magazine.post.create')}}">
                                <div>افزودن مقاله</div>
                            </a>
                        </li>
                        <li class="menu-item
                        {{Route::currentRouteName() == 'admin.dashboard.magazine.post.index' ? 'active open' : ''}} 
                        {{Route::currentRouteName() == 'admin.dashboard.magazine.post.search' ? 'active open' : ''}}    
                        ">
                            <a class="menu-link" href="{{route('admin.dashboard.magazine.post.index')}}">
                                <div>لیست مقالات</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!-- End of Magazine Section -->

        <!-- Beginnig of Categories Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                مدیریت رسانه
            </span>
        </li>
        <li class="menu-item
        {{Route::currentRouteName() == 'admin.dashboard.media.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.media.create' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.media.search' ? 'active open' : ''}}
        " style="">
            <a class="menu-link menu-toggle" href="javascript:void(0);">
                <svg class="me-1" xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-movie"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M8 4l0 16" /><path d="M16 4l0 16" /><path d="M4 8l4 0" /><path d="M4 16l4 0" /><path d="M4 12l16 0" /><path d="M16 8l4 0" /><path d="M16 16l4 0" /></svg>
                <div>
                    رسانه  
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item 
                {{Route::currentRouteName() == 'admin.dashboard.media.create' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link" href="{{route('admin.dashboard.media.create')}}">
                        <div>
                            افزودن رسانه
                        </div>
                    </a>
                </li>
                <li class="menu-item
                {{Route::currentRouteName() == 'admin.dashboard.media.index' ? 'active open' : ''}}
                {{Route::currentRouteName() == 'admin.dashboard.media.search' ? 'active open' : ''}}
                " style="">
                    <a class="menu-link" href="{{route('admin.dashboard.media.index')}}">
                        <div>
                            مدیریت رسانه
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End of Categories Section -->

        
    </ul>
  </aside>








  