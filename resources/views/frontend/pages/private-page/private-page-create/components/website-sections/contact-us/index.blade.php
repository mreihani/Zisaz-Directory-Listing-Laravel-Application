<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

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
            <div class="row">
                <div class="col-sm-12 mb-4">
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
                </div>
            </div>

            <!-- Business Title-->
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-title">نام کسب و کار</label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="text" id="pr-business-title" placeholder="عنوان کسب و کار خود را وارد کنید" wire:model="businessTitle">

                    @if($errors->has('businessTitle'))
                        <span class="text-danger">{{ $errors->first('businessTitle') }}</span>
                    @endif
                </div>
            </div>

            <!-- Business License Number-->
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="form-label fw-bold" for="business-license-number">شماره مجوز یا ثبت شرکت</label>
                    <span class="fw-bold">(اختیاری)</span>
                    <input class="form-control form-control-md" type="number" id="business-license-number" placeholder="شماره مجوز را به عدد وارد کنید" wire:model="businessLicenseNumber">

                    @if($errors->has('businessLicenseNumber'))
                        <span class="text-danger">{{ $errors->first('businessLicenseNumber') }}</span>
                    @endif
                </div>
            </div>

            <!-- Ads Image-->
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <label class="form-label fw-bold">
                        لوگو یا تصویر تابلو محل کسب و کار را بارگذاری نمایید
                        <span class="fw-bold">(اختیاری)</span>
                    </label>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <input class="form-control" type="file" wire:model="businessImage">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            @if($businessImage !== "") 
                                <div class="row">
                                    <div class="col-sm-3 d-flex justify-content-center mb-2">
                                        <div class="border rounded-3 p-1" style="width: 150px;">
                                            <div class="d-flex justify-content-center p-1">
                                                <img src="{{$businessImage->temporaryUrl()}}">    
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>   

            <!-- Province and City-->
            <div class="row mb-4">                          
                <div class="col-md-6">
                    <div class="">
                        <label class="form-label fw-bold">استان</label>
                        <span class="text-danger">*</span>
                        <div class="select-box">
                            <select class="form-select form-select-md" wire:model="selectedProvinceId" wire:change="loadCitiesByProvinceChange($event.target.value)">
                                <option value="" selected disabled>انتخاب استان</option>
                                @foreach ($provinces as $provinceItem)
                                    <option value="{{ $provinceItem->id }}">
                                        {{ $provinceItem->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    @if($errors->has('selectedProvinceIdValidation'))
                        <span class="text-danger">{{ $errors->first('selectedProvinceIdValidation') }}</span>
                    @endif

                    <input type="hidden" wire:model="selectedProvinceIdValidation">
                </div>
                <div class="col-md-6">
                    <div class="">
                        <label class="form-label fw-bold">شهر</label>
                        <span class="text-danger">*</span>
                        <select wire:model="selectedCityId" class="form-select form-select-md">
                            <option value="" selected disabled>انتخاب شهر</option>
                            @foreach ($cities as $cityItem)
                                <option value="{{ $cityItem->id }}">
                                    {{ $cityItem->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    @if($errors->has('selectedCityIdValidation'))
                        <span class="text-danger">{{ $errors->first('selectedCityIdValidation') }}</span>
                    @endif

                    <input type="hidden" wire:model="selectedCityIdValidation">

                </div>
            </div>

            <hr class="mb-4 mt-2">

            <!-- Address-->
            @foreach ($addressInputs as $addressKey => $addressValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            آدرس دفتر را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input class="form-control" type="text" placeholder="لطفا آدرس مورد نظر خود را وارد نمایید" wire:model="address.{{$addressValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeAddress({{$addressKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addAddress({{$addressIteration}})">
                <i class="fi-map fs-sm me-2"></i>
                افزودن آدرس دیگر
            </button>

            <hr class="mb-4 mt-2">

            <!-- Office Phone number-->
            @foreach ($officePhoneInputs as $officePhoneKey => $officePhoneValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            شماره تلفن ثابت را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input class="form-control" type="text" placeholder="لطفا شماره تلفن ثابت را وارد نمایید" wire:model="officePhone.{{$officePhoneValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeOfficePhone({{$officePhoneKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addOfficePhone({{$officePhoneIteration}})">
                <i class="fi-phone fs-sm me-2"></i>
                افزودن شماره تلفن ثابت دیگر
            </button>
            
            <hr class="mb-4 mt-2">

            <!-- Office Phone number-->
            @foreach ($mobilePhoneInputs as $mobilePhoneKey => $mobilePhoneValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            شماره تلفن همراه را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input class="form-control" type="text" placeholder="لطفا شماره تلفن همراه را وارد نمایید" wire:model="mobilePhone.{{$mobilePhoneValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeMobilePhone({{$mobilePhoneKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addMobilePhone({{$mobilePhoneIteration}})">
                <i class="fi-device-mobile fs-sm me-2"></i>
                افزودن شماره تلفن همراه دیگر
            </button>

            <hr class="mb-4 mt-2">

            <!-- Office Phone number-->
            @foreach ($socialMediaInputs as $socialMediaKey => $socialMediaValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            لینک شبکه های اجتماعی مانند تلگرام، واتس اپ، اینستاگرام، ایتا و ... را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                <select class="form-select" wire:model="socialMediaTypeValue.{{$socialMediaValue}}">
                                    <option value="" disabled selected>
                                        شبکه اجتماعی مورد نظر را انتخاب نمایید
                                    </option>
                                    <option value="telegram">
                                        تلگرام
                                    </option>
                                    <option value="whatsapp">
                                        واتس اپ
                                    </option>
                                    <option value="instagram">
                                        اینستاگرام
                                    </option>
                                    <option value="x">
                                        شبکه ایکس (توییتر)
                                    </option>
                                    <option value="eitaa">
                                        ایتا
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <input class="form-control" type="text" placeholder="لطفا لینک را وارد نمایید" wire:model="socialMedia.{{$socialMediaValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeSocialMedia({{$socialMediaKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addSocialMedia({{$socialMediaIteration}})">
                <i class="fi-telegram fs-sm me-2"></i>
                افزودن شبکه اجتماعی دیگر
            </button>

            <hr class="mb-4 mt-2">

            <!-- Postal code number-->
            @foreach ($postalCodeInputs as $postalCodeKey => $postalCodeValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            کد پستی را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input class="form-control" type="text" placeholder="لطفا کد پستی را وارد نمایید" wire:model="postalCode.{{$postalCodeValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removePostalCode({{$postalCodeKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addPostalCode({{$officePhoneIteration}})">
                <i class="fi-mail fs-sm me-2"></i>
                افزودن کد پستی دیگر
            </button>
            
            <hr class="mb-4 mt-2">

            <!-- Licenses-->
            @foreach ($licenseInputs as $licenseKey => $licenseValue)
            <div class="row">
                <div class="col-sm-10">
                    <label class="form-label fw-bold" for="pr-title">مجوزهای شغلی خود را بارگذاری کنید 
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    @error('licenseTypeValue.'.$licenseValue) <span class="text-danger error">{{ $message }}</span>@enderror
                    <div class="mb-4">
                        <div class="d-flex align-items-center">
                            <select class="form-select" wire:model="licenseTypeValue.{{$licenseValue}}" wire:change="licenseType($event.target.value, {{$licenseValue}})">
                                <option value="" disabled selected>
                                    نوع مجوز را انتخاب نمایید
                                </option>
                                <option value="eng_license">
                                    پروانه اشتغال مهندسی 
                                </option>
                                <option value="ocp_license">
                                    گواهی نامه شغلی 
                                </option>
                                <option value="news_ads">
                                    آگهی رسمی روزنامه
                                </option>
                                <option value="business_license">
                                    پروانه کسب و کار
                                </option>
                                <option value="other">
                                    سایر
                                </option>
                            </select>
                        </div>
                    </div>

                    @if(count($otherDescriptionStatus) && isset($otherDescriptionStatus[$licenseValue]) && $otherDescriptionStatus[$licenseValue] == true) 
                        <div class="mb-4">
                            <input class="form-control" type="text" placeholder="لطفا عنوان این مجوز و شرح مختصی وارد نمایید" wire:model="otherDescription.{{$licenseValue}}">
                            @error('otherDescription.'.$licenseValue) <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    <!-- File uploader -->
                    <div class="mb-2">
                        <label class="form-label fw-bold" for="pr-description">
                            تصویر مجوز خود را بارگذاری نمایید
                            <span class="text-danger">*</span>
                        </label>
                        @error('licenseImage.'.$licenseValue) <span class="text-danger error">{{ $message }}</span> @enderror
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input class="form-control" type="file" wire:model="licenseImage.{{$licenseValue}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                @if(count($licenseImage) && isset($licenseImage[$licenseValue])) 
                                    <div class="row">
                                        <div class="col-sm-12 d-flex justify-content-center">
                                            <div class="border rounded-3 p-1" style="width: 150px;">
                                                <div class="d-flex justify-content-center p-1">
                                                    <img src="{{$licenseImage[$licenseValue]->temporaryUrl()}}">    
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
                    <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeLicense({{$licenseKey}})">
                        <i class="fi-trash fs-sm me-2"></i>
                        حذف
                    </button>
                </div>
            </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addLicense({{$licenseIteration}})">
                <i class="fi-award fs-sm me-2"></i>
                افزودن مجوز دیگر
            </button>

            <hr class="mb-4 mt-2">

            <!-- Terms -->
            <div class="form-check mt-5">
                <input class="form-check-input" type="checkbox" id="agree-to-terms" wire:model="agreeToTerms">
                <label class="form-check-label fw-bold" for="agree-to-terms"><a href='#'>قوانین و مقررات </a> را مطالعه نموده و می پذیرم.</label>
            </div>

            @if($errors->has('agreeToTerms'))
                <span class="text-danger">{{ $errors->first('agreeToTerms') }}</span>
            @endif

            <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                    ذخیره
                    <svg class="ms-2" width="18px" height="18px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>save-floppy</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-152.000000, -515.000000)" fill="#ffffff"> <path d="M171,525 C171.552,525 172,524.553 172,524 L172,520 C172,519.447 171.552,519 171,519 C170.448,519 170,519.447 170,520 L170,524 C170,524.553 170.448,525 171,525 L171,525 Z M182,543 C182,544.104 181.104,545 180,545 L156,545 C154.896,545 154,544.104 154,543 L154,519 C154,517.896 154.896,517 156,517 L158,517 L158,527 C158,528.104 158.896,529 160,529 L176,529 C177.104,529 178,528.104 178,527 L178,517 L180,517 C181.104,517 182,517.896 182,519 L182,543 L182,543 Z M160,517 L176,517 L176,526 C176,526.553 175.552,527 175,527 L161,527 C160.448,527 160,526.553 160,526 L160,517 L160,517 Z M180,515 L156,515 C153.791,515 152,516.791 152,519 L152,543 C152,545.209 153.791,547 156,547 L180,547 C182.209,547 184,545.209 184,543 L184,519 C184,516.791 182.209,515 180,515 L180,515 Z" id="save-floppy" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                </button>
            </div>

        </div>
    </form> 
</div>
