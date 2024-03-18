
<!DOCTYPE html>
<html class="light-style layout-wide customizer-hide" data-assets-path="{{asset('assets/dashboards/assets/')}}" data-template="vertical-menu-template-no-customizer" data-theme="theme-default" dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
    <title>
        ورود به مدیریت سامانه جابان
    </title>
    <meta content="" name="description"/>
    <!-- Favicon -->
    <link href="{{asset('assets/frontend/favicon-32x32.png')}}" rel="icon" type="image/x-icon"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet"/>
    <!-- Icons -->
    <link href="{{asset('assets/dashboards/assets/vendor/fonts/fontawesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/fonts/tabler-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/fonts/flag-icons.css')}}" rel="stylesheet"/>
    <!-- Core CSS -->
    <link href="{{asset('assets/dashboards/assets/vendor/css/rtl/core.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/css/rtl/theme-default.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/css/demo.css')}}" rel="stylesheet"/>
    <!-- Vendors CSS -->
    <link href="{{asset('assets/dashboards/assets/vendor/libs/node-waves/node-waves.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/libs/typeahead-js/typeahead.css')}}" rel="stylesheet"/>
    <!-- Vendor -->
    <link href="{{asset('assets/dashboards/assets/vendor/libs/@form-validation/form-validation.css')}}" rel="stylesheet"/>
    <!-- Page CSS -->
    <!-- Page -->
    <link href="{{asset('assets/dashboards/assets/vendor/css/pages/page-auth.css')}}" rel="stylesheet"/>
    <!-- Helpers -->
    <script src="{{asset('assets/dashboards/assets/vendor/js/helpers.js')}}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/dashboards/assets/js/config.js')}}"></script>
    <!-- Better experience of RTL -->
    <link href="{{asset('assets/dashboards/assets/vendor/css/rtl/rtl.css')}}" rel="stylesheet"/>
</head>

<body>
<!-- Content -->
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="d-flex justify-content-center">
                        <a href="{{URL::to('/')}}">
                            <img width="120" src="{{asset('assets/frontend/img/logo/logo-light.svg')}}" alt=""/>
                        </a>
                    </div>
                    <div class="app-brand justify-content-center mb-4 mt-2">
                        <a class="app-brand-link gap-2" href="{{URL::to('/')}}">
                            <span class="app-brand-text demo text-body fw-bolder">
                                مدیریت سامانه جابان
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    {{-- <form action="{{route('login')}}" class="mb-3" id="formAuthentication" method="POST">
                        @csrf

                        @if($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                               {{ $errors->first('email') }}
                            </div>    
                        @endif

                        <div class="mb-3">
                            <label class="form-label" for="email">ایمیل</label>
                            <input autofocus class="form-control" id="email" name="email" placeholder="ایمیل خود را وارد کنید" type="email" value="{{old('email')}}"/>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">رمز عبور</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input aria-describedby="password" class="form-control" id="password" name="password" placeholder="············" type="password"/>
                                <span class="input-group-text cursor-pointer">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" id="remember" name="remember" type="checkbox"/>
                                <label class="form-check-label" for="remember"> مرا به خاطر بسپار</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">ورود به سامانه</button>
                        </div>
                    </form> --}}

                    @livewire('dashboards.auth.login')

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<!-- / Content -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('assets/dashboards/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/endor/libs/node-waves/node-waves.js')}}v"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="{{asset('assets/dashboards/assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/dashboards/assets/js/main.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('assets/dashboards/assets/js/pages-auth.js')}}"></script>
</body>

</html>
