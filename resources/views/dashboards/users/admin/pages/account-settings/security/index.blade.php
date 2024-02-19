@extends('dashboards.users.admin.master')
@section('main')

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/js/pages-account-settings-account.js')}}"></script>
@endpush

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">تنظیمات حساب /</span>
        امنیت حساب
    </h4>
    <div class="row fv-plugins-icon-container">
        <div class="col-md-12">
            
            @include('dashboards.users.admin.pages.account-settings.layouts.header')

            <!-- Change Password -->
            <div class="card mb-4">
                <h5 class="card-header">تغییر رمز عبور</h5>
                <div class="card-body">
                    <form id="formAccountSettings" method="GET" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="currentPassword">رمز عبور فعلی</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input class="form-control" id="currentPassword" name="currentPassword" placeholder="············" type="password">
                                    <span class="input-group-text cursor-pointer">
                                        <i class="ti ti-eye-off"></i>
                                    </span>
                                </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="newPassword">رمز عبور جدید</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input class="form-control" id="newPassword" name="newPassword" placeholder="············" type="password">
                                    <span class="input-group-text cursor-pointer">
                                        <i class="ti ti-eye-off"></i>
                                    </span>
                                </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                            <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="confirmPassword">تأیید رمز عبور جدید</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input class="form-control" id="confirmPassword" name="confirmPassword" placeholder="············" type="password">
                                    <span class="input-group-text cursor-pointer">
                                        <i class="ti ti-eye-off"></i>
                                    </span>
                                </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                            <div class="col-12 mb-4">
                                <h6>الزامات رمز عبور:</h6>
                                <ul class="ps-3 mb-0">
                                    <li class="mb-1">حداقل 8 کارکتر</li>
                                    <li class="mb-1">حداقل یک حرف کوچک</li>
                                    <li>حداقل یک عدد یا نماد خاص</li>
                                </ul>
                            </div>
                            <div>
                                <button class="btn btn-primary me-2 waves-effect waves-light" type="submit">بروزرسانی رمز</button>
                                <button class="btn btn-label-secondary waves-effect" type="reset">لغو</button>
                            </div>
                        </div>
                    <input type="hidden"></form>
                </div>
            </div>
            <!--/ Change Password -->
   
            <!-- Two-steps verification -->
            <div class="card mb-4">
                <h5 class="card-header">تأیید دو مرحله ای</h5>
                <div class="card-body">
                    <h5 class="mb-3">احراز هویت دو مرحله ای هنوز فعال نشده است.</h5>
                    <p class="w-75"> احراز هویت دو مرحله ای با نیاز به بیش از یک رمز عبور برای ورود، یک لایه امنیتی اضافی به حساب شما اضافه می کند.
                        <a href="javascript:void(0);">بیشتر بدانید.</a>
                    </p>
                    <button class="btn btn-primary mt-2 waves-effect waves-light" data-bs-target="#enableOTP" data-bs-toggle="modal"> فعال کردن احراز هویت دو مرحله ای</button>
                </div>
            </div>

            <!-- Modal -->
            <!-- Enable OTP Modal -->
            <div class="modal fade" id="enableOTP" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button aria-label="بستن" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">فعال کردن رمز عبور یکبار</h3>
                                <p>شماره تلفن همراه خود را برای پیامک تأیید کنید</p>
                            </div>
                            <p> شماره تلفن همراه خود را با کد کشور وارد کنید و ما یک کد تأیید برای شما ارسال خواهیم کرد.</p>
                            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" id="enableOTPForm" onsubmit="return false" novalidate="novalidate">
                                <div class="col-12 fv-plugins-icon-container">
                                    <label class="form-label" for="modalEnableOTPPhone">شماره تلفن</label>
                                    <div class="input-group has-validation">
                                        <input class="form-control phone-number-otp-mask ltr" id="modalEnableOTPPhone" name="modalEnableOTPPhone" placeholder="910 000 0000" type="text">
                                        <span class="input-group-text">IR (+98)</span>
                                    </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary me-sm-3 me-1 waves-effect waves-light" type="submit">ارسال کد</button>
                                    <button aria-label="بازگشت" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" type="reset">بازگشت</button>
                                </div>
                            <input type="hidden"></form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Enable OTP Modal -->
            <!-- /Modal -->
            <!--/ Two-steps verification -->

        </div>
    </div>
</div>
<!-- / Content -->

@endsection