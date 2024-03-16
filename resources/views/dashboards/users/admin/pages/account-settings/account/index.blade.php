@extends('dashboards.users.admin.master')
@section('main')

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/js/pages-account-settings-account.js')}}"></script>
@endpush

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">تنظیمات حساب /</span>
        حساب کاربری
    </h4>
    <div class="row fv-plugins-icon-container">
        <div class="col-md-12">
            
            @include('dashboards.users.admin.pages.account-settings.layouts.header')

            @livewire('dashboards.users.admin.pages.account-settings.account')
        </div>
    </div>
</div>
<!-- / Content -->

@endsection