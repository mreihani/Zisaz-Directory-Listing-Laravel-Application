<div>
    <!-- Change Phone number-->
    <div class="row pt-4 mt-2">
        <div class="col-lg-3">
            <h2 class="h5 font-vazir">
                شماره تلفن همراه    
            </h2>
        </div>
        <div class="col-lg-9">
            <div class="border rounded-3 p-3">
                <div class="">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">شماره همراه</label>
                        </div>
                    </div>
                    @livewire('frontend.pages.profile.profile-pages.contact-info.phone.index')
                </div>
            </div>
        </div>
    </div>

    <!-- Personal details-->
    <div class="row pt-4 mt-2">
        <div class="col-lg-3">
            <h2 class="h5 font-vazir">
                آدرس ها و اطلاعات تماس
            </h2>
        </div>
        
        <div class="col-lg-9">
            <div class="border rounded-3 p-3">
                <!-- Office phone number-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">شماره تلفن ثابت</label>
                        </div>
                    </div>
                    <div>
                        <input class="form-control mt-3" type="text" value="" placeholder="شماره ثابت خود را با پیش شماره استان وارد نمایید">
                    </div>
                </div>

                <!-- Province and City-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="row ir-select">                          
                        <div class="col-md-6">
                            <div class="">
                                <label class="form-label fw-bold">استان</label>
                                <div class="select-box">
                                    <select name="province" class="ir-province form-select form-select-md"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label class="form-label fw-bold">شهر</label>
                                <select name="city" class="ir-city form-select form-select-md">
                                    <option selected value="" disabled>انتخاب شهر</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">آدرس</label>
                        </div>
                    </div>
                    <div>
                        <input class="form-control mt-3" type="text" value="" placeholder="آدرس خود را وارد نمایید">
                    </div>
                </div>

                <!-- Postal code number-->
                <div class="">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">کد پستی</label>
                        </div>
                    </div>
                    <div>
                        <input class="form-control mt-3" type="text" value="" placeholder="کد پستی خود را وارد نمایید">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action buttons-->
    <div class="row pt-4 mt-2">
        <div class="col-lg-9 offset-lg-3">
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-primary rounded-pill px-3 px-sm-4" type="button">
                    ذخیره تغییرات
                </button>              
            </div>
        </div>
    </div>

</div>