@extends('frontend.master')
@section('main')

 <!-- Page container-->
 <div class="container mt-5 pt-5">
    <!-- Breadcrumb + Page title-->
    <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
        <li class="breadcrumb-item"><a href="job-board-blog.html">مقالات</a></li>
        <li class="breadcrumb-item active" aria-current="page">۱۶ دلیل برای اینکه هنوز بی‌کار هستید؟</li>
      </ol>
    </nav>
    <h1 class="h2 pb-3 font-vazir">۱۶ دلیل برای اینکه هنوز بی‌کار هستید؟</h1><img class="rounded-3" src="{{asset('assets/frontend/img/job-board/blog/14.jpg')}}" alt="Image">
    <div class="row mt-4 pt-3">
      <!-- Post content-->
      <div class="col-lg-8">
        <!-- Post meta-->
        <div class="d-flex flex-wrap border-bottom pb-3 mb-4"><a class="text-uppercase text-decoration-none border-end pe-3 me-3 mb-2" href="#">ابزار و مهارت ها</a>
          <div class="d-flex align-items-center border-end pe-3 me-3 mb-2"><i class="fi-calendar-alt opacity-70 me-2"></i><span>19 اردیبهشت</span></div>
          <div class="d-flex align-items-center border-end pe-3 me-3 mb-2"><i class="fi-clock opacity-70 me-2"></i><span>10 دقیقه زمان مطالعه</span></div><a class="nav-link-muted d-flex align-items-center mb-2" href="#comments" data-scroll><i class="fi-chat-circle opacity-70 me-2"></i><span>3 نظر</span></a>
        </div>
        <p class="fs-lg fw-bold text-dark mb-4 font-vazir">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
        <!-- Video-->
        <div class="py-4 mb-2">
          <div class="position-relative"><a class="btn btn-icon btn-light-primary text-primary rounded-circle position-absolute end-50 top-50 translate-middle zindex-5" href="https://www.youtube.com/watch?v=3iwCzT2P7vw" data-bs-toggle="lightbox" style="width: 4.5rem; height: 4.5rem;"><i class="fi-play-filled fs-sm"></i></a><span class="position-absolute top-0 start-0 w-100 h-100 bg-dark rounded-3 opacity-40 zindex-1"></span><img class="rounded-3" src="{{asset('assets/frontend/img/job-board/blog/15.jpg')}}" alt="Video cover"></div>
        </div>
        <p class="line-h18">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        <blockquote class="blockquote mb-4 font-vazir">
          <p>پیر مردی هر روز تو محله می دید پسر کی با کفش های پاره و پای برهنه با توپ پلاستیکی فوتبال بازی می کند، روزی رفت ی کتانی نو خرید و اومد و به پسرک گفت بیا این کفشا رو بپوش…پسرک کفشا رو پوشید و خوشحال رو به پیر مرد کرد...</p>
          <footer class="blockquote-footer"> آنت بلک</footer>
        </blockquote>
        <p class="line-h18">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
        <p class="line-h18">پیر مردی هر روز تو محله می دید پسر کی با کفش های پاره و پای برهنه با توپ پلاستیکی فوتبال بازی می کند، روزی رفت ی کتانی نو خرید و اومد و به پسرک گفت بیا این کفشا رو بپوش…پسرک کفشا رو پوشید و خوشحال رو به پیر مرد کرد و گفت: شما خدایید؟! پیر مرد لبش را گزید و گفت نه! پسرک گفت پس دوست خدایی، چون من دیشب فقط به خدا گفتم كه کفش ندارم…</p>
        <!-- Tags + Sharing-->
        <div class="pt-4 pb-5 mb-md-3">
          <div class="d-md-flex align-items-center justify-content-between border-top pt-4">
            <div class="d-flex align-items-center me-3 mb-3 mb-md-0">
              <div class="d-none d-sm-block fw-bold text-nowrap mb-2 me-2 pe-1">برچسب ها:</div>
              <div class="d-flex flex-wrap"><a class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2" href="#">رزومه</a><a class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2" href="#">مسیر پیشرفت شغلی</a><a class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal mb-2" href="#">فرصت های شغلی</a></div>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-nowrap pe-1 mb-2">اشتراک گذاری: </div>
              <div class="d-flex"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mb-2 ms-2" href="#" data-bs-toggle="tooltip" title="Share with Facebook"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mb-2 ms-2" href="#" data-bs-toggle="tooltip" title="Share with Twitter"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mb-2 ms-2" href="#" data-bs-toggle="tooltip" title="Share with LinkedIn"><i class="fi-linkedin"></i></a></div>
            </div>
          </div>
        </div>
        <!-- Comments-->
        <div class="mb-4 mb-md-5" id="comments">
          <h3 class="mb-4 pb-2 font-vazir">3 نظر ثبت شده</h3>
          <!-- Comment-->
          <div class="border-bottom pb-4 mb-4">
            <p> این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center ps-2"><img class="rounded-circle me-1" src="{{asset('assets/frontend/img/avatars/05.jpg')}}" width="48" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-base mb-0">دانیل آدامز</h6><span class="text-muted fs-sm">3 روز پیش</span>
                </div>
              </div>
              <button class="btn btn-link btn-sm" type="button"><i class="fi-reply fs-lg me-2"></i><span class="fw-normal">پاسخ</span></button>
            </div>
            <!-- Reply to comment-->
            <div class="border-start border-4 ps-4 ms-4 mt-4">
              <p>استفاده از این متن تستی می تواند سرعت پیشرفت پروژه را افزایش دهد، و طراحان به جای تایپ و نگارش متن می توانند تنها با یک کپی و پست این متن را در کادرهای مختلف جایگزین نمائید. این نوشته توسط سایت لورم ایپسوم فارسی نگاشته شده است.</p>
              <div class="d-flex align-items-center ps-2"><img class="rounded-circle me-1" src="{{asset('assets/frontend/img/avatars/06.jpg')}}" width="48" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-base mb-0">کریستین واتسون<span class="badge bg-info rounded-pill fs-xs ms-2">نویسنده</span></h6><span class="text-muted fs-sm">2 روز پیش</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Comment-->
          <div class="pb-4">
            <p>این یک نوشته آزمایشی است که به طراحان و برنامه نویسان کمک میکند تا این عزیزان با بهره گیری از این نوشته تستی و آزمایشی بتوانند نمونه تکمیل شده از پروژه و طرح خودشان را به کارفرما نمایش دهند، استفاده از این متن تستی می تواند سرعت پیشرفت پروژه را افزایش دهد.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center ps-2"><img class="rounded-circle me-1" src="{{asset('assets/frontend/img/avatars/04.jpg')}}" width="48" alt="Avatar">
                <div class="ps-2">
                  <h6 class="fs-base mb-0">دارل استیوارد</h6><span class="text-muted fs-sm">1 هفته پیش</span>
                </div>
              </div>
              <button class="btn btn-link btn-sm" type="button"><i class="fi-reply fs-lg me-2"></i><span class="fw-normal">پاسخ</span></button>
            </div>
          </div>
        </div>
      </div>
      <!-- Sidebar-->
      <aside class="col-lg-4">
        <div class="offcanvas-lg offcanvas-end" id="blog-sidebar">
          <div class="offcanvas-header shadow-sm mb-2">
            <h2 class="h5 mb-0">سایدبار</h2>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#blog-sidebar"></button>
          </div>
          <div class="offcanvas-body">
            <!-- Search-->
            <div class="position-relative pb-3 pb-lg-0 mb-4">
              <input class="form-control" type="text" placeholder="جستجو..."><i class="fi-search position-absolute top-50 end-0 translate-middle-y text-muted me-3"></i>
            </div>
            <!-- Author widget-->
            <div class="card card-flush pb-3 pb-lg-0 mb-4">
              <div class="card-body">
                <div class="d-flex align-items-start"><img class="rounded-circle" src="{{asset('assets/frontend/img/avatars/15.png')}}" width="80" alt="Kristin Watson">
                  <div class="ps-3">
                    <h3 class="h6 mb-2 fw-500">کریستین واتسون</h3>
                    <p class="fs-sm text-muted">نام نویسنده</p>
                    <div class="d-flex"><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm me-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm me-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm me-2" href="#"><i class="fi-linkedin"></i></a></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Recent posts widget-->
            <div class="card card-flush pb-3 pb-lg-0 mb-4 blog-list">
              <div class="card-body">
                <h3 class="h5">پست های اخیر</h3>
                <div class="d-flex align-items-start border-bottom border-light pb-3 mb-3"><a class="flex-shrink-0" href="#"><img class="rounded-3" src="{{asset('assets/frontend/img/job-board/blog/thumbs/01.jpg')}}" width="80" alt="Image"></a>
                  <div class="ps-3"><a class="fs-sm text-uppercase text-primary text-decoration-none" href="#">پیشرفت مسیر شغلی</a>
                    <h4 class="fs-base pt-1 mb-2"><a class="nav-link" href="#">۵ نکته برای یافتن شغل رویایی‌تان</a></h4>
                    <div class="d-flex fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>8 خرداد</span><span><i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>4 نظر</span></div>
                  </div>
                </div>
                <div class="d-flex align-items-start border-bottom border-light pb-3 mb-3"><a class="flex-shrink-0" href="#"><img class="rounded-3" src="{{asset('assets/frontend/img/job-board/blog/thumbs/02.jpg')}}" width="80" alt="Image"></a>
                  <div class="ps-3"><a class="fs-sm text-uppercase text-primary text-decoration-none" href="#">ابزار و مهارت ها</a>
                    <h4 class="fs-base pt-1 mb-2"><a class="nav-link" href="#">چــطور مرخصی بگیریم؟ </a></h4>
                    <div class="d-flex fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>27 تیر</span><span><i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>9 نظر</span></div>
                  </div>
                </div>
                <div class="d-flex align-items-start"><a class="flex-shrink-0" href="#"><img class="rounded-3" src="{{asset('assets/frontend/img/job-board/blog/thumbs/03.jpg')}}" width="80" alt="Image"></a>
                  <div class="ps-3"><a class="fs-sm text-uppercase text-primary text-decoration-none" href="#">تعادل کار و زندگی</a>
                    <h4 class="fs-base pt-1 mb-2"><a class="nav-link" href="#">15 نکته برای رزومه بهتر</a></h4>
                    <div class="d-flex fs-xs"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>19 مهر</span><span><i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>15 نظر</span></div>
                  </div>
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
  <!-- Comment form-->
  <div class="bg-secondary py-5">
    <div class="container py-md-2 py-lg-4">
      <div class="row justify-content-center">
        <div class="col-md-10 col-xl-8">
          <h3 class="text-center mb-4 pb-sm-2 font-vazir">ثبت نظر برای این مقاله</h3>
          <form class="needs-validation row gy-md-4 gy-3 pb-sm-2" novalidate>
            <div class="col-sm-6">
              <label class="form-label" for="comment-name">نام و نام خانوادگی</label>
              <input class="form-control form-control-lg" type="text" id="comment-name" placeholder="نام شما" required>
              <div class="invalid-feedback">نام خود را وارد کنید</div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="comment-email">پست الکترونیکی</label>
              <input class="form-control form-control-lg" type="email" id="comment-email" placeholder="ایمیل شما" required>
              <div class="invalid-feedback">یک ایمیل معتبر وارد کنید</div>
            </div>
            <div class="col-12">
              <label class="form-label" for="comment-text">متن نظر</label>
              <textarea class="form-control form-control-lg" id="comment-text" rows="4" placeholder="متن نظر شما..." required></textarea>
              <div class="invalid-feedback">متن نظر خود را تایپ کنید</div>
            </div>
            <div class="col-12 text-center pt-2">
              <button class="btn btn-lg btn-primary rounded-pill" type="submit">ثبت نظر</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection