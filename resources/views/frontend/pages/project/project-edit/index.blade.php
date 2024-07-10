@extends('frontend.master')
@section('main')

@push('page-styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.css')}}"/>    
    <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jquery-palette-color-picker-master/palette-color-picker.css')}}"/>    
   
    <style>
        input[type='file'] {
            display: block !important;
        }
        .page-wrapper {
            background-color: #f5f4f8;
        }
    </style>
@endpush

@push('page-scripts-top')
    <script src="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.js')}}"></script>
@endpush

<div class="container mt-5 mb-md-4 py-5">

    <!-- Warning alert -->
    @if($project->verify_status && $project->verify_status === 'rejected' && !empty($project->reject_description))
        <div class="alert alert-danger" role="alert">
            <h4 class="pt-2 alert-heading">علت رد شدن پروژه:</h4>
            <ul>
                <li>
                    {{$project->reject_description}}
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
                ویرایش پروژه
            </li>
        </ol>
    </nav>

    <!-- Page content-->
    <div class="row justify-content-center pb-sm-2">
        <div class="col-lg-11 col-xl-10">
            
            <!-- Page title-->
            <div class="text-center pb-4 mb-3">
                <h1 class="h4 mb-4 font-vazir">
                    ویرایش پروژه
                </h1>
                <p class="mb-1">
                    پروژه مورد نظر خود را ویرایش نمایید
                </p>
            </div>
            
            <!-- Livewire component-->
            @livewire('frontend.pages.project.project-edit.index', ['id' => $id])

        </div>
    </div>
</div>

@endsection
