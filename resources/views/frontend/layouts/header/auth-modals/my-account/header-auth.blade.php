<div>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            حساب کاربری
        </a>
        <ul class="dropdown-menu dropdown-menu-dark">

            <div class="d-flex align-items-start border-bottom border-light px-3 py-1 mb-2" style="width: 16rem;">
                <img class="rounded-circle" src="{{auth()->user()->avatar()}}" width="48" alt="">
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

            <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">ناحیه کاربری</a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{route('user.dashboard.profile-settings.index')}}">تنظیمات پروفایل من</a></li>
                <li><a class="dropdown-item" href="{{route('user.dashboard.my-resume.index')}}">روزمه من</a></li>
                <li><a class="dropdown-item" href="{{route('user.dashboard.saved-jobs.index')}}">فرصت های شغلی من</a></li>
                <li><a class="dropdown-item" href="{{route('user.dashboard.account-notifications.index')}}">تنظیمات اطلاع رسانی</a></li>
            </ul>
            </li>
            <li><a class="dropdown-item" href="job-board-promotion.html">بروزرسانی آگهی</a></li>
            <div class="dropdown-divider"></div>
            <li>
                <a class="dropdown-item" href="{{route('logout')}}">
                    خروج
                </a>
            </li>
        </ul>
    </li>
</div>



