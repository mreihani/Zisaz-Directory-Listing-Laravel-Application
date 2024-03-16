<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="ti ti-menu-2 ti-sm"></i>
      </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown" href="javascript:void(0);">
            <div class="avatar avatar-online">
              <img class="rounded-circle" style="background: url('{{(auth()->user()->avatar()) ?: asset('assets/dashboards/assets/img/jaban/user.png')}}'); background-size: cover;" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img class="rounded-circle" style="background: url('{{(auth()->user()->avatar()) ?: asset('assets/dashboards/assets/img/jaban/user.png')}}'); background-size: cover;" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block mb-1">
                      {{$user->firstname}} {{$user->lastname}}
                    </span>
                    <small class="text-muted">مدیر کل</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('admin.dashboard.profile.index')}}">
                <i class="ti ti-user-check me-2 ti-sm"></i>
                <span class="align-middle">پروفایل من</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('admin.dashboard.account-settings.account.index')}}">
                <i class="ti ti-settings me-2 ti-sm"></i>
                <span class="align-middle">تنظیمات حساب کاربری</span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('logout')}}">
                <i class="ti ti-logout me-2 ti-sm"></i>
                <span class="align-middle">خروج از حساب</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>