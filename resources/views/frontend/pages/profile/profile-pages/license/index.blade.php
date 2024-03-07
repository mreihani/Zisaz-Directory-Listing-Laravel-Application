@extends('frontend.master')
@section('main')

@push('page-styles')
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/filepond/dist/filepond.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/jalalidatepicker/jalalidatepicker.css')}}"/>
@endpush

@push('page-scripts')
    <script src="{{asset('assets/frontend/vendor/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/filepond/dist/filepond.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/jalalidatepicker/jalalidatepicker.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/jalalidatepicker/jalalidatepickerinitialize.js')}}"></script>
@endpush

<div class="position-absolute top-0 start-0 w-100 bg-dark" style="height: 398px;"></div>
    <div class="container content-overlay mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
            <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">خانه</a></li>
            <li class="breadcrumb-item"><a href="">حساب کاربری</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                مجوز ها
            </li>
            </ol>
        </nav>
        <!-- Page card like wrapper-->
        <div class="bg-light shadow-sm rounded-3 p-4 p-md-5 mb-2">

            <!-- Account header-->
            <!-- Account menu-->
            @include('frontend.pages.profile.layouts.nav')    
            
            @livewire('frontend.pages.profile.profile-pages.license.index')
        </div>
    </div>
</div>

@endsection

