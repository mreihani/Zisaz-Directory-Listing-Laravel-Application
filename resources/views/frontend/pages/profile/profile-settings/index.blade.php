@extends('frontend.master')
@section('main')

<div class="position-absolute top-0 start-0 w-100 bg-dark" style="height: 398px;"></div>
    <div class="container content-overlay mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 mb-md-4 pt-md-3" aria-label="Breadcrumb">
            <ol class="breadcrumb breadcrumb-light">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">خانه</a></li>
            <li class="breadcrumb-item"><a href="">حساب کاربری</a></li>
            <li class="breadcrumb-item active" aria-current="page">تنظیمات حساب کاربری</li>
            </ol>
        </nav>
        <!-- Page card like wrapper-->
        <div class="bg-light shadow-sm rounded-3 p-4 p-md-5 mb-2">

            <!-- Account header-->
            <!-- Account menu-->
            @include('frontend.pages.profile.layouts.nav')    
            
            <!-- Authorization info-->
            <div class="row pt-4 mt-3">
            <div class="col-lg-3">
                <h2 class="h5 font-vazir">اطلاعات ورود به اکانت</h2>
            </div>
            <div class="col-lg-9">
                <div class="border rounded-3 p-3" id="auth-info">
                <!-- Email-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">پست الکترونیکی</label>
                        <div id="email-value">annette_black@email.com</div>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#email-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="email-collapse" data-bs-parent="#auth-info">
                    <input class="form-control mt-3" type="email" data-bs-binded-element="#email-value" data-bs-unset-value="مشخص نشده است" value="annette_black@email.com">
                    </div>
                </div>
                <!-- Password-->
                <div>
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">رمز عبور</label>
                        <div>********</div>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#password-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="password-collapse" data-bs-parent="#auth-info">
                    <div class="row gx-3 align-items-center my-3">
                        <label class="col-sm-4 col-md-3 col-form-label" for="account-password-current">رمز عبور فعلی:</label>
                        <div class="col-sm-8 col-md-9">
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="account-password-current" placeholder="رمز عبور فعلی را وارد کنید">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                        </div>
                    </div>
                    <div class="row gx-3 align-items-center my-3">
                        <label class="col-sm-4 col-md-3 col-form-label" for="account-password-new">رمز عبور جدید:</label>
                        <div class="col-sm-8 col-md-9">
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="account-password-new" placeholder="رمز عبور جدید را وارد کنید">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                        </div>
                    </div>
                    <div class="row gx-3 align-items-center">
                        <label class="col-sm-4 col-md-3 col-form-label" for="account-password-confirm">تایید رمز عبور جدید:</label>
                        <div class="col-sm-8 col-md-9">
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="account-password-confirm" placeholder="رمز عبور جدید را مجدد وارد کنید">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Personal details-->
            <div class="row pt-4 mt-2">
            <div class="col-lg-3">
                <h2 class="h5 font-vazir">اطلاعات فردی</h2>
            </div>
            <div class="col-lg-9">
                <div class="border rounded-3 p-3" id="personal-details">
                <!-- Full name-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">نام و نام خانوادگی</label>
                        <div id="fn-value">آنت بلک</div>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#fn-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="fn-collapse" data-bs-parent="#personal-details">
                    <input class="form-control mt-3" type="email" data-bs-binded-element="#fn-value" data-bs-unset-value="مشخص نشده است" value="Annette Black">
                    </div>
                </div>
                <!-- Gender-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">جنسیت</label>
                        <div id="gender-value">زن</div>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#gender-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="gender-collapse" data-bs-parent="#personal-details">
                    <select class="form-select mt-3" data-bs-binded-element="#gender-value">
                        <option value="" disabled>انتخاب جنسیت</option>
                        <option value="Male">مرد</option>
                        <option value="Female" selected>زن</option>
                    </select>
                    </div>
                </div>
                <!-- Date of birth-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">تاریخ تولد</label>
                        <div id="birth-value">مشخص نشده است</div>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#birth-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="birth-collapse" data-bs-parent="#personal-details">
                    <div class="mt-3 pt-3 border-top">
                        <div class="input-group">
                        <input class="form-control rounded ps-5" type="text" id="date-birth" data-bs-binded-element="#birth-value" placeholder="انتخاب تاریخ تولد"><i class="fi-calendar text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Phone number-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">شماره تماس</label>
                        <div id="phone-value">(302) 555-0107</div>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#phone-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="phone-collapse" data-bs-parent="#personal-details">
                    <input class="form-control mt-3" type="text" data-bs-binded-element="#phone-value" data-bs-unset-value="مشخص نشده است" value="(302) 555-0107">
                    </div>
                </div>
                <!-- Address-->
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">آدرس</label>
                        <div id="address-value">مشخص نشده است</div>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#address-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse" id="address-collapse" data-bs-parent="#personal-details">
                    <input class="form-control mt-3" type="text" data-bs-binded-element="#address-value" data-bs-unset-value="مشخص نشده است" placeholder="آدرس خود را وارد کنید">
                    </div>
                </div>
                <!-- Socials-->
                <div>
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="ps-2">
                        <label class="form-label fw-bold">شبکه های اجتماعی</label>
                        <ul class="list-unstyled mb-0">
                        <li id="facebook-value">مشخص نشده است</li>
                        <li id="linkedin-value"></li>
                        <li id="twitter-value"></li>
                        <li id="instagram-value"></li>
                        <li id="behance-value"></li>
                        </ul>
                    </div>
                    <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#socials-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                    </div>
                    <div class="collapse mt-3" id="socials-collapse" data-bs-parent="#personal-details">
                    <div class="d-flex align-items-center mb-3">
                        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-facebook text-body"></i></div>
                        <input class="form-control" type="text" data-bs-binded-element="#facebook-value" placeholder="اکانت فیسبوک خود را وارد کنید">
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-linkedin text-body"></i></div>
                        <input class="form-control" type="text" data-bs-binded-element="#linkedin-value" placeholder="اکانت لینکدین خود را وارد کنید">
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-twitter text-body"></i></div>
                        <input class="form-control" type="text" data-bs-binded-element="#twitter-value" placeholder="اکانت توییتر خود را وارد کنید">
                    </div>
                    <div class="collapse" id="showMoreSocials">
                        <div class="d-flex align-items-center mb-3">
                        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-instagram text-body"></i></div>
                        <input class="form-control" type="text" data-bs-binded-element="#instagram-value" placeholder="اکانت اینستاگرام خود را وارد کنید">
                        </div>
                        <div class="d-flex align-items-center mb-3">
                        <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3"><i class="fi-behance text-body"></i></div>
                        <input class="form-control" type="text" data-bs-binded-element="#behance-value" placeholder="اکانت بهانس خود را وارد کنید">
                        </div>
                    </div><a class="collapse-label collapsed d-inline-block fs-sm fw-bold text-decoration-none pt-2 pb-3" href="#showMoreSocials" data-bs-toggle="collapse" data-bs-label-collapsed="موارد بیشتر" data-bs-label-expanded="بستن" role="button" aria-expanded="false" aria-controls="showMoreSocials"><i class="fi-arrow-down me-2"></i></a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Account settings-->
            <div class="row pt-4 mt-2">
                <div class="col-lg-3">
                    <h2 class="h5 font-vazir">تنظیمات نوع اکانت</h2>
                </div>
                <div class="col-lg-9">
                    <div class="border rounded-3 p-3" id="account-settings">
                    <!-- Account type-->
                    <div class="border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">نوع اکانت</label>
                            <div id="type-value">کارفرما</div>
                        </div>
                        <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#type-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                        </div>
                        <div class="collapse" id="type-collapse" data-bs-parent="#account-settings">
                        <select class="form-select mt-3" data-bs-binded-element="#type-value">
                            <option value="" disabled>انتخاب نوع اکانت</option>
                            <option value="Employer (looking for an employee)">کارفرما (به دنبال یک کارمند هستم)</option>
                            <option value="Job seeker (looking for a job)" selected>کارجو (به دنبال شغل هستم)</option>
                        </select>
                        </div>
                    </div>
                    <!-- Two-factor authentication-->
                    <div>
                        <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">احراز هویت دو مرحله ای</label>
                            <div id="auth-value">غیر فعال</div>
                        </div>
                        <div class="me-n3" data-bs-toggle="tooltip" title="ویرایش"><a class="nav-link py-0" href="#auth-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                        </div>
                        <div class="collapse" id="auth-collapse" data-bs-parent="#account-settings">
                        <select class="form-select mt-3" data-bs-binded-element="#auth-value">
                            <option value="" disabled>فعال/ غیرفعال تایید دومرحله ای</option>
                            <option value="Active">فعال</option>
                            <option value="Inactive" selected>غیر فعال</option>
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Action buttons-->
            <div class="row pt-4 mt-2">
                <div class="col-lg-9 offset-lg-3">
                    <div class="d-flex align-items-center justify-content-between">
                    <button class="btn btn-primary rounded-pill px-3 px-sm-4" type="button">ذخیره تغییرات</button>
                    <button class="btn btn-link btn-sm px-0" type="button"><i class="fi-trash me-2"></i>حذف اکانت</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection