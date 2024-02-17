@extends('frontend.master')
@section('main')



      <!-- Page container-->
      <div class="container mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="job-board-home-v1.html">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page">رزومه ساز</li>
          </ol>
        </nav>
        <!-- Page content-->
        <div class="row justify-content-center pb-sm-2">
          <div class="col-lg-11 col-xl-10">
            <!-- Page title-->
            <div class="text-center pb-4 mb-3">
              <h1 class="h4 mb-4 font-vazir">ایجاد رزومه آنلاین</h1>
              <p class="mb-4">با بارگذاری رزومه برای پر کردن برخی از فیلدهای زیر ، در وقت خود صرفه جویی کنید. لطفاً از فرمت PDF استفاده کنید.</p>
              <button class="btn btn-primary btn-lg rounded-pill" type="button"><i class="fi-upload me-2"></i>رزومه خود را بارگذاری کنید</button>
            </div>
            <!-- Steps-->
            <div class="bg-light rounded-3 py-4 px-md-4 mb-3">
              <div class="steps pt-4 pb-1">
                <div class="step active">
                  <div class="step-progress"><span class="step-progress-start"></span><span class="step-progress-end"></span><span class="step-number">1</span></div>
                  <div class="step-label">اطلاعات فردی</div>
                </div>
                <div class="step">
                  <div class="step-progress"><span class="step-progress-start"></span><span class="step-progress-end"></span><span class="step-number">2</span></div>
                  <div class="step-label">سوابق تحصیلی</div>
                </div>
                <div class="step">
                  <div class="step-progress"><span class="step-progress-start"></span><span class="step-progress-end"></span><span class="step-number">3</span></div>
                  <div class="step-label">سوابق شغلی</div>
                </div>
                <div class="step">
                  <div class="step-progress"><span class="step-progress-start"></span><span class="step-progress-end"></span><span class="step-number">4</span></div>
                  <div class="step-label">مهارت ها</div>
                </div>
                <div class="step">
                  <div class="step-progress"><span class="step-progress-start"></span><span class="step-progress-end"></span><span class="step-number">5</span></div>
                  <div class="step-label">مشاهده رزومه</div>
                </div>
              </div>
            </div>
            <!-- Step 1: Basic Info-->
            <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
              <h2 class="h5 font-vazir mb-4"><i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>اطلاعات فردی</h2>
              <div class="row">
                <div class="col-sm-6 mb-4">
                  <label class="form-label" for="pr-fn">نام <span class='text-danger'>*</span></label>
                  <input class="form-control form-control-lg" type="text" id="pr-fn" value="آنت" placeholder="نام خود را وارد کنید" required>
                </div>
                <div class="col-sm-6 mb-4">
                  <label class="form-label" for="pr-sn">نام خانوادگی <span class='text-danger'>*</span></label>
                  <input class="form-control form-control-lg" type="text" id="pr-sn" value="بلک" placeholder="نام خانوادگی خود را وارد کنید" required>
                </div>
                <div class="col-sm-6 mb-4">
                  <label class="form-label" for="pr-email">پست الکترونیک <span class='text-danger'>*</span></label>
                  <input class="form-control form-control-lg" type="email" id="pr-email" value="annette_black@email.com" placeholder="ایمیل" required>
                </div>
                <div class="col-sm-6 mb-4">
                  <label class="form-label" for="pr-phone">شماره تماس</label>
                  <input class="form-control form-control-lg" type="text" id="pr-phone" value="(302) 555-0107" placeholder="شماره همره خود را وارد کنید">
                </div>
                <div class="col-sm-6 mb-4">
                  <label class="form-label" for="pr-birth-date">تاریخ تولد <span class='text-danger'>*</span></label>
                  <div class="input-group input-group-lg">
				    <input data-jdp data-jdp-min-date="today" name="datepicker" class="form-control rounded pe-5" placeholder="انتخاب تاریخ"><i class="fi-calendar text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 mb-4">
                  <label class="form-label" for="pr-country"> کشوری که می خواهید در آن کار کنید<span class='text-danger'>*</span></label>
                  <select class="form-select form-select-lg" id="pr-country" required>
                    <option value="" disabled selected>انتخاب کشور</option>
                    <option value="Australia">استرالیا</option>
                    <option value="Belgium">فرانسه</option>
                    <option value="Canada">کانادا</option>
                    <option value="China">ژاپن</option>
                    <option value="Denmark">دانمارک</option>
                    <option value="France">پاریس</option>
                    <option value="Germany">آلمان</option>
                    <option value="Japan">توکیو</option>
                    <option value="UK">انگلستان</option>
                    <option value="USA">آمریکا</option>
                  </select>
                </div>
                <div class="col-sm-6 mb-4">
                  <label class="form-label" for="pr-city">شهری که میخواهید در آن کار کنید <span class='text-danger'>*</span></label>
                  <select class="form-select form-select-lg" id="pr-city" required>
                    <option value="" disabled selected>انتخاب شهر</option>
                    <option value="Beijing">مالزی</option>
                    <option value="Berlin">برلین</option>
                    <option value="Brussels">بارسلونا</option>
                    <option value="Copenhagen">چین</option>
                    <option value="London">لندن</option>
                    <option value="Ottawa">آمستردام</option>
                    <option value="Paris">پاریس</option>
                    <option value="Sydney">سیدنی</option>
                    <option value="Tokyo">توکیو</option>
                    <option value="Washington">نیویورک</option>
                  </select>
                </div>
                <div class="col-12 mb-4">
                  <label class="form-label" for="pr-address">آدرس</label>
                  <input class="form-control form-control-lg" type="text" id="pr-address" placeholder="آدرس خود را وارد کنید">
                </div>
              </div>
              <div class="pb-4 mb-2">
                <label class="form-label fw-bold mb-3">شبکه های اجتماعی</label>
                <div class="d-flex align-items-center mb-3">
                  <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-facebook text-body"></i></div>
                  <input class="form-control" type="text" placeholder="اکانت فیسبوک">
                </div>
                <div class="d-flex align-items-center mb-3">
                  <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-linkedin text-body"></i></div>
                  <input class="form-control" type="text" placeholder="اکانت لینکدین">
                </div>
                <div class="d-flex align-items-center mb-3">
                  <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-twitter text-body"></i></div>
                  <input class="form-control" type="text" placeholder="اکانت توییتر">
                </div>
                <div class="collapse" id="showMoreSocials">
                  <div class="d-flex align-items-center mb-3">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-instagram text-body"></i></div>
                    <input class="form-control" type="text" placeholder="اکانت اینستاگرام">
                  </div>
                  <div class="d-flex align-items-center mb-3">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-behance text-body"></i></div>
                    <input class="form-control" type="text" placeholder="اکانت گوگل پلاس">
                  </div>
                </div><a class="collapse-label collapsed d-inline-block fs-sm fw-bold text-decoration-none pt-2" href="#showMoreSocials" data-bs-toggle="collapse" data-bs-label-collapsed="مشاهده بیشتر" data-bs-label-expanded="بستن" role="button" aria-expanded="false" aria-controls="showMoreSocials"><i class="fi-arrow-down me-2"></i></a>
              </div>
              <div class="border-top pt-4">
                <label class="form-label fw-bold py-2 mb-1" for="pr-position">موقعیتی که می خواهید روی آن کار کنید</label>
                <input class="form-control form-control-lg mb-4" type="text" id="pr-position" placeholder="موقعیت را مشخص کنید" required>
                <label class="form-label fw-bold pb-1 mb-2">دسته‌بندی شغلی و زمینه‌کاری</label>
                <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4 skills">
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="accounting">
                      <label class="form-check-label" for="accounting">مالی و حسابداری</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="marketing" checked>
                      <label class="form-check-label" for="marketing">بازاریابی و فروش</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="medicine">
                      <label class="form-check-label" for="medicine">پزشکی، پرستاری</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="agriculture">
                      <label class="form-check-label" for="agriculture">مهندس معمار</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="it" checked>
                      <label class="form-check-label" for="it">فناوری و اطلاعات</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="security">
                      <label class="form-check-label" for="security">امنیت شبکه</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="management">
                      <label class="form-check-label" for="management">مدیریت مالی</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="horeca">
                      <label class="form-check-label" for="horeca">سئو و تولید محتوا</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="design" checked>
                      <label class="form-check-label" for="design">گرافیست</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="sport">
                      <label class="form-check-label" for="sport">آموزش</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="beauty">
                      <label class="form-check-label" for="beauty">ترجمه</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="culture">
                      <label class="form-check-label" for="culture">گردشگری</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="music">
                      <label class="form-check-label" for="music">پشتیبانی و امور مشتریان</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="logistics">
                      <label class="form-check-label" for="logistics">روابط عمومی</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="education">
                      <label class="form-check-label" for="education">وب، برنامه نویسی و نرم افزار</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="sales">
                      <label class="form-check-label" for="sales">فروشنده</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="industry">
                      <label class="form-check-label" for="industry">مسئول دفتر</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="transportation">
                      <label class="form-check-label" for="transportation">حمل و نقل</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="media">
                      <label class="form-check-label" for="media">مهندس معدن</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="insurance">
                      <label class="form-check-label" for="insurance">مهندسی صنایع</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="construction">
                      <label class="form-check-label" for="construction">انبارداری</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="architecture">
                      <label class="form-check-label" for="architecture">صنایع غذایی</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="hr">
                      <label class="form-check-label" for="hr">تحقیق و توسعه</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="law">
                      <label class="form-check-label" for="law">کارشناس حقوقی</label>
                    </div>
                  </div>
                </div>
                <label class="form-label fw-bold pb-1 mb-2">نوع قرارداد</label>
                <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4">
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="full-time">
                      <label class="form-check-label" for="full-time">تمام وقت</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="part-time" checked>
                      <label class="form-check-label" for="part-time">پاره وقت</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remote">
                      <label class="form-check-label" for="remote">دورکار</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="temporary" checked>
                      <label class="form-check-label" for="temporary">پروژه ای</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="contract">
                      <label class="form-check-label" for="contract">قراردادی</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="internship">
                      <label class="form-check-label" for="internship">کارآموز</label>
                    </div>
                  </div>
                </div>
                <label class="form-label fw-bold pb-1 mb-2">حداقل حقوق درخواستی</label>
                <div class="row gx-2 gx-lg-3 gx-xl-4">
                  <div class="col-md-2 mb-3 mb-md-0">
                    <select class="form-select form-select-lg">
                      <option value="usd">تومان</option>
                      <option value="eur">یورو</option>
                      <option value="gbp">دلار</option>
                      <option value="jpy">پوند</option>
                    </select>
                  </div>
                  <div class="col-md-7 mb-3 mb-md-0">
                    <div class="d-flex align-items-center">
                      <input class="form-control form-control-lg" type="number" step="100" min="300" placeholder="از">
                      <div class="mx-2">&mdash;</div>
                      <input class="form-control form-control-lg" type="number" step="100" min="500" placeholder="تا">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <select class="form-select form-select-lg">
                      <option value="monthly">ماهیانه</option>
                      <option value="per hour">ساعتی</option>
                      <option value="weekly">هفتگی</option>
                      <option value="annually">سالیانه</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- Navigation-->
            <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5"><a class="btn btn-primary btn-lg rounded-pill ms-sm-auto" href="job-board-post-resume-2.html">مرحله بعد<i class="fi-chevron-right fs-sm ms-2"></i></a></div>
          </div>
        </div>
      </div>

@endsection