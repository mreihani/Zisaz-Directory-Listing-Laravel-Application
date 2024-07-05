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
        <div class="row">
            <div class="col-sm-12 mb-4">
                <label class="form-label fw-bold">
                    کالا و خدمات  فروشگاه را از لیست زیر انتخاب نمایید.
                    <span class="text-danger">*</span>
                </label>
                <select class="form-select form-select-md" wire:model="sellingActGrpsId">
                    <option value="" disabled="">کالا و خدمات را انتخاب کنید</option>
                    @foreach($actGrpsShopArray as $chunkArray)
                        @foreach($chunkArray as $chunkItem)
                            <option value="{{$chunkItem['id']}}">{{$chunkItem['title']}}</option>
                        @endforeach
                    @endforeach
                </select>

                @if($errors->has('sellingActGrpsIdValidation'))
                    <span class="text-danger">{{ $errors->first('sellingActGrpsIdValidation') }}</span>
                @endif

                <input type="hidden" wire:model="sellingActGrpsIdValidation">

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
        
        <!-- Manufacturer-->
        <div class="row">
            <div class="col-sm-12 mb-4">
                <label class="form-label fw-bold">
                    تولید کننده کالا را مشخص نمایید
                    <span class="text-danger">*</span>
                </label>
                <select class="form-select form-select-md" wire:model="sellingAdsManufacturereType">
                    <option value="" disabled="">انتخاب تولید کننده</option>
                    <option value="iran_overseas">ایرانی و خارجی</option>
                    <option value="iran">ایرانی</option>
                    <option value="overseas">خارجی</option>
                </select>

                @if($errors->has('sellingAdsManufacturerTypeValidation'))
                    <span class="text-danger">{{ $errors->first('sellingAdsManufacturerTypeValidation') }}</span>
                @endif

                <input type="hidden" wire:model="sellingAdsManufacturerTypeValidation">
            </div>
        </div>
        
        <!-- Product Brand-->
        <div class="row">
            <div class="col-12 mb-4">
                <label class="form-label fw-bold" for="pr-ads-title">برند کالا</label>
                <span class="fw-bold">(اختیاری)</span>
                <input class="form-control form-control-md" type="text" id="pr-ads-title" placeholder="برند کالا را وارد کنید" wire:model="productBrand">
            </div>
        </div>
       
        <!-- Ads Status-->
        <div class="row">
            <div class="col mb-4">
                <label class="form-label fw-bold">
                    وضعیت آگهی را مشخص نمایید
                </label>
                <span class="fw-bold">(اختیاری)</span>
                @foreach ($adsStatusArray as $adsStatusItem)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ads-status-{{$adsStatusItem->id}}"
                            wire:model="adsStatus.{{$adsStatusItem->id}}">
                        <label class="form-check-label" for="ads-status-{{$adsStatusItem->id}}">
                            {{$adsStatusItem->title}}
                        </label>
                    </div>
                @endforeach
            </div>
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
                <input class="form-control form-control-md" type="text" id="pr-address" placeholder="آدرس خود را وارد کنید" wire:model="address">
            </div>
        </div>
        
        <!-- Map-->
        <div class="row" id="jaban-map-container" wire:ignore>
            <div class="col-12 mb-4">
                <label class="form-label fw-bold" for="pr-address-lt">مختصات مکانی آدرس را از روی نقشه انتخاب نمایید</label>
                <span class="fw-bold">(اختیاری)</span>
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

        <!-- Terms -->
        <div class="form-check">
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
    </form>
</div>