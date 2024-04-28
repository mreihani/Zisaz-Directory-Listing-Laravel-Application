<div class="d-flex align-items-start justify-content-between pb-4 mb-2">
    <div class="d-flex align-items-center">
        <div class="position-relative flex-shrink-0">
            <img class="rounded-circle" src="{{auth()->user()->avatar()}}" width="100" alt="">
        </div>
        <div class="ps-3 ps-sm-4">
            <h3 class="h5">
                {{auth()->user()->firstname}} {{auth()->user()->lastname}}
            </h3>
            <ul class="list-unstyled fs-sm mb-0">
                <li class="d-flex text-nav text-break"><i class="fi-phone opacity-60 mt-1 me-2"></i>
                    <span>
                        @livewire('frontend.pages.profile.layouts.header.index')
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <a class="btn btn-danger btn-sm rounded-pill" href="{{route('logout')}}">
        <i class="fi-logout mt-n1 me-2"></i>
        خروج
    </a>
</div>

<a class="btn btn-outline-primary btn-lg rounded-pill w-100 d-md-none" href="#account-nav" data-bs-toggle="collapse">
    <i class="fi-align-justify me-2"></i>
    منو پروفایل من
</a>
<div class="collapse d-md-block" id="account-nav">
    <ul class="nav nav-pills flex-column flex-md-row pt-3 pt-md-0 pb-md-4 border-bottom-md">
        <li class="nav-item mb-md-0 me-md-2 pe-md-1">
            <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.profile-settings.index' ? 'active' : ''}}"
                href="{{route('user.dashboard.profile-settings.index')}}" aria-current="page">
                <i class="fi-user mt-n1 me-2 fs-base"></i>
                پروفایل من
            </a>
        </li>
        {{-- <li class="nav-item mb-md-0 me-md-2 pe-md-1">
            <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.contact-info.index' ? 'active' : ''}}"
                href="{{route('user.dashboard.contact-info.index')}}" aria-current="page">
                <i class="fi-phone mt-n1 me-2 fs-base"></i>
                اطلاعات تماس
            </a>
        </li> --}}
        <li class="nav-item mb-md-0 me-md-2 pe-md-1">
            <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.saved-activities.index' ? 'active' : ''}}" 
                href="{{route('user.dashboard.saved-activities.index')}}">
                <i class="fi-layers mt-n1 me-2 fs-base"></i>
                فعالیت های من
            </a>
        </li>
        <li class="nav-item mb-md-0">
            <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.account-notifications.index' ? 'active' : ''}}" 
                href="{{route('user.dashboard.account-notifications.index')}}">
                <i class="fi-bell mt-n1 me-2 fs-base"></i>
                تنظیمات اطلاع رسانی
            </a>
        </li>
        <li class="nav-item d-md-none">
            <a class="nav-link" href="{{route('logout')}}">
            <i class="fi-logout mt-n1 me-2 fs-base"></i>
                خروج
            </a>
        </li>
    </ul>
</div>