@extends('dashboards.users.admin.master')
@section('main')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-0">
            <span class="text-muted fw-light">مدیریت مجله /</span>
            <span class="text-muted fw-light">مدیریت دسته بندی ها /</span>
            ویرایش دسته بندی
        </h4>
        <div class="magazine">
            <form action="{{route('admin.dashboard.magazine.category.update', $magCategory->id)}}" method="POST">
                @method('PUT')
                @csrf

                <!-- Add Blog Category -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1 mt-3">دسته بندی مورد نظر را ویرایش کنید</h4>
                        <p class="text-muted">
                            مقالاتی که در سامانه منتشر می کنید می تواند در این دسته بندی قرار گیرند
                        </p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <a class="btn btn-label-secondary" href="{{route('admin.dashboard.magazine.category.index')}}">
                                بازگشت
                            </a>
                        </div>
                        <button class="btn btn-primary" type="submit">بروزرسانی دسته بندی</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Blog Category Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">اطلاعات دسته بندی</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="zisaz-magazine-category-name">
                                        عنوان دسته بندی
                                    </label>
                                    
                                    <span class="text-danger">*</span>
                                    <input class="form-control mb-2" id="zisaz-magazine-category-name" name="title" value="{{old('title', $magCategory->title)}}" placeholder="عنوان دسته بندی مقاله را وارد نمایید" type="text"/>
                                    @error("title")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
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