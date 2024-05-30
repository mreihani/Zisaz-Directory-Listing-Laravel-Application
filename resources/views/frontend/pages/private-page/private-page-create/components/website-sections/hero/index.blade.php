<div>

    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">
            
            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <h4 class="pt-2 alert-heading">به طراحی صفحه اختصاصی خوش آمدید!</h4>
                    <ul>
                        <li>
                            برای طراحی وبسایت شخصی خود، بایستی 13 مرحله روبرو را با دقت تکمیل نمایید. 
                        </li>
                        <li>
                            اطلاعات وارد شده در هر قسمت پس از زدن دکمه "مرحله بعد" در سامانه ذخیره می شود. 
                        </li>
                        <li>
                            اگر در هر مرحله نیاز به توضیح بیشتری داشتید می توانید با پشتیبانی تماس حاصل فرمایید.
                        </li>
                    </ul>
                <hr>
                <p class="pt-3 mb-2">
                    اطلاعاتی که دراین بخش (هدر وبسایت) از شما دریافت می شود، در قسمت فوقانی صفحه شخصی شما نمایش داده خواهد شد.
                </p>
            </div>

            <!-- Personal info-->
            <h2 class="h5 font-vazir mb-4">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات فردی
            </h2>

            <div class="row">
                <div class="col-sm-6 mb-4">
                    <label class="form-label fw-bold" for="pr-fn">نام </label>
                    <input disabled class="form-control form-control-md" type="text" id="pr-fn" value="{{auth()->user()->firstname}}" placeholder="">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label fw-bold" for="pr-sn">نام خانوادگی </label>
                    <input disabled class="form-control form-control-md" type="text" id="pr-sn" value="{{auth()->user()->lastname}}" placeholder="">
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label fw-bold" for="pr-sn">شماره تماس </label>
                    <input disabled class="form-control form-control-md" type="text" id="pr-sn" value="{{auth()->user()->phone}}" placeholder="">
                </div>
            </div>

            <!-- Business Type-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات عمومی
            </h2>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold">
                        نوع کسب و کار خود را مشخص نمایید
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select form-select-md" wire:model="businessType">
                        <option value="" disabled="">انتخاب نوع کسب و کار</option>
                        <option value="1">معرفی فروشگاه</option>
                        <option value="2">معرفی شرکت ساختمانی</option>
                        <option value="3">معرفی دفتر طراحی و مهندسی</option>
                        <option value="4">معرفی پروژه های انبوه سازی شخصی</option>
                        <option value="5">معرفی و ارائه اطلاعات تماس و تجربیات شخصی</option>
                        <option value="6">معرفی آزمایشگاه مصالح ساختمانی</option>
                        <option value="7">معرفی کارخانه تولید نیازهای ساخت و ساز</option>
                        <option value="8">معرفی فعالیت در زمینه ماشین آلات ساختمانی</option>
                    </select>

                    @if($errors->has('businessType'))
                        <span class="text-danger">{{ $errors->first('businessType') }}</span>
                    @endif
                </div>

                <!-- Hero Motto-->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-slug">
                        اسلاگ یا URL
                    </label>
                    <label class="" for="pr-business-slug">
                        (اسلاگ باید انگلیسی و منحصر به فرد باشد)
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="text" id="pr-business-slug" placeholder="اسلاگ مربوط به صفحه شخصی خود را به انگلیسی وارد نمایید" wire:model="slug">

                    @if($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>

                <div class="col-md-12 mb-4 jquery-palette-color-picker-master-body" x-init="
                    $(document).ready(function(){
                        const submitBtn =  $(this).closest('form').find(':submit');

                        $('form').on('click', $(submitBtn), function(e) {
                            let selectedColor = $(this).find('.palette-color-picker-button .active').data('color');
                            @this.color = selectedColor;
                        });

                        $('#unique-id-3b').paletteColorPicker({
                            custom_class: 'force-left',
                            insert: 'after', // default -> 'before'
                        });
                    });
                    ">
                    <label class="form-label fw-bold" for="sample-id-3b">
                        انتخاب رنگ اصلی وبسایت
                    </label>
                    <div class="jquery-palette-color-picker-master-plugin" id="sample-id-3b">
                        <input type="text" id="unique-id-3b" name="unique-name-3b" wire:model="color" data-palette='["#D50000", "#155bd5","#69F0AE","#FFFF00"]' value="#155bd5">
                    </div>
                </div>
              
            </div>

            <!-- Hero Title-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات هدر وبسایت
            </h2>

            <!-- Hero Motto-->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-motto">
                        شعار کسب و کار 
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="text" id="pr-business-motto" placeholder="شعار کسب و کار خود را وارد کنید" wire:model="title">

                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>

            <!-- Hero Description-->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-description">
                        توضیحات کوتاه
                    </label>
                    <span class="text-danger">*</span>
                    <textarea class="form-control form-control-md" type="text" id="pr-business-description" placeholder="توضیحات کوتاه در مورد کسب و کار خود وارد کنید" wire:model="description"></textarea>

                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>

            <!-- Show Video promotion-->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-description">
                        نمایش ویدئوی تبلیغاتی
                    </label>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="show-promotional-video" wire:model="showPromotionalVideo">
                        <label class="form-check-label" for="show-promotional-video">
                            با تایید این گزینه دکمه "تماشای ویدئو" نمایش داده خواهد شد
                        </label>
                    </div>
                </div>
            </div>

            <hr class="mb-4 mt-2">

            @foreach ($slideInputs as $slideKey => $slideValue)

                @if(count($slideImages) && isset($slideImages[$slideValue]) && is_string($slideImages[$slideValue]))
                    <div class="row mt-3">
                        <div class="col-sm-10">

                            <!-- File uploader -->
                            <div class="mb-2">
                                <label class="form-label fw-bold" for="pr-description">
                                    تصویر اسلایدر را بارگذاری نمایید
                                    <span class="text-danger">*</span>
                                </label>

                                <label>
                                    (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                </label>

                                @error('slideImages.'.$slideValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input disabled class="form-control image-input-selector" type="file" wire:model="slideImages.{{$slideValue}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-12 d-flex justify-content-center">
                                                <div class="border rounded-3 p-1" style="width: 150px;">
                                                    <div class="d-flex justify-content-center p-1">
                                                        <img src="{{asset($slideImages[$slideValue])}}">    
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 d-flex justify-content-center align-items-center">
                            <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeSlide({{$slideKey}})">
                                <i class="fi-trash fs-sm me-2"></i>
                                حذف
                            </button>
                        </div>
                    </div>
                @else
                    <div class="row mt-3">
                        <div class="col-sm-10">

                            <!-- File uploader -->
                            <div class="mb-2">
                                <label class="form-label fw-bold" for="pr-description">
                                    تصویر اسلایدر را بارگذاری نمایید
                                    <span class="text-danger">*</span>
                                </label>

                                <label>
                                    (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                </label>

                                @error('slideImages.'.$slideValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input class="form-control" type="file" wire:model="slideImages.{{$slideValue}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        @if(count($slideImages) && isset($slideImages[$slideValue])) 
                                            <div class="row">
                                                <div class="col-sm-12 d-flex justify-content-center">
                                                    <div class="border rounded-3 p-1" style="width: 150px;">
                                                        <div class="d-flex justify-content-center p-1">
                                                            <img src="{{$slideImages[$slideValue]->temporaryUrl()}}">    
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 d-flex justify-content-center align-items-center">
                            <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeSlide({{$slideKey}})">
                                <i class="fi-trash fs-sm me-2"></i>
                                حذف
                            </button>
                        </div>
                    </div>
                @endif

            @endforeach
            
            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addSlide({{$slideIteration}})">
                <i class="fi-image fs-sm me-2"></i>
                افزودن اسلاید دیگر
            </button>

        </div>

        <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
            <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                مرحله بعد
                <i class="fi-chevron-right fs-sm ms-2"></i>
            </button>
        </div>
    </form> 
</div>