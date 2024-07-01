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
                آگهی های من
            </li>
        </ol>
    </nav>
    <!-- Page content-->
    <div class="row">
        <!-- Sidebar-->
        @include('frontend.pages.profile.layouts.sidebar')    

        <!-- main content-->
        @if(is_null($type))
            @livewire('frontend.pages.profile.profile-pages.saved-ads.active-ads.index')
        @elseif($type == 'trashed')
            @livewire('frontend.pages.profile.profile-pages.saved-ads.trashed-ads.index', ['type' => $type])
        @elseif($type == 'rejected')
            @livewire('frontend.pages.profile.profile-pages.saved-ads.rejected-ads.index', ['type' => $type])
        @elseif($type == 'pending')
            @livewire('frontend.pages.profile.profile-pages.saved-ads.pending-ads.index', ['type' => $type])
        @endif
        
    </div>
</div>


@endsection
