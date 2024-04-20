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

<!-- Skills Checklist-->
<div class="mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="border rounded-3 p-3">
                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            لطفا تخصص های مورد نیاز خود را با توجه به دسته بندی های زیر تعیین نمایید
                        </label>
                        <span class="text-danger">*</span>
                        @if($errors->has('actGrpsId'))
                            <span class="text-danger">{{ $errors->first('actGrpsId') }}</span>
                        @endif 

                        <div>
                            <label class="form-label fw-bold pb-1 mb-2">مهندسین</label>
                        </div>
                 
                        <div class="row row-cols-sm-2 row-cols-md-2 gx-3 gx-lg-3 skills">
                            @foreach($actGrpsEngAdsArray as $chunkArray)
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

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            مدیران و پرسنل اداری
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-2 gx-3 gx-lg-3 skills">
                            @foreach($actGrpsManagerAdsArray as $chunkArray)
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

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            نیروهای فنی
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-2 gx-3 gx-lg-3 skills">
                            @foreach($actGrpsTechnicalAdsArray as $chunkArray)
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
        <label class="form-label fw-bold" for="pr-ads-title">عنوان آگهی</label>
        <span class="text-danger">*</span>
        <input class="form-control form-control-md" type="text" id="pr-ads-title" placeholder="عنوان آگهی را وارد کنید" wire:model="adsTitle">

        @if($errors->has('adsTitle'))
            <span class="text-danger">{{ $errors->first('adsTitle') }}</span>
        @endif 
    </div>
</div>

<!-- Ads Description-->
<div class="mb-4">
    <label class="form-label fw-bold" for="pr-description">
        شرح آگهی را وارد نمایید
    </label>
    <span class="fw-bold">(اختیاری)</span>
    <textarea class="form-control" rows="5" id="pr-description" placeholder="" wire:model="adsDescription"></textarea>
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
                    <input class="form-control" type="file" wire:model="adsImages">
                    @error('adsImages') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-12">
                @if(count($adsImages)) 
                    <div class="row">
                        @foreach ($adsImages as $adsImagesItem)
                                <div class="col-sm-3 d-flex justify-content-center mb-2">
                                    <div class="border rounded-3 p-1" style="width: 150px;">
                                        <div class="d-flex justify-content-center p-1">
                                            <img src="{{$adsImagesItem->temporaryUrl()}}">    
                                        </div>
                                    </div>  
                                </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

<!-- Contract Type-->
<div class="row">
    <div class="col">
        <label class="form-label fw-bold">
            نوع همکاری را تعیین نمایید
        </label>
        <span class="fw-bold">(اختیاری)</span>
    </div>
</div>
<div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4">
    @foreach ($contractTypeArray as $contractTypeItem)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="contract-type-{{$contractTypeItem->id}}"
                wire:model="contractType.{{$contractTypeItem->id}}">
            <label class="form-check-label" for="contract-type-{{$contractTypeItem->id}}">
                {{$contractTypeItem->title}}
            </label>
        </div>
    @endforeach
</div>

<!-- Academics -->
<div class="row">
    <div class="col">
        <label class="form-label fw-bold">
            تحصیلات
        </label>
        <span class="text-danger">*</span>

        @if($errors->has('academicLevel'))
            <span class="text-danger">{{ $errors->first('academicLevel') }}</span>
        @endif 
    </div>
</div>
<div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4">
    @foreach ($academicArray as $academicItem)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="academic-{{$academicItem->id}}"
                wire:model="academicLevel.{{$academicItem->id}}">
            <label class="form-check-label" for="academic-{{$academicItem->id}}">
                {{$academicItem->title}}
            </label>
        </div>
    @endforeach
</div>

<!-- Gender-->
<div class="row mb-4">
    <div class="col-sm-12">
        <label class="form-label fw-bold">
             جنسیت
            <span class="text-danger">*</span>
        </label>

        @if($errors->has('employerGender'))
            <span class="text-danger">{{ $errors->first('employerGender') }}</span>
        @endif 
    </div>

    @foreach ($genderArray as $genderItem)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gender-{{$genderItem->id}}"
                wire:model="employerGender.{{$genderItem->id}}">
            <label class="form-check-label" for="gender-{{$genderItem->id}}">
                {{$genderItem->title}}
            </label>
        </div>
    @endforeach
</div>

<!-- Work Experience-->
<div class="row">
    <div class="col-sm-12 mb-4">
        <label class="form-label fw-bold">
             سابقه کار مورد نیاز
            <span class="text-danger">*</span>
        </label>
        <select class="form-select form-select-md" wire:model="workExp">
            <option value="" disabled="">انتخاب سابقه کار</option>
            <option value="noWorkExp">نیاز به سابقه کار ندارد</option>
            <option value="lessThanTwo">کمتر از 2 سال</option>
            <option value="twoToFive">2 تا 5 سال</option>
            <option value="moreThanFive">بیشتر از 5 سال</option>
        </select>

        @if($errors->has('workExpValidation'))
            <span class="text-danger">{{ $errors->first('workExpValidation') }}</span>
        @endif

        <input type="hidden" wire:model="workExpValidation">
    </div>
</div>

<!-- Provinces to work-->
<label class="form-label pb-1 mb-2 fw-bold">استان های که متقاضی کار می تواند در آنجا مشغول به کار شود</label>
<span class="text-danger">*</span>
@if($errors->has('provinceToWork'))
    <span class="text-danger">{{ $errors->first('provinceToWork') }}</span>
@endif
<div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 mb-4">
    @foreach ($provinces->chunk(4) as $provincesChunk)
        <div class="col">
            @foreach ($provincesChunk as $provinceItem)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="province_{{$provinceItem->id}}"
                        wire:model="provinceToWork.{{$provinceItem->id}}">
                    <label class="form-check-label" for="province_{{$provinceItem->id}}">
                        {{$provinceItem->title}}
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach
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