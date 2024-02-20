@extends('frontend.master')
@section('main')

<div class="position-absolute top-0 start-0 w-100 bg-dark" style="height: 398px;"></div>
    <div class="container content-overlay mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
            <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">خانه</a></li>
            <li class="breadcrumb-item"><a href="">حساب کاربری</a></li>
            <li class="breadcrumb-item active" aria-current="page">رزومه من</li>
            </ol>
        </nav>
        <!-- Page card like wrapper-->
        <div class="bg-light shadow-sm rounded-3 p-4 p-md-5 mb-2">

            <!-- Account header-->
            <!-- Account menu-->
            @include('frontend.pages.profile.layouts.nav')    
            
            <!-- Body -->
            <div class="d-flex align-items-center justify-content-between py-4 mt-3 mb-2">
                <h1 class="h4 mb-0 font-vazir">رزومه های من</h1><a class="fw-bold text-decoration-none" href="#"><i class="fi-trash me-2"></i><span class="align-middle">حذف همه</span></a>
            </div>
            <div class="row">
                <!-- Sidebar-->
                <div class="col-md-3 mb-4 pb-3 pb-md-0">
                <div style="max-width: 13rem;">
                    <ul class="list-unstyled fs-sm pb-1 pb-md-3 px-0">
                    <li><a class="nav-link fw-normal d-flex align-items-center px-0 py-1" href="#"><i class="fi-file opacity-70 me-2"></i><span>منتشر شده</span><span class="text-muted ms-auto">(3)</span></a></li>
                    <li><a class="nav-link fw-normal d-flex align-items-center px-0 py-1" href="#"><i class="fi-file-clean opacity-70 me-2"></i><span>پیش نویس</span><span class="text-muted ms-auto">(0)</span></a></li>
                    <li><a class="nav-link fw-normal d-flex align-items-center px-0 py-1" href="#"><i class="fi-archive opacity-70 me-2"></i><span>آرشیو</span><span class="text-muted ms-auto">(0)</span></a></li>
                    </ul><a class="btn btn-primary rounded-pill w-100" href="job-board-post-resume-1.html"><i class="fi-plus fs-sm me-2"></i>ثبت رزومه جدید</a>
                </div>
                </div>
                <!-- List of resumes-->
                <div class="col-md-9">
                <!-- Item-->
                <div class="card bg-secondary card-hover mb-2">
                    <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-start"><img class="d-none d-sm-block" src="{{asset('assets/frontend/img/avatars/38.png')}}" width="100" alt="Resume picture">
                        <div class="ps-sm-3">
                            <h3 class="h6 card-title pb-1 mb-2"><a class="stretched-link text-nav text-decoration-none" href="#">کارشناس پشتیبانی</a></h3>
                            <div class="fs-sm">
                            <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</div>
                            <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>450000 تومان</div>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex flex-column align-items-end justify-content-between">
                        <div class="dropdown position-relative zindex-10 mb-3">
                            <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                            <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>ویرایش</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-flame opacity-60 me-2"></i>بروزرسانی</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-download-file opacity-60 me-2"></i>دریافت نسخه PDF</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-power opacity-60 me-2"></i>غیرفعال</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>حذف</button>
                            </li>
                            </ul>
                        </div><strong class="fs-sm">80 بازدید</strong>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Item-->
                <div class="card bg-secondary card-hover mb-2">
                    <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-start"><img class="d-none d-sm-block" src="{{asset('assets/frontend/img/avatars/37.png')}}" width="100" alt="Resume picture">
                        <div class="ps-sm-3">
                            <h3 class="h6 card-title pb-1 mb-2"><a class="stretched-link text-nav text-decoration-none" href="#"><span class="me-3">گرافیست</span><span class="badge bg-faded-accent fs-sm rounded-pill">ویژه</span></a></h3>
                            <div class="fs-sm">
                            <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</div>
                            <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>20000 تومان - 205000 تومان</div>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex flex-column align-items-end justify-content-between">
                        <div class="dropdown position-relative zindex-5 mb-3">
                            <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                            <ul class="dropdown-menu my-1" aria-labelledby="contextMenu2">
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>ویرایش</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-flame opacity-60 me-2"></i>بروزرسانی</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-download-file opacity-60 me-2"></i>دریافت نسخه PDF</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-power opacity-60 me-2"></i>غیرفعال</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>حذف</button>
                            </li>
                            </ul>
                        </div><strong class="fs-sm">203 بازدید</strong>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Item-->
                <div class="card bg-secondary card-hover">
                    <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-start"><img class="d-none d-sm-block" src="{{asset('assets/frontend/img/avatars/37.png')}}" width="100" alt="Resume picture">
                        <div class="ps-sm-3">
                            <h3 class="h6 card-title pb-1 mb-2"><a class="stretched-link text-nav text-decoration-none" href="#">کارشناس سرورهای ماکروسافت</a></h3>
                            <div class="fs-sm">
                            <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</div>
                            <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>2500000 تومان</div>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex flex-column align-items-end justify-content-between">
                        <div class="dropdown position-relative zindex-1 mb-3">
                            <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu3" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                            <ul class="dropdown-menu my-1" aria-labelledby="contextMenu2">
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>ویرایش</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-flame opacity-60 me-2"></i>بروزرسانی</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-download-file opacity-60 me-2"></i>دریافت نسخه PDF</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-power opacity-60 me-2"></i>غیرفعال</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>حذف</button>
                            </li>
                            </ul>
                        </div><strong class="fs-sm">92 بازدید</strong>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!--End of Body -->
        </div>
    </div>
</div>

@endsection


