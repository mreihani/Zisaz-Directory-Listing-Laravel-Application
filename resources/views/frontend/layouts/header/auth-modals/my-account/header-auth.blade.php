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

            @if(auth()->user()->role == "construction")
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">ناحیه کاربری</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{route('user.dashboard.profile-settings.index')}}">پروفایل من</a></li>
                        <li><a class="dropdown-item" href="{{route('user.dashboard.contact-info.index')}}">اطلاعات تماس</a></li>
                        @if(in_array(auth()->user()->userGroupType->groupable->id, [2, 3, 4, 5, 6, 7, 9, 10]))
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.my-resume.index')}}">
                                    رزومه و سابقه کار
                                </a>
                            </li>
                        @endif    
                        @if(in_array(auth()->user()->userGroupType->groupable->id, [8]))
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.my-resume.index')}}">
                                    درباره فروشگاه
                                </a>
                            </li>
                        @endif    
                        @if(in_array(auth()->user()->userGroupType->groupable->id, [11]))
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.my-resume.index')}}">
                                    درباره ماشین آلات
                                </a>
                            </li>
                        @endif    
                        @if(in_array(auth()->user()->userGroupType->groupable->id, [12]))
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.my-resume.index')}}">
                                    درباره آزمایشکاه
                                </a>
                            </li>
                        @endif    
                        @if(in_array(auth()->user()->userGroupType->groupable->id, [13]))
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.my-project.index')}}">
                                    اطلاعات پروژه
                                </a>
                            </li>
                        @endif    
                        @if(in_array(auth()->user()->userGroupType->groupable->id, [2, 3, 4, 5, 7, 8, 9, 12]))
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.license.index')}}">
                                    مجوز ها
                                </a>
                            </li>
                        @endif   
                        @if(in_array(auth()->user()->userGroupType->groupable->id, [1, 2])) 
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.saved-jobs.index')}}">
                                    فرصت های شغلی نشان شده
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('user.dashboard.account-notifications.index')}}">
                                    تنظیمات اطلاع رسانی
                                </a>
                            </li>
                        @endif   
                    </ul>
                </li>
                <li>
                    <a class="dropdown-item" href="">
                        بروزرسانی آگهی
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



