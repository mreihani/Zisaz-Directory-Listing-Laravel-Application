@extends('frontend.master')
@section('main')

<!-- Page content-->
<!-- Page container-->
<div class="container mt-5 mb-md-2 mb-lg-4 py-5">
    <!-- Breadcrumb-->
    <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home-page')}}">
                    خانه
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('get-mags')}}">
                    مجله
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{$mag->title}}
            </li>
        </ol>
    </nav>
    <h1 class="h4 pb-3 font-vazir">
        {{$mag->title}}
    </h1>
    <img class="rounded-3" src="{{asset($mag->image)}}" alt="Post image">
    <div class="row mt-4 pt-3">
        <!-- Sidebar (offcanvas)-->
        <aside class="col-lg-4">
            <!-- Offcanvas-->
            <div class="offcanvas-lg offcanvas-end pe-lg-3" id="blog-sidebar">
                <div class="offcanvas-header shadow-sm mb-2">
                    <h3 class="h5 offcanvas-title">
                        سایدبار
                    </h3>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">

                    <!-- Search-->
                    <div class="position-relative mb-4">
                        <input class="form-control pe-5" type="text" placeholder="جستجو...">
                        <i class="fi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                    </div>

                    <!-- Author-->
                    {{-- <div class="card card-flush py-2 py-lg-0 mb-4">
                        <div class="card-body d-flex align-items-start">
                            <img class="me-3 rounded-circle" src="img/avatars/28.png" width="80" alt="Avatar">
                            <div>
                                <h4 class="h5 mb-2">
                                    <a class="nav-link stretched-link p-0 fw-bold" href="#">
                                        بیسی کوپر
                                    </a>
                                </h4>
                                <span class="d-block mb-3 fs-sm">
                                    گردشگر ، بلاگر
                                </span>
                                <div class="position-relative zindex-5 text-nowrap">
                                    <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                        <i class="fi-facebook"></i>
                                    </a>
                                    <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                        <i class="fi-twitter"></i>
                                    </a>
                                    <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#">
                                        <i class="fi-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Categories-->
                    <div class="card card-flush pb-2 pb-lg-0 mb-4">
                        <div class="card-body">
                            <h3 class="h5 font-vazir">
                                دسته بندی ها
                            </h3>
                            @foreach ($magCategories as $magCategorieItem)
                                <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">
                                    {{$magCategorieItem->title}}
                                    <span class="text-muted ms-2">
                                        ({{$magCategorieItem->magazine_posts_count}})
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </aside>
        <!-- Post content-->
        <div class="col-lg-8 blog-details">
            <!-- Post meta-->
            <div class="d-flex flex-wrap border-bottom pb-3 mb-4">
                <a class="text-uppercase text-decoration-none border-end pe-3 me-3 mb-2" href="#">
                    {{$mag->magazineCategory->title}}
                </a>
                <div class="d-flex align-items-center border-end pe-3 me-3 mb-2">
                    <i class="fi-calendar-alt opacity-70 me-2"></i>
                    <span>
                        {{jdate($mag->updated_at)->format('%d %B')}}
                    </span>
                </div>
                <div class="d-flex align-items-center border-end pe-3 me-3 mb-2">
                    <i class="fi-clock opacity-70 me-2"></i>
                    <span>
                        {{$readingTime}} دقیقه زمان مطالعه
                    </span>
                </div>
                <a class="nav-link-muted d-flex align-items-center mb-2" href="#">
                    <i class="fi-chat-circle opacity-70 me-2"></i>
                    <span>
                        3 نظر
                    </span>
                </a>
            </div>

            <!-- mag text -->
            {!! $mag->body !!}

            <!-- Tags + Sharing-->
            <div class="pt-4">
                <div class="d-md-flex align-items-center justify-content-between border-top pt-4">
                    <div class="d-flex align-items-center">
                        <div class="fw-bold text-nowrap pe-1 mb-2">
                            اشتراک گذاری: 
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mb-2 ms-2" href="#" data-bs-toggle="tooltip" title="Share with Facebook">
                                <i class="fi-facebook"></i>
                            </a>
                            <a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mb-2 ms-2" href="#" data-bs-toggle="tooltip" title="Share with Twitter">
                                <i class="fi-twitter"></i>
                            </a>
                            <a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mb-2 ms-2" href="#" data-bs-toggle="tooltip" title="Share with LinkedIn">
                                <i class="fi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($similarItemsCount)
        <!-- Recent posts-->
        <div class="pt-5 mt-md-4 mb-lg-2">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-2">
                <h2 class="h4 mb-sm-0 font-vazir">
                    ممکن است شما نیز علاقه مند باشید
                </h2>
                <a class="btn btn-link fw-normal ms-sm-3 p-0" href="{{route('get-mags')}}">
                    لیست مقالات
                    <i class="fi-arrow-long-left ms-2"></i>
                </a>
            </div>

            <!-- Carousel-->
            <div class="tns-carousel-wrapper tns-nav-outside">
                <div class="tns-carousel-inner d-block" data-carousel-options="{&quot;controls&quot;: false, &quot;gutter&quot;: 24, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1,&quot;nav&quot;:true},&quot;500&quot;:{&quot;items&quot;:2},&quot;850&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}}}">
                    @foreach ($similarItems as $similarItem)
                        <!-- Item-->
                        <article>
                            <a class="d-block mb-3" href="city-guide-blog-single.html">
                                <img class="rounded-3" src="{{asset($similarItem->image_sm)}}" alt="{{$similarItem->title}}">
                            </a>
                            <a class="fs-sm text-uppercase text-decoration-none" href="#">
                                {{$similarItem->magazineCategory->title}}
                            </a>
                            <h3 class="fs-lg pt-1">
                                <a class="nav-link" href="{{route('mag', $similarItem->slug)}}">
                                    {{$similarItem->title}}
                                </a>
                            </h3>
                            <a class="d-flex align-items-center text-decoration-none" href="#">
                                {{-- <img class="rounded-circle" src="img/avatars/16.png" width="44" alt="Avatar"> --}}
                                <div class="ps-2">
                                    {{-- <h6 class="fs-sm text-nav lh-base mb-1">
                                        بیسی کوپر
                                    </h6> --}}
                                    <div class="d-flex text-body fs-xs">
                                        <span class="me-2 pe-1">
                                            <i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>
                                            {{jdate($mag->updated_at)->format('%d %B')}}
                                        </span>
                                        <span>
                                            <i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>
                                            0 نظر
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>


@endsection