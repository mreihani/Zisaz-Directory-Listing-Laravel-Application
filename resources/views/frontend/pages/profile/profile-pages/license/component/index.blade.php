<div>
    @if($section == 1) 
        @if($licenses)
            @foreach ($licenses as $licenseLoopItem)
                <div class="card bg-secondary card-hover mt-3 mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="position-relative flex-shrink-0">
                                   <a href="{{route('assets', [auth()->user()->id, $licenseLoopItem->license_image])}}">
                                        <img
                                        style="
                                            height:50px; 
                                            background:url({{route('assets', [auth()->user()->id, $licenseLoopItem->license_image])}});
                                            background-size: cover;"
                                        class="me-2" 
                                        width="50" 
                                        alt="">
                                    </a>
                                </div>
                                <p class="fs-md fw-bold text-dark opacity-80 px-1 mt-2">
                                    <a href="{{route('assets', [auth()->user()->id, $licenseLoopItem->license_image])}}" class="text-decoration-none">
                                        @if($licenseLoopItem->license_type == 'eng_license')
                                            پروانه اشتغال مهندسی 
                                        @elseif($licenseLoopItem->license_type == 'ocp_license')
                                            گواهی نامه شغلی 
                                        @elseif($licenseLoopItem->license_type == 'news_ads')
                                            آگهی رسمی روزنامه
                                        @elseif($licenseLoopItem->license_type == 'business_license')
                                            پروانه کسب و کار
                                        @elseif($licenseLoopItem->license_type == 'other')
                                            سایر
                                        @endif
                                    </a>
                                </p>
                            </div>
                            
                            <div class="dropdown content-overlay">
                                <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm"
                                    type="button"
                                    id="contextMenu1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fi-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="contextMenu1">
                                    <li>
                                        <a class="dropdown-item" wire:click="editLicense({{$licenseLoopItem->id}})" style="cursor: pointer;">
                                            <i class="fi-edit opacity-60 me-2"></i>
                                            ویرایش
                                        </a>
                                    </li>
                                    <li>
                                        <a 
                                            class="dropdown-item"  
                                            style="cursor: pointer;"
                                            onclick="confirm('آیا برای انجام این کار اطمینان دارید؟') || event.stopImmediatePropagation()"
                                            wire:click="deleteLicense({{$licenseLoopItem->id}})"
                                            >
                                            <i class="fi-trash opacity-60 me-2"></i>
                                            حذف
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row d-flex justify-content-center pt-4">
                <div class="col-sm-2">
                    <a class="btn btn-primary rounded-pill w-100" wire:click="addNewLicense">
                        <i class="fi-plus fs-sm me-2"></i>
                        افزودن مجوز جدید
                    </a>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                <h4>
                    شما هیچ مجوزی بارگذاری نکرده اید، برای بارگذاری مجوز خود بر روی دکمه زیر کلیک کنید.
                </h4>
                <div class="col-md-2">
                    <button class="btn btn-primary rounded-pill w-100" wire:click="addNewLicense">
                        <i class="fi-plus fs-sm me-2"></i>
                        بارگذاری مجوز
                    </button>
                </div>
            </div>
        @endif
    @elseif($section == 2)
        <form wire:submit.prevent="save" class="needs-validation" novalidate>
            <!-- Account Activity details -->
            <div class="bg-light rounded-3 p-4">
                <h2 class="h5 font-vazir mb-4">
                    <i class="fi-award text-primary fs-5 mt-n1 me-2"></i>
                    مجوز ها
                </h2>
                
                <label class="form-label" for="pr-title">نوع یا عنوان مجوز <span class="text-danger">*</span></label>
                <div class="mb-4">
                    <div class="d-flex align-items-center">
                        <select class="form-select" wire:model="licenseTypeValue" wire:change="licenseType($event.target.value)">
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
                    @if($errors->has('licenseTypeValue'))
                        <div class="mt-1">
                            <span class="text-danger">{{ $errors->first('licenseTypeValue') }}</span>
                        </div>
                    @endif 
                </div>

                @if($otherDescriptionStatus) 
                    <div class="mb-4">
                        <input class="form-control" type="text" placeholder="لطفا عنوان این مجوز و شرح مختصی وارد نمایید" wire:model="otherDescription">

                        @if($errors->has('otherDescription'))
                            <div class="mt-1">
                                <span class="text-danger">{{ $errors->first('otherDescription') }}</span>
                            </div>
                        @endif 
                    </div>
                @endif

                <!-- Filepond uploader -->
                <div class="mb-2">
                    <label class="form-label" for="pr-description">
                        تصویر مجوز خود را بارگذاری نمایید
                        <span class="text-danger">*</span>
                    </label>
                    <div class="mb-3">
                        <input class="form-control" type="file" wire:model="licenseImage">
                    </div>
                    @if($errors->has('licenseImage'))
                        <div class="mt-1">
                            <span class="text-danger">{{ $errors->first('licenseImage') }}</span>
                        </div>
                    @endif 
                </div>
            </div>

            <!-- Action buttons-->
            <div class="row">
                <div class="col-lg-9">
                    <div class="d-flex align-items-center justify-content-between">
                        <button class="btn btn-primary rounded-pill px-3 px-sm-4" type="submit">
                            ذخیره تغییرات
                        </button>
                    </div>
                </div>
            </div>

            @if($licenseItem) 
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <div class="border rounded-3 p-3" style="width: 300px;">
                            <div class="d-flex justify-content-center p-3">
                                <a href="{{route('assets', [auth()->user()->id, $licenseItem->license_image])}}">
                                    <img width="250" src="{{route('assets', [auth()->user()->id, $licenseItem->license_image])}}">    
                                </a>
                            </div>
                        </div>  
                    </div>
                </div>
            @endif

        </form>
    @endif
</div>








