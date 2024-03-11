<div>
    <!-- Change Phone number-->
    <div class="row pt-4 mt-2">
        <div class="col-lg-3">
            <h2 class="h5 font-vazir">
                شماره تلفن همراه    
            </h2>
        </div>
        <div class="col-lg-9">
            <div class="border rounded-3 p-3">
                <div class="">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">شماره همراه</label>
                        </div>
                    </div>
                    @livewire('frontend.pages.profile.profile-pages.contact-info.phone.index')
                </div>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="saveProfile" class="needs-validation" novalidate>
        <!-- Personal details-->
        <div class="row pt-4 mt-2">
            <div class="col-lg-3">
                <h2 class="h5 font-vazir">
                    آدرس ها و اطلاعات تماس
                </h2>
            </div>
            
            <div class="col-lg-9">
                <div class="border rounded-3 p-3">

                    <!-- Province and City-->
                    <div class="border-bottom pb-3 mb-3">
                        <div class="row ir-select">                          
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
                                @if($errors->has('selectedProvinceId'))
                                    <span class="text-danger">{{ $errors->first('selectedProvinceId') }}</span>
                                @endif 
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
                                @if($errors->has('selectedCityId'))
                                    <span class="text-danger">{{ $errors->first('selectedCityId') }}</span>
                                @endif 
                            </div>
                        </div>
                    </div>

                    <!-- Address-->
                    <div class="border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="ps-2">
                                <label class="form-label fw-bold">آدرس</label>
                                <span class="text-danger">*</span>
                            </div>
                        </div>
                        <div>
                            <input class="form-control mt-3" type="text" wire:model="address" placeholder="آدرس خود را وارد نمایید">
                        </div>
                        @if($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif 
                    </div>

                    <!-- Postal code number-->
                    <div class="">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="ps-2">
                                <label class="form-label fw-bold">کد پستی</label>
                                <span class="text-danger">*</span>
                            </div>
                        </div>
                        <div>
                            <input class="form-control mt-3" type="text" wire:model="postal_code" placeholder="کد پستی خود را وارد نمایید">
                        </div>
                        @if($errors->has('postal_code'))
                            <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                        @endif 
                    </div>

                </div>
            </div>
        </div>

        <!-- Action buttons-->
        <div class="row pt-4 mt-2">
            <div class="col-lg-9 offset-lg-3">
                <div class="d-flex align-items-center justify-content-between">
                    <button class="btn btn-primary rounded-pill px-3 px-sm-4" type="submit">
                        ذخیره تغییرات
                    </button>              
                </div>
            </div>
        </div>
    </form>    

</div>