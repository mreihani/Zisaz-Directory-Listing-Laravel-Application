@extends('dashboards.users.admin.master')
@section('main')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-0">
            <span class="text-muted fw-light">مدیریت کاربران /</span>
            افزودن کاربر
        </h4>
        <div class="app-magazine">
            <form action="{{route('admin.dashboard.user.store')}}" method="POST" novalidate>

                @csrf

                <!-- Add Magazine Post -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1 mt-3">یک کاربر جدید اضافه کنید</h4>
                        <p class="text-muted">
                            کاربر اضافه شده می تواند در سامانه فعالیت نماید
                        </p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <a class="btn btn-label-secondary" href="{{route('admin.dashboard.users.index')}}">
                                بازگشت
                            </a>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            افزودن کاربر
                        </button>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">
                        اطلاعات کاربر
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="firstname">نام</label>
                                <span class="text-danger">*</span>
                                <input autofocus class="form-control" id="firstname" name="firstname" type="text" placeholder="نام کاربر را وارد نمایید" value="{{old('firstname')}}" />
                                @error("firstname")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="lastname">نام خانوادگی</label>
                                <span class="text-danger">*</span>
                                <input class="form-control" id="lastname" name="lastname" type="text" placeholder="نام خانوادگی کاربر را وارد نمایید" value="{{old('lastname')}}" />
                                @error("lastname")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">شماره تلفن</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-merge">
                                    <input class="form-control ltr" id="phoneNumber" name="phone" placeholder="0910 000 0000" type="text" value="{{old('phone')}}" />
                                </div>
                                @error("phone")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="email">ایمیل</label>
                                <span class="form-label">
                                    (اختیاری)
                                </span>
                                <input class="form-control" id="email" name="email" placeholder="email@example.com" type="email" value="{{old('email')}}" />
                                @error("email")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="account-type">
                                    نوع حساب کاربری
                                </label>
                                <span class="text-danger">*</span>
                                <select class="select2 form-select" id="account-type" name="account_type">
                                    <option disabled selected value="">سطح دسترسی حساب کاربری را انتخاب نمایید</option>
                                    <option value="admin" {{old('account_type') == 'admin' ? 'selected' : ''}}>
                                        مدیر
                                    </option>
                                    <option value="construction" {{old('account_type') == 'construction' ? 'selected' : ''}}>
                                        کاربر عادی
                                    </option>
                                </select>
                                @error("account_type")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6 d-none">
                                <label class="form-label" for="password">کلمه عبور</label>
                                <span class="text-danger">*</span>
                                <label class="form-label" for="password">
                                    (حداقل 8 کاراکتر الزامی است)
                                </label>
                                <input class="form-control" id="password" name="password" placeholder="******" type="password" />
                                @error("password")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->

@push('page-styles')
    <link href="{{asset('assets/dashboards/assets/vendor/libs/select2/select2.css')}}" rel="stylesheet"/>
@endpush

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/js/app-ecommerce-product-add.js')}}"></script>
    <script>
        document.getElementById('account-type').addEventListener('change', function() {
            var selectedValue = this.value;
            var passwordField = document.getElementById('password');
        
            if (selectedValue === 'admin') {
                passwordField.parentNode.classList.remove('d-none');
            } else {
                passwordField.parentNode.classList.add('d-none');
            }
        });
    </script>
    <script>
        let accountType = {!! json_encode(old('account_type')) !!};
        var passwordField = document.getElementById('password');
    
        if (accountType == 'admin') {
            passwordField.parentNode.classList.remove('d-none');
        } else {
            passwordField.parentNode.classList.add('d-none');
        }
    </script>
@endpush

@endsection

