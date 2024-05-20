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

        .jquery-palette-color-picker-master-plugin input[type="text"] {
            vertical-align: top;
            font-family: 'Inconsolata', Courier, monospace;
            font-weight: 700;
            padding: 4px;
            height: 30px;
            margin-right: 8px;
        }
    </style>
@endpush

@push('page-scripts-top')
    <script src="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/jquery-palette-color-picker-master/palette-color-picker.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/jquery-palette-color-picker-master/ready.js')}}"></script>
@endpush

<div class="container mt-5 mb-md-4 py-5">
    <!-- Breadcrumb-->
    <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home-page')}}">خانه</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                ایجاد صفحه اختصاصی
            </li>
        </ol>
    </nav>

    <!-- Page content-->
    <div class="row justify-content-center pb-sm-2">
        <div class="col-lg-11 col-xl-10">
            
            <!-- Page title-->
            <div class="text-center pb-4 mb-3">
                <h1 class="h4 mb-4 font-vazir">
                    ایجاد یک صفحه اختصاصی
                </h1>
                <p class="mb-1">
                    با توجه به نیاز خود می توانید یک وب سایت یا صفحه اختصاصی در زمینه های مختلف ایجاد نمایید.
                </p>
            </div>
        
            <!-- Livewire component-->
            @livewire('frontend.pages.private-page.private-page-create.index')

        </div>
    </div>
</div>

@endsection
