<aside class="col-lg-4 col-md-5 pe-xl-4 mb-5">
    <!-- Account nav-->
    <div class="card card-body border-0 shadow-sm pb-1 me-lg-1">
        <div class="d-flex d-md-block d-lg-flex align-items-start pt-lg-2 mb-4">
            <img class="rounded-circle" src="{{auth()->user()->avatar()}}" width="48" alt="">
            <div class="pt-md-2 pt-lg-0 ps-3 ps-md-0 ps-lg-3">
                <h2 class="fs-lg mb-0">
                    {{auth()->user()->firstname}} {{auth()->user()->lastname}} 
                </h2>
                <span class="star-rating">
                    <i class="star-rating-icon fi-star-filled active"></i>
                    <i class="star-rating-icon fi-star-filled active"></i>
                    <i class="star-rating-icon fi-star-filled active"></i>
                    <i class="star-rating-icon fi-star-filled active"></i>
                    <i class="star-rating-icon fi-star-filled active"></i>
                </span>
                <ul class="list-unstyled fs-sm mt-3 mb-0">
                    <li>
                        @livewire('frontend.pages.profile.layouts.header.index')
                    </li>
                    @if(auth()->user()->email)
                        <li>
                            <a class="nav-link fw-normal p-0" href="mailto:{{auth()->user()->email}}">
                                <i class="fi-mail opacity-60 me-2"></i>
                                {{auth()->user()->email}}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
       <div class="d-flex justify-content-center">
            <div class="me-1">
                <a class="btn btn-primary btn-sm w-100 mb-3" href="{{route('user.create-activity.index', ['type' => 'ads'])}}">
                    ثبت آگهی
                </a>
            </div>
            <div class="me-1">
                <a class="btn btn-primary btn-sm w-100 mb-3" href="{{route('user.create-private-page.index')}}">
                    ثبت کسب و کار
                </a>
            </div>
            <div class="me-1">
                <a class="btn btn-primary btn-sm w-100 mb-3" href="">
                    ثبت پروژه
                </a>
            </div>
       </div>
        <a class="btn btn-outline-secondary d-block d-md-none w-100 mb-3" href="#account-nav" data-bs-toggle="collapse">
            <i class="fi-align-justify me-2"></i>
            منو
        </a>
        <div class="collapse d-md-block mt-3" id="account-nav">
            <div class="card-nav">
                <a class="card-nav-link {{Route::currentRouteName() == 'user.dashboard.profile-settings.index' ? 'active' : ''}}" href="{{route('user.dashboard.profile-settings.index')}}">
                    <i class="fi-user opacity-60 me-2"></i>
                    اطلاعات حساب کاربری
                </a>
                <a class="card-nav-link {{Route::currentRouteName() == 'user.dashboard.saved-resumes.index' ? 'active' : ''}}" href="{{route('user.dashboard.saved-resumes.index')}}">
                    <i class="fi-file opacity-60 me-2"></i>
                    رزومه های من
                </a>
                <a class="card-nav-link {{Route::currentRouteName() == 'user.dashboard.saved-ads.index' ? 'active' : ''}}" href="{{route('user.dashboard.saved-ads.index')}}">
                    <i class="fi-billboard-house opacity-60 me-2"></i>
                    آگهی های من
                </a>
                <a class="card-nav-link" href="">
                    <i class="fi-apartment opacity-60 me-2"></i>
                    پروژه های من
                </a>
                <a class="card-nav-link" href="">
                    <i class="fi-globe opacity-60 me-2"></i>
                    کسب و کار های من
                </a>
                <a class="card-nav-link" href="">
                    <i class="fi-bookmark opacity-60 me-2"></i>
                    موردعلاقه ها
                </a>
                <a class="card-nav-link" href="">
                    <i class="fi-edit opacity-60 me-2"></i>
                    مقالات من
                </a>
                <a class="card-nav-link" href="">
                    <i class="fi-messenger opacity-60 me-2"></i>
                    پیام های من
                </a>
                <a class="card-nav-link {{Route::currentRouteName() == 'user.dashboard.account-notifications.index' ? 'active' : ''}}" href="{{route('user.dashboard.account-notifications.index')}}">
                    <i class="fi-bell opacity-60 me-2"></i>
                    تنظیمات اطلاع رسانی
                </a>
                <a class="card-nav-link" href="">
                    <i class="fi-help opacity-60 me-2"></i>
                    پشتیبانی
                </a>
                <a class="card-nav-link" href="{{route('logout')}}">
                    <i class="fi-logout opacity-60 me-2"></i>
                    خروج
                </a>
            </div>
        </div>
    </div>
</aside>