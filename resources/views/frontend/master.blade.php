
<!DOCTYPE html>

<html lang="fa">
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    
    {!! SEO::generate() !!}
    
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/frontend/img/logo/zsaz_sm.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/frontend/img/logo/zsaz_sm.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/frontend/img/logo/zsaz_sm.png')}}">
    <link rel="manifest" href="{{asset('assets/frontend/site.webmanifest')}}">
    <link rel="mask-icon" color="#5bbad5" href="{{asset('assets/frontend/img/logo/zsaz_sm.png')}}">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Page loading Styles-->
    @vite('resources/css/frontend/master/page-loading-styles.css')

    <!-- Page loading scripts-->
    @vite('resources/js/frontend/master/page-loading-scripts.js')

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/simplebar/dist/simplebar.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/tiny-slider/dist/tiny-slider.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/nouislider/dist/nouislider.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/lightgallery.js/dist/css/lightgallery.min.css')}}"/>
    
    <!-- Page CSS -->
    @stack('page-styles')

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/css/theme.min.css')}}">

    <!-- Jaban.ir Custom Styles -->
    @vite('resources/css/frontend/master/jaban-custom-styles.css')

    <!-- jQuery 3.7 -->
    <script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>

    <!-- Page JS in the top -->
    @stack('page-scripts-top')

  </head>

  <!-- Body-->
  <body dir="rtl">
    <!-- Page loading spinner-->
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div>
            <span>لطفا منتظر باشید</span>
        </div>
    </div>

    <main class="page-wrapper">

        @include('frontend.layouts.header')

        <!-- Page content-->
        <div class="jaban-main-element">
            @yield('main')
        </div>

    </main>

    <!-- Footer-->
    @include('frontend.layouts.footer-desktop')
    @include('frontend.layouts.footer-mobile')

    <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm ms-2">بالا</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>

    <!-- Page JS -->
    @stack('page-scripts')

    <script src="{{asset('assets/frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/parallax-js/dist/parallax.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/nouislider/dist/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/theme.min.js')}}"></script>

    @vite('resources/js/frontend/master/auth-modals-scripts.js')
    @vite('resources/js/frontend/master/toast-timer-hide.js')
    
  </body>

</html>


