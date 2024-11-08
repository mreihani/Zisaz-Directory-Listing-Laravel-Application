@extends('frontend.master')
@section('main')

@push('page-styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.css')}}"/>    
    <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jalalidatepicker/jalalidatepicker.css')}}"/>    
   
    <style>
        input[type='file'] {
            display: block !important;
        }
    </style>
@endpush

@push('page-scripts-top')
    <script src="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.js')}}"></script>
@endpush

@push('page-scripts')
    <script src="{{asset('assets/frontend/vendor/jalalidatepicker/jalalidatepicker.js')}}"></script>

    <script>
        jalaliDatepicker.startWatch({
            separatorChar: "/",
            changeMonthRotateYear: true,
            showTodayBtn: true,
            showEmptyBtn: true
        });
    </script>
@endpush

<div class="container mt-5 mb-md-4 py-5">
    <!-- Breadcrumb-->
    <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home-page')}}">خانه</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                ایجاد آگهی
            </li>
        </ol>
    </nav>

    <!-- Page content-->
    <div class="row justify-content-center pb-sm-2">
        <div class="col-lg-11 col-xl-10">
            <!-- Page title-->
            <div class="text-center pb-4 mb-3">
                <h1 class="h4 mb-4 font-vazir">
                    افزودن آگهی
                </h1>
            </div>
        
            <!-- Livewire component-->
            @livewire('frontend.pages.activity.activity-create.index')

        </div>
    </div>
</div>

@endsection
