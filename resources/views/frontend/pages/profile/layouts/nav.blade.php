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
        <li class="nav-item mb-md-0 me-md-2 pe-md-1">
            <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.contact-info.index' ? 'active' : ''}}"
                href="{{route('user.dashboard.contact-info.index')}}" aria-current="page">
                <i class="fi-phone mt-n1 me-2 fs-base"></i>
                اطلاعات تماس
            </a>
        </li>
        @if(in_array(auth()->user()->userGroupType->groupable->id, [2, 3, 4, 5, 6, 7, 9, 10]))
            <li class="nav-item mb-md-0 me-md-2 pe-md-1">
                <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.my-resume.index' ? 'active' : ''}}" 
                    href="{{route('user.dashboard.my-resume.index')}}">
                    <i class="fi-file mt-n1 me-2 fs-base"></i>
                    رزومه و سابقه کار
                </a>
            </li>
        @endif
        @if(in_array(auth()->user()->userGroupType->groupable->id, [8]))
            <li class="nav-item mb-md-0 me-md-2 pe-md-1">
                <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.my-resume.index' ? 'active' : ''}}" 
                    href="{{route('user.dashboard.my-resume.index')}}">
                    <i class="fi-shop mt-n1 me-2 fs-base"></i>
                    درباره فروشگاه
                </a>
            </li>
        @endif
        @if(in_array(auth()->user()->userGroupType->groupable->id, [11]))
            <li class="nav-item mb-md-0 me-md-2 pe-md-1">
                <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.my-resume.index' ? 'active' : ''}}" 
                    href="{{route('user.dashboard.my-resume.index')}}">
                    <svg fill="#454865" width="15px" height="15px" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M39 2.03125C38.738281 2.0625 38.503906 2.199219 38.34375 2.40625L35.34375 6.21875C34.78125 5.488281 33.898438 5 32.90625 5L30.09375 5C28.394531 5 27 6.394531 27 8.09375L27 15.90625C27 17.605469 28.394531 19 30.09375 19L32.90625 19C33.898438 19 34.78125 18.511719 35.34375 17.78125L38.34375 21.59375C38.636719 21.960938 39.148438 22.066406 39.5625 21.84375L49.46875 16.4375C49.882813 16.214844 50.074219 15.730469 49.929688 15.285156C49.78125 14.835938 49.339844 14.5625 48.875 14.625C48.753906 14.644531 48.636719 14.6875 48.53125 14.75L39.375 19.78125L36 15.5L36 8.53125L39.375 4.25L48.53125 9.25C48.835938 9.457031 49.230469 9.472656 49.550781 9.292969C49.871094 9.113281 50.0625 8.769531 50.042969 8.402344C50.027344 8.035156 49.804688 7.710938 49.46875 7.5625L39.5625 2.15625C39.390625 2.058594 39.195313 2.015625 39 2.03125 Z M 9 3C4.039063 3 0 7.039063 0 12C0 16.960938 4.039063 21 9 21C13.960938 21 18 16.960938 18 12C18 7.039063 13.960938 3 9 3 Z M 18.6875 7C19.480469 8.519531 20 10.171875 20 12C20 13.828125 19.480469 16.480469 18.6875 18L24.96875 18C24.894531 17.652344 24.90625 16.367188 24.90625 16L24.90625 8C24.90625 7.632813 24.894531 7.347656 24.96875 7 Z M 9 7.34375C11.558594 7.34375 13.65625 9.441406 13.65625 12C13.65625 14.558594 11.558594 16.65625 9 16.65625C6.441406 16.65625 4.34375 14.558594 4.34375 12C4.34375 9.441406 6.441406 7.34375 9 7.34375 Z M 17.8125 18.5625C15.804688 21.242188 12.601563 23 9 23C7.773438 23 6.601563 22.777344 5.5 22.40625L14.28125 38.96875L29.34375 38.96875 Z M 6.875 41C5.253906 41 4 42.316406 4 44L4 49C4 49.582031 4.417969 50 5 50L39 50C39.582031 50 40 49.582031 40 49L40 44C40 42.316406 38.746094 41 37.125 41Z"></path></g></svg>
                    درباره ماشین آلات
                </a>
            </li>
        @endif
        @if(in_array(auth()->user()->userGroupType->groupable->id, [12]))
            <li class="nav-item mb-md-0 me-md-2 pe-md-1">
                <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.my-resume.index' ? 'active' : ''}}" 
                    href="{{route('user.dashboard.my-resume.index')}}">
                    <svg fill="#454865" width="15px" height="15px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>lab</title> <path d="M19.332 19.041c0 0-1.664 2.125-3.79 0-2.062-2-3.562 0-3.562 0l-4.967 9.79c-0.144 0.533 0.173 1.081 0.706 1.224h16.497c0.533-0.143 0.85-0.69 0.707-1.224l-5.591-9.79zM26.939 28.33l-7.979-13.428v-0.025l-0.014-7.869h0.551c0.826 0 1.498-0.671 1.498-1.499 0-0.827-0.672-1.498-1.498-1.498h-7.995c-0.827 0-1.498 0.671-1.498 1.498 0 0.828 0.671 1.499 1.498 1.499h0.482l-0.016 7.871-6.908 13.451c-0.428 1.599 0.521 3.242 2.119 3.67h17.641c1.6-0.428 2.549-2.071 2.119-3.67zM24.553 30.998l-17.108-0.019c-1.065-0.286-1.697-1.382-1.412-2.446l6.947-13.616 0.021-8.908h-1.498c-0.275 0-0.499-0.224-0.499-0.5s0.224-0.499 0.499-0.499h7.995c0.275 0 0.498 0.224 0.498 0.499 0 0.276-0.223 0.5-0.498 0.5h-1.498l0.025 8.875 7.939 13.666c0.286 1.067-0.347 2.163-1.411 2.448zM16.48 2.512c0 0.552 0.448 1 1 1s1-0.448 1-1-0.447-1-1-1-1 0.447-1 1zM17.48 0.012c0.828 0 1.5-0.671 1.5-1.5s-0.672-1.5-1.5-1.5-1.5 0.671-1.5 1.5 0.672 1.5 1.5 1.5zM13.48 2.512c0.553 0 1-0.448 1-1s-0.447-1-1-1-1 0.448-1 1 0.447 1 1 1z"></path> </g></svg>
                    درباره آزمایشکاه
                </a>
            </li>
        @endif
        @if(in_array(auth()->user()->userGroupType->groupable->id, [13]))
            <li class="nav-item mb-md-0 me-md-2 pe-md-1">
                <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.my-project.index' ? 'active' : ''}}" 
                    href="{{route('user.dashboard.my-project.index')}}">
                    <svg width="15px" height="15px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#454865" stroke="#454865"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M0 0h48v48H0z" fill="none"></path> <g id="Shopicon"> <polygon points="8,10 26,10 26,6 4,6 4,42 30,42 30,38 8,38 "></polygon> <polygon points="35,14 41,14 44,14 44,6 32,6 32,14 "></polygon> <polygon points="41,18 35,18 32,18 32,34.701 38,42.201 44,34.701 44,18 "></polygon> <polygon points="21,13.856 17.229,17.627 15.343,15.742 12.516,18.571 17.229,23.283 23.828,16.685 "></polygon> <polygon points="15.343,25.742 12.516,28.571 17.229,33.283 23.828,26.685 21,23.856 17.229,27.627 "></polygon> </g> </g></svg>
                    اطلاعات پروژه
                </a>
            </li>
        @endif
        @if(in_array(auth()->user()->userGroupType->groupable->id, [14, 15]))
            <li class="nav-item mb-md-0 me-md-2 pe-md-1">
                <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.my-resume.index' ? 'active' : ''}}" 
                    href="{{route('user.dashboard.my-resume.index')}}">
                    <i class="fi-cash mt-n1 me-2 fs-base"></i>
                    اطلاعات سرمایه گذاری
                </a>
            </li>
        @endif
        @if(in_array(auth()->user()->userGroupType->groupable->id, [2, 3, 4, 5, 7, 8, 9, 11, 12]))
            <li class="nav-item mb-md-0 me-md-2 pe-md-1">
                <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.license.index' ? 'active' : ''}}" 
                    href="{{route('user.dashboard.license.index')}}">
                    <i class="fi-award mt-n1 me-2 fs-base"></i>
                    مجوز ها
                </a>
            </li>
        @endif
        <li class="nav-item mb-md-0 me-md-2 pe-md-1">
            <a class="nav-link {{Route::currentRouteName() == 'user.dashboard.saved-jobs.index' ? 'active' : ''}}" 
                href="{{route('user.dashboard.saved-jobs.index')}}">
                <i class="fi-bookmark mt-n1 me-2 fs-base"></i>
                فرصت های شغلی نشان شده
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