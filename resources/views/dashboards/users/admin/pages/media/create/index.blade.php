@extends('dashboards.users.admin.master')
@section('main')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-0">
            <span class="text-muted fw-light">مدیریت رسانه /</span>
            افزودن رسانه
        </h4>
        <div class="media">
            <form action="{{route('admin.dashboard.media.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Add Blog Category -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1 mt-3">یک رسانه جدید اضافه کنید</h4>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <a class="btn btn-label-secondary" href="{{route('admin.dashboard.media.index')}}">
                                بازگشت
                            </a>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            بارگذاری
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Blog Category Information -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">
                                    بارگذاری رسانه
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="formFile">انتخاب رسانه</label>
                                    <span class="text-danger">*</span>
                                    <input class="form-control" id="formFile" type="file" name="file">
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    @error("fileValidation")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <input type="hidden" name="fileValidation">
                                </div>
                            </div>
                            
                            <div class="">
                                <ul>
                                    <li>
                                        تصویر با فرمت JPG و PNG مجاز است و حجم تصویر مجاز برای بارگذاری حداکثر 4 مگابایت می باشد.
                                    </li>
                                    <li>
                                        نوع فایل مجاز برای آپلود ویدئو mp4 ،flv و mkv است و حداکثر حجم مجاز ویدئو 100 مگابایت می باشد.
                                    </li>
                                </ul>
                            </div>
                           
                        </div>
                        <!-- /Blog Category Information -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- / Content --> 
</div>
<!-- Content wrapper -->

@endsection