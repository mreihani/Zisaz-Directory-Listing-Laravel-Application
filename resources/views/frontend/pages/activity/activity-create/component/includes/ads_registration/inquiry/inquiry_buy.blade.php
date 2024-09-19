<div class="row">
    <div class="col-sm-6 mb-4">
        <label class="form-label fw-bold" for="pr-fn">نام </label>
        <input {{empty(auth()->user()->firstname) ? '' : 'disabled'}} class="form-control form-control-md" type="text" id="pr-fn" wire:model="firstname" placeholder="نام خود را وارد نمایید">

        @if($errors->has('firstname'))
            <span class="text-danger">{{ $errors->first('firstname') }}</span>
        @endif  
    </div>
    <div class="col-sm-6 mb-4">
        <label class="form-label fw-bold" for="pr-sn">نام خانوادگی </label>
        <input {{empty(auth()->user()->lastname) ? '' : 'disabled'}} class="form-control form-control-md" type="text" id="pr-sn" wire:model="lastname" placeholder="نام خانوادگی خود را وارد نمایید">

        @if($errors->has('lastname'))
            <span class="text-danger">{{ $errors->first('lastname') }}</span>
        @endif  
    </div>
    <div class="col-sm-6 mb-4">
        <label class="form-label fw-bold" for="pr-sn">شماره تماس </label>
        <input disabled class="form-control form-control-md" type="text" id="pr-sn" value="{{auth()->user()->phone}}" placeholder="">
    </div>
</div>

<!-- Skills Checklist-->
<div class="mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="border rounded-3 p-3">
                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            لطفا زمینه فعالیت خود را با توجه به دسته بندی های زیر تعیین نمایید
                        </label>
                        <span class="text-danger">*</span>
                        @if($errors->has('actGrpsId'))
                            <span class="text-danger">{{ $errors->first('actGrpsId') }}</span>
                        @endif 

                        <div>
                            <label class="form-label fw-bold pb-1 mb-2">استعلام قیمت</label>
                        </div>
                 
                        <div class="row row-cols-sm-2 row-cols-md-2 gx-3 gx-lg-3 skills">
                            @foreach($actGrpsInquiryBuyAdsArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="act_grps_{{$chunkItem['id']}}"
                                                wire:model="actGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="act_grps_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ads Title-->
<div class="row">
    <div class="col-12 mb-4">
        <label class="form-label fw-bold" for="pr-ads-title">عنوان استعلام</label>
        <span class="text-danger">*</span>
        <input class="form-control form-control-md" type="text" id="pr-ads-title" placeholder="عنوان استعلام را وارد کنید" wire:model="adsTitle">

        @if($errors->has('adsTitle'))
            <span class="text-danger">{{ $errors->first('adsTitle') }}</span>
        @endif 
    </div>
</div>

<!-- Ads Description-->
<div class="mb-4">
    <label class="form-label fw-bold" for="pr-description">
        شرح استعلام را وارد نمایید
    </label>
    <span class="text-danger">*</span>
    <textarea class="form-control" rows="5" id="pr-description" placeholder="" wire:model="adsDescription"></textarea>

    @if($errors->has('adsDescription'))
        <span class="text-danger">{{ $errors->first('adsDescription') }}</span>
    @endif 
</div>

<!-- Auctioneer-->
<div class="row">
    <div class="col-sm-12 mb-4">
        <label class="form-label fw-bold">
            استعلام کننده
            <span class="text-danger">*</span>
        </label>
        <select class="form-select form-select-md" wire:model="inquirer">
            <option value="" disabled="">انتخاب استعلام کننده</option>
            <option value="private_company">شرکت خصوصی</option>
            <option value="public_company">شرکت دولتی</option>
            <option value="individual">شخص حقیقی</option>
        </select>

        @if($errors->has('inquirerValidation'))
            <span class="text-danger">{{ $errors->first('inquirerValidation') }}</span>
        @endif

        <input type="hidden" wire:model="inquirerValidation">
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

<!-- Address-->
<div class="row">
    <div class="col-12 mb-4">
        <label class="form-label fw-bold" for="pr-address">آدرس</label>
        <span class="fw-bold">(اختیاری)</span>
        <input class="form-control form-control-md" type="text" id="pr-address" placeholder="آدرس را وارد کنید" wire:model="address">
    </div>
</div>

<!-- Auction Number-->
<div class="row">
    <div class="col-12 mb-4">
        <label class="form-label fw-bold" for="inquiry-number">شماره استعلام</label>
        <span class="text-danger">*</span>
        <span class="fw-bold">(این فیلد در صورتی که استعلام کننده شخص حقیقی باشد اختیاری است)</span>
        <input class="form-control form-control-md" type="number" id="inquiry-number" placeholder="شماره استعلام را به عدد وارد کنید" wire:model="inquiryNumber">

        @if($errors->has('inquiryNumber'))
            <span class="text-danger">{{ $errors->first('inquiryNumber') }}</span>
        @endif
    </div>
</div>

<hr class="mb-4 mt-2">

<!-- Licenses-->
@foreach ($licenseInputs as $licenseKey => $licenseValue)
    <div class="row">
        <div class="col-sm-10">
            <label class="form-label fw-bold" for="pr-title">مدارک استعلام را بارگذاری کنید 
            </label>
            <span class="text-danger">*</span>
            @error('licenseTypeValue.'.$licenseValue) <span class="text-danger error">{{ $message }}</span>@enderror
            <div class="mb-4">
                <div class="d-flex align-items-center">
                    <select class="form-select" wire:model="licenseTypeValue.{{$licenseValue}}" wire:change="licenseType($event.target.value, {{$licenseValue}})">
                        <option value="" disabled selected>
                            نوع مدرک را انتخاب نمایید
                        </option>
                        <option value="bid_license">
                            تصویر مدرک استعلام
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
                    تصویر مدرک استعلام را بارگذاری نمایید
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
    <i class="fi-plus fs-sm me-2"></i>
    افزودن مجوز دیگر
</button>

<hr class="mb-4 mt-2">

<!-- Auction exp date-->
<div class="row">
    <div class="col-12">
        <label class="form-label fw-bold" for="inquiry-exp-date">تاریخ اعتبار استعلام</label>
        <span class="fw-bold">(اختیاری)</span>
    </div>
    <div class="col-6 mb-4">
        <div class="input-group">
            <input data-jdp="" data-jdp-min-date="today" class="form-control form-control-md" id="inquiry-exp-date-start" placeholder="تاریخ شروع اعتبار استعلام را انتخاب نمایید" wire:model="inquiryExpDateStart">
            <i class="fi-calendar text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
        </div>
    </div>
    <div class="col-6 mb-4">
        <div class="input-group">
            <input data-jdp="" data-jdp-min-date="today" class="form-control form-control-md" id="inquiry-exp-date-end" placeholder="تاریخ پایان اعتبار استعلام را انتخاب نمایید" wire:model="inquiryExpDateEnd">
            <i class="fi-calendar text-muted position-absolute top-50 end-0 translate-middle-y me-3"></i>
        </div>
    </div>
</div>  

<!-- Ads Image-->
<div class="row">
    <div class="col-sm-12 mb-4">
        <label class="form-label fw-bold">
             تصویر آگهی را بارگذاری نمایید
            <span class="fw-bold">(اختیاری)</span>
        </label>

        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <input class="form-control" type="file" wire:model="adsImage">
                </div>
            </div>
            <div class="col-sm-12">
                @if($adsImage !== "") 
                    <div class="row">
                        <div class="col-sm-3 d-flex justify-content-center mb-2">
                            <div class="border rounded-3 p-1" style="width: 150px;">
                                <div class="d-flex justify-content-center p-1">
                                    <img src="{{$adsImage->temporaryUrl()}}">    
                                </div>
                            </div>  
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>   

<!-- Terms -->
<div class="form-check">
    <input class="form-check-input" type="checkbox" id="agree-to-terms"  wire:model="agreeToTerms">
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