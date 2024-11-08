<h4 class="py-3 mb-4"><span class="text-muted fw-light">مشخصات کاربر/</span> پروفایل</h4>

<!-- Header -->
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="user-profile-header-banner"> 
            <img src="{{asset('assets/dashboards/assets/img/pages/profile-banner.png')}}" class="rounded-top"> 
        </div>
        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
          <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto"> 
            <span class="d-block w-px-100 h-px-100 ms-0 ms-sm-4 rounded" style="background: url('{{(auth()->user()->avatar()) ?: asset('assets/dashboards/assets/img/jaban/user.png')}}'); background-size: cover;"></span>
          </div>
          <div class="flex-grow-1 mt-3 mt-sm-5">
            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
              <div class="user-profile-info">
                <h4>
                  {{$user->firstname}} {{$user->lastname}}
                </h4>
                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                  <li class="list-inline-item d-flex gap-1"> <i class="ti ti-color-swatch"></i> مدیر </li>
                  <li class="list-inline-item d-flex gap-1"> <i class="ti ti-calendar"></i> عضویت در {{jdate($user->created_at)->format('%d %B %Y')}} </li>
                </ul>
              </div>
              {{-- <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light"> <i class="ti ti-check me-1"></i>متصل </a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!--/ Header -->

<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
            <li class="nav-item"> 
                <a class="nav-link 
                {{Route::currentRouteName() == 'admin.dashboard.profile.index' ? 'active' : ''}}
                " href="{{route('admin.dashboard.profile.index')}}"><i class="ti-xs ti ti-user-check me-1"></i>
                پروفایل من
                </a> 
            </li>
        </ul>
    </div>
</div>
<!--/ Navbar pills -->