<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش اطلاعات مربوط به کسب و کار خود را در 3 قسمت مختلف زیر برای کاربران نمایش دهید.
                    </li>
                    <li>
                        این بخش اختیاری است بنابراین نمایش یا عدم نمایش آن را می توانید با چک باکس زیر کنترل کنید.
                    </li>
                </ul>
            </div>

            <!-- Display settins-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-eye-on text-primary fs-5 mt-n1 me-2"></i>
                تنظیمات نمایش بخش
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="is-section-displayed" wire:model="isDisplayed">
                        <label class="form-check-label" for="is-section-displayed">
                            با تایید این گزینه این بخش در وبسایت شما نمایش داده خواهد شد
                        </label>
                    </div>
                </div>
            </div>

            <!-- About information-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات درباره ما
            </h2>

            <div class="row">

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-about-us-title">
                        عنوان اصلی
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="text" id="pr-business-about-us-title" placeholder="عنوان اصلی بخش درباره ما را وارد کنید" wire:model="title">

                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-about-us">
                        درباره ما
                    </label>
                    <span class="text-danger">*</span>

                    <textarea class="form-control" rows="5" id="pr-business-about-us" placeholder="توضیحات کوتاه در مورد کسب و کار خود وارد کنید" wire:model="aboutUs"></textarea>

                    @if($errors->has('aboutUs'))
                        <span class="text-danger">{{ $errors->first('aboutUs') }}</span>
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-about-us">
                        مجوز ها و افتخارات
                    </label>
                    <span class="text-danger">*</span>

                    <textarea class="form-control" rows="5" id="pr-business-about-us" placeholder="توضیحات کوتاه در مورد مجوز ها و افتخارات خود وارد کنید" wire:model="licenses"></textarea>

                    @if($errors->has('licenses'))
                        <span class="text-danger">{{ $errors->first('licenses') }}</span>
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-about-us">
                        تماس با ما
                    </label>
                    <span class="text-danger">*</span>

                    <textarea class="form-control" rows="5" id="pr-business-about-us" placeholder="توضیحات کوتاه تماس با ما را وارد کنید" wire:model="contactUs"></textarea>

                    @if($errors->has('contactUs'))
                        <span class="text-danger">{{ $errors->first('contactUs') }}</span>
                    @endif
                </div>
            </div>

            <!-- Upload Image -->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-image text-primary fs-5 mt-n1 me-2"></i>
                بارگذاری تصویر
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-description">
                        تصویر را بارگذاری نمایید
                        <span class="text-danger">*</span>
                    </label>

                    <label>
                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                    </label>

                    @error('image') <div class="text-danger error mb-2">{{ $message }}</div> @enderror
            
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="mb-3">
                                <input class="form-control" type="file" wire:model="image">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            @if($image !== "") 
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{$image->temporaryUrl()}}">    
                                    </div>
                                </div>  
                            @endif
                        </div>
                    </div>
            
                </div>
            </div>   

        </div>

        <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
            <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" wire:click.prevent="back">
                <i class="fi-chevron-left fs-sm me-2"></i>
                مرحله قبل
            </a>
            <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                مرحله بعد
                <i class="fi-chevron-right fs-sm ms-2"></i>
            </button>
        </div>

    </form> 
</div>