@extends('dashboards.users.admin.master')
@section('main')

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/js/pages-account-settings-account.js')}}"></script>
@endpush

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">تنظیمات حساب /</span>
        حساب کاربری
    </h4>
    <div class="row fv-plugins-icon-container">
        <div class="col-md-12">
            
            @include('dashboards.users.admin.pages.account-settings.layouts.header')

            <div class="card mb-4">
                <h5 class="card-header">جزئیات پروفایل</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img alt="کاربر-آواتار" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" src="{{asset('assets/dashboards/assets/img/jaban/user.png')}}">
                        <div class="button-wrapper">
                            <label class="btn btn-primary me-2 mb-3 waves-effect waves-light" for="upload" tabindex="0">
                                <span class="d-none d-sm-block">آپلود عکس جدید</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input accept="image/png, image/jpeg" class="account-file-input" hidden="" id="upload" type="file">
                            </label>
                            <button class="btn btn-label-secondary account-image-reset mb-3 waves-effect" type="button">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">حذف عکس</span>
                            </button>
                            <div class="text-muted">حداکثر 5 مگابایت و با فرمت png , jpeg , jpg</div>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <form id="formAccountSettings" method="GET" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row">
                            <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="firstname">نام</label>
                                <input autofocus="" class="form-control" id="firstname" name="firstname" type="text" value="{{old('firstname', $user->firstname)}}">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="lastname">نام خانوادگی</label>
                                <input class="form-control" id="lastname" name="lastname" type="text" value="{{old('lastname', $user->lastname)}}">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="email">ایمیل</label>
                                <input class="form-control" id="email" value="{{$user->email}}" disabled>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="organization">سازمان</label>
                                <input class="form-control" id="organization" value="سامانه جابان">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">شماره تلفن</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control ltr" id="phoneNumber" name="phoneNumber" placeholder="0910 000 0000" type="text" value="{{old('phone', $user->phone)}}">
                                    {{-- <span class="input-group-text">IR (+98)</span> --}}
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="address">آدرس</label>
                                <input class="form-control" id="address" name="address" placeholder="ایران ، تهران ..." type="text">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="state">استان</label>
                                <input class="form-control" id="state" name="state" placeholder="تهران" type="text">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="zipCode">کد پستی</label>
                                <input class="form-control" id="zipCode" maxlength="6" name="zipCode" placeholder="231465" type="text">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary me-2 waves-effect waves-light" type="submit">ذخیره تغییرات</button>
                            <button class="btn btn-label-secondary waves-effect" type="reset">لغو</button>
                        </div>
                    <input type="hidden"></form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection