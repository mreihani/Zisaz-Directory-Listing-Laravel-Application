@extends('frontend.master')
@section('main')

<!-- Page content-->
<section class="container mt-5 mb-lg-5 mb-4 pt-5 pb-lg-5">
    <!-- Breadcrumb-->
    <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home-page')}}">خانه</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">رزومه</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                @if($activity->subactivity->resume_goal == 1)
                معرفی تجربه، تخصص و پروژه های شخصی
                @elseif($activity->subactivity->resume_goal == 2)
                معرفی فروشگاه
                @elseif($activity->subactivity->resume_goal == 3)
                معرفی شرکت ساختمانی
                @elseif($activity->subactivity->resume_goal == 4)
                معرفی دفتر طراحی و مهندسی
                @elseif($activity->subactivity->resume_goal == 5)
                معرفی آزمایشگاه مصالح ساختمانی
                @elseif($activity->subactivity->resume_goal == 6)
                معرفی کارخانه تولیدی
                @endif
            </li>
        </ol>
    </nav>
    <div class="row gy-5 pt-lg-2">
        <div class="col-lg-7">
            <div class="d-flex flex-column">
                <!-- Page title + Features-->
                <div class="order-lg-2 order-1 mt-3">
                    <h1 class="h2 mb-2">
                        {{$activity->subactivity->item_title}}
                    </h1>
                </div>
            </div>
            <!-- Overview-->
            @if($activity->subactivity->address)
                <h2 class="h5">
                    آدرس
                </h2>
                <p class="mb-4 pb-2">
                    {{$activity->subactivity->address}}
                </p>
            @endif
            <!-- Work Exp-->
            @if($activity->subactivity->resume_description)
                <h2 class="h5">
                    توضیحات
                </h2>
                <p class="mb-4 pb-2">
                    {{$activity->subactivity->resume_description}}
                </p>
            @endif
            <!-- Company projects-->
            @if($activity->subactivity->project_description)
                <h2 class="h5">
                    شرح پروژه های اجرا شده
                </h2>
                <p class="mb-4 pb-2">
                    {{$activity->subactivity->project_description}}
                </p>
            @endif
        </div>
        <!-- Sidebar with details-->
        <aside class="col-lg-5">
            <div class="ps-lg-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <span class="badge bg-success me-2 mb-2">
                            تایید شده
                        </span>
                        <span class="badge bg-info me-2 mb-2">
                            جدید
                        </span>
                    </div>
                    <div class="text-nowrap">
                        <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="tooltip" title="نشان کردن">
                            <i class="fi-bookmark"></i>
                        </button>
                        <div class="dropdown d-inline-block" data-bs-toggle="tooltip" title="اشتراک گذاری">
                            <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="dropdown">
                                <i class="fi-share"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end my-1">
                                <button class="dropdown-item" type="button">
                                    <i class="fi-facebook fs-base opacity-75 me-2"></i>
                                    فیسبوک
                                </button>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-twitter fs-base opacity-75 me-2"></i>
                                    توییتر
                                </button>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-instagram fs-base opacity-75 me-2"></i>
                                    اینستاگرام
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Property details-->
                <div class="card border-0 bg-secondary mb-4">
                    <div class="card-body">
                        <h5 class="mb-0 pb-3">مشخصات</h5>
                        <ul class="list-unstyled mt-n2 mb-0">
                            @if($activity->activityGroups->count())
                                <li class="mt-2 mb-0">
                                    <b>زمینه فعالیت: </b>
                                    {{$activity->activityGroups->pluck('title')->implode('، ')}}
                                </li>
                            @endif
                            @if($activity->subactivity->postalcode)
                                <li class="mt-2 mb-0">
                                    <b>کد پستی: </b>
                                    {{$activity->subactivity->postalcode}}
                                </li>
                            @endif
                            @if($activity->subactivity->landline_phone)
                                <li class="mt-2 mb-0">
                                    <b>شماره تلفن ثابت: </b>
                                    {{$activity->subactivity->landline_phone}}
                                </li>
                            @endif
                            @if($activity->subactivity->reg_num)
                                <li class="mt-2 mb-0">
                                    <b>شماره مجوز: </b>
                                    {{$activity->subactivity->reg_num}}
                                </li>
                            @endif
                            @if($activity->subactivity->resume_goal)
                                <li class="mt-2 mb-0">
                                    <b>نوع رزومه: </b>
                                    @if($activity->subactivity->resume_goal == 1)
                                    معرفی تجربه، تخصص و پروژه های شخصی
                                    @elseif($activity->subactivity->resume_goal == 2)
                                    معرفی فروشگاه
                                    @elseif($activity->subactivity->resume_goal == 3)
                                    معرفی شرکت ساختمانی
                                    @elseif($activity->subactivity->resume_goal == 4)
                                    معرفی دفتر طراحی و مهندسی
                                    @elseif($activity->subactivity->resume_goal == 5)
                                    معرفی آزمایشگاه مصالح ساختمانی
                                    @elseif($activity->subactivity->resume_goal == 6)
                                    معرفی کارخانه تولیدی
                                    @endif
                                </li>
                            @endif
                            <li class="mt-2 mb-0">
                                <b>موقعیت مکانی: </b>
                                {{$activity->subactivity->city->province->title}}،
                                {{$activity->subactivity->city->title}}
                            </li>
                            <li class="mt-2 mb-0 d-flex">
                                <b>تلفن:&nbsp;</b>
                                @livewire('frontend.auth.login.open-login-modal', ['phone' => $activity->user->phone])
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Post meta-->
                <ul class="d-flex mb-4 list-unstyled fs-sm">
                    <li class="me-3 pe-3 border-end">زمان انتشار: 
                        <b> 
                            {{jdate($activity->subactivity->updated_at)->ago()}}    
                        </b>
                    </li>
                    <li class="me-3 pe-3 border-end">شماره رزومه: 
                        <b>
                            {{$activity->id}}
                        </b>
                    </li>
                    <li class="me-3 pe-3">بازدید: <b>100 نفر</b></li>
                </ul>
            </div>
        </aside>
    </div>
</section>


<!-- Recently viewed-->
@if($similarItemsCount > 4)
    <section class="container mb-5 pb-2 pb-lg-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h3 mb-0">
                رزومه های مشابه
            </h2>
            <a class="btn btn-link fw-normal p-0" href="{{route('get-activities', ['activity_type' => 'resume', 'r_name' => 'resume', 'type' => 'resume'])}}">
                مشاهده همه
                <i class="fi-arrow-long-left ms-2"></i>
            </a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
            <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">

                @foreach($similarItems as $similarItem)
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-hover">
                                <a class="img-overlay" href="{{route('activity', $similarItem->activity->slug)}}"></a>
                                <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="نشان کردن">
                                        <i class="fi-bookmark"></i>
                                    </button>
                                </div>
                                <img src="{{$similarItem->activity->adsImagesUrl()}}" alt="Image">
                            </div>
                                <div class="card-body position-relative pb-3">
                                <h3 class="h6 mb-2 fs-base">
                                    <a class="nav-link stretched-link" href="{{route('activity', $similarItem->activity->slug)}}">{{$similarItem->item_title}}</a>
                                </h3>
                                <p class="mb-2 fs-sm text-muted">
                                    {{$similarItem->address}}
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                                <span class="d-inline-block mx-1 px-2 fs-sm">
                                    {{jdate($similarItem->activity->updated_at)->ago()}}
                                    <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            
            </div>
        </div>
    </section>
@endif

@endsection