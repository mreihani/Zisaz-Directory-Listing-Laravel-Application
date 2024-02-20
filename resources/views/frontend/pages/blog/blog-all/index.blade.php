@extends('frontend.master')
@section('main')

<!-- Page container-->
<div class="container mt-5 mb-md-4 py-5">
  <!-- Breadcrumb + Page title-->
  <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
      <li class="breadcrumb-item active" aria-current="page">لیست مقاله</li>
    </ol>
  </nav>
  <h1 class="pb-3 font-vazir h3">مقالات</h1>
  <div class="row">
    <!-- List of articles-->
    <div class="col-lg-8 blog-list">
      <div class="border-bottom pb-2">
        <div class="row">
          <!-- Item-->
          <article class="col-sm-6 mb-4">
            <div class="card card-hover border-0 shadow-sm h-100"><a class="card-img-top overflow-hidden position-relative" href="job-board-blog-single.html"><span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span><img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image"></a>
              <div class="card-body pb-3"><a class="fs-sm text-uppercase text-decoration-none" href="#">پیشرفت در مسیر شغلی</a>
                <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">نحوه استخدام مهندسان درجه یک</a></h3>
                <p class="fs-sm text-muted m-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p>
              </div><a class="card-footer d-flex align-items-center text-decoration-none border-top-0 pt-0 mb-1" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/16.png')}}" width="44" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-sm text-nav lh-base mb-1">بیسی کوپر</h6>
                  <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>23 آذر</span><span><i class="fi-chat-circle opacity-70 me-1"></i>4 نظر</span></div>
                </div></a>
            </div>
          </article>
          <!-- Item-->
          <article class="col-sm-6 mb-4">
            <div class="card card-hover border-0 shadow-sm h-100"><a class="card-img-top overflow-hidden position-relative" href="job-board-blog-single.html"><span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span><img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/02.jpg')}}" alt="Image"></a>
              <div class="card-body pb-3"><a class="fs-sm text-uppercase text-decoration-none" href="#">نکات و ترفندها</a>
                <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">15 نکته برای رزومه بهتر</a></h3>
                <p class="fs-sm text-muted m-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p>
              </div><a class="card-footer d-flex align-items-center text-decoration-none border-top-0 pt-0 mb-1" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/17.png')}}" width="44" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-sm text-nav lh-base mb-1">رالف ادواردز</h6>
                  <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>19 دی</span><span><i class="fi-chat-circle opacity-70 me-1"></i>1 نظر</span></div>
                </div></a>
            </div>
          </article>
        </div>
      </div>
      <div class="pt-4 pb-2 mt-2">
        <!-- Item-->
        <article class="card border-0 shadow-sm card-hover card-horizontal mb-4"><a class="card-img-top" href="job-board-blog-single.html" style="background-image: url({{asset('assets/frontend/img/job-board/blog/06.jpg')}});"></a>
          <div class="card-body"><a class="fs-sm text-uppercase text-decoration-none" href="#">تعیین مسیر شغلی</a>
            <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">۵ نکته برای یافتن شغل رویایی‌تان</a></h3>
            <p class="fs-sm text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/21.png')}}" width="44" alt="Avatar">
              <div class="ps-2">
                <h6 class="fs-sm text-nav lh-base mb-1">کریستین واتسون</h6>
                <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>28 بهمن</span><span><i class="fi-chat-circle opacity-70 me-1"></i>0 نظر</span></div>
              </div></a>
          </div>
        </article>
        <!-- Item-->
        <article class="card border-0 shadow-sm card-hover card-horizontal mb-4"><a class="card-img-top" href="job-board-blog-single.html" style="background-image: url({{asset('assets/frontend/img/job-board/blog/07.jpg')}});"></a>
          <div class="card-body"><a class="fs-sm text-uppercase text-decoration-none" href="#">ابزار و مهارت ها</a>
            <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">۱۶ دلیل برای اینکه هنوز بی‌کار هستید؟</a></h3>
            <p class="fs-sm text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/18.png')}}" width="44" alt="Avatar">
              <div class="ps-2">
                <h6 class="fs-sm text-nav lh-base mb-1">آنت بلک</h6>
                <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>27 اسفند</span><span><i class="fi-chat-circle opacity-70 me-1"></i>9 نظر</span></div>
              </div></a>
          </div>
        </article>
        <!-- Item-->
        <article class="card border-0 shadow-sm card-hover card-horizontal mb-4"><a class="card-img-top" href="job-board-blog-single.html" style="background-image: url({{asset('assets/frontend/img/job-board/blog/08.jpg')}});"></a>
          <div class="card-body"><a class="fs-sm text-uppercase text-decoration-none" href="#">تعادل کار و زندگی</a>
            <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">کارهای مهم و بهترین زمان برای انجام آنها!</a></h3>
            <p class="fs-sm text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/19.png')}}" width="44" alt="Avatar">
              <div class="ps-2">
                <h6 class="fs-sm text-nav lh-base mb-1">رالف ادواردز</h6>
                <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>14 فروردین</span><span><i class="fi-chat-circle opacity-70 me-1"></i>15 نظر</span></div>
              </div></a>
          </div>
        </article>
        <!-- Item-->
        <article class="card border-0 shadow-sm card-hover card-horizontal mb-4"><a class="card-img-top" href="job-board-blog-single.html" style="background-image: url({{asset('assets/frontend/img/job-board/blog/09.jpg')}});"></a>
          <div class="card-body"><a class="fs-sm text-uppercase text-decoration-none" href="#">تعادل کار و زندگی</a>
            <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">چــطور مرخصی بگیریم؟</a></h3>
            <p class="fs-sm text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/20.png')}}" width="44" alt="Avatar">
              <div class="ps-2">
                <h6 class="fs-sm text-nav lh-base mb-1">گای هاوکینز</h6>
                <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>6 خرداد</span><span><i class="fi-chat-circle opacity-70 me-1"></i>8 نظر</span></div>
              </div></a>
          </div>
        </article>
        <!-- Item-->
        <article class="card border-0 shadow-sm card-hover card-horizontal mb-4"><a class="card-img-top" href="job-board-blog-single.html" style="background-image: url({{asset('assets/frontend/img/job-board/blog/10.jpg')}});"></a>
          <div class="card-body"><a class="fs-sm text-uppercase text-decoration-none" href="#">آموزشی</a>
            <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">۳۰ نکته کلیدی برای ساختن بهترین پروفایل </a></h3>
            <p class="fs-sm text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/16.png')}}" width="44" alt="Avatar">
              <div class="ps-2">
                <h6 class="fs-sm text-nav lh-base mb-1">بیسی کوپر</h6>
                <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>27 اردیبهشت</span><span><i class="fi-chat-circle opacity-70 me-1"></i>5 نظر</span></div>
              </div></a>
          </div>
        </article>
        <!-- Item-->
        <article class="card border-0 shadow-sm card-hover card-horizontal mb-4"><a class="card-img-top" href="job-board-blog-single.html" style="background-image: url({{asset('assets/frontend/img/job-board/blog/11.jpg')}});"></a>
          <div class="card-body"><a class="fs-sm text-uppercase text-decoration-none" href="#">ابزار و مهارت ها</a>
            <h3 class="fs-base pt-1 mb-2"><a class="nav-link" href="job-board-blog-single.html">۹ راه برای اینکه بعد از استعفا فردی تاثیرگذار شناخته شوید</a></h3>
            <p class="fs-sm text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها...</p><a class="d-flex align-items-center text-decoration-none" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/21.png')}}" width="44" alt="Avatar">
              <div class="ps-2">
                <h6 class="fs-sm text-nav lh-base mb-1">بیسی کوپر</h6>
                <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>16 خرداد</span><span><i class="fi-chat-circle opacity-70 me-1"></i>3 نظر</span></div>
              </div></a>
          </div>
        </article>
      </div>
      <!-- Pagination-->
      <nav class="pt-4 pb-2 border-top" aria-label="Blog pagination">
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
    <!-- Sidebar-->
    <aside class="col-lg-4">
      <div class="offcanvas-lg offcanvas-end" id="blog-sidebar">
        <div class="offcanvas-header shadow-sm mb-2">
          <h2 class="h5 mb-0">سایدبار</h2>
          <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#blog-sidebar"></button>
        </div>
        <div class="offcanvas-body">
          <!-- Sort-->
          <div class="d-flex align-items-center mb-4">
            <label class="me-2 mb-0 text-nowrap" for="sortby"><i class="fi-arrows-sort mt-n1 me-2 align-middle opacity-70"></i>مرتب سازی براساس:</label>
            <select class="form-select" id="sortby">
              <option>جدیدترین</option>
              <option>قدیمی ترین</option>
              <option>پربازدید</option>
              <option>اسپانسری</option>
            </select>
          </div>
          <!-- Search-->
          <div class="position-relative pb-2 pb-lg-0 mb-4">
            <input class="form-control pe-5" type="text" placeholder="جستجو..."><i class="fi-search text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
          </div>
          <!-- Categories-->
          <div class="card card-flush pb-2 pb-lg-0 mb-4">
            <div class="card-body">
              <h3 class="h5">دسته بندی</h3><a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">تعادل کار و زندگی<span class="text-muted ms-2">(2)</span></a><a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">ابزار و مهارت ها<span class="text-muted ms-2">(4)</span></a><a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">تعیین مسیر شغلی<span class="text-muted ms-2">(5)</span></a><a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">پیشرفت در مسیر شغلی<span class="text-muted ms-2">(1)</span></a><a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">نکات جست و جوی شغلی<span class="text-muted ms-2">(8)</span></a>
            </div>
          </div>
          <!-- Tags-->
          <div class="card card-flush pb-2 pb-lg-0 mb-4">
            <div class="card-body">
              <h4 class="h5">برچسب ها</h4>
              <div class="d-flex flex-wrap mb-n1">
                <button class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2">شغل</button>
                <button class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2">فرصت شغلی</button>
                <button class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2">رزومه</button>
                <button class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2">ابزار و مهارت</button>
                <button class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2"> ایجاد رزومه موثر</button>
                <button class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2">استخدام های فوری</button>
              </div>
            </div>
          </div>
          <!-- Fetured posts (carousel)-->
          <div class="card card-flush pb-3 pb-lg-0 mb-4">
            <div class="card-body">
              <h4 class="h5">مطالب پیشنهادی</h4>
              <div class="tns-carousel-wrapper mx-n3">
                <div class="tns-carousel-inner d-block" data-carousel-options="{&quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;controlsContainer&quot;: &quot;#externalControls&quot;}">
                  <article class="px-3 pb-4">
                    <div class="card border-0 shadow-sm"><a class="card-img-top overflow-hidden" href="job-board-blog-single.html"><img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/12.jpg')}}" alt="Image"></a>
                      <div class="card-body pb-3"><a class="fs-sm text-uppercase text-decoration-none" href="#">ابزار و مهارت ها</a>
                        <h3 class="fs-base pt-1 mb-0"><a class="nav-link" href="job-board-blog-single.html">نحوه استخدام مهندسان درجه یک</a></h3>
                      </div><a class="card-footer d-flex align-items-center text-decoration-none border-top-0 pt-0 mb-1" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/18.png')}}" width="44" alt="Avatar">
                        <div class="ps-2">
                          <h6 class="fs-sm text-nav lh-base mb-1">آنت بلک</h6>
                          <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>18 خرداد</span><span><i class="fi-chat-circle opacity-70 me-1"></i>3 نظر</span></div>
                        </div></a>
                    </div>
                  </article>
                  <article class="px-3 pb-4">
                    <div class="card border-0 shadow-sm"><a class="card-img-top overflow-hidden" href="job-board-blog-single.html"><img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/13.jpg')}}" alt="Image"></a>
                      <div class="card-body pb-3"><a class="fs-sm text-uppercase text-decoration-none" href="#">تعادل کار و زندگی</a>
                        <h3 class="fs-base pt-1 mb-0"><a class="nav-link" href="job-board-blog-single.html">۱۶ دلیل برای اینکه هنوز بی‌کار هستید؟</a></h3>
                      </div><a class="card-footer d-flex align-items-center text-decoration-none border-top-0 pt-0 mb-1" href="#"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/21.png')}}" width="44" alt="Avatar">
                        <div class="ps-2">
                          <h6 class="fs-sm text-nav lh-base mb-1">کریستین واتسون</h6>
                          <div class="d-flex text-body fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 me-1"></i>25 تیر</span><span><i class="fi-chat-circle opacity-70 me-1"></i>0 نظر</span></div>
                        </div></a>
                    </div>
                  </article>
                </div>
              </div>
              <div class="tns-carousel-controls justify-content-center mt-n2" id="externalControls">
                <button class="me-3" type="button"><i class="fi-chevron-left fs-xs"></i></button>
                <button type="button"><i class="fi-chevron-right fs-xs"></i></button>
              </div>
            </div>
          </div>
          <!-- Subscription form-->
          <div class="card card-flush mb-4">
            <div class="card-body">
              <h4 class="h5 mb-3"></h4>
              <p class="fs-sm mb-3">در خبرنامه ما مشترک شوید و اولین کسی باشید که جدیدترین پست ها و نکات را مشاهده می کنید.</p>
              <form class="form-group rounded-pill">
                <div class="input-group input-group-sm"><span class="input-group-text text-muted"><i class="fi-mail"></i></span>
                  <input class="form-control" type="email" placeholder="ایمیل شما">
                </div>
                <button class="btn btn-primary btn-sm rounded-pill" type="button">ثبت نام</button>
              </form>
              <div class="form-text fs-xs pt-1">* با ثبت نام در خبرنامه <a href='#'> شرایط و قوانین سایت</a> را میپذیرم.</div>
            </div>
          </div>
        </div>
      </div>
    </aside>
  </div>
</div>

@endsection