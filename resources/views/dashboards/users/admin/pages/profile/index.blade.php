@extends('dashboards.users.admin.master')
@section('main')

@push('page-styles')
    <link href="{{asset('assets/dashboards/assets/vendor/css/pages/page-profile.css')}}" rel="stylesheet"/>
@endpush

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/js/pages-profile.js')}}"></script>
@endpush

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    
    @include('dashboards.users.admin.pages.profile.layouts.header')

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body"> 
                    <ul class="list-unstyled mb-4">
                        <li class="d-flex align-items-center mb-3"> <i class="ti ti-user text-heading"></i><span class="fw-medium mx-2 text-heading">نام کامل:</span> <span>{{auth()->user()->firstname}} {{auth()->user()->lastname}}</span>                                                </li>
                        <li class="d-flex align-items-center mb-3"> <i class="ti ti-crown text-heading"></i><span class="fw-medium mx-2 text-heading">نقش:</span> <span>مدیر</span></li>
                    </ul> <small class="card-text text-uppercase">اطلاعات تماس</small>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-center mb-3"> <i class="ti ti-phone-call"></i><span class="fw-medium mx-2 text-heading">تلفن:</span> <span><bdi>{{auth()->user()->phone}}</bdi></span></li>
                        <li class="d-flex align-items-center mb-3"> <i class="ti ti-mail"></i><span class="fw-medium mx-2 text-heading">پست الکترونیکی:</span> <span>{{auth()->user()->email}}</span></li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
        </div>
    </div>
</div>
<!-- / Content -->

@endsection