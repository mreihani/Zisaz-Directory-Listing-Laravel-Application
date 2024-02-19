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
        <!-- Beginnig of User profile -->
        <li class="menu-item
        {{Route::currentRouteName() == 'admin.dashboard.profile.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.account-settings.account.index' ? 'active open' : ''}}
        {{Route::currentRouteName() == 'admin.dashboard.account-settings.security.index' ? 'active open' : ''}}
        " style="">
            <a class="menu-link menu-toggle" href="javascript:void(0);">
                <i class="menu-icon tf-icons ti ti-file"></i>
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
    </ul>
  </aside>








  