<div>
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
        <div class="row p-4">
            <div class="col-md-12 d-flex justify-content-between">
                <div>
                    <button class="btn btn-primary rounded-pill px-3 px-sm-4" type="submit">
                        ذخیره تغییرات
                    </button>
                </div>
                <div>
                    <a class="btn btn-secondary rounded-pill px-3 px-sm-4" wire:click="cancel">
                        بازگشت
                    </a>
                </div>
            </div>
        </div>

        @if($licenseImage) 
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <div class="border rounded-3 p-3" style="width: 300px;">
                        <div class="d-flex justify-content-center p-3">
                            <img width="250" src="{{$licenseImage->temporaryUrl()}}">    
                        </div>
                    </div>  
                </div>
            </div>
        @endif

    </form>
</div>