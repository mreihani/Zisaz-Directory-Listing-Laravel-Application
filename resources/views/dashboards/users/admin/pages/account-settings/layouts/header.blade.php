<ul class="nav nav-pills flex-column flex-md-row mb-4">
    <li class="nav-item">
        <a class="nav-link 
        {{Route::currentRouteName() == 'admin.dashboard.account-settings.account.index' ? 'active' : ''}}
        " href="{{route('admin.dashboard.account-settings.account.index')}}">
            <i class="ti-xs ti ti-users me-1"></i>
            حساب کاربری
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link
        {{Route::currentRouteName() == 'admin.dashboard.account-settings.security.index' ? 'active' : ''}}
        " href="{{route('admin.dashboard.account-settings.security.index')}}">
            <i class="ti-xs ti ti-lock me-1"></i>
            امنیت حساب
        </a>
    </li>
</ul>