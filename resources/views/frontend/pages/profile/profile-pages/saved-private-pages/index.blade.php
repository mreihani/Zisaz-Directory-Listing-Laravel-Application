@extends('frontend.master')
@section('main')

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
                کسب و کارهای من
            </li>
        </ol>
    </nav>
    <!-- Page content-->
    <div class="row">
        <!-- Sidebar-->
        @include('frontend.pages.profile.layouts.sidebar')    

        <!-- main content-->
        @livewire('frontend.pages.profile.profile-pages.saved-private-pages.index')
    </div>
</div>


@endsection
