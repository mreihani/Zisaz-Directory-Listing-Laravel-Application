@extends('frontend.master')
@section('main')

      <!-- Page content-->
      <section class="bg-dark py-5">
        <div class="container pt-5 pb-5">
          <!-- Breadcrumbs + page title-->
          <nav class="mb-4 pb-lg-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light">
              <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
              <li class="breadcrumb-item"><a href="job-board-help-center.html">سوالات متداول</a></li>
              <li class="breadcrumb-item active" aria-current="page">برای کارجویان</li>
            </ol>
          </nav>
          <!-- Page title-->
          <div class="mb-lg-5 mx-auto text-center" style="max-width: 856px;">
            <h1 class="text-light mb-4 pb-3">برای کارجویان</h1>
            <!-- Search form-->
            <form class="form-group form-group-lg form-group-light rounded-pill">
              <input class="form-control" type="text" placeholder="دنبال چی میگردی؟">
              <button class="btn btn-lg btn-primary rounded-pill px-sm-4 px-3" type="submit"><i class="fi-search me-sm-2"></i><span class="d-sm-inline d-none">جستجو</span></button>
            </form>
          </div>
        </div>
      </section>
      <!-- Page content-->
      <section class="position-relative bg-white rounded-xxl-4 mb-5 pt-md-3 pb-lg-5 zindex-5" style="margin-top: -30px;">
        <div class="container pt-5">
          <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-3 col-md-4 d-md-block d-none position-relative">
              <nav class="border-start sticky-top" style="top: 116px;">
                <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link py-1 px-4 fw-normal" href="#popular-questions" data-scroll>سوالات رایج</a></li>
                  <li class="nav-item"><a class="nav-link py-1 px-4 fw-normal" href="#job-search" data-scroll>جستجوی کار</a></li>
                  <li class="nav-item"><a class="nav-link py-1 px-4 fw-normal" href="#resume-creation" data-scroll>نحوه ایجاد و ویرایش رزومه</a></li>
                  <li class="nav-item"><a class="nav-link py-1 px-4 fw-normal" href="#job-application" data-scroll>درخواست شغل</a></li>
                  <li class="nav-item"><a class="nav-link py-1 px-4 fw-normal" href="#registration-and-login" data-scroll>ثبت نام و ورود</a></li>
                  <li class="nav-item"><a class="nav-link py-1 px-4 fw-normal" href="#technical-information" data-scroll>سوالات فنی</a></li>
                  <li class="nav-item"><a class="nav-link py-1 px-4 fw-normal" href="#newsletter-of-new-vacancies" data-scroll>خبرنامه مشاغل جدید</a></li>
                </ul>
              </nav>
            </aside>
            <div class="col-md-8 offset-lg-1">
              <div class="mb-md-5 mb-4 pb-lg-2" id="popular-questions">
                <h2 class="h4 mb-md-4">سوالات رایج</h2>
                <!-- Popular questions accordion-->
                <div class="accordion" id="accordionPQ">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="pq-heading-1">
                      <button class="accordion-button fw-normal" type="button" data-bs-toggle="collapse" data-bs-target="#pq-collapse-1" aria-expanded="true" aria-controls="pq-collapse-1">شروع به کار: اصول اولیه</button>
                    </h2>
                    <div class="accordion-collapse collapse show" aria-labelledby="pq-heading-1" data-bs-parent="#accordionPQ" id="pq-collapse-1">
                      <div class="accordion-body fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="pq-heading-2">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pq-collapse-2" aria-expanded="false" aria-controls="pq-collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="pq-heading-2" data-bs-parent="#accordionPQ" id="pq-collapse-2">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="pq-heading-3">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pq-collapse-3" aria-expanded="false" aria-controls="pq-collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="pq-heading-3" data-bs-parent="#accordionPQ" id="pq-collapse-3">
                      <div class="accordion-body fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="pq-heading-4">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pq-collapse-4" aria-expanded="false" aria-controls="pq-collapse-4">برند شخصی دقیقاً چیست و چرا به آن نیاز دارم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="pq-heading-4" data-bs-parent="#accordionPQ" id="pq-collapse-4">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="pq-heading-5">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pq-collapse-5" aria-expanded="false" aria-controls="pq-collapse-5">مهم ترین مواردی که باید در رزومه من گنجانده شود چیست؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="pq-heading-5" data-bs-parent="#accordionPQ" id="pq-collapse-5">
                      <div class="accordion-body fs-sm">متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="pq-heading-6">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pq-collapse-6" aria-expanded="false" aria-controls="pq-collapse-6">چه مدت باید نامه و/یا رزومه خود را تهیه کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="pq-heading-6" data-bs-parent="#accordionPQ" id="pq-collapse-6">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-md-5 mb-4 pb-lg-2" id="job-search">
                <h2 class="h4 mb-md-4">جستجوی کار</h2>
                <!-- Job search accordion-->
                <div class="accordion" id="accordionJS">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="js-heading-1">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#js-collapse-1" aria-expanded="false" aria-controls="js-collapse-1">شروع به کار: اصول اولیه</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="js-heading-1" data-bs-parent="#accordionjs" id="js-collapse-1">
                      <div class="accordion-body fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="js-heading-2">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#js-collapse-2" aria-expanded="false" aria-controls="js-collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="js-heading-2" data-bs-parent="#accordionjs" id="js-collapse-2">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="js-heading-3">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#js-collapse-3" aria-expanded="false" aria-controls="js-collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="js-heading-3" data-bs-parent="#accordionjs" id="js-collapse-3">
                      <div class="accordion-body fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="js-heading-4">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#js-collapse-4" aria-expanded="false" aria-controls="js-collapse-4">برند شخصی دقیقاً چیست و چرا به آن نیاز دارم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="js-heading-4" data-bs-parent="#accordionjs" id="js-collapse-4">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-md-5 mb-4 pb-lg-2" id="resume-creation">
                <h2 class="h4 mb-md-4">نحوه ایجاد و ویرایش رزومه</h2>
                <!-- Resume creation and editing accordion-->
                <div class="accordion" id="accordionRC">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rc-heading-1">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rc-collapse-1" aria-expanded="false" aria-controls="rc-collapse-1">شروع به کار: اصول اولیه</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rc-heading-1" data-bs-parent="#accordionjs" id="rc-collapse-1">
                      <div class="accordion-body fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rc-heading-2">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rc-collapse-2" aria-expanded="false" aria-controls="rc-collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rc-heading-2" data-bs-parent="#accordionjs" id="rc-collapse-2">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rc-heading-3">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rc-collapse-3" aria-expanded="false" aria-controls="rc-collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rc-heading-3" data-bs-parent="#accordionjs" id="rc-collapse-3">
                      <div class="accordion-body fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rc-heading-4">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rc-collapse-4" aria-expanded="false" aria-controls="rc-collapse-4">برند شخصی دقیقاً چیست و چرا به آن نیاز دارم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rc-heading-4" data-bs-parent="#accordionjs" id="rc-collapse-4">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rc-heading-5">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rc-collapse-5" aria-expanded="false" aria-controls="rc-collapse-5">مهم ترین مواردی که باید در رزومه من گنجانده شود چیست؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rc-heading-5" data-bs-parent="#accordionPQ" id="rc-collapse-5">
                      <div class="accordion-body fs-sm">متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rc-heading-6">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rc-collapse-6" aria-expanded="false" aria-controls="rc-collapse-6">چه مدت باید نامه و/یا رزومه خود را تهیه کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rc-heading-6" data-bs-parent="#accordionPQ" id="rc-collapse-6">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-md-5 mb-4 pb-lg-2" id="job-application">
                <h2 class="h4 mb-md-4">درخواست شغل</h2>
                <!-- Job application accordion-->
                <div class="accordion" id="accordionJA">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ja-heading-1">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ja-collapse-1" aria-expanded="false" aria-controls="ja-collapse-1">شروع به کار: اصول اولیه</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ja-heading-1" data-bs-parent="#accordionjs" id="ja-collapse-1">
                      <div class="accordion-body fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ja-heading-2">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ja-collapse-2" aria-expanded="false" aria-controls="ja-collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ja-heading-2" data-bs-parent="#accordionjs" id="ja-collapse-2">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ja-heading-3">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ja-collapse-3" aria-expanded="false" aria-controls="ja-collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ja-heading-3" data-bs-parent="#accordionjs" id="ja-collapse-3">
                      <div class="accordion-body fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ja-heading-4">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ja-collapse-4" aria-expanded="false" aria-controls="ja-collapse-4">برند شخصی دقیقاً چیست و چرا به آن نیاز دارم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ja-heading-4" data-bs-parent="#accordionjs" id="ja-collapse-4">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-md-5 mb-4 pb-lg-2" id="registration-and-login">
                <h2 class="h4 mb-md-4">ثبت نام و ورود</h2>
                <!-- Registration and login accordion-->
                <div class="accordion" id="accordionRL">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rl-heading-1">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rl-collapse-1" aria-expanded="false" aria-controls="rl-collapse-1">شروع به کار: اصول اولیه</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rl-heading-1" data-bs-parent="#accordionjs" id="rl-collapse-1">
                      <div class="accordion-body fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rl-heading-2">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rl-collapse-2" aria-expanded="false" aria-controls="rl-collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rl-heading-2" data-bs-parent="#accordionjs" id="rl-collapse-2">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rl-heading-3">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rl-collapse-3" aria-expanded="false" aria-controls="rl-collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rl-heading-3" data-bs-parent="#accordionjs" id="rl-collapse-3">
                      <div class="accordion-body fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="rl-heading-4">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rl-collapse-4" aria-expanded="false" aria-controls="rl-collapse-4">برند شخصی دقیقاً چیست و چرا به آن نیاز دارم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="rl-heading-4" data-bs-parent="#accordionjs" id="rl-collapse-4">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-md-5 mb-4 pb-lg-2" id="technical-information">
                <h2 class="h4 mb-md-4">سوالات فنی</h2>
                <!-- Technical information accordion-->
                <div class="accordion" id="accordionTI">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ti-heading-1">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ti-collapse-1" aria-expanded="false" aria-controls="ti-collapse-1">شروع به کار: اصول اولیه</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ti-heading-1" data-bs-parent="#accordionjs" id="ti-collapse-1">
                      <div class="accordion-body fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ti-heading-2">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ti-collapse-2" aria-expanded="false" aria-controls="ti-collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ti-heading-2" data-bs-parent="#accordionjs" id="ti-collapse-2">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ti-heading-3">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ti-collapse-3" aria-expanded="false" aria-controls="ti-collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ti-heading-3" data-bs-parent="#accordionjs" id="ti-collapse-3">
                      <div class="accordion-body fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ti-heading-4">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ti-collapse-4" aria-expanded="false" aria-controls="ti-collapse-4">برند شخصی دقیقاً چیست و چرا به آن نیاز دارم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ti-heading-4" data-bs-parent="#accordionjs" id="ti-collapse-4">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ti-heading-5">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ti-collapse-5" aria-expanded="false" aria-controls="ti-collapse-5">مهم ترین مواردی که باید در رزومه من گنجانده شود چیست؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ti-heading-5" data-bs-parent="#accordionPQ" id="ti-collapse-5">
                      <div class="accordion-body fs-sm">متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="ti-heading-6">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ti-collapse-6" aria-expanded="false" aria-controls="ti-collapse-6">چه مدت باید نامه و/یا رزومه خود را تهیه کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="ti-heading-6" data-bs-parent="#accordionPQ" id="ti-collapse-6">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="newsletter-of-new-vacancies">
                <h2 class="h4 mb-md-4">خبرنامه مشاغل جدید</h2>
                <!-- Newsletter of new vacancies accordion-->
                <div class="accordion" id="accordionNV">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="nv-heading-1">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nv-collapse-1" aria-expanded="false" aria-controls="nv-collapse-1">شروع به کار: اصول اولیه</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="nv-heading-1" data-bs-parent="#accordionPQ" id="nv-collapse-1">
                      <div class="accordion-body fs-sm">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="nv-heading-2">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nv-collapse-2" aria-expanded="false" aria-controls="nv-collapse-2">آیا داده های ما خصوصی و ایمن خواهند بود؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="nv-heading-2" data-bs-parent="#accordionPQ" id="nv-collapse-2">
                      <div class="accordion-body fs-sm">کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="nv-heading-3">
                      <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nv-collapse-3" aria-expanded="false" aria-controls="nv-collapse-3">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</button>
                    </h2>
                    <div class="accordion-collapse collapse" aria-labelledby="nv-heading-3" data-bs-parent="#accordionPQ" id="nv-collapse-3">
                      <div class="accordion-body fs-sm">در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact Us CTA-->
      <section class="container mb-5 pb-lg-5">
        <div class="py-md-4 py-5 bg-secondary rounded-3">
          <div class="col-sm-10 col-11 d-flex flex-md-row flex-column align-items-center justify-content-between mx-auto px-0">
            <div class="order-md-1 order-2 text-md-start text-center" style="max-width: 524px;">
              <h2 class="mb-4 pb-md-3 ">شما می توانید با ما تماس بگیرید و سوالات خود را مستقیما بپرسید!!!</h2><a class="btn btn-lg btn-primary rounded-pill w-sm-auto w-100" href="job-board-contacts.html">تماس با ما</a>
            </div><img class="order-md-2 order-1 me-md-4" src="{{asset('assets/frontend/img/job-board/illustrations/mail.svg')}}" alt="Illustration">
          </div>
        </div>
      </section>

@endsection