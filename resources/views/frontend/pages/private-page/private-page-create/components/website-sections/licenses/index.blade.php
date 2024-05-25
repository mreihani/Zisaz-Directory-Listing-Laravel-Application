<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید مجوزها و افتخارات خود را برای کاربران نمایش دهید.
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
                اطلاعات مجوز ها
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-description">
                        توضیحات
                    </label>
                    <span class="text-danger">*</span>
                    <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control form-control-md" type="text" id="pr-business-header-description" placeholder="توضیحات مرتبط با مجوزهای خود را وارد نمایید" wire:model="headerDescription">

                    @if($errors->has('headerDescription'))
                        <span class="text-danger">{{ $errors->first('headerDescription') }}</span>
                    @endif
                </div>
            </div>

            <!-- License repeater-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-award text-primary fs-5 mt-n1 me-2"></i>
                بارگذاری مجوز ها
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <hr class="mb-4 mt-2">

                    @foreach ($itemInputs as $itemKey => $itemValue)
                        @if(count($itemImages) && isset($itemImages[$itemValue]) && is_string($itemImages[$itemValue]))
                            <div class="row mt-3">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <!-- License title -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold" for="pr-description">
                                                            عنوان مجوز
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div>
                                                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" wire:model="itemTitle.{{$itemValue}}" placeholder="عنوان مجوز را وارد نمایید">
                                                        </div>
                                                        @error('itemTitle.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
        
                                                <!-- File uploader -->
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold" for="pr-image-upload">
                                                        تصویر مجوز را بارگذاری نمایید
                                                        <span class="text-danger">*</span>
                                                    </label>
            
                                                    <div class="mb-1">
                                                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="file" wire:model="itemImages.{{$itemValue}}">
                                                        @error('itemImages.'.$itemValue) <div class="text-danger error">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                                            <div class="border rounded-3 p-1" style="width: 150px;">
                                                <div class="d-flex justify-content-center p-1">
                                                    <img src="{{asset($itemImages[$itemValue])}}">    
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center align-items-center">
                                    <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeItem({{$itemKey}})">
                                        <i class="fi-trash fs-sm me-2"></i>
                                        حذف
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="row mt-3">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <!-- License title -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold" for="pr-description">
                                                            عنوان مجوز
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div>
                                                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" wire:model="itemTitle.{{$itemValue}}" placeholder="عنوان مجوز را وارد نمایید">
                                                        </div>
                                                        @error('itemTitle.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
        
                                                <!-- File uploader -->
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold" for="pr-image-upload">
                                                        تصویر مجوز را بارگذاری نمایید
                                                        <span class="text-danger">*</span>
                                                    </label>
            
                                                    <div class="mb-1">
                                                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="file" wire:model="itemImages.{{$itemValue}}">
                                                        @error('itemImages.'.$itemValue) <div class="text-danger error">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                                            @if(count($itemImages) && isset($itemImages[$itemValue])) 
                                                <div class="border rounded-3 p-1" style="width: 150px;">
                                                    <div class="d-flex justify-content-center p-1">
                                                        <img src="{{$itemImages[$itemValue]->temporaryUrl()}}">    
                                                    </div>
                                                </div>  
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center align-items-center">
                                    <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeItem({{$itemKey}})">
                                        <i class="fi-trash fs-sm me-2"></i>
                                        حذف
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                    <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addItem({{$itemIteration}})">
                        <i class="fi-plus fs-sm me-2"></i>
                        افزودن مجوز دیگر
                    </button>
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