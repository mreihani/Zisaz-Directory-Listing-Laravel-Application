<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید یک بنر تبلیغاتی بارگذاری و اطلاعات آن را برای کاربران به نمایش بگذارید.
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is-section-displayed" wire:model="isHidden" wire:change="changeDisplayStatus()">
                        <label class="form-check-label" for="is-section-displayed">
                            با تایید این گزینه این بخش در وبسایت شما مخفی خواهد شد
                        </label>
                    </div>
                </div>
            </div>

           <!-- About information-->
           <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات بنر تبلیغاتی
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-title">
                        عنوان
                    </label>
                    <span class="text-danger">*</span>
                    <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control form-control-md" type="text" id="pr-business-header-title" placeholder="عنوان بنر تبلیغاتی را وارد نمایید" wire:model="headerTitle">

                    @if($errors->has('headerTitle'))
                        <span class="text-danger">{{ $errors->first('headerTitle') }}</span>
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-description">
                        توضیحات
                    </label>
                    <span class="text-danger">*</span>
                    <textarea {{ $isHidden == true ? 'disabled' : '' }} class="form-control form-control-md" type="text" id="pr-business-header-description" placeholder="توضیحات بنر تبلیغاتی را وارد نمایید" wire:model="headerDescription"></textarea>

                    @if($errors->has('headerDescription'))
                        <span class="text-danger">{{ $errors->first('headerDescription') }}</span>
                    @endif
                </div>
            </div>

            <!-- Upload Image -->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-image text-primary fs-5 mt-n1 me-2"></i>
                بارگذاری تصویر
                <span>
                    (اختیاری)
                </span>
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-description">
                        تصویر را بارگذاری نمایید
                    </label>

                    <label>
                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                    </label>

                    <input type="hidden" wire:model="imageValidation">

                    @if($errors->has('imageValidation'))
                        <div class="text-danger">{{ $errors->first('imageValidation') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="mb-3">
                                <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="file" wire:model="image">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            @if($image !== null && !is_string($image)) 
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{$image->temporaryUrl()}}">    
                                    </div>
                                </div>
                            @elseif($image !== null && is_string($image))
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{asset($image)}}">    
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