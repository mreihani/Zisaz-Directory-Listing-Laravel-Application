<div>
    <!-- Body -->
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">

            <!-- Page title-->
            <div class="text-center pb-4 mb-3"></div>

            <!-- Steps-->
            @livewire('frontend.pages.profile.profile-pages.my-resume.sections.layouts.header')

            <!-- Step 1: Basic Info-->
            <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                <h2 class="h5 font-vazir"><i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                    زمینه کاری مورد نظر
                </h2>
                <div class="">
                <label class="form-label fw-bold py-2 mb-1" for="pr-position">موقعیتی که می خواهید روی آن کار کنید</label>
                <input class="form-control form-control-lg mb-4" type="text" id="pr-position" placeholder="موقعیت را مشخص کنید" required="">
                <label class="form-label fw-bold pb-1 mb-2">دسته‌بندی شغلی و زمینه‌کاری</label>
                <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4 skills">
                    <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="accounting">
                        <label class="form-check-label" for="accounting">مالی و حسابداری</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="marketing" checked="">
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
                        <input class="form-check-input" type="checkbox" id="it" checked="">
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
                        <input class="form-check-input" type="checkbox" id="design" checked="">
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
                        <input class="form-check-input" type="checkbox" id="part-time" checked="">
                        <label class="form-check-label" for="part-time">پاره وقت</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remote">
                        <label class="form-check-label" for="remote">دورکار</label>
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="temporary" checked="">
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
                        <div class="mx-2">—</div>
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
            <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5 mb-4">
                <a class="btn btn-primary btn-lg rounded-pill ms-sm-auto" href="job-board-post-resume-2.html">
                    مرحله بعد
                    <i class="fi-chevron-right fs-sm ms-2"></i>
                </a>
            </div>
        </div>
      </div>
    <!--End of Body -->
</div>