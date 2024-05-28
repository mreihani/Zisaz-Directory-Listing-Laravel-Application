<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید اطلاعات تماس خود را در سامانه به نمایش بگذارید.
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

            <!-- Display settins-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات تماس
            </h2>
          
            <!-- Address-->
            @foreach ($addressInputs as $addressKey => $addressValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            آدرس مکان مورد نظر را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" placeholder="لطفا آدرس مورد نظر خود را وارد نمایید" wire:model="address.{{$addressValue}}">
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
                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" placeholder="لطفا شماره تلفن ثابت را وارد نمایید" wire:model="officePhone.{{$officePhoneValue}}">
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
                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" placeholder="لطفا شماره تلفن همراه را وارد نمایید" wire:model="mobilePhone.{{$mobilePhoneValue}}">
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

            <!-- Emails-->
            @foreach ($emailInputs as $emailKey => $emailValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            ایمیل را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" placeholder="لطفا ایمیل را وارد نمایید" wire:model="email.{{$emailValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeEmail({{$emailKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addEmail({{$emailIteration}})">
                <i class="fi-device-laptop fs-sm me-2"></i>
                افزودن ایمیل دیگر
            </button>

            <hr class="mb-4 mt-2">

            <!-- Scial media-->
            @foreach ($socialMediaInputs as $socialMediaKey => $socialMediaValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            لینک شبکه های اجتماعی مانند تلگرام، واتس اپ، اینستاگرام، ایتا و ... را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                <select class="form-select" wire:model="socialMediaTypeValue.{{$socialMediaValue}}" {{ $isHidden == true ? 'disabled' : '' }}>
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
                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" placeholder="لطفا لینک را وارد نمایید" wire:model="socialMedia.{{$socialMediaValue}}">
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
                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" placeholder="لطفا کد پستی را وارد نمایید" wire:model="postalCode.{{$postalCodeValue}}">
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

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addPostalCode({{$postalCodeIteration}})">
                <i class="fi-mail fs-sm me-2"></i>
                افزودن کد پستی دیگر
            </button>

            <hr class="mb-4 mt-2">

            <!-- opening houres-->
            @foreach ($workingHourInputs as $workingHourKey => $workingHourValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            روز و ساعات کاری را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control" type="text" placeholder="لطفا روز و ساعت کاری خود را وارد نمایید" wire:model="workingHour.{{$workingHourValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeWorkingHours({{$workingHourKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addWorkingHours({{$workingHourIteration}})">
                <i class="fi-clock fs-sm me-2"></i>
                افزودن ساعت کاری دیگر
            </button>

            <hr class="mb-4 mt-2">

            <!-- Customer contact us form-->
            <h2 class="h5 font-vazir mb-4 mt-5">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات فرم تماس با ما
            </h2>
            
            <dov class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-description">
                        ایمیل مربوط به فرم تماس با ما را وارد نمایید
                    </label>

                    <span class="text-danger">*</span>

                    <span>
                        (فقط برای ارسال پیام کاربران به شما استفاده خواهد شد)
                    </span>

                    <input {{ $isHidden == true ? 'disabled' : '' }} class="form-control form-control-md" type="text" id="pr-business-header-description" placeholder="ایمیل را وارد نمایید" wire:model="contactUsFormEmail">
    
                    @if($errors->has('contactUsFormEmail'))
                        <span class="text-danger">{{ $errors->first('contactUsFormEmail') }}</span>
                    @endif
                </div>
            </dov>

            <!-- Geolocation-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-map-pin text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات مکانی
            </h2>

            <!-- Map-->
            <input type="hidden" wire:model="mapInputValidation">
            @if($errors->has('mapInputValidation'))
                <span class="text-danger">{{ $errors->first('mapInputValidation') }}</span>
            @endif
            <div class="row" id="jaban-map-container" wire:ignore>
                <div class="col-12 mb-4">
                    <label class="form-label fw-bold" for="pr-address-lt">مختصات مکانی آدرس را از روی نقشه انتخاب نمایید</label>
                    <span class="text-danger">*</span>
                    <div id="map" style="height: 400px;" x-init="
                        let marker; const map = new L.Map('map', {
                            key: 'web.e4b772dc75484285a83a98d6466a4c10',
                            maptype: 'neshan',
                            poi: false,
                            traffic: false,
                            center: [@js($latitude), @js($longitude)],
                            zoom: 14,
                        }); 

                        marker = L.marker([@js($latitude), @js($longitude)]).addTo(map);

                        map.on('click', function (e) {
                            if (marker) { 
                                map.removeLayer(marker);
                            }
                            
                            marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

                            @this.latitude = e.latlng.lat;
                            @this.longitude = e.latlng.lng;
                        }); 
                        setInterval(function() {
                            map.invalidateSize();
                        }, 500);">
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

        </div>
    </form> 
</div>
