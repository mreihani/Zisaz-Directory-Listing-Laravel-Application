<h4 class="py-3 mb-4"><span class="text-muted fw-light">مشخصات کاربر/</span> پروفایل</h4>

<!-- Header -->
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="user-profile-header-banner"> 
            <img src="{{asset('assets/dashboards/assets/img/pages/profile-banner.png')}}" alt="تصویر بنر" class="rounded-top"> 
        </div>
        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
          <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto"> <img src="{{asset('assets/dashboards/assets/img/jaban/user.png')}}" alt="تصویر کاربر" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"> </div>
          <div class="flex-grow-1 mt-3 mt-sm-5">
            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
              <div class="user-profile-info">
                <h4>
                  {{$user->firstname}} {{$user->lastname}}
                </h4>
                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                  <li class="list-inline-item d-flex gap-1"> <i class="ti ti-color-swatch"></i> طراح UX </li>
                  <li class="list-inline-item d-flex gap-1"><i class="ti ti-map-pin"></i> تهران</li>
                  <li class="list-inline-item d-flex gap-1"> <i class="ti ti-calendar"></i> عضویت در بهمن 1400 </li>
                </ul>
              </div>
              <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light"> <i class="ti ti-check me-1"></i>متصل </a>
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