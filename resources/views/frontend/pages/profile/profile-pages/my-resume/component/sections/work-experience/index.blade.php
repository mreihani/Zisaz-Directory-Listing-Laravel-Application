<div>
    <!-- Body -->
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">

            <!-- Page title-->
            <div class="text-center pb-4 mb-3"></div>

            <!-- Steps-->
            @livewire('frontend.pages.profile.profile-pages.my-resume.sections.layouts.header')
            
            <!-- Step 3: Work experience-->
            <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                <h2 class="h5 font-vazir mb-4"><i class="fi-briefcase text-primary fs-5 mt-n1 me-2 pe-1"></i>سوابق شغلی</h2>
                <div class="alert alert-info mb-4" role="alert">
                    <div class="d-flex"><i class="fi-alert-circle me-2 me-sm-3"></i>
                    <p class="fs-sm mb-1">پر کردن 2 یا چند تجربه کاری ، شانس تماس با کارفرما را دو برابر می کند.</p>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="no-experience">
                    <label class="form-check-label" for="no-experience">من هنوز هیچ تجربه کاری ندارم</label>
                </div>
                <label class="form-label" for="pr-title">عنوان شغل (سمت) <span class="text-danger">*</span></label>
                <input class="form-control form-control-lg mb-4" type="text" id="pr-title" placeholder="عنوان شغل (سمت)" required="">
                <div class="row">
                    <div class="col-sm-6 mb-4">
                    <label class="form-label" for="pr-company">نام شرکت <span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg" type="text" id="pr-company" placeholder="نام شرکت" required="">
                    </div>
                    <div class="col-sm-6 mb-4">
                    <label class="form-label" for="pr-activity">زمینه فعالیت <span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg" id="pr-activity" required="">
                        <option value="" disabled="" selected="">انتخاب زمینه فعالیت</option>
                        <option value="Accounting">مالی و حسابداری</option>
                        <option value="Marketing &amp; PR">فروش و بازاریابی</option>
                        <option value="Medicine">پزشکی، پرستاری</option>
                        <option value="Agriculture">مهندس معمار</option>
                        <option value="Internet technology">وب، برنامه نویسی و نرم افزار</option>
                        <option value="Security">امنیت شبکه</option>
                        <option value="Management">مدیریت مالی</option>
                        <option value="HoReCa">تحقیق و توسعه</option>
                        <option value="Insurance">کارشناس حقوقی</option>
                    </select>
                    </div>
                    <div class="col-sm-6 mb-4">
                    <label class="form-label" for="pr-country">کشور</label>
                    <select class="form-select form-select-lg" id="pr-country">
                        <option value="" disabled="" selected="">انتخاب کشور</option>
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
                    <label class="form-label" for="pr-city">شهر</label>
                    <select class="form-select form-select-lg" id="pr-city">
                        <option value="" disabled="" selected="">انتخاب شهر</option>
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
                    <div class="col-lg-6 mb-4">
                    <label class="form-label" for="pr-period-from">تاریخ اشتغال از <span class="text-danger">*</span></label>
                    <div class="row gx-2 gx-sm-3">
                        <div class="col-7 col-sm-8">
                        <select class="form-select form-select-lg" id="pr-period-from" required="">
                            <option value="" disabled="" selected="">ماه</option>
                            <option value="January">فروردین</option>
                            <option value="February">اردیبهشت</option>
                            <option value="March">خرداد</option>
                            <option value="April">تیر</option>
                            <option value="May">مرداد</option>
                            <option value="June">شهریور</option>
                            <option value="July">مهر</option>
                            <option value="August">آبان</option>
                            <option value="September">آذر</option>
                            <option value="October">دی</option>
                            <option value="November">بهمن</option>
                            <option value="December">اسفند</option>
                        </select>
                        </div>
                        <div class="col-5 col-sm-4">
                        <select class="form-select form-select-lg" required="">
                            <option value="" disabled="" selected="">سال</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                        </select>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                    <label class="form-label" for="pr-period-to">تا <span class="text-danger">*</span></label>
                    <div class="row gx-2 gx-sm-3">
                        <div class="col-7 col-sm-8">
                        <select class="form-select form-select-lg" id="pr-period-to" required="">
                            <option value="" disabled="" selected="">ماه</option>
                            <option value="January">فروردین</option>
                            <option value="February">اردیبهشت</option>
                            <option value="March">خرداد</option>
                            <option value="April">تیر</option>
                            <option value="May">مرداد</option>
                            <option value="June">شهریور</option>
                            <option value="July">مهر</option>
                            <option value="August">آبان</option>
                            <option value="September">آذر</option>
                            <option value="October">دی</option>
                            <option value="November">بهمن</option>
                            <option value="December">اسفند</option>
                        </select>
                        </div>
                        <div class="col-5 col-sm-4">
                        <select class="form-select form-select-lg" required="">
                            <option value="" disabled="" selected="">سال</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="still-work">
                    <label class="form-check-label" for="still-work">هنوز مشغول به کار هستم</label>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="pr-description">توضیحات</label>
                    <textarea class="form-control" rows="5" id="pr-description" placeholder="موقعیت خود و هرگونه دستاورد مهم را شرح دهید"></textarea>
                    <div class="form-text pt-1">8000 کاراکتر استفاده شده است.</div>
                </div>
                <button class="btn btn-link btn-lg text-primary py-2 px-0 mb-md-n2" type="button"><i class="fi-plus fs-sm me-2"></i>ایجاد سابقه شغلی</button>
            </div>
          
            <!-- Navigation-->
            <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5 mb-4">
                <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" href="">
                    <i class="fi-chevron-left fs-sm me-2"></i>
                    مرحله قبل
                </a>
                <a class="btn btn-primary btn-lg rounded-pill ms-sm-auto" href="">
                    مرحله بعد
                    <i class="fi-chevron-right fs-sm ms-2"></i>
                </a>
            </div>
        </div>
      </div>
    <!--End of Body -->
</div>