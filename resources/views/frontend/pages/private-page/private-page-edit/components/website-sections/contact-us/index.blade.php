<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید اطلاعات تماس خود را در صفحه کسب و کار به نمایش بگذارید.
                    </li>
                </ul>
            </div>

            <!-- Display settins-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات تماس
            </h2>
          
            <!-- Address-->
            <div class="row">
                <div class="col-sm-12">
                    <label class="form-label fw-bold" for="pr-title">
                        آدرس کسب و کار را وارد نمایید
                    </label>
                    <span class="text-danger">*</span>
                    
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا آدرس مورد نظر را وارد نمایید" wire:model="address">

                        @if($errors->has('address'))
                            <div class="text-danger">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="mb-4 mt-2">

            <!-- Office Phone number-->
            <div class="row">
                <div class="col-sm-12">
                    <label class="form-label fw-bold" for="pr-title">
                        شماره تلفن کسب و کار را وارد نمایید
                    </label>
                    <span class="text-danger">*</span>
                    
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا شماره تلفن را وارد نمایید" wire:model="phone">

                        @if($errors->has('phone'))
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="mb-4 mt-2">

            <div class="row">
                <div class="col-sm-12">
                    <label class="form-label fw-bold" for="pr-title">
                        ایمیل را وارد نمایید
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا ایمیل را وارد نمایید" wire:model="email">

                        @if($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="mb-4 mt-2">

            <!-- Scial media-->
            <div class="row">
                <div class="col-sm-12">
                    <label class="form-label fw-bold" for="pr-title">
                        لطفا آدرس شبکه های اجتماعی خود را وارد نمایید
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                        <i class="fi-instagram text-body"></i>
                    </div>
                </div>
                <div class="col-sm-11">
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا آدرس اینستاگرام را وارد نمایید" wire:model="instagram">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                        <i class="fi-telegram text-body"></i> 
                    </div>
                </div>
                <div class="col-sm-11">
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا آدرس تلگرام را وارد نمایید" wire:model="telegram">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                        <i class="fi-whatsapp text-body"></i> 
                    </div>
                </div>
                <div class="col-sm-11">
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا آدرس واتس اپ را وارد نمایید" wire:model="whatsapp">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                        <img width="16" src="{{asset('assets/frontend/img/jaban/x-icon/X_icon.svg.png')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-11">
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا آدرس اکس را وارد نمایید" wire:model="x">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                        <i class="fi-linkedin text-body"></i> 
                    </div>
                </div>
                <div class="col-sm-11">
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا آدرس لینکدین را وارد نمایید" wire:model="linkedin">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <div class="btn btn-icon btn-light btn-xs shadow-sm rounded-circle pe-none flex-shrink-0 me-3">
                        <img width="15" src="{{asset('assets/frontend/img/jaban/eitaa-icon/eitaa-icon-black.svg')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-11">
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا آدرس ایتا را وارد نمایید" wire:model="eitaa">
                    </div>
                </div>
            </div>
           
            <hr class="mb-4 mt-2">

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
                    <span class="fw-bold">(اختیاری)</span>
                    <div id="map" style="height: 400px;" x-init="
                        let marker; const map = new L.Map('map', {
                            key: 'web.e4b772dc75484285a83a98d6466a4c10',
                            maptype: 'neshan',
                            poi: false,
                            traffic: false,
                            center: [@js(!empty($latitude) ? $latitude : 35.69975), @js(!empty($longitude) ? $longitude : 51.338076)],
                            zoom: 14,
                        }); 

                        marker = L.marker([@js(!empty($latitude) ? $latitude : 35.69975), @js(!empty($longitude) ? $longitude : 51.338076)]).addTo(map);

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
