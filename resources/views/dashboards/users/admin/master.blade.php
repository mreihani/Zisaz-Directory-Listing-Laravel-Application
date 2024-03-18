
<!DOCTYPE html>
<html class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" data-assets-path="{{asset('assets/dashboards/assets')}}" data-template="vertical-menu-template-no-customizer-starter" data-theme="theme-default" dir="rtl" lang="fa">

<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
  <title>
      سامانه جابان
  </title>
  <meta content="" name="description"/>

  <!-- Favicon -->
  <link href="{{asset('assets/frontend/favicon-32x32.png')}}" rel="icon" type="image/x-icon"/>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/vendor/fonts/tabler-icons.css')}}" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" /> -->
  <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" /> -->

  <!-- Core CSS -->
  <link href="{{asset('assets/dashboards/assets/vendor/css/rtl/core.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/vendor/css/rtl/theme-default.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/css/demo.css')}}" rel="stylesheet"/>

  <!-- Vendors CSS -->
  <link href="{{asset('assets/dashboards/assets/vendor/libs/node-waves/node-waves.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" rel="stylesheet"/>

  <!-- Page CSS -->
  @stack('page-styles')

  <!-- Helpers -->
  <script src="{{asset('assets/dashboards/assets/vendor/js/helpers.js')}}"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{asset('assets/dashboards/assets/js/config.js')}}/"></script>

  <!-- Better experience of RTL -->
  <link href="{{asset('assets/dashboards/assets/vendor/css/rtl/rtl.css')}}" rel="stylesheet"/>

  <!-- Jaban.ir Custom Styles -->
  @vite('resources/css/dashboards/master/jaban-custom-styles.css')

</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    
    <!-- Menu -->
    @include('dashboards.users.admin.layouts.sidebar')
    <!-- / Menu -->
    
    <!-- Layout container -->
    <div class="layout-page">

      <!-- Navbar -->
      @include('dashboards.users.admin.layouts.navbar')
      <!-- / Navbar -->
      @livewire('frontend.layouts.toast')
      <!-- Content wrapper -->
     
      {!! displayFlashMessage() !!}
      
      <div class="content-wrapper">

        <!-- Content -->
        @yield('main')
        <!-- / Content -->

        <!-- Footer -->
        @include('dashboards.layouts.footer')
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->

    </div>
    <!-- / Layout page -->
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('assets/dashboards/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/dashboards/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('assets/dashboards/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/dashboards/assets/js/main.js')}}"></script>

<!-- Page JS -->
@stack('page-scripts')

@vite('resources/js/frontend/master/toast-timer-hide.js')

</body>

</html>