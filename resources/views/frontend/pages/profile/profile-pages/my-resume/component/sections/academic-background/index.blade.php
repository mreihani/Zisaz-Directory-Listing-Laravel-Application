<div>
    <!-- Body -->
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">

            <!-- Page title-->
            <div class="text-center pb-4 mb-3"></div>

            <!-- Steps-->
            @livewire('frontend.pages.profile.profile-pages.my-resume.sections.layouts.header')
            
            <!-- Step 2: Education-->
            <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                <h2 class="h5 font-vazir mb-4"><i class="fi-education text-primary fs-4 mt-n1 me-2 pe-1"></i>سوابق تحصیلی</h2>
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="pr-education-level">مقطع تحصیلی <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg" id="pr-education-level" required="">
                            <option value="" disabled="" selected="">انتخاب مقطع تحصیلی</option>
                            <option value="Master Degree">سیکل</option>
                            <option value="Associate Degree">دیپلم</option>
                            <option value="Bachelor's Degree">کاردانی</option>
                            <option value="Graduate Degree">کارشناسی ارشد</option>
                            <option value="Professional Degree">دکترا و بالاتر</option>
                            <option value="PhD">سایر</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="pr-study-field">رشته تحصیلی <span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" type="text" id="pr-study-field" placeholder="رشته تحصیلی" required="">
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="pr-college">نام دانشگاه / موسسه آموزشی <span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" type="text" id="pr-college" placeholder="نام دانشگاه/ موسسه آموزشی" required="">
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="pr-country">کشور و شهر و محل تحصیل<span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg" type="text" id="pr-country" placeholder="کشور و شهر محل تحصیل" required="">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label class="form-label" for="pr-period-from">تاریخ شروع و پایان تحصیل <span class="text-danger">*</span></label>
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
                  <input class="form-check-input" type="checkbox" id="still-visiting">
                  <label class="form-check-label" for="still-visiting">به شهر مورد نظر برای مصاحبه می روم.</label>
                </div>
                <button class="btn btn-link btn-lg text-primary py-2 px-0 mb-md-n2" type="button"><i class="fi-plus fs-sm me-2"></i>ایجاد سابقه تحصیلی</button>
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