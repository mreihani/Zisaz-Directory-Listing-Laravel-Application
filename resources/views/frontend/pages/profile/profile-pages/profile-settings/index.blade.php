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

<div class="container pt-5 pb-lg-4 mt-5 mb-sm-2">
    <!-- Breadcrumb-->
    <nav class="mb-4 pt-md-3" aria-label="Breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{URL::to('/')}}">
                    خانه
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="">
                    حساب کاربری
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                اطلاعات حساب کاربری
            </li>
        </ol>
    </nav>
    <!-- Page content-->
    <div class="row">
        <!-- Sidebar-->
        @include('frontend.pages.profile.layouts.sidebar')

        <!-- main content-->
        @livewire('frontend.pages.profile.profile-pages.profile-settings.index')
    </div>
</div>

@endsection

