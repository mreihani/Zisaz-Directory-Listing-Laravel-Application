@extends('frontend.master')
@section('main')

<!-- Page header-->
<section class="bg-dark pt-5">
    <div class="container py-5">
      <h1 class="text-light pt-1 pt-md-3 mb-4 font-vazir h3">جستجو شغل</h1>
      <!-- Search form-->
      <form class="form-group form-group-light d-block rounded-lg-pill mb-4">
        <div class="row align-items-center g-0 me-n2">
          <div class="col-lg-3 col-xl-4">
            <div class="input-group input-group-lg border-end-xl border-light"><span class="input-group-text text-light rounded-pill opacity-50 pe-3"><i class="fi-search"></i></span>
                  <input class="form-control" type="text" placeholder="عنوان شغلی، مهارت یا...">
            </div>
          </div>
          <hr class="hr-light d-lg-none my-2">
          <div class="col-lg-5 d-sm-flex">
            <div class="dropdown w-sm-50 border-end-sm border-light" data-bs-toggle="select">
              <button class="btn btn-link dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="fi-list me-2"></i><span class="dropdown-toggle-label">دسته بندی</span></button>
              <input type="hidden">
              <ul class="dropdown-menu dropdown-menu-dark my-3">
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">حسابدار</span></a></li>
                      <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">فروش و بازاریابی</span></a></li>
                      <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">پزشکی</span></a></li>
                      <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">فناوری اطلاعات</span></a></li>
                      <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">سئو و بهینه سازی</span></a></li>
                      <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">ورزشی</span></a></li>
                      <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">حمل و نقل</span></a></li>
              </ul>
            </div>
            <hr class="hr-light d-sm-none my-2">
            <div class="dropdown w-sm-50 border-end-lg border-light" data-bs-toggle="select">
              <button class="btn btn-link dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="fi-map-pin me-2"></i><span class="dropdown-toggle-label">موقعیت مکانی</span></button>
              <input type="hidden">
              <ul class="dropdown-menu dropdown-menu-dark my-3">
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">استانبول</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">شیکاگو</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">ترکیه</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">لاس وگاس</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">لوس آنجلس</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">نیویورک</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">سن فرانسیسکو</span></a></li>
              </ul>
            </div>
          </div>
          <hr class="hr-light d-lg-none my-2">
          <div class="col-lg-4 col-xl-3 d-flex align-items-center">
            <div class="dropdown w-50 w-lg-100" data-bs-toggle="select">
              <button class="btn btn-link dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="fi-geo me-2"></i><span class="dropdown-toggle-label">فاصله</span></button>
              <input type="hidden">
              <ul class="dropdown-menu dropdown-menu-dark my-3">
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">10 متر</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">20 متر</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">30 متر</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">40 متر</span></a></li>
                <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">50 متر</span></a></li>
              </ul>
            </div>
            <button class="btn btn-primary btn-lg w-50 w-lg-auto rounded-pill" type="button">جستجو</button>
          </div>
        </div>
      </form>
      <!-- Search params (dropdowns)-->
      <div class="d-sm-flex justify-content-between pt-2 pb-1 pb-md-3 pb-lg-4">
        <div class="d-flex flex-column flex-sm-row flex-wrap">
          <div class="dropdown me-sm-3 mb-2 mb-sm-3" data-bs-toggle="select">
            <button class="btn btn-translucent-light btn-sm dropdown-toggle fs-md fw-normal w-100 text-end" type="button" data-bs-toggle="dropdown"><span class="dropdown-toggle-label">تاریخ انتشار</span></button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">اخیرا</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">5 روز</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">15 روز</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">1 هفته</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">1 ماه</span></a></li>
            </ul>
          </div>
          <div class="dropdown me-sm-3 mb-2 mb-sm-3" data-bs-toggle="select">
            <button class="btn btn-translucent-light btn-sm dropdown-toggle fs-md fw-normal w-100 text-end" type="button" data-bs-toggle="dropdown"><span class="dropdown-toggle-label">نوع شغل</span></button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">تمام وقت</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">پاره وقت</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">دورکار</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">موقت</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">قراردادی</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">کارآموزی</span></a></li>
            </ul>
          </div>
          <div class="dropdown me-sm-3 mb-2 mb-sm-3" data-bs-toggle="select">
            <button class="btn btn-translucent-light btn-sm dropdown-toggle fs-md fw-normal w-100 text-end" type="button" data-bs-toggle="dropdown"><span class="dropdown-toggle-label">نام شرکت</span></button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">شرکت داده پردازی</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">فست کلیک</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">توسعه پردازان</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">شرکت درسا</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">کارگزاری مفید</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">پروه صنعتی انتخاب</span></a></li>
            </ul>
          </div>
          <div class="dropdown me-sm-3 mb-2 mb-sm-3" data-bs-toggle="select">
            <button class="btn btn-translucent-light btn-sm dropdown-toggle fs-md fw-normal w-100 text-end" type="button" data-bs-toggle="dropdown"><span class="dropdown-toggle-label">بازه حقوق پایه</span></button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">500 تومان - 100 تومان</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">100 تومان - 200 تومان</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">200 تومان - 500 تومان</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">500 تومان - 1000 تومان</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">1000 تومان - 2000 تومان</span></a></li>
              <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">2000 تومان - 5000 تومان</span></a></li>
            </ul>
          </div>
        </div><a class="d-inline-block text-light text-nowrap py-3" href="#">جستجو پیشرفته</a>
      </div>
    </div>
  </section>
  <!-- Page content-->
  <section class="position-relative bg-white rounded-xxl-4 zindex-5" style="margin-top: -30px;">
    <div class="container pt-4 pb-5 mb-md-4">
      <!-- Breadcrumb-->
      <nav class="pb-4 my-2" aria-label="Breadcrumb">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
          <li class="breadcrumb-item active" aria-current="page">جستجو شغل</li>
        </ol>
      </nav>
      <div class="row">
        <!-- List of jobs-->
        <div class="col-lg-5 col-md-6 position-relative mb-4 mb-md-0" style="z-index: 1025;">
          <!-- Sorting-->
          <div class="d-sm-flex align-items-center justify-content-between pb-4 mb-sm-2">
            <div class="d-flex align-items-center">
              <label class="fs-sm me-2 pe-1 text-nowrap" for="sorting"><i class="fi-arrows-sort mt-n1 me-2"></i>مرتب سازی براساس</label>
              <select class="form-select form-select-sm" id="sorting">
                <option>جدیدترین</option>
                <option>پربازدید</option>
                <option>بالاترین حقوق</option>
              </select>
            </div>
            <div class="text-muted fs-sm text-nowrap"><i class="fi-briefcase fs-base mt-n1 me-2"></i>2948 شغل</div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/it-pro.png')}}" width="24" alt="IT Pro Logo"><span class="fs-sm text-dark opacity-80 px-1">شرکت داده پردازی</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه مند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام کارشناس امور مهاجرتی</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>شیکاگو</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>75000 تومان</span></div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/zalo.png')}}" width="24" alt="Zalo Logo"><span class="fs-sm text-dark opacity-80 px-1">فست کلیک</span><span class="badge bg-faded-accent rounded-pill fs-sm ms-2">ویژه</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu2">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه مند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام مدیر اداری و منابع انسانی</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>10000 تومان</span></div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/elastic.png')}}" width="24" alt="Elastic Logo"><span class="fs-sm text-dark opacity-80 px-1">زومیت</span><span class="badge bg-faded-danger rounded-pill fs-sm ms-2">فوری</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu3" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu3">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه مند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام کارمند فروش (خانم)</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>فرانسه</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>80000 تومان</span></div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/lift-web.png')}}" width="24" alt="Lift Web Logo"><span class="fs-sm text-dark opacity-80 px-1">شرکت توسعه پردازان</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu4" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu4">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه مند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام حسابدار</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>مالزی</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>5000 تومان</span></div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/xbox.png')}}" width="24" alt="Xbox Logo"><span class="fs-sm text-dark opacity-80 px-1">شرکت آیدی پی</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu5" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu5">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه مند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام برنامه‌نویس Vue) Front-End)</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>استانبول</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>130000 تومان</span></div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/zapier.png')}}" width="24" alt="Zapier Logo"><span class="fs-sm text-dark opacity-80 px-1">زرین پال</span><span class="badge bg-faded-danger rounded-pill fs-sm ms-2">فوری</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu6" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu6">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه ند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام مسئول انبار (کرج-آقا)</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>پاریس</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>40000 تومان</span></div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/kibana.png')}}" width="24" alt="Kibana Logo"><span class="fs-sm text-dark opacity-80 px-1">فن آوند پایدار</span><span class="badge bg-faded-info rounded-pill fs-sm ms-2">جدید</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu7" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu7">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه مند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام طراح کابینت</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>ترکیه</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>92000 تومان</span></div>
            </div>
          </div>
          <!-- Item-->
          <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/xampp.png')}}" width="24" alt="XAMPP Logo"><span class="fs-sm text-dark opacity-80 px-1">شرکت زمپ</span></div>
                <div class="dropdown content-overlay">
                  <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu8" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                  <ul class="dropdown-menu my-1" aria-labelledby="contextMenu8">
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-heart opacity-60 me-2"></i>نشان کردن</button>
                    </li>
                    <li>
                      <button class="dropdown-item" type="button"><i class="fi-x-circle opacity-60 me-2"></i>علاقه مند نیستم</button>
                    </li>
                  </ul>
                </div>
              </div>
              <h3 class="h6 card-title pt-1 mb-3"><a class="text-nav stretched-link text-decoration-none" href="job-board-single.html">استخدام مدیر فروش</a></h3>
              <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>آمستردام</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>65000 تومان</span></div>
            </div>
          </div>
          <!-- Pagination-->
          <nav class="pt-4 pb-2" aria-label="Blog pagination">
            <ul class="pagination mb-0">
              <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 8</span></li>
              <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(صفحه جاری)</span></span></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
              <li class="page-item d-none d-sm-block">...</li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">8</a></li>
              <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="fi-chevron-right"></i></a></li>
            </ul>
          </nav>
        </div>
        <!-- Sticky sidebar-->
        <aside class="col-lg-7 col-md-6" style="margin-top: -6rem;">
          <div class="sticky-top" style="padding-top: 6rem;">
            <div class="card shadow-sm p-lg-3 mb-3 mb-lg-0">
              <div class="card-body p-lg-4">
                <h2 class="h4 font-vazir">عضویت در خبرنامه</h2>
                <p>هیچ گونه به روزرسانی شغلی و اطلاعات مربوط به موقعیت های خالی را از دست ندهید!</p>
                <form class="form-group rounded-pill mb-3">
                  <div class="input-group"><span class="input-group-text text-muted"><i class="fi-mail text-muted"></i></span>
                    <input class="form-control" type="text" placeholder="پست الکترونیکی">
                  </div>
                  <button class="btn btn-primary rounded-pill" type="button">ثبت</button>
                </form>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="agree">
                  <label class="form-check-label" for="agree">من با دریافت خبرهای جدید از سایت موافقم.</label>
                </div>
                <hr class="my-4">
                <div class="d-flex align-items-end">
                  <div class="fs-md me-3">آیا به دنبال یه شغل مناسب هستید؟<br>دریافت آخرین فرصت های شغلی در کانال تلگرام</div><a class="btn btn-icon btn-translucent-primary btn-xs rounded-circle" href="#"><i class="fi-telegram"></i></a>
                </div>
              </div>
            </div>
            <div class="pt-4 pt-lg-5 ps-4 ps-lg-5">
              <h2 class="h5 font-vazir">آخرین جستجوهای شما: </h2>
              <ul class="list-unstyled mb-0">
                <li class="mb-0"><a class="nav-link d-inline-block fw-normal px-0 py-1" href="#">حسابداری</a></li>
                <li class="mb-0"><a class="nav-link d-inline-block fw-normal px-0 py-1" href="#">مدیریت</a></li>
                <li class="mb-0"><a class="nav-link d-inline-block fw-normal px-0 py-1" href="#">برنامه نویسی</a></li>
                <li class="mb-0"><a class="nav-link-muted d-inline-block fw-bold py-1" href="#">حذف همه<i class="fi-x fs-xs ms-2"></i></a></li>
              </ul>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>


@endsection