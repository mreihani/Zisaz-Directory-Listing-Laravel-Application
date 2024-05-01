@extends('frontend.master')
@section('main')

  <!-- Page content-->
  <section class="py-4">
    <div class="container pt-lg-0 pt-5 pb-lg-5 mt-4">
      <!-- Breadcrumbs-->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-md-3 py-1">
          <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
          <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
        </ol>
      </nav>
      <div class="row gy-4">
        <div class="col-lg-4 col-md-5 mb-md-0 mb-2">
          <div class="card border-0 bg-secondary p-md-3 p-1">
            <div class="card-body">
              <h1 class="mb-4 ">تماس با ما</h1>
              <div class="mb-md-5 mb-4"><a class="nav-link fw-normal d-flex align-items-start mb-3 p-0" href="mailto:example@email.com"><i class="fi-mail mt-1 me-2 pe-1 text-primary"></i>example@email.com</a><a class="nav-link fw-normal d-flex align-items-start mb-3 p-0" href="tel:4065550120"><i class="fi-device-mobile mt-1 me-2 pe-1 text-primary"></i>555-1208</a><a class="nav-link fw-normal d-flex align-items-start mb-3 p-0" href="#"><i class="fi-map-pin mt-1 me-2 pe-1 text-primary"></i>تهران، خیابان آزادی <br> نبش خیابان شکوفه پلاک 51</a><span class="nav-link fw-normal d-flex align-items-start mb-3 p-0"><i class="fi-clock mt-1 me-2 pe-1 text-primary"></i>شنبه - چهارشنبه: 8:30 - 17:00</span></div>
              <h3 class="h6 mb-1">ما را دنبال کنید:</h3><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mt-2 me-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mt-2 me-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mt-2 me-2" href="#"><i class="fi-instagram"></i></a><a class="btn btn-icon btn-light-primary btn-xs rounded-circle shadow-sm mt-2 me-2" href="#"><i class="fi-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-7 offset-lg-1">
          <h2 class="h4 mb-4 pb-md-2">شاید بتوانید پاسخ سوال خود را در اینجا بیابید:</h2>
          <div class="mb-md-4 mb-3 fs-sm">
            <h6 class="mb-md-3 mb-2 fs-base">آیا حتی اگر تجربه مشخص شده را نداشته باشم باید برای کار اقدام کنم؟</h6>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
          </div>
          <div class="mb-md-4 mb-3 fs-sm">
            <h6 class="mb-md-3 mb-2 fs-base">مهم ترین مواردی که باید در رزومه من گنجانده شود چیست؟</h6>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
          </div>
          <div class="mb-md-4 mb-3 fs-sm">
            <h6 class="mb-md-3 mb-2 fs-base">چه مدت باید نامه و/یا رزومه خود را تهیه کنم؟</h6>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.</p>
          </div>
          <div class="mb-md-4 mb-3 fs-sm">
            <h6 class="mb-md-3 mb-2 fs-base">آیا داده های ما خصوصی و ایمن خواهند بود؟</h6>
            <p>کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
          </div>
          <div class="pt-md-3 pt-2"><a class="btn btn-primary rounded-pill" href="job-board-help-center.html">سوالات متداول<i class="fi-chevron-right ms-2"></i></a></div>
        </div>
      </div>
    </div>
  </section>
  
@endsection