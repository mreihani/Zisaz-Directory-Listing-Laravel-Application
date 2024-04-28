<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo">
      <a class="app-brand-link" href="{{URL::to('/')}}">
        <span class="app-brand-logo">
          <img width="50" src="{{asset('assets/frontend/apple-touch-icon.png')}}" alt="jaban">
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
    </ul>
  </aside>








  