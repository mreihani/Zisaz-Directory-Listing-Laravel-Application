@extends('frontend.master')
@section('main')


<main class="page-wrapper">
 
    <!-- Page content-->
    <!-- Page container-->
    <div class="container mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home-page')}}">
                    خانه
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">لیست مقالات</li>
        </ol>
        </nav>
        <h1 class="mb-4 font-vazir h4">مجله زی ساز</h1>

        <!-- Sponsored posts-->
        
        <!-- List of posts + Sidebar-->
        <div class="row">
            <!-- Sidebar (offcanvas)-->
            <aside class="col-lg-3">
                <div class="offcanvas-lg offcanvas-end" id="blog-sidebar">

                    <div class="offcanvas-header shadow-sm mb-2">
                        <h2 class="h5 offcanvas-title">سایدبار</h2>
                        <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">

                        <!-- Sorting-->
                        <div class="d-flex align-items-center mb-4">
                            <label class="d-inline-block me-2 pe-1 text-muted text-nowrap" for="sort">
                                <i class="fi-arrows-sort mt-n1 me-1 align-middle opacity-80"></i>
                                مرتب سازی براساس:
                            </label>
                            <select class="form-select" id="sort">
                                <option>جدیدترین</option>
                                <option>قدیمی ترین</option>
                                <option>پربازدید</option>
                            </select>
                        </div>

                        <!-- Search-->
                        <div class="position-relative mb-4">
                            <input class="form-control pe-5" type="text" placeholder="جستجو...">
                            <i class="fi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                        </div>

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
            
            <!-- Articles list-->
            @if($mags->count())
                <div class="col-lg-9 blog-list">
                    <div class="ps-lg-3">
                        @foreach($mags as $magItem)
                            <!-- Article-->
                            <article class="card card-horizontal border-0 mb-4">
                                <a class="card-img-top position-relative rounded-3 me-sm-4 mb-sm-0 mb-3" href="{{route('mag', $magItem->slug)}}" style="background-image: url('{{asset($magItem->image_sm)}}');">
                                    @if($magItem->updated_at > now()->subMinutes(30)) 
                                        <span class="badge bg-info position-absolute top-0 start-0 m-3 fs-sm">
                                            جدید
                                        </span>
                                    @endif
                                </a>
                                <div class="card-body px-0 pt-0 pb-lg-5 pb-sm-4 pb-2">
                                    <a class="fs-sm text-uppercase text-decoration-none" href="{{route('mag', $magItem->slug)}}">
                                        {{$magItem->magazineCategory->title}}
                                    </a>
                                    <h3 class="h5 pt-1 mb-2">
                                        <a class="nav-link" href="{{route('mag', $magItem->slug)}}">
                                            {{$magItem->title}}
                                        </a>
                                    </h3>

                                    <p class="fs-sm text-muted">
                                        {!! \Illuminate\Support\Str::limit($magItem->body, 100, '...') !!}
                                    </p>

                                    <a class="d-flex align-items-center text-decoration-none" href="#">
                                        {{-- <img class="rounded-circle" src="img/avatars/25.png" width="48" alt="Avatar"> --}}
                                        <div class="ps-2">
                                            {{-- <h6 class="fs-sm text-nav lh-base mb-1">بیسی کوپر</h6> --}}
                                            <div class="d-flex text-body fs-xs">
                                                <span class="me-2 pe-1">
                                                    <i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>
                                                    {{jdate($magItem->updated_at)->format('%d %B')}}
                                                </span>
                                                <span>
                                                    <i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>
                                                    3 نظر
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach    
                    </div>
                    <!-- Pagination-->
                    <div class="d-flex justify-content-center pt-4 border-top">
                        <div class="row mt-3">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    {{$mags->links('vendor.pagination.dashboards-datatables')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-9 blog-list">
                    <div class="ps-lg-3">
                        <div class="mx-2">
                            <div class="alert alert-accent" role="alert">
                                هیچ مقاله ای یافت نشد!
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
</main>


@endsection