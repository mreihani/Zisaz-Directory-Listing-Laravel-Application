@extends('frontend.master')
@section('main')

<div class="position-absolute top-0 start-0 w-100 bg-dark" style="height: 398px;"></div>
    <div class="container content-overlay mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item">
                    <a href="{{URL::to('/')}}">خانه</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="">حساب کاربری</a>
                </li>
                @if(in_array(auth()->user()->userGroupType->groupable->id, [2, 3, 4, 5, 6, 7, 9, 10]))
                    <li class="breadcrumb-item active" aria-current="page">
                        رزومه و سابقه کار
                    </li>
                @endif
                @if(in_array(auth()->user()->userGroupType->groupable->id, [8]))
                    <li class="breadcrumb-item active" aria-current="page">
                        درباره فروشگاه
                    </li>
                @endif
                @if(in_array(auth()->user()->userGroupType->groupable->id, [11]))
                    <li class="breadcrumb-item active" aria-current="page">
                        درباره ماشین آلات
                    </li>
                @endif
                @if(in_array(auth()->user()->userGroupType->groupable->id, [12]))
                    <li class="breadcrumb-item active" aria-current="page">
                        درباره آزمایشگاه
                    </li>
                @endif
                @if(in_array(auth()->user()->userGroupType->groupable->id, [14, 15]))
                    <li class="breadcrumb-item active" aria-current="page">
                        اطلاعات سرمایه گذاری
                    </li>
                @endif
            </ol>
        </nav>
        <!-- Page card like wrapper-->
        <div class="bg-light shadow-sm rounded-3 p-4 p-md-5 mb-2">

            <!-- Account header-->
            <!-- Account menu-->
            @include('frontend.pages.profile.layouts.nav')    
            
            @livewire('frontend.pages.profile.profile-pages.my-resume.con-grp' . auth()->user()->userGroupType->groupable->id . '.index')
        </div>
    </div>
</div>

@endsection


