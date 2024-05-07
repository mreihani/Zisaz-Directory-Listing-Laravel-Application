@extends('frontend.master')
@section('main')

<!-- Page content-->
      <!-- Page header-->
      <section class="mt-5 pt-4">
        <!-- Parallax container-->
        <div class="jarallax mt-2" data-jarallax data-speed="0.5">
          <!-- Parallax image-->
          <div class="jarallax-img bg-secondary" style="background-image: url({{asset('assets/frontend/img/city-guide/about/hero-bg.jpg')}}); background-position: 36% center !important;"></div>
          <!-- Section content-->
          <div class="container py-3">
            <!-- Breadcrumb-->
            <nav class="pt-3" aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light mb-lg-5">
                <li class="breadcrumb-item"><a href="city-guide-home-v1.html">خانه</a></li>
                <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
              </ol>
            </nav>
            <!-- Text-->
            <div class="col-md-6 col-sm-8 py-md-5 py-4 px-0">
              <h1 class="display-4 mb-4 pb-md-2 text-light">با مکان های جدید <i class='fi-heart fs-1 text-primary'></i> با ما همراه باشید!</h1>
              <p class="mb-sm-5 mb-4 pb-md-5 pb-3 lead text-light">ما راهنمای شخصی شما برای تجربه های منحصر به فرد هستیم. ما بهترین مکان ها و رویدادها را در هر نقطه از جهان می شناسیم. با کمک ما چیزی را از دست ندهید!</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Features-->
      <section class="position-relative bg-white rounded-xxl-4 mb-5 pb-1 py-md-3 zindex-5" style="margin-top: -30px;">
        <div class="container pt-5 mb-4 mb-md-5">
          <h2 class="text-center ">ارزش هایی که ما با آنها زندگی می کنیم</h2>
          <p class="mb-4 pb-2 mx-auto fs-lg text-center" style="max-width: 616px;">مسافران در سرتاسر جهان از پلتفرم ما برای کشف مکان اقامت، چه کاری و غذا خوردن در هر نقطه ای از جهان استفاده می کنند.</p>
          <!-- Features grid-->
          <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4 justify-content-center">
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-accent text-accent rounded-circle mb-3"><i class="fi-bed"></i></div>
                  <h3 class="h5 card-title">سفری ایمن</h3>
                  <p class="card-text fs-sm">با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                </div>
              </div>
            </div>
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-warning text-warning rounded-circle mb-3"><i class="fi-cash"></i></div>
                  <h3 class="h5 card-title">قیمت منصفانه</h3>
                  <p class="card-text fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                </div>
              </div>
            </div>
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3"><i class="fi-heart"></i></div>
                  <h3 class="h5 card-title">آسایش خاطر</h3>
                  <p class="card-text fs-sm">با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                </div>
              </div>
            </div>
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-success text-success rounded-circle mb-3"><i class="fi-users"></i></div>
                  <h3 class="h5 card-title">تیم با تجربه</h3>
                  <p class="card-text fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                </div>
              </div>
            </div>
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3"><i class="fi-briefcase"></i></div>
                  <h3 class="h5 card-title">عملکرد بالا</h3>
                  <p class="card-text fs-sm">با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                </div>
              </div>
            </div>
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-success text-success rounded-circle mb-3"><i class="fi-chat-left"></i></div>
                  <h3 class="h5 card-title">ارتباط قوی</h3>
                  <p class="card-text fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                </div>
              </div>
            </div>
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-info text-info rounded-circle mb-3"><i class="fi-like"></i></div>
                  <h3 class="h5 card-title">بهترین تورها</h3>
                  <p class="card-text fs-sm">با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                </div>
              </div>
            </div>
            <!-- Feature item-->
            <div class="col">
              <div class="card border-0 shadow-sm card-hover h-100">
                <div class="card-body icon-box">
                  <div class="icon-box-media bg-faded-warning text-warning rounded-circle mb-3"><i class="fi-checkbox-checked-alt"></i></div>
                  <h3 class="h5 card-title">ارائه راه حل ساده</h3>
                  <p class="card-text fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Add business-->
      <section class="container mb-5 pb-2 pb-lg-5">
        <div class="row align-items-lg-center gy-4">
          <div class="col-md-6"><img class="rounded-3" src="{{asset('assets/frontend/img/city-guide/about/01.jpg')}}" alt="Cover"></div>
          <div class="col-lg-5 offset-lg-1 col-md-6">
            <h2 class="mb-lg-4 ">مشتریان جدید را با کاتالوگ ما به راحتی بدست آورید!</h2>
            <p class="mb-lg-4 fs-lg text-muted">در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
            <ul class="list-unstyled mb-4 pb-lg-3">
              <li class="d-flex"><i class="fi-check mt-1 me-2 pe-1 text-primary"></i>لورم ایپسوم متن ساختگی با تولید سادگی.</li>
              <li class="d-flex"><i class="fi-check mt-1 me-2 pe-1 text-primary"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</li>
              <li class="d-flex"><i class="fi-check mt-1 me-2 pe-1 text-primary"></i>چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</li>
              <li class="d-flex"><i class="fi-check mt-1 me-2 pe-1 text-primary"></i>لورم ایپسوم متن ساختگی با تولید سادگی.</li>
              <li class="d-flex"><i class="fi-check mt-1 me-2 pe-1 text-primary"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ.</li>
              <li class="d-flex"><i class="fi-check mt-1 me-2 pe-1 text-primary"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</li>
            </ul><a class="btn btn-lg btn-primary rounded-pill" href="city-guide-add-business.html"><i class="fi-plus me-2"></i>ثبت اقامتگاه</a>
          </div>
        </div>
      </section>
      <!-- FAQ-->
      <section class="container mb-5 pb-lg-5">
        <h2 class="mb-sm-4 pb-md-2 text-center">سوالات متداول</h2>
        <!-- FAQ grid-->
        <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 g-sm-4 g-0">
          <!-- Grid item-->
          <div class="col">
            <div class="card border-0 h-100">
              <div class="card-body">
                <h3 class="h5 text-primary">01. نحوه ثبت نام</h3><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">لورم ایپسوم متن ساختگی؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">با تولید سادگی نامفهوم از صنعت چاپ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">چاپگرها و متون بلکه روزنامه و مجله در ستون؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">شرایط فعلی تکنولوژی مورد نیاز و کاربردها؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">حال و آینده شناخت فراوان جامعه و متخصصان؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">علی الخصوص طراحان خلاقی و فرهنگ؟</a>
              </div>
            </div>
          </div>
          <!-- Grid item-->
          <div class="col">
            <div class="card border-0 h-100">
              <div class="card-body">
                <h3 class="h5 text-primary">02.نحوه همکاری</h3><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">لورم ایپسوم متن ساختگی؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">با تولید سادگی نامفهوم از صنعت چاپ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">چاپگرها و متون بلکه روزنامه و مجله در ستون؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">علی الخصوص طراحان خلاقی و فرهنگ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">حال و آینده شناخت فراوان جامعه و متخصصان؟</a>
              </div>
            </div>
          </div>
          <!-- Grid item-->
          <div class="col">
            <div class="card border-0 h-100">
              <div class="card-body">
                <h3 class="h5 text-primary">03. حساب کاربری</h3><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">با تولید سادگی نامفهوم از صنعت چاپ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">چاپگرها و متون بلکه روزنامه و مجله در ستون؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">لورم ایپسوم متن ساختگی؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">حال و آینده شناخت فراوان جامعه و متخصصان؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">علی الخصوص طراحان خلاقی و فرهنگ؟</a>
              </div>
            </div>
          </div>
          <!-- Grid item-->
          <div class="col">
            <div class="card border-0 h-100">
              <div class="card-body">
                <h3 class="h5 text-primary">04. گذرواژه و امنیت</h3><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">لورم ایپسوم متن ساختگی؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">با تولید سادگی نامفهوم از صنعت چاپ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">حال و آینده شناخت فراوان جامعه؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">علی الخصوص طراحان خلاقی و فرهنگ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">چاپگرها و متون بلکه روزنامه و مجله در ستون؟</a>
              </div>
            </div>
          </div>
          <!-- Grid item-->
          <div class="col">
            <div class="card border-0 h-100">
              <div class="card-body">
                <h3 class="h5 text-primary">05. تراکنش ها</h3><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">لورم ایپسوم متن ساختگی؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">چاپگرها و متون بلکه روزنامه و مجله؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">با تولید سادگی نامفهوم از صنعت چاپ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">حال و آینده شناخت فراوان جامعه و متخصصان؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">علی الخصوص طراحان خلاقی و فرهنگ؟</a>
              </div>
            </div>
          </div>
          <!-- Grid item-->
          <div class="col">
            <div class="card border-0 h-100">
              <div class="card-body">
                <h3 class="h5 text-primary">06. تغییر رمز پروفایل</h3><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">با تولید سادگی نامفهوم از صنعت چاپ؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">لورم ایپسوم متن ساختگی؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">چاپگرها و متون بلکه روزنامه و مجله در ستون؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">شرایط فعلی تکنولوژی مورد نیاز متخصصان؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">حال و آینده شناخت فراوان جامعه و متخصصان؟</a><a class="nav-link mb-2 p-0 fw-normal" href="city-guide-help-center.html">علی الخصوص طراحان خلاقی و فرهنگ؟</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- The people behind Finder-->
      <section class="container mb-5 pb-2 pb-lg-5">
        <h2 class="mb-4 text-center">برخی از مشتریان ما</h2>
        <!-- Team carousel-->
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
          <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/01.jpg')}}" alt="Devon Lane">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">دوون لاین</h3><span class="d-inline-block mb-3 fs-sm">مدیر عامل</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/02.jpg')}}" alt="Dianne Russell">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">دایان راسل</h3><span class="d-inline-block mb-3 fs-sm">مدیر ارشد مالی</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/03.jpg')}}" alt="Ronald Richards">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">رونالد ریچاردز</h3><span class="d-inline-block mb-3 fs-sm">کارشناس فروش</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/04.jpg')}}" alt="RAlbert Flores">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">آلبرت فلورس</h3><span class="d-inline-block mb-3 fs-sm">کارشناس بازرگانی</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/01.jpg')}}" alt="Devon Lane">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">دوون لاین</h3><span class="d-inline-block mb-3 fs-sm">مدیر عامل</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/02.jpg')}}" alt="Dianne Russell">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">دایان راسل</h3><span class="d-inline-block mb-3 fs-sm">مدیر ارشد مالی</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/03.jpg')}}" alt="Ronald Richards">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">رونالد ریچاردز</h3><span class="d-inline-block mb-3 fs-sm">کارشناس فروش</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
            <!-- Team slide-->
            <div class="col">
              <div class="card border-0 shadow-sm"><img class="card-img-top" src="{{asset('assets/frontend/img/city-guide/about/team/04.jpg')}}" alt="RAlbert Flores">
                <div class="card-body text-center">
                  <h3 class="h5 card-title mb-2">آلبرت فلورس</h3><span class="d-inline-block mb-3 fs-sm">کارشناس بازرگانی</span>
                  <div class="pt-1"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mx-2" href="#"><i class="fi-instagram"></i></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- The people behind Finder-->
      <section class="container mb-5 pb-2 pb-lg-5">
        <h2 class="mb-4 pb-2 text-center">نقشه راهنمای سفر دور دنیا</h2><img src="{{asset('assets/frontend/img/city-guide/about/map.jpg')}}" alt="World map">
      </section>
      <!-- Blog: Latest posts-->
      <section class="container my-5 py-lg-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-2">
          <h2 class="h4 mb-sm-0 font-vazir">ممکن است شما نیز علاقه مند باشید</h2><a class="btn btn-link fw-normal ms-sm-3 p-0" href="city-guide-blog.html">لیست مقالات<i class="fi-arrow-long-left ms-2"></i></a>
        </div>
        <!-- Carousel-->
        <div class="tns-carousel-wrapper tns-nav-outside mb-md-2">
          <div class="tns-carousel-inner d-block" data-carousel-options="{&quot;controls&quot;: false, &quot;gutter&quot;: 24, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1,&quot;nav&quot;:true},&quot;500&quot;:{&quot;items&quot;:2},&quot;850&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}}}">
            <!-- Item-->
            <article><a class="d-block mb-3" href="city-guide-blog-single.html"><img class="rounded-3" src="{{asset('assets/frontend/img/city-guide/blog/01.jpg')}}" alt="Post image"></a><a class="fs-sm text-uppercase text-decoration-none" href="#">گردشگری</a>
              <h3 class="fs-lg pt-1"><a class="nav-link" href="city-guide-blog-single.html">سفر هوایی در زمان کووید-19</a></h3><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/16.png')}}" width="44" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-sm text-nav lh-base mb-1">بیسی کوپر</h6>
                  <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>24 اردیبهشت</span><span><i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>0 نظر</span></div>
                </div></a>
            </article>
            <!-- Item-->
            <article><a class="d-block mb-3" href="city-guide-blog-single.html"><img class="rounded-3" src="{{asset('assets/frontend/img/city-guide/blog/02.jpg')}}" alt="Post image"></a><a class="fs-sm text-uppercase text-decoration-none" href="#">تفریحی و سرگرمی</a>
              <h3 class="fs-lg pt-1"><a class="nav-link" href="city-guide-blog-single.html">10 موزه دیدنی بر شهر برلین</a></h3><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/18.png')}}" width="44" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-sm text-nav lh-base mb-1">آنت بلک</h6>
                  <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>28 تیر</span><span><i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>4 نظر ثبت شده</span></div>
                </div></a>
            </article>
            <!-- Item-->
            <article><a class="d-block mb-3" href="city-guide-blog-single.html"><img class="rounded-3" src="{{asset('assets/frontend/img/city-guide/blog/03.jpg')}}" alt="Post image"></a><a class="fs-sm text-uppercase text-decoration-none" href="#">گردشگری</a>
              <h3 class="fs-lg pt-1"><a class="nav-link" href="city-guide-blog-single.html">7 نکته برای مسافران انفرادی در آفریقا</a></h3><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/17.png')}}" width="44" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-sm text-nav lh-base mb-1">رالف ادواردز</h6>
                  <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>15 مرداد</span><span><i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>2 نظر ثبت شده</span></div>
                </div></a>
            </article>
          </div>
        </div>
      </section>
      <!-- Stay informed (subscribe form)-->
      <section class="container mb-5 pb-lg-5">
        <div class="rounded-3 bg-faded-accent py-5 px-sm-5 px-4">
          <div class="mx-auto py-md-4 text-center" style="max-width: 605px;">
            <h2>عضویت در خبرنامه</h2>
            <p class="mb-4 pb-2 fs-lg">در خبرنامه ما عضو شوید، اولین کسی باشید که آخرین اخبار و توصیه ها را مشاهده می کنید.</p>
            <form class="form-group rounded-pill mb-3">
              <div class="input-group input-group-lg"><span class="input-group-text text-muted"><i class="fi-mail"></i></span>
                <input class="form-control" type="email" placeholder="ایمیل...">
              </div>
              <button class="btn btn-primary btn-lg rounded-pill" type="button">جستجو</button>
            </form>
            <div class="form-text">* در صورت عضویت در خبرنامه <a href='#' class='text-decoration-none'>شرایط و قوانین سایت</a> را میپذیرید.</div>
          </div>
        </div>
      </section>

@endsection