@extends('dashboards.users.admin.master')
@section('main')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="content-wrapper">
        <div class="card">

            <h5 class="card-header">
                افزودن دسته بندی
            </h5>

            <form action="{{route('admin.dashboard.category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="category_name">
                            عنوان دسته بندی
                        </label>
                        <span class="text-danger">*</span>
                        <input aria-describedby="defaultFormControlHelp" class="form-control" id="category_name" placeholder="عنوان" type="text" name="category_name" value="{{old('category_name')}}">
                        @error("category_name")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <div class="form-text" id="defaultFormControlHelp"> 
                            عنوان دسته بندی را وارد نمایید    
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="formFile">انتخاب تصویر دسته بندی</label>
                        <input class="form-control" id="formFile" type="file" name="img">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="choose-sub-category">انتخاب دسته اصلی یا مادر</label>
                        <span class="text-danger">*</span>
                        <select aria-label="انتخاب دسته اصلی" class="form-select" id="choose-sub-category" name='parent'>
                            <option value="" selected="" disabled>دسته بندی اصلی را انتخاب نمایید</option>
                            <option value="0">
                                دسته اصلی
                            </option>
                            @foreach ($categories as $categoryItem)
                                <option value="{{$categoryItem->id}}">
                                    {{$categoryItem->category_name}}    
                                </option>
                            @endforeach
                        </select>
                        @error("parent")
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-md-end mt-3">
                            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a class="btn btn-secondary create-new btn-secondary waves-effect waves-light me-2" href="{{route('admin.dashboard.category.index')}}">
                                        <span>
                                            <i class="ti ti-circle-x me-sm-1"></i> 
                                            <span class="d-none d-sm-inline-block">
                                                انصراف
                                            </span>
                                        </span>
                                    </a> 
                                    <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" type="submit">
                                        <span>
                                            <i class="ti ti-device-floppy me-sm-1"></i> 
                                            <span class="d-none d-sm-inline-block">
                                                ذخیره
                                            </span>
                                        </span>
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        
        </div>    
    </div>    
</div>    


@endsection