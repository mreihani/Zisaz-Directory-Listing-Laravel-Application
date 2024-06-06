<div>
    <form wire:submit.prevent="save" novalidate> 
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
                                    لطفا زمینه فعالیت خود را با توجه به دسته بندی های زیر تعیین نمایید
                                </label>
                                <span class="text-danger">*</span>
                                @if($errors->has('actGrpsId'))
                                    <span class="text-danger">{{ $errors->first('actGrpsId') }}</span>
                                @endif 

                                <div>
                                    <label class="form-label fw-bold pb-1 mb-2">فرم ثبت نام آگهی پیمانکاران</label>
                                </div>
                        
                                <div class="row row-cols-sm-2 row-cols-md-2 gx-3 gx-lg-3 skills">
                                    @foreach($actGrpsContractorAdsArray as $chunkArray)
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
            <span class="text-danger">*</span>
            <textarea class="form-control" rows="5" id="pr-description" placeholder="" wire:model="adsDescription"></textarea>

            @if($errors->has('adsDescription'))
                <span class="text-danger">{{ $errors->first('adsDescription') }}</span>
            @endif 
        </div>

        <!-- Ads Image-->
        <div class="row">
            <div class="col-sm-12 mb-4">
                <label class="form-label fw-bold">
                    بارگذاری تصاویر آگهی (تا حداکثر 5 تصویر)
                    <span class="text-danger">*</span>
                </label>
        
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <input class="form-control" type="file" wire:model="adsImages" multiple>
                            @error('adsImages') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        @if(count($adsImages)) 
                            <div class="row">
                                @foreach ($adsImages as $adsImagesItem)
                                        @if(!is_string($adsImagesItem))
                                            <div class="col-sm-3 d-flex justify-content-center mb-2">
                                                <div class="border rounded-3 p-1" style="width: 150px;">
                                                    <div class="d-flex justify-content-center p-1">
                                                        <img src="{{$adsImagesItem->temporaryUrl()}}">    
                                                    </div>
                                                </div>  
                                            </div>
                                        @else
                                            <div class="col-sm-3 d-flex justify-content-center mb-2">
                                                <div class="border rounded-3 p-1" style="width: 150px;">
                                                    <div class="d-flex justify-content-center p-1">
                                                        <img src="{{asset($adsImagesItem)}}">    
                                                    </div>
                                                </div>  
                                            </div>
                                        @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
        
            </div>
        </div>  

        <!-- Provinces to work-->
        <label class="form-label pb-1 mb-2 fw-bold">استان های که پیمانکار می تواند در آن جا فعالیت کند</label>
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

        <!-- Website Address-->
        <div class="row">
            <div class="col-12 mb-4">
                <label class="form-label fw-bold" for="website-address">آدرس وبسایت</label>
                <span class="fw-bold">(اختیاری)</span>
                <input class="form-control form-control-md" type="text" id="website-address" placeholder="آدرس وبسایت خود را وارد کنید" wire:model="websiteAddress">
            </div>
        </div>

        <!-- Whatsapp Address-->
        <div class="row">
            <div class="col-12 mb-4">
                <label class="form-label fw-bold" for="whatsapp-address">لینک واتس اپ</label>
                <span class="fw-bold">(اختیاری)</span>
                <input class="form-control form-control-md" type="text" id="whatsapp-address" placeholder="لینک واتس اپ خود را وارد کنید" wire:model="whatsappAddress">
            </div>
        </div>

        <!-- Telegram Address-->
        <div class="row">
            <div class="col-12 mb-4">
                <label class="form-label fw-bold" for="telegram-address">لینک تلگرام</label>
                <span class="fw-bold">(اختیاری)</span>
                <input class="form-control form-control-md" type="text" id="telegram-address" placeholder="لینک تلگرام خود را وارد کنید" wire:model="telegramAddress">
            </div>
        </div>
        
        <!-- Eitaa Address-->
        <div class="row">
            <div class="col-12 mb-4">
                <label class="form-label fw-bold" for="eitaa-address">لینک ایتا</label>
                <span class="fw-bold">(اختیاری)</span>
                <input class="form-control form-control-md" type="text" id="eitaa-address" placeholder="لینک ایتا خود را وارد کنید" wire:model="eitaaAddress">
            </div>
        </div>

        <!-- Price-->
        <div class="row">
            <div class="col-12 mb-4">
                <label class="form-label fw-bold" for="pr-price">قیمت</label>
                <span class="fw-bold">(اختیاری)</span>
                <input {{$priceByAgreement ? 'disabled' : ''}}  class="form-control form-control-md" type="number" placeholder="قیمت کالا را وارد کنید" wire:model="price">
            </div>
            <div class="col-12 mb-4">
                <input class="form-check-input" type="checkbox" id="price-by-agreement" wire:model="priceByAgreement" wire:change="changePriceByAgreement()">
                <label class="form-check-label" for="price-by-agreement">قیمت توافقی</label>
            </div>
        </div>

        <!-- Payment method-->
        <div class="row">
            <div class="col mb-4">
                <label class="form-label fw-bold">
                    روش پرداخت را تعیین نمایید
                    <span class="text-danger">*</span>
                </label>

                @if($errors->has('paymentMethod'))
                    <span class="text-danger">{{ $errors->first('paymentMethod') }}</span>
                @endif

                @foreach ($paymentMethodArray as $paymentMethodItem)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="payment-method-{{$paymentMethodItem->id}}"
                            wire:model="paymentMethod.{{$paymentMethodItem->id}}">
                        <label class="form-check-label" for="payment-method-{{$paymentMethodItem->id}}">
                            {{$paymentMethodItem->title}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <!--  Have discount -->
        <div class="row">
            <label class="form-label fw-bold">
                آیا آگهی شامل تخفیف می شود؟
                <span class="text-danger">*</span>
            </label>
            <div class="col mb-4">
            
                <div class="form-check form-check-inline" style="margin-right: 0;">
                    <input class="form-check-input" id="form-radio-4" type="radio" value="yes" wire:model="adsHaveDiscount">
                    <label class="form-check-label" for="form-radio-4">
                        تخفیف دارد
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="form-radio-5" type="radio" value="no" wire:model="adsHaveDiscount">
                    <label class="form-check-label" for="form-radio-5">
                        تخفیف ندارد
                    </label>
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
    </form>        
</div>