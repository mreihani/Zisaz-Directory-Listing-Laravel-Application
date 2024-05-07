<footer class="footer d-lg-none fixed-bottom bg-secondary">
    <nav class="footer-mobile border-top pt-2 pb-2">
        <div class="d-flex align-items-center justify-content-center">
            <a class="btn btn-sm d-flex flex-column mb-2" href="{{route('home-page')}}">
                <img class="d-block" src="{{asset('assets/frontend/img/logo/zsaz.png')}}" width="35" alt="زی ساز">
                {{-- <span>
                    زی ساز    
                </span> --}}
            </a>
            <a class="btn btn-sm d-flex flex-column" href="{{route('get-activities')}}">
                <i class="fi-list"></i>
                <span>
                    دسته ها
                </span>
            </a>
            <a class="btn btn-sm d-flex flex-column" href="{{route('user.create-activity.index')}}">
                <i class="fi-plus-circle"></i>
                <span>
                    ثبت فعالیت
                </span>
            </a>
            <a class="btn btn-sm d-flex flex-column" href="{{route('support')}}">
                <i class="fi-chat-circle"></i>
                <span>
                    پشتیبانی
                </span>
            </a>
            @if(auth()->check())
                <a class="btn btn-sm d-flex flex-column" href="{{route('user.dashboard.profile-settings.index')}}">
                    <i class="fi-user"></i>
                    <span>
                        حساب کاربری
                    </span>
                </a>
            @else
                <a class="btn btn-sm d-flex flex-column" href="{{route('login')}}">
                    <i class="fi-user"></i>
                    <span>
                        ورود
                    </span>
                </a>
            @endif
        </div>
    </nav>
</footer>