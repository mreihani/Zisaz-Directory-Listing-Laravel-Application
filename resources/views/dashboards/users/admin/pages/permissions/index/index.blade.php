@extends('dashboards.users.admin.master')
@section('main')

<!-- Content wrapper -->
<div class="content-wrapper">

    <div class="container-xxl">
        @if(session()->has('success'))
            <div class="alert alert-icon alert-success alert-bg alert-inline show-code-action mt-3 mb-0">
                <i style="color:#50cd89" class="fas fa-check"></i> {{session('success')}}
            </div>
        @endif
    
        @if(session()->has('error'))
            <div class="alert alert-icon alert-warning alert-bg alert-inline show-code-action mt-3 mb-0">
                <i class="fa-solid fa-xmark-circle"></i> {{session('error')}}
            </div>
        @endif
    
        @foreach($errors->all() as $error)
            <div class="alert alert-icon alert-warning alert-bg alert-inline show-code-action mt-3 mb-0">
                <i class="fa-solid fa-xmark-circle"></i> {{session('error')}}
            </div>
        @endforeach
    </div>
    
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-0">
            <span class="text-muted fw-light">تعیین سطوح دسترسی</span>
        </h4>
        <div class="media">
            <form action="{{route('admin.dashboard.permissions.store')}}" method="POST">
                @csrf
                <!-- Add Permission -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1 mt-3">
                            مجوز ها و سطوح دسترسی کاربران را تعیین نمایید
                        </h4>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <a class="btn btn-label-secondary" href="{{route('admin.dashboard.index')}}">
                                بازگشت
                            </a>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            ذخیره
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md mb-4 mb-md-2">
                        <div class="accordion mt-3" id="accordionExample">
                            <div class="card accordion-item active">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionOne" aria-expanded="true" class="accordion-button" data-bs-target="#accordionOne" data-bs-toggle="collapse" type="button"> دسته بندی ها</button>
                                </h2>
                                <div class="accordion-collapse collapse show" data-bs-parent="#accordionExample" id="accordionOne">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش دسته بندی ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(3, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[3]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(3, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[3]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(3, $marketerRole) ? 'checked' : ''}} name="marketer[3]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(3, $editorRole) ? 'checked' : ''}} name="editor[3]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                افزودن دسته بندی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(1, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[1]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(1, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[1]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(1, $marketerRole) ? 'checked' : ''}} name="marketer[1]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(1, $editorRole) ? 'checked' : ''}} name="editor[1]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ویرایش دسته بندی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(2, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[2]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(2, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[2]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(2, $marketerRole) ? 'checked' : ''}} name="marketer[2]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(2, $editorRole) ? 'checked' : ''}} name="editor[2]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف دسته بندی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(4, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[4]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(4, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[4]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(4, $marketerRole) ? 'checked' : ''}} name="marketer[4]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(4, $editorRole) ? 'checked' : ''}} name="editor[4]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionTwo" aria-expanded="true" class="accordion-button" data-bs-target="#accordionTwo" data-bs-toggle="collapse" type="button"> بنر ها</button>
                                </h2>
                                <div class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="accordionTwo">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش بنر ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(5, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[5]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(5, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[5]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(5, $marketerRole) ? 'checked' : ''}} name="marketer[5]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(5, $editorRole) ? 'checked' : ''}} name="editor[5]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ذخیره بنر ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(6, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[6]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(6, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[6]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(6, $marketerRole) ? 'checked' : ''}} name="marketer[6]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(6, $editorRole) ? 'checked' : ''}} name="editor[6]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionThree" aria-expanded="true" class="accordion-button" data-bs-target="#accordionThree" data-bs-toggle="collapse" type="button"> مدیریت مجله</button>
                                </h2>
                                <div class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="accordionThree">
                                    <div class="card-body">

                                        <p>
                                            دسته بندی مجله
                                        </p>

                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش دسته بندی ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(9, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[9]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(9, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[9]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(9, $marketerRole) ? 'checked' : ''}} name="marketer[9]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(9, $editorRole) ? 'checked' : ''}} name="editor[9]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                افزودن دسته بندی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(7, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[7]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(7, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[7]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(7, $marketerRole) ? 'checked' : ''}} name="marketer[7]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(7, $editorRole) ? 'checked' : ''}} name="editor[7]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ویرایش دسته بندی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(8, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[8]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(8, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[8]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(8, $marketerRole) ? 'checked' : ''}} name="marketer[8]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(8, $editorRole) ? 'checked' : ''}} name="editor[8]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف دسته بندی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(10, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[10]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(10, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[10]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(10, $marketerRole) ? 'checked' : ''}} name="marketer[10]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(10, $editorRole) ? 'checked' : ''}} name="editor[10]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <p>
                                            مقاله
                                        </p>

                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش لیست مقالات
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(13, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[13]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(13, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[13]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(13, $marketerRole) ? 'checked' : ''}} name="marketer[13]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(13, $editorRole) ? 'checked' : ''}} name="editor[13]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                افزودن مقاله
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(11, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[11]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(11, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[11]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(11, $marketerRole) ? 'checked' : ''}} name="marketer[11]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(11, $editorRole) ? 'checked' : ''}} name="editor[11]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ویرایش مقاله
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(12, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[12]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(12, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[12]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(12, $marketerRole) ? 'checked' : ''}} name="marketer[12]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(12, $editorRole) ? 'checked' : ''}} name="editor[12]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف مقاله
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(14, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[14]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(14, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[14]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(14, $marketerRole) ? 'checked' : ''}} name="marketer[14]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(14, $editorRole) ? 'checked' : ''}} name="editor[14]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionFour" aria-expanded="true" class="accordion-button" data-bs-target="#accordionFour" data-bs-toggle="collapse" type="button"> رسانه</button>
                                </h2>
                                <div class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="accordionFour">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش رسانه
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(16, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[16]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(16, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[16]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(16, $marketerRole) ? 'checked' : ''}} name="marketer[16]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(16, $editorRole) ? 'checked' : ''}} name="editor[16]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                افزودن رسانه
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(15, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[15]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(15, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[15]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(15, $marketerRole) ? 'checked' : ''}} name="marketer[15]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(15, $editorRole) ? 'checked' : ''}} name="editor[15]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف رسانه
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(17, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[17]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(17, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[17]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(17, $marketerRole) ? 'checked' : ''}} name="marketer[17]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(17, $editorRole) ? 'checked' : ''}} name="editor[17]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionFive" aria-expanded="true" class="accordion-button" data-bs-target="#accordionFive" data-bs-toggle="collapse" type="button"> کاربران</button>
                                </h2>
                                <div class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="accordionFive">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش کاربران
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(20, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[20]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(20, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[20]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(20, $marketerRole) ? 'checked' : ''}} name="marketer[20]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(20, $editorRole) ? 'checked' : ''}} name="editor[20]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                افزودن کاربر
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(18, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[18]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(18, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[18]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(18, $marketerRole) ? 'checked' : ''}} name="marketer[18]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(18, $editorRole) ? 'checked' : ''}} name="editor[18]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ویرایش کاربر
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(19, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[19]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(19, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[19]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(19, $marketerRole) ? 'checked' : ''}} name="marketer[19]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(19, $editorRole) ? 'checked' : ''}} name="editor[19]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف کاربر
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(21, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[21]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(21, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[21]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(21, $marketerRole) ? 'checked' : ''}} name="marketer[21]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(21, $editorRole) ? 'checked' : ''}} name="editor[21]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionSix" aria-expanded="true" class="accordion-button" data-bs-target="#accordionSix" data-bs-toggle="collapse" type="button"> فعالیت کاربران</button>
                                </h2>
                                <div class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="accordionSix">
                                    <div class="card-body">
                                        <p>
                                            آگهی ها
                                        </p>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش آگهی ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(22, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[22]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(22, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[22]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(22, $marketerRole) ? 'checked' : ''}} name="marketer[22]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(22, $editorRole) ? 'checked' : ''}} name="editor[22]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ویرایش آگهی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(23, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[23]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(23, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[23]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(23, $marketerRole) ? 'checked' : ''}} name="marketer[23]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(23, $editorRole) ? 'checked' : ''}} name="editor[23]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                بازیابی آگهی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(24, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[24]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(24, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[24]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(24, $marketerRole) ? 'checked' : ''}} name="marketer[24]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(24, $editorRole) ? 'checked' : ''}} name="editor[24]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف آگهی
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(25, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[25]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(25, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[25]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(25, $marketerRole) ? 'checked' : ''}} name="marketer[25]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(25, $editorRole) ? 'checked' : ''}} name="editor[25]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            کسب و کار ها
                                        </p>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش کسب و کار ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(26, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[26]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(26, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[26]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(26, $marketerRole) ? 'checked' : ''}} name="marketer[26]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(26, $editorRole) ? 'checked' : ''}} name="editor[26]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ویرایش کسب و کار
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(27, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[27]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(27, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[27]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(27, $marketerRole) ? 'checked' : ''}} name="marketer[27]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(27, $editorRole) ? 'checked' : ''}} name="editor[27]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                بازیابی کسب و کار
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(28, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[28]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(28, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[28]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(28, $marketerRole) ? 'checked' : ''}} name="marketer[28]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(28, $editorRole) ? 'checked' : ''}} name="editor[28]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف کسب و کار
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(29, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[29]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(29, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[29]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(29, $marketerRole) ? 'checked' : ''}} name="marketer[29]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(29, $editorRole) ? 'checked' : ''}} name="editor[29]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            پروژه ها
                                        </p>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش پروژه ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(30, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[30]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(30, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[30]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(30, $marketerRole) ? 'checked' : ''}} name="marketer[30]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(30, $editorRole) ? 'checked' : ''}} name="editor[30]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ویرایش پروژه
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(31, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[31]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(31, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[31]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(31, $marketerRole) ? 'checked' : ''}} name="marketer[31]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(31, $editorRole) ? 'checked' : ''}} name="editor[31]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                بازیابی پروژه
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(32, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[32]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(32, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[32]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(32, $marketerRole) ? 'checked' : ''}} name="marketer[32]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(32, $editorRole) ? 'checked' : ''}} name="editor[32]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                حذف پروژه
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(33, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[33]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(33, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[33]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(33, $marketerRole) ? 'checked' : ''}} name="marketer[33]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(33, $editorRole) ? 'checked' : ''}} name="editor[33]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionSeven" aria-expanded="true" class="accordion-button" data-bs-target="#accordionSeven" data-bs-toggle="collapse" type="button"> بازدید ها</button>
                                </h2>
                                <div class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="accordionSeven">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش بازدید ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(34, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[34]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(34, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[34]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(34, $marketerRole) ? 'checked' : ''}} name="marketer[34]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(34, $editorRole) ? 'checked' : ''}} name="editor[34]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button aria-controls="accordionEight" aria-expanded="true" class="accordion-button" data-bs-target="#accordionEight" data-bs-toggle="collapse" type="button"> مجوز ها</button>
                                </h2>
                                <div class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="accordionEight">
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            عنوان دسترسی
                                                        </th>
                                                        <th>
                                                            مدیران
                                                        </th>
                                                        <th>پشتیبان ارشد</th>
                                                        <th>پشتیبانی سطح 1</th>
                                                        <th>بازاریاب</th>
                                                        <th>
                                                            نویسنده
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                نمایش مجوز ها
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(35, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[35]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(35, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[35]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(35, $marketerRole) ? 'checked' : ''}} name="marketer[35]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(35, $editorRole) ? 'checked' : ''}} name="editor[35]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-medium">
                                                                ذخیره مجوز
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input checked="" class="form-check-input" disabled="" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(36, $seniorSupportRole) ? 'checked' : ''}} name="senior_support[36]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(36, $supportLevelOneRole) ? 'checked' : ''}} name="support_level_one[36]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(36, $marketerRole) ? 'checked' : ''}} name="marketer[36]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check mt-2">
                                                                <input class="form-check-input" type="checkbox" {{in_array(36, $editorRole) ? 'checked' : ''}} name="editor[36]">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- / Content --> 
</div>
<!-- Content wrapper -->

@endsection