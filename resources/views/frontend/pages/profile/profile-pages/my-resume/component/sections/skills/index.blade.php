<div>
    <!-- Body -->
    <div class="row justify-content-center pb-sm-2" style="background-color: #f5f4f8;">
        <div class="col-lg-11 col-xl-10">

            <!-- Page title-->
            <div class="text-center pb-4 mb-3"></div>

            <!-- Steps-->
            @livewire('frontend.pages.profile.profile-pages.my-resume.sections.layouts.header')
            
            <!-- Step 4: Skills-->
            <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
                <h2 class="h5 font-vazir mb-4"><i class="fi-star text-primary fs-5 mt-n1 me-2 pe-1"></i>مهارت ها</h2>
                <div class="mb-4">
                  <label class="form-label" for="pr-add-skill">افزودن مهارت شما</label>
                  <div class="d-flex flex-column flex-sm-row">
                    <input class="form-control form-control-lg w-100 me-sm-3 me-md-4 mb-3 mb-sm-0" type="text" id="pr-add-skill" placeholder="مهارت شما">
                    <button class="btn btn-primary btn-lg rounded-pill" type="button">افزودن</button>
                  </div>
                  <div class="form-text pt-1">می توانید 26 مهارت دیگر اضافه کنید</div>
                </div>
                <div class="d-flex flex-wrap mb-4"><span class="bg-success text-light fs-sm btn btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-check fs-xs me-2"></i>گرافیست</span>
                <span class="bg-success text-light fs-sm btn btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-check fs-xs me-2"></i>تایپ</span>
                <span class="bg-success text-light fs-sm btn btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-check fs-xs me-2"></i>برنامخ نویس PHP</span>
                <span class="bg-success text-light fs-sm btn btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-check fs-xs me-2"></i>پشتیبان</span></div>
                <div class="border-top py-4 mb-md-2">
                  <label class="form-label fw-bold py-2">مهارت های توصیه شده بر اساس رزرمه شما:</label>
                  <div class="d-flex flex-wrap"><span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>CSS</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>پشتیبانی هاست و دامنه</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>مسلط به فتوشاپ</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>مسلط به آفیس</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>مسلط به زبان انگلیسی</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>روابط عمومی بالا</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>HTML</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>طراحی لوگو</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>حسابدار</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>برنامه نویسی اندروید</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>ترجمه</span>
                  <span class="fs-sm btn text-nav btn-outline-secondary btn-xs disabled opacity-100 rounded-pill me-2 mb-2 ms-1 mt-1"><i class="fi-plus fs-xs me-2"></i>توانایی مدیریت دامنه</span></div>
                </div>
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" id="no-skills">
                  <label class="form-check-label" for="no-skills">در حال حاضر مهارت خاصی ندارم</label>
                </div>
              </div>
          
            <!-- Navigation-->
            <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5 mb-4">
                <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" href="">
                    <i class="fi-chevron-left fs-sm me-2"></i>
                    مرحله قبل
                </a>
                <a class="btn btn-primary btn-lg rounded-pill ms-sm-auto" href="">
                    ذخیره رزومه
                </a>
            </div>
        </div>
      </div>
    <!--End of Body -->
</div>