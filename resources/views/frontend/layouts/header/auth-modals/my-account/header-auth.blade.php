<div>    
    <li class="nav-item dropdown" class="mt-1">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            حساب کاربری
        </a>
        <ul class="dropdown-menu dropdown-menu-light">

            <div class="d-flex align-items-start border-bottom border-light px-3 py-1 mb-2" style="width: 16rem;">
                <img class="rounded-circle" src="{{auth()->user()->avatar()}}" style="height: 48px; width:48px;">
                <div class="ps-2 text-end">
                    <h6 class="fs-base text-light mb-0"> 
                        {{auth()->user()->firstname}} {{auth()->user()->lastname}} 
                    </h6>
                    <div class="fs-xs py-2">
                        {{auth()->user()->phone}}
                        <br>
                    </div>
                </div>
            </div>

            @if(auth()->user()->role == "construction")
                {{-- <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">ناحیه کاربری</a>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li>
                            <a class="dropdown-item" href="{{route('user.dashboard.profile-settings.index')}}">پروفایل من</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('user.dashboard.account-notifications.index')}}">
                                تنظیمات اطلاع رسانی
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <a class="dropdown-item" href="{{route('user.dashboard.profile-settings.index')}}">پروفایل من</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('user.dashboard.account-notifications.index')}}">
                        تنظیمات اطلاع رسانی
                    </a>
                </li>
            @elseif(auth()->user()->role == "admin")
                <li>
                    <a class="dropdown-item" href="{{route('admin.dashboard.index')}}">
                        پیشخوان مدیر
                    </a>
                </li>
            @endif

            <div class="dropdown-divider"></div>
            <li>
                <a class="dropdown-item" href="{{route('logout')}}">
                    خروج
                </a>
            </li>
        </ul>
    </li>
</div>



