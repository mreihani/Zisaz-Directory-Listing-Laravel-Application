<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید اعضای تیم خود را به کاربران معرفی نمایید.
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
                اطلاعات اعضای تیم
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    @foreach ($itemInputs as $itemKey => $itemValue)
                        @if(count($itemImages) && isset($itemImages[$itemValue]) && is_string($itemImages[$itemValue]))
                            <div class="row mt-3">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <!-- Person Fullname -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold" for="pr-description">
                                                            نام و نام خانوادگی عضو تیم شما
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div>
                                                            <input disabled class="form-control" type="text" wire:model="itemFullname.{{$itemValue}}" placeholder="نام و نام خانوادگی شخص مورد نظر را وارد نمایید">
                                                        </div>
                                                        @error('itemFullname.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>

                                                <!-- Person Role -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold" for="pr-description">
                                                            سمت فرد مورد نظر
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div>
                                                            <input disabled class="form-control" type="text" wire:model="itemRole.{{$itemValue}}" placeholder="سمت فرد را وارد نمایید">
                                                        </div>
                                                        @error('itemRole.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
        
                                                <!-- File uploader -->
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold" for="pr-image-upload">
                                                        تصویر شخص مورد نظر را بارگذاری نمایید
                                                        <span class="text-danger">*</span>
                                                    </label>
            
                                                    <div class="mb-1">
                                                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <input disabled class="form-control" type="file" wire:model="itemImages.{{$itemValue}}">
                                                        @error('itemImages.'.$itemValue) <div class="text-danger error">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                            @if(count($itemImages) && isset($itemImages[$itemValue])) 
                                                <div class="border rounded-3 p-1" style="width: 150px;">
                                                    <div class="d-flex justify-content-center p-1">
                                                        <img src="{{asset($itemImages[$itemValue])}}">    
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
                        @else
                            <div class="row mt-3">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <!-- Person Fullname -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold" for="pr-description">
                                                            نام و نام خانوادگی عضو تیم شما
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div>
                                                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" wire:model="itemFullname.{{$itemValue}}" placeholder="نام و نام خانوادگی شخص مورد نظر را وارد نمایید">
                                                        </div>
                                                        @error('itemFullname.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>

                                                <!-- Person Role -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold" for="pr-description">
                                                            سمت فرد مورد نظر
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div>
                                                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" wire:model="itemRole.{{$itemValue}}" placeholder="سمت فرد را وارد نمایید">
                                                        </div>
                                                        @error('itemRole.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
        
                                                <!-- File uploader -->
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold" for="pr-image-upload">
                                                        تصویر شخص مورد نظر را بارگذاری نمایید
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
                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
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
                        افزودن عضو دیگر
                    </button>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
            <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" wire:click.prevent="back">
                <i class="fi-chevron-left fs-sm me-2"></i>
                مرحله قبل
            </a>
            <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                ذخیره
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M14 4l0 4l-6 0l0 -4" />
                </svg>
            </button>
        </div>

    </form> 
</div>