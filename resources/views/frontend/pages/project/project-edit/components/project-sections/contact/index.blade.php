<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="projectId">

            <!-- Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش بایستی اطلاعات تماس پروژه خود را وارد نمایید.
                    </li>
                </ul>
            </div>

           <!-- Business Type-->
           <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات تماس
            </h2>

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

             <!-- Project Address-->
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="form-label fw-bold" for="pr-project-address">
                        آدرس پروژه
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="text" id="pr-project-address" placeholder="آدرس خود را وارد کنید" wire:model="projectAddress">

                    @if($errors->has('projectAddress'))
                        <span class="text-danger">{{ $errors->first('projectAddress') }}</span>
                    @endif
                </div>
            </div>
            
            <hr class="mb-4 mt-2">
            
            <!-- Office Address-->
            @foreach ($officeAddressInputs as $addressKey => $addressValue)
                <div class="row">
                    <div class="col-sm-10">
                        <label class="form-label fw-bold" for="pr-title">
                            آدرس دفتر را وارد نمایید
                        </label>
                        <span class="fw-bold">(اختیاری)</span>
                        
                        <div class="mb-4">
                            <input class="form-control" type="text" placeholder="لطفا آدرس دفتر را وارد نمایید" wire:model="officeAddress.{{$addressValue}}">
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeOfficeAddress({{$addressKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addOfficeAddress({{$officeAddressIteration}})">
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

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="border rounded-3 p-3" id="auth-info">
                        <!-- Social media-->
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="ps-2">
                                    <label class="form-label fw-bold">
                                        آدرس شبکه های اجتماعی خود را وارد نمایید
                                    </label>
                                    <span class="">
                                        (اختیاری)
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                                    <i class="fi-instagram text-body"></i>
                                </div>
                                <input class="form-control" type="text" wire:model="instagram" placeholder="حساب کاربری اینستاگرام">
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                                    <i class="fi-telegram text-body"></i> 
                                </div>
                                <input class="form-control" type="text" wire:model="telegram" placeholder="حساب کاربری تلگرام">
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                                    <i class="fi-whatsapp text-body"></i> 
                                </div>
                                <input class="form-control" type="text" wire:model="whatsapp" placeholder="حساب کاربری واتس اپ">
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                                    <img width="16" src="{{asset('assets/frontend/img/jaban/x-icon/X_icon.svg.png')}}" alt="">
                                </div>
                                <input class="form-control" type="text" wire:model="x" placeholder="حساب کاربری اکس">
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                                    <i class="fi-linkedin text-body"></i> 
                                </div>
                                <input class="form-control" type="text" wire:model="linkedin" placeholder="حساب کاربری لینکدین">
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                                    <img width="15" src="{{asset('assets/frontend/img/jaban/eitaa-icon/eitaa-icon-black.svg')}}" alt="">
                                </div>
                                <input class="form-control" type="text" wire:model="eitaa" placeholder="حساب کاربری ایتا">
                            </div>
                           
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