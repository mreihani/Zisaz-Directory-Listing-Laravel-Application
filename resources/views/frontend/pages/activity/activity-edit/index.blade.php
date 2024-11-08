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

    <!-- Warning alert -->
    @if($activity->verify_status && $activity->verify_status === 'rejected' && !empty($activity->reject_description))
        <div class="alert alert-danger" role="alert">
            <h4 class="pt-2 alert-heading">علت رد شدن آگهی:</h4>
            <ul>
                <li>
                    {{$activity->reject_description}}
                </li>
            </ul>
        </div>
    @endif

    <!-- Breadcrumb-->
    <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home-page')}}">خانه</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                ویرایش آگهی
            </li>
        </ol>
    </nav>

    <!-- Page content-->
    <div class="row justify-content-center pb-sm-2">
        <div class="col-lg-11 col-xl-10">
            <!-- Page title-->
            <div class="text-center pb-4 mb-3">
                <h1 class="h4 mb-4 font-vazir">
                    ویرایش آگهی
                </h1>
                <p class="mb-1">
                    در این بخش می توانید آگهی خود را ویرایش و تغییرات مورد نظر را در آن ذخیره نمایید
                </p>
            </div>
        
            @if($activity->activity_type == 'ads_registration')
                @include('frontend.pages.activity.activity-edit.ads_registration.ads-registration-selection', ['activity' => $activity])
            @endif

        </div>
    </div>
</div>

@endsection
