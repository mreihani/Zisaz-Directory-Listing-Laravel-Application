@extends('frontend.master')
@section('main')

<div class="position-absolute top-0 start-0 w-100 bg-dark" style="height: 398px;"></div>
    <div class="container content-overlay mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="">حساب کاربری</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    فعالیت های من
                </li>
            </ol>
        </nav>
        <!-- Page card like wrapper-->
        <div class="bg-light shadow-sm rounded-3 p-4 p-md-5 mb-2">

            <!-- Account header-->
            <!-- Account menu-->
            @include('frontend.pages.profile.layouts.nav')    
            
            @livewire('frontend.pages.profile.profile-pages.saved-activities.index')
        </div>
    </div>
</div>

@endsection
