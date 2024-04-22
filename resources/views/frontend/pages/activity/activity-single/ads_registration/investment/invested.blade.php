@extends('frontend.master')
@section('main')

<!-- Page content-->
<section class="position-relative bg-white rounded-xxl-4 zindex-5" style="margin-top: 90px;">
    <div class="container pt-4 pb-5 mb-md-4">
        <!-- Breadcrumb-->
        <nav class="pb-4 my-2" aria-label="Breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
                <li class="breadcrumb-item"><a href="job-board-catalog.html">جستجوی شغل</a></li>
                <li class="breadcrumb-item active" aria-current="page">استخدام کارشناس امور مهاجرتی</li>
            </ol>
        </nav>
        <div class="row">
            <!-- Signle job content-->
            <div class="col-lg-7 position-relative pe-lg-5 mb-5 mb-lg-0" style="z-index: 1025;">
                <div class="d-flex justify-content-between mb-2">
                    <h2 class="h4 mb-0 font-vazir">استخدام کارشناس امور مهاجرتی</h2>
                    <div class="text-end">
                        <span class="badge bg-faded-accent rounded-pill fs-sm mb-2">ویژه</span>
                        <div class="fs-sm text-muted">2 ساعت پیش</div>
                    </div>
                </div>
                <ul class="list-unstyled fs-sm mb-4">
                    <li class="mb-2"><a class="d-flex align-items-center text-decoration-none" href="job-board-employer-single.html"><i class="fi-external-link me-2"></i><span class="text-decoration-underline">شرکت فناوری اطلاعات داده پردازی</span></a></li>
                    <li class="d-flex align-items-center mb-2"><i class="fi-map-pin text-muted me-2"></i><span>نیویورک</span></li>
                    <li class="d-flex align-items-center mb-2"><i class="fi-cash fs-base text-muted me-2"></i><span>1050000 تومان</span></li>
                    <li class="d-flex align-items-center mb-2"><i class="fi-phone text-muted me-2"></i><span class="me-2">بیسی کوپر ، مدیر منابع انسانی</span><a href="#">نمایش شماره تماس</a></li>
                    <li class="d-flex align-items-center mb-2"><i class="fi-clock text-muted me-2"></i><span class="me-2">تمام وقت</span></li>
                </ul>
                <hr class="mb-4">
                <h3 class="h6">توضیحات: </h3>
                <p class="line-h18">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                <h3 class="h6 pt-2">مهارت های موردنیاز: </h3>
                <ul class="list-unstyled">
                    <li class="d-flex">
                        <span class="text-primary fs-lg me-2">•</span>
                        درصدد جذب و استخدام ٢٠٠ نفر پرسنل برای تکمیل کادر خود هستیم.
                    </li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>کارشناس آشنا به امور مهاجرت و اقامت کانادا و اروپا</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>آشنايي کامل با قوانین مهاجرتی کانادا و اروپا</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>دارای دانش نسبی به روز از انواع شیوه های مارکتینگ و دیجیتال مارکتینگ در حوزه مهاجرت</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>آشنا بالا به زبان انگلیسی</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>آشنا با انواع پروسه های درخواست مهاجرت</li>
                </ul>
                <h3 class="h6 pt-2">شرح موقعیت شغلی: </h3>
                <ul class="list-unstyled">
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>درصدد جذب و استخدام ٢٠٠ نفر پرسنل برای تکمیل کادر خود هستیم.</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>کارشناس آشنا به امور مهاجرت و اقامت کانادا و اروپا</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>آشنايي کامل با قوانین مهاجرتی کانادا و اروپا</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>دارای دانش نسبی به روز از انواع شیوه های مارکتینگ و دیجیتال مارکتینگ در حوزه مهاجرت</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>آشنا بالا به زبان انگلیسی</li>
                    <li class="d-flex"><span class="text-primary fs-lg me-2">•</span>آشنا با انواع پروسه های درخواست مهاجرت</li>
                </ul>
                <p class="pt-2 mb-1">لطفاً رزومه خود را با عنوان "مدیر مشارکت" در موضوع از طریق ایمیل ارسال کنید:</p><a class="nav-link-muted fw-bold" href="mailto:contact@example.com">contact@example.com</a>
                <hr class="my-4">
            </div>

            <!-- Sticky sidebar-->
            <aside class="col-lg-5" style="margin-top: -6rem;">
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
                                <div class="fs-md me-3">آیا به دنبال یه شغل مناسب هستید؟<br>دریافت آخرین فرصت های شغلی در کانال تلگرام</div>
                                <a class="btn btn-icon btn-translucent-primary btn-xs rounded-circle" href="#">
                                    <i class="fi-telegram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Related jobs-->
<section class="container pt-md-2 pb-5 mb-md-4">
    <div class="d-sm-flex align-items-center justify-content-between pb-4 mb-sm-2">
        <h2 class="h4 mb-sm-0 font-vazir">مشاغل مشابه</h2>
        <a class="btn btn-link fw-normal p-0" href="job-board-catalog.html">
            مشاهده همه
            <i class="fi-arrow-long-left ms-2"></i>
        </a>
    </div>
    <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;: 16},&quot;600&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 16},&quot;768&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 24},&quot;992&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 24}}}">
            <!-- Item-->
            <div class="pb-4">
                <div class="card bg-secondary card-hover h-100">
                    <div class="card-body pb-3">
                        <div class="d-flex align-items-center mb-2">
                            <img class="me-2" src="{{asset('assets/frontend/img/job-board/company/it-pro.png')}}" width="24" alt="IT Pro Logo">
                            <span class="fs-sm text-dark opacity-80 px-1">پرشین سیر</span>
                            <span class="badge bg-faded-danger rounded-pill fs-sm ms-auto">فوری</span>
                        </div>
                        <h3 class="h6 card-title pt-1 mb-2">
                            <a class="text-nav stretched-link text-decoration-none" href="#">کارشناس امور مهاجرتی (تحصیلی)</a>
                        </h3>
                        <p class="fs-sm mb-0"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله...</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between border-0 pt-0">
                        <div class="fs-sm">
                            <span class="text-nowrap me-3">
                                <i class="fi-map-pin text-muted me-1"> </i>
                                توکیو
                            </span>
                            <span class="text-nowrap me-3">
                                <i class="fi-cash fs-base text-muted me-1"></i>
                                75000 تومان
                            </span>
                        </div>
                        <button class="btn btn-icon btn-light btn-xs text-primary shadow-sm rounded-circle content-overlay" type="button" data-bs-toggle="tooltip" title="نشان کردن"><i class="fi-heart"></i></button>
                    </div>
                </div>
            </div>


            <!-- Item-->
            <div class="pb-4">
                <div class="card bg-secondary card-hover h-100">
                <div class="card-body pb-3">
                    <div class="d-flex align-items-center mb-2"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/xbox.png')}}" width="24" alt="Xbox Logo"><span class="fs-sm text-dark opacity-80 px-1">ستاره دانش پارسیان</span><span class="badge bg-faded-accent rounded-pill fs-sm ms-auto">ویژه</span></div>
                    <h3 class="h6 card-title pt-1 mb-2"><a class="text-nav stretched-link text-decoration-none" href="#">کارشناس بخش ویزای تجاری</a></h3>
                    <p class="fs-sm mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطر...</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between border-0 pt-0">
                    <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>استانبول</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>13000 تومان</span></div>
                    <button class="btn btn-icon btn-light btn-xs text-primary shadow-sm rounded-circle content-overlay" type="button" data-bs-toggle="tooltip" title="نشان کردن"><i class="fi-heart"></i></button>
                </div>
                </div>
            </div>
            <!-- Item-->
            <div class="pb-4">
                <div class="card bg-secondary card-hover h-100">
                <div class="card-body pb-3">
                    <div class="d-flex align-items-center mb-2"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/xampp.png')}}" width="24" alt="XAMPP Logo"><span class="fs-sm text-dark opacity-80 px-1">شرکت اپلای من</span><span class="badge bg-faded-danger rounded-pill fs-sm ms-auto">فوری</span></div>
                    <h3 class="h6 card-title pt-1 mb-2"><a class="text-nav stretched-link text-decoration-none" href="#">کارشناس امور مهاجرتی </a></h3>
                    <p class="fs-sm mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم...</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between border-0 pt-0">
                    <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>پاریس</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>65000 تومان</span></div>
                    <button class="btn btn-icon btn-light btn-xs text-primary shadow-sm rounded-circle content-overlay" type="button" data-bs-toggle="tooltip" title="نشان کردن"><i class="fi-heart"></i></button>
                </div>
                </div>
            </div>
            <!-- Item-->
            <div class="pb-4">
                <div class="card bg-secondary card-hover h-100">
                <div class="card-body pb-3">
                    <div class="d-flex align-items-center mb-2"><img class="me-2" src="{{asset('assets/frontend/img/job-board/company/zapier.png')}}" width="24" alt="Zapier Logo"><span class="fs-sm text-dark opacity-80 px-1">ادب ویزا</span><span class="badge bg-faded-info rounded-pill fs-sm ms-auto">جدید</span></div>
                    <h3 class="h6 card-title pt-1 mb-2"><a class="text-nav stretched-link text-decoration-none" href="#">کارشناس امور مهاجرتی </a></h3>
                    <p class="fs-sm mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم...</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between border-0 pt-0">
                    <div class="fs-sm"><span class="text-nowrap me-3"><i class="fi-map-pin text-muted me-1"> </i>نیویورک</span><span class="text-nowrap me-3"><i class="fi-cash fs-base text-muted me-1"></i>40000 تومان</span></div>
                    <button class="btn btn-icon btn-light btn-xs text-primary shadow-sm rounded-circle content-overlay" type="button" data-bs-toggle="tooltip" title="نشان کردن"><i class="fi-heart"></i></button>
                </div>
                </div>
            </div>

            
        </div>
    </div>
</section>

@endsection