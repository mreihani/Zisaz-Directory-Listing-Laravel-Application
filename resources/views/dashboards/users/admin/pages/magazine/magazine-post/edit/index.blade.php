@extends('dashboards.users.admin.master')
@section('main')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-0">
            <span class="text-muted fw-light">مدیریت مجله /</span>
            <span class="text-muted fw-light">مدیریت مقالات /</span>
            بروزرسانی مقاله
        </h4>
        <div class="app-magazine">
            <form action="{{route('admin.dashboard.magazine.post.update', $magPost->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- Add Magazine Post -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1 mt-3">مقاله مورد نظر را بروزرسانی کنید</h4>
                        <p class="text-muted">مقالات ثبت شده که در سراسر سامانه شما نمایش داده می شود</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <a class="btn btn-label-secondary" href="{{route('admin.dashboard.magazine.post.index')}}">
                                بازگشت
                            </a>
                        </div>
                        <button class="btn btn-primary" type="submit">بروزرسانی مقاله</button>
                    </div>
                </div>
                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-8">
                        <!-- Magazine Post Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">اطلاعات مقاله</h5>
                            </div>
                            <div class="card-body">
                                <!-- Magazine Title -->
                                <div class="mb-3">
                                    <label class="form-label" for="magazine-post-title">عنوان مقاله</label>
                                    <span class="text-danger">*</span>
                                    <input aria-label="عنوان مقاله" class="form-control" id="magazine-post-title" name="title" placeholder="عنوان مقاله را وارد نمایید" type="text" value="{{old('title', $magPost->title)}}" />
                                    @error("title")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!-- Magazine slug -->
                                <div class="mb-3">
                                    <label class="form-label" for="magazine-post-slug">اسلاگ مقاله (اسلاگ باید انگلیسی باشد)</label>
                                    <span class="text-danger">*</span>
                                    <input aria-label="اسلاگ مقاله" class="form-control" id="magazine-post-slug" name="slug" placeholder="اسلاگ مقاله را وارد نمایید" type="text" value="{{old('slug', $magPost->slug)}}" />
                                    @error("slug")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!-- Magazine Body text -->
                                <div>
                                    <label class="form-label">
                                        متن مقاله
                                    </label>
                                    <span class="text-danger">*</span>
                                    @error("body")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <textarea id="zisaz-magazine-post-editor" name="body">{{old('body', $magPost->body)}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /Magazine Information -->

                        <!-- Magazine SEO Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">اطلاعات سئوی مقاله</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="magazine-meta-title">
                                        عنوان متا
                                    </label>
                                    <span class="text-danger">*</span>
                                    <input aria-label="عنوان متا" class="form-control" id="magazine-meta-title" name="meta_title" placeholder="عنوان متا را وارد نمایید" type="text" value="{{old('meta_title', $magPost->meta_title)}}" />
                                    @error("meta_title")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="magazine-meta-description">
                                        توضیحات متا
                                    </label>
                                    <span class="text-danger">*</span>
                                    <textarea class="form-control" id="magazine-meta-description" name="meta_description" rows="3" placeholder="توضیحات متای مربوط به سئوی مقاله را وارد نمایید">{{old('meta_description', $magPost->meta_description)}}</textarea>
                                    @error("meta_description")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="magazine-meta-keywords">
                                        کلمات کلیدی سئو
                                    </label>
                                    <span class="text-danger">*</span>
                                    <label class="form-label" for="magazine-meta-keywords">
                                        (
                                            کلمات کلیدی بایستی با کلمه به همراه ویرگول و فاصله اضافه گردد
                                        )
                                    </label>
                                    <input aria-label="کلمات کلیدی" class="form-control" id="magazine-meta-keywords" name="meta_keywords" placeholder="صنعت ساختمان، پیمانکار، میلگرد، بتن، قرارداد مشارکت در ساخت" type="text" value="{{old('meta_keywords', $magPost->meta_keywords)}}" />
                                    @error("meta_keywords")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /Magazine SEO Information -->
                    </div>
                    <!-- /Second column --> <!-- Second column -->
                    <div class="col-12 col-lg-4">

                        <!-- Media -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 card-title">
                                    تصویر مقاله
                                </h5>
                            </div>
                            <div class="">
                                <ul>
                                    <li>
                                        فقط تصویر با فرمت JPG و PNG مجاز است   
                                    </li>
                                    <li>
                                        حجم تصویر مجاز برای بارگذاری حداکثر 4 مگابایت است
                                    </li>
                                </ul>
                            </div>
                            <div class="card-header d-flex justify-content-between align-items-center">
                                @error("imageValidation")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <input type="hidden" name="imageValidation">
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <input type="file" accept=".jpg, .jpeg, .png" id="file-upload" class="d-none" name="image">
                                <img src="{{asset($magPost->image)}}" alt="تصویر مقاله را انتخاب نمایید" id="file-preview" class="dropzone needsclick dz-clickable text-center" onerror="this.src='{{asset('assets/dashboards/assets/img/jaban/image-up.svg')}}'">
                            </div>
                        </div>
                        <!-- /Media -->

                        <!-- Sponsored magazines --> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    دسته بندی مقاله
                                </h5>
                            </div>
                            <div class="card-body">
                                
                                <!-- Category -->
                                <div class="mb-3 col ecommerce-select2-dropdown">
                                    <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="magazine-category-selection">
                                        <span>
                                            دسته
                                            <span class="text-danger">*</span>
                                        </span>
                                        <a class="fw-medium" href="{{route('admin.dashboard.magazine.category.create')}}">اضافه کردن دسته جدید</a>
                                    </label>
                                    @if($magCategories->count())
                                        <select class="select2 form-select" data-placeholder="انتخاب دسته" id="magazine-category-selection" name="mag_category_id">
                                            <option value="" disabled selected>دسته بندی مقاله را انتخاب کنید</option>
                                            @foreach ($magCategories as $magCategoryItem)
                                                <option {{$magPost->mag_category_id == $magCategoryItem->id ? 'selected' : ''}} value="{{$magCategoryItem->id}}">
                                                    {{$magCategoryItem->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                                            <span class="alert-icon text-warning me-2">
                                                <i class="ti ti-alert-triangle"></i>
                                            </span>
                                            هیچ دسته بندی مرتبط با مقالات یافت نشد! لطفا قبل از انتشار مقاله، ابتدا یک دسته بندی در سامانه تعریف نمایید.
                                        </div>
                                    @endif
                                    @error("mag_category_id")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <!-- Vendor -->
                                <div class="mb-4 col ecommerce-select2-dropdown">
                                    <label class="form-label mb-1" for="magazine-status"> وضعیت مقاله</label>
                                    <select class="select2 form-select" data-placeholder="انتخاب وضعیت مقاله" id="magazine-status" name="review_status">
                                        <option value="" disabled selected>وضعیت مقاله را انتخاب کنید</option>
                                        <option {{$magPost->review_status == 1 ? 'selected' : ''}} value="1">
                                            منتشر شده
                                        </option>
                                        <option {{$magPost->review_status == 0 ? 'selected' : ''}} value="0">
                                            در حال بازبینی
                                        </option>
                                    </select>
                                    @error("review_status")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /Organize Card -->
                    </div>
                    <!-- /Second column -->
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
    <link href="{{asset('assets/dashboards/assets/vendor/libs/dropzone/dropzone.css')}}" rel="stylesheet"/>
@endpush

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/vendor/libs/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/js/app-ecommerce-product-add.js')}}"></script>

    <script src="{{asset('assets/dashboards/assets/vendor/libs/tinymce_7.2.0/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#zisaz-magazine-post-editor',
            directionality : {!! json_encode($zisazYinyMceConfig['directionality']) !!},
            plugins: {!! json_encode($zisazYinyMceConfig['plugins']) !!},
            toolbar: {!! json_encode($zisazYinyMceConfig['toolbar']) !!},
            fontsize_formats: {!! json_encode($zisazYinyMceConfig['fontsize_formats']) !!},
        });
    </script>
    <script>
        // show image after selection
        const previewPhoto = () => {
            const file = input.files;
            if (file) {
                const fileReader = new FileReader();
                const preview = document.getElementById('file-preview');
                fileReader.onload = event => {
                    preview.setAttribute('src', event.target.result);
                }
                fileReader.readAsDataURL(file[0]);
            }
        }

        const input = document.getElementById('file-upload');
        input.addEventListener('change', previewPhoto);

        document.getElementById('file-preview').addEventListener('click', e => {
            input.click();
        });
    </script>
@endpush

@endsection

