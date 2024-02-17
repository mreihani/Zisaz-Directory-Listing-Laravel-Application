@extends('frontend.master')
@section('main')
<!-- Page content-->
<section class="bg-dark py-5">
    <div class="container pt-5 pb-lg-5">
      <!-- Breadcrumbs + page title-->
      <nav class="mb-4 pb-lg-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light">
          <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
          <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
        </ol>
      </nav>
      <!-- Page title-->
      <div class="mb-lg-5 mx-auto text-center" style="max-width: 856px;">
        <h1 class="display-6 text-light mb-4 pb-lg-2 ">ما کمک میکنیم تا <span class='text-primary'>شغل رویایی </span>خود را پیدا کنید</h1>
        <p class="lead text-light opacity-70">ماموریت ما ارائه بهترین خدمات کاریابی و کمک به جویندگان کار و کارفرمایان در یافتن هرچه سریعتر یکدیگر است.</p>
      </div>
    </div>
  </section>
  <!-- Stats-->
  <section class="position-relative bg-white rounded-xxl-4 mb-5 py-md-3 zindex-5" style="margin-top: -30px;">
    <div class="container pt-5 pb-2 mb-4 mb-md-5">
      <div class="row row-cols-md-4 row-cols-2 g-4 text-center">
        <div class="col border-end"><i class="fi-like mb-3 fs-1 text-muted"></i>
          <div class="h3 mb-1 lh-1">1,2 میلیون</div>آگهی استخدام فعال
        </div>
        <div class="col border-end-md"><i class="fi-file mb-3 fs-1 text-muted"></i>
          <div class="h3 mb-1 lh-1">800 رزومه</div> رزومه ثبت شده
        </div>
        <div class="col border-end"><i class="fi-briefcase mb-3 fs-1 text-muted"></i>
          <div class="h3 mb-1 lh-1">500 شرکت</div> شرکت برتر
        </div>
        <div class="col"><i class="fi-users mb-3 fs-1 text-muted"></i>
          <div class="h3 mb-1 lh-1">1000 کاربر</div> کاربر فعال
        </div>
      </div>
    </div>
  </section>
  <!-- Help Center CTA-->
  <section class="container mb-5 pb-2 pb-md-4 pb-lg-5">
    <div class="row gy-4 align-items-md-center">
      <div class="col-md-6"><img src="{{asset('assets/frontend/img/job-board/illustrations/steps.svg')}}" class="rotate-img" alt="Illustration"></div>
      <div class="col-lg-5 offset-lg-1 col-md-6">
        <h2 class="mb-4 ">پیدا کردن یک شغل جدید در حال حاضر حتی آسان تر است!</h2>
        <p class="mb-4 pb-3 fs-lg">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p><a class="btn btn-lg btn-primary rounded-pill w-sm-auto w-100" href="job-board-help-center.html">سوالات متداول<i class="fi-chevron-right ms-2"></i></a>
      </div>
    </div>
  </section>
  <!-- How it works-->
  <section class="container mb-5 pb-2 pb-lg-5">
    <h2 class="h3 mb-4 pb-sm-2 ">روند فعالیت شرکت</h2>
    <!-- Grid card-->
    <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 gy-sm-5 gy-3">
      <!-- Card item-->
      <div class="col">
        <div class="card border-0 shadow-sm position-relative h-100">
          <div class="card-body">
            <div class="h2 mb-2 text-primary">01</div>
            <h3 class="h5 card-title mb-2">ایجاد حساب کاربری</h3>
            <p class="card-text fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
          </div>
          <!-- Arrow-->
          <svg class="position-absolute top-0 end-0 mt-n2 d-sm-block d-none" xmlns="http://www.w3.org/2000/svg" width="78" height="30" fill="none" style="transform: rotateY(180deg) translateY(-100%) translateX(70%);">
            <path d="M77.955 14.396c.128-2.86 0-4.67-.576-4.745s-1.279 1.607-2.11 4.378l-1.279 4.897-.563 2.683c-.612-1.434-1.352-2.81-2.212-4.113-2.718-4.072-6.226-7.569-10.321-10.288C54.205 2.687 46.332.186 38.233.008c-8.823-.165-17.491 2.305-24.874 7.087C6.581 11.549 2.118 17.395.66 22.191.033 24.057-.15 26.04.123 27.987c.243 1.367.627 2.037.755 2.012.396 0-.396-3.025 1.522-7.264s6.394-9.339 12.789-13.123c6.905-4.018 14.838-5.974 22.841-5.631 3.811.182 7.574.924 11.164 2.202 7.323 2.623 13.717 7.296 18.403 13.452 1.061 1.417 1.816 2.531 2.404 3.417l-1.637-.278-5.295-1.012c-3.031-.569-4.988-.848-5.179-.392s1.419 1.544 4.335 2.759a47.66 47.66 0 0 0 5.269 1.772c1.023.278 2.097.544 3.21.772.588.127 1.1.228 1.765.342.541.152 1.109.184 1.663.094a3.86 3.86 0 0 0 1.547-.613 2.76 2.76 0 0 0 .934-1.265c.088-.252.156-.51.205-.772l.09-.595.23-1.544.384-2.949c.217-1.873.371-3.569.435-5.062" fill="#fd5631"></path>
          </svg>
        </div>
      </div>
      <!-- Card item-->
      <div class="col">
        <div class="card border-0 shadow-sm position-relative h-100">
          <div class="card-body">
            <div class="h2 mb-2 text-primary">02</div>
            <h3 class="h5 card-title mb-2">ثبت رزومه</h3>
            <p class="card-text fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
          </div>
          <!-- Arrow-->
          <svg class="position-absolute top-0 end-0 mt-n2 d-lg-block d-none" xmlns="http://www.w3.org/2000/svg" width="78" height="30" fill="none" style="transform: rotateY(180deg) translateY(-100%) translateX(70%);">
            <path d="M77.955 14.396c.128-2.86 0-4.67-.576-4.745s-1.279 1.607-2.11 4.378l-1.279 4.897-.563 2.683c-.612-1.434-1.352-2.81-2.212-4.113-2.718-4.072-6.226-7.569-10.321-10.288C54.205 2.687 46.332.186 38.233.008c-8.823-.165-17.491 2.305-24.874 7.087C6.581 11.549 2.118 17.395.66 22.191.033 24.057-.15 26.04.123 27.987c.243 1.367.627 2.037.755 2.012.396 0-.396-3.025 1.522-7.264s6.394-9.339 12.789-13.123c6.905-4.018 14.838-5.974 22.841-5.631 3.811.182 7.574.924 11.164 2.202 7.323 2.623 13.717 7.296 18.403 13.452 1.061 1.417 1.816 2.531 2.404 3.417l-1.637-.278-5.295-1.012c-3.031-.569-4.988-.848-5.179-.392s1.419 1.544 4.335 2.759a47.66 47.66 0 0 0 5.269 1.772c1.023.278 2.097.544 3.21.772.588.127 1.1.228 1.765.342.541.152 1.109.184 1.663.094a3.86 3.86 0 0 0 1.547-.613 2.76 2.76 0 0 0 .934-1.265c.088-.252.156-.51.205-.772l.09-.595.23-1.544.384-2.949c.217-1.873.371-3.569.435-5.062" fill="#fd5631"></path>
          </svg>
        </div>
      </div>
      <!-- Card item-->
      <div class="col">
        <div class="card border-0 shadow-sm position-relative h-100">
          <div class="card-body">
            <div class="h2 mb-2 text-primary">03</div>
            <h3 class="h5 card-title mb-2">انتخاب پلان مناسب</h3>
            <p class="card-text fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
          </div>
          <!-- Arrow-->
          <svg class="position-absolute top-0 end-0 mt-n2 d-sm-block d-none" xmlns="http://www.w3.org/2000/svg" width="78" height="30" fill="none" style="transform: rotateY(180deg) translateY(-100%) translateX(70%);">
            <path d="M77.955 14.396c.128-2.86 0-4.67-.576-4.745s-1.279 1.607-2.11 4.378l-1.279 4.897-.563 2.683c-.612-1.434-1.352-2.81-2.212-4.113-2.718-4.072-6.226-7.569-10.321-10.288C54.205 2.687 46.332.186 38.233.008c-8.823-.165-17.491 2.305-24.874 7.087C6.581 11.549 2.118 17.395.66 22.191.033 24.057-.15 26.04.123 27.987c.243 1.367.627 2.037.755 2.012.396 0-.396-3.025 1.522-7.264s6.394-9.339 12.789-13.123c6.905-4.018 14.838-5.974 22.841-5.631 3.811.182 7.574.924 11.164 2.202 7.323 2.623 13.717 7.296 18.403 13.452 1.061 1.417 1.816 2.531 2.404 3.417l-1.637-.278-5.295-1.012c-3.031-.569-4.988-.848-5.179-.392s1.419 1.544 4.335 2.759a47.66 47.66 0 0 0 5.269 1.772c1.023.278 2.097.544 3.21.772.588.127 1.1.228 1.765.342.541.152 1.109.184 1.663.094a3.86 3.86 0 0 0 1.547-.613 2.76 2.76 0 0 0 .934-1.265c.088-.252.156-.51.205-.772l.09-.595.23-1.544.384-2.949c.217-1.873.371-3.569.435-5.062" fill="#fd5631"></path>
          </svg>
        </div>
      </div>
      <!-- Card item-->
      <div class="col">
        <div class="card border-0 shadow-sm position-relative h-100">
          <div class="card-body">
            <div class="h2 mb-2 text-primary">04</div>
            <h3 class="h5 card-title mb-2">ارسال آگهی / رزومه</h3>
            <p class="card-text fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Reviews-->
  <section class="container pt-lg-2 pb-5 mb-md-4 mb-lg-5">
    <div class="row">
      <div class="col-md-4 mb-3 mb-md-0"><img class="d-block mx-auto rotate-img" src="{{asset('assets/frontend/img/job-board/illustrations/reviews.svg')}}" alt="Illustration"></div>
      <div class="col-lg-1 d-none d-lg-block">
        <hr class="hr-vertical mx-auto">
      </div>
      <div class="col-md-8 col-lg-7">
        <div class="tns-carousel-wrapper">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;controlsContainer&quot;: &quot;#agents-carousel-controls&quot;, &quot;nav&quot;: false}">
            <div class="p-3">
              <div class="card border-0 shadow-sm">
                <blockquote class="blockquote card-body">
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                  <footer class="d-flex align-items-center"><img src="{{asset('assets/frontend/img/job-board/company/zalo-lg.png')}}" width="56" alt="Zalo Logo">
                    <div class="ps-3">
                      <h6 class="fs-base mb-0">شرکت زالکوتک</h6>
                      <div class="text-muted fw-normal fs-sm">فلوید مایلز، رئیس بخش منابع انسانی</div>
                    </div>
                  </footer>
                </blockquote>
              </div>
            </div>
            <div class="p-3">
              <div class="card border-0 shadow-sm">
                <blockquote class="blockquote card-body">
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                  <footer class="d-flex align-items-center"><img src="{{asset('assets/frontend/img/job-board/company/kibana-lg.png')}}" width="56" alt="Kibana Logo">
                    <div class="pe-3">
                      <h6 class="fs-base mb-0">کیبانا الاستیک</h6>
                      <div class="text-muted fw-normal fs-sm">گای هاوکینز، ارشد منابع انسانی</div>
                    </div>
                  </footer>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
        <div class="tns-carousel-controls justify-content-center justify-content-md-start my-2 ms-md-2" id="agents-carousel-controls">
          <button class="mx-2" type="button"><i class="fi-chevron-left"></i></button>
          <button class="mx-2" type="button"><i class="fi-chevron-right"></i></button>
        </div>
      </div>
    </div>
  </section>
  <!-- FAQ-->
  <section class="container"><img class="rounded-3" src="{{asset('assets/frontend/img/job-board/about/faq.jpg')}}" alt="Cover">
    <div class="col-md-10 mx-md-auto mx-3 mt-sm-0 mt-5 py-sm-5 py-4 px-0 rounded-3 bg-light shadow-sm" style="transform: translateY(-100px);">
      <div class="col-md-10 mx-md-auto mx-3 py-lg-4 px-0">
        <h2 class="h3 mb-4 pb-lg-2 text-center">سوالات متداول</h2>
        <div class="accordion" id="accordionFAQ">
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">شروع به کار: اصول اولیه</button>
            </h2>
            <div class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionFAQ" id="collapse-1">
              <div class="accordion-body">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
            </h2>
            <div class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionFAQ" id="collapse-2">
              <div class="accordion-body">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
            </h2>
            <div class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordionFAQ" id="collapse-3">
              <div class="accordion-body">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">برند شخصی دقیقاً چیست و چرا به آن نیاز دارم؟</button>
            </h2>
            <div class="accordion-collapse collapse" aria-labelledby="heading-4" data-bs-parent="#accordionFAQ" id="collapse-4">
              <div class="accordion-body">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-5">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">مهم ترین مواردی که باید در رزومه خود گنجانده شود چیست؟</button>
            </h2>
            <div class="accordion-collapse collapse" aria-labelledby="heading-5" data-bs-parent="#accordionFAQ" id="collapse-5">
              <div class="accordion-body">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-6">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">چه مدت باید نامه و/یا رزومه خود را تهیه کنم؟</button>
            </h2>
            <div class="accordion-collapse collapse" aria-labelledby="heading-6" data-bs-parent="#accordionFAQ" id="collapse-6">
              <div class="accordion-body">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Brands-->
  <section class="container pb-5 mb-md-3 mt-sm-n4 mt-n5">
    <h2 class="h3 text-center text-sm-start mb-sm-4 ">فهرست شرکت های برتر در ایران</h2>
    <div class="tns-carousel-wrapper tns-nav-outside tns-nav-outside-flush">
      <div class="tns-carousel-inner" data-carousel-options="{&quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2},&quot;480&quot;:{&quot;items&quot;:3},&quot;680&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 12},&quot;850&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 16},&quot;1100&quot;:{&quot;items&quot;:6, &quot;gutter&quot;: 24}}}">
        <div class="pb-1"><a class="swap-image" href="job-board-employer-single.html"><img class="swap-to" src="{{asset('assets/frontend/img/job-board/company/microsoft.svg')}}" width="196" alt="Microsoft"><img class="swap-from" src="{{asset('assets/frontend/img/job-board/company/microsoft-g.svg')}}" width="196" alt="Microsoft"></a></div>
        <div class="pb-1"><a class="swap-image" href="job-board-employer-single.html"><img class="swap-to" src="{{asset('assets/frontend/img/job-board/company/indeed.svg')}}" width="196" alt="Indeed"><img class="swap-from" src="{{asset('assets/frontend/img/job-board/company/indeed-g.svg')}}" width="196" alt="Indeed"></a></div>
        <div class="pb-1"><a class="swap-image" href="job-board-employer-single.html"><img class="swap-to" src="{{asset('assets/frontend/img/job-board/company/cocacola.svg')}}" width="196" alt="Coca Cola"><img class="swap-from" src="{{asset('assets/frontend/img/job-board/company/cocacola-g.svg')}}" width="196" alt="Coca Cola"></a></div>
        <div class="pb-1"><a class="swap-image" href="job-board-employer-single.html"><img class="swap-to" src="{{asset('assets/frontend/img/job-board/company/slack.svg')}}" width="196" alt="Slack"><img class="swap-from" src="{{asset('assets/frontend/img/job-board/company/slack-g.svg')}}" width="196" alt="Slack"></a></div>
        <div class="pb-1"><a class="swap-image" href="job-board-employer-single.html"><img class="swap-to" src="{{asset('assets/frontend/img/job-board/company/walmart.svg')}}" width="196" alt="Walmart"><img class="swap-from" src="{{asset('assets/frontend/img/job-board/company/walmart-g.sv')}}g" width="196" alt="Walmart"></a></div>
        <div class="pb-1"><a class="swap-image" href="job-board-employer-single.html"><img class="swap-to" src="{{asset('assets/frontend/img/job-board/company/google.svg')}}" width="196" alt="Google"><img class="swap-from" src="{{asset('assets/frontend/img/job-board/company/google-g.svg')}}" width="196" alt="Google"></a></div>
      </div>
    </div>
  </section>
<!-- Blog-->
  <section class="container pb-4 pb-md-5 mb-2 mb-md-3">
    <div class="d-sm-flex align-items-center justify-content-between pb-4 mb-sm-2">
      <h2 class="h4 mb-sm-0 font-vazir">مجله آنلاین سایت</h2><a class="btn btn-link fw-normal p-0" href="job-board-blog.html">لیست مقاله<i class="fi-arrow-long-left ms-2"></i></a>
    </div>
    <div class="row">
      <div class="col-md-5 mb-4">
        <article class="card card-hover border-0 shadow-sm h-100"><a class="card-img-top overflow-hidden position-relative" href="job-board-blog-single.html"><span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span><img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/03.jpg')}}" alt="Image"></a>
          <div class="card-body pb-3"><a class="fs-xs text-uppercase text-decoration-none" href="#">راهنما</a>
            <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">چگونه اولین شغل خود را در زمینه فناوری انتخاب کنیم؟</a></h3>
            <p class="fs-sm text-muted m-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p>
          </div><a class="card-footer d-flex align-items-center text-decoration-none border-top-0 pt-0 mb-1" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/16.png')}}" width="44" alt="Avatar">
            <div class="ps-2">
              <h6 class="fs-sm text-nav lh-base mb-1">بیسی کوپر</h6>
              <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>23 بهمن</span><span><i class="fi-chat-circle opacity-70 me-1"></i>4 کامنت</span></div>
            </div></a>
        </article>
      </div>
      <div class="col-md-7">
        <div class="row">
          <div class="col-sm-6 mb-4">
            <article class="card card-hover border-0 shadow-sm h-100"><a class="card-img-top overflow-hidden position-relative" href="job-board-blog-single.html"><img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/04.jpg')}}" alt="Image"></a>
              <div class="card-body pb-3"><a class="fs-xs text-uppercase text-decoration-none" href="#">راهنما</a>
                <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">نحوه استخدام مهندسان درجه یک</a></h3>
              </div><a class="card-footer d-flex align-items-center text-decoration-none border-top-0 pt-0 mb-1" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/18.png')}}" width="44" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-sm text-nav lh-base mb-1">آنت بلک</h6>
                  <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>21 بهمن</span><span><i class="fi-chat-circle opacity-70 me-1"></i>0 کامنت</span></div>
                </div></a>
            </article>
          </div>
          <div class="col-sm-6 mb-4">
            <article class="card card-hover border-0 shadow-sm h-100"><a class="card-img-top overflow-hidden position-relative" href="job-board-blog-single.html"><img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/05.jpg')}}" alt="Image"></a>
              <div class="card-body pb-3"><a class="fs-xs text-uppercase text-decoration-none" href="#">نکات و ترفندها</a>
                <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">15 نکته برای ایجاد رزومه بهتر</a></h3>
              </div><a class="card-footer d-flex align-items-center text-decoration-none border-top-0 pt-0 mb-1" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/17.png')}}" width="44" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-sm text-nav lh-base mb-1">رالفا ادواردز</h6>
                  <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>19 بهمن</span><span><i class="fi-chat-circle opacity-70 me-1"></i>1 کامنت</span></div>
                </div></a>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="container pt-lg-4 pb-5 mb-md-4 mb-lg-5 text-center">
    <h2 class="pb-4 ">سریعترین راه برای یافتن آنچه نیاز دارید!!!</h2><a class="btn btn-primary btn-lg rounded-pill ms-sm-auto" href="#">همین حالا شروع کن<i class="fi-chevron-right fs-sm ms-2"></i></a>
  </section>

@endsection