<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش می توانید آگهی های خود را برای کاربران نمایش دهید.
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

           <!-- About information-->
           <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات آگهی ها
            </h2>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-description">
                        توضیحات
                    </label>
                    <span class="text-danger">*</span>
                    <textarea {{ $isHidden == true ? 'disabled' : '' }} class="form-control form-control-md" type="text" id="pr-business-header-description" placeholder="توضیحات مرتبط با آگهی های خود را وارد نمایید" wire:model="headerDescription"></textarea>
                    
                    @if($errors->has('headerDescription'))
                        <span class="text-danger">{{ $errors->first('headerDescription') }}</span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold">
                        انتخاب نوع آگهی برای نمایش در سامانه
                    </label>
                    <span class="text-danger">*</span>

                    @if($errors->has('adsValidation'))
                        <span class="text-danger">{{ $errors->first('adsValidation') }}</span>
                    @endif
                    <input type="hidden" wire:model="adsValidation">
                    
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-selling-displayed" wire:model="isSelling">
                        <label class="form-check-label" for="is-selling-displayed">
                            آگهی فروش کالا
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-investment-displayed" wire:model="isInvestment">
                        <label class="form-check-label" for="is-investment-displayed">
                            آگهی شراکت و سرمایه گذاری
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-bid-displayed" wire:model="isBid">
                        <label class="form-check-label" for="is-bid-displayed">
                            آگهی مزایده و مناقصه
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-inquiry-displayed" wire:model="isInquiry">
                        <label class="form-check-label" for="is-inquiry-displayed">
                            آگهی استعلام قیمت
                        </label>
                    </div>
                    <div class="form-check">
                        <input {{ $isHidden == true ? 'disabled' : '' }} class="form-check-input" type="checkbox" id="is-contractor-displayed" wire:model="isContractor">
                        <label class="form-check-label" for="is-contractor-displayed">
                            آگهی پیمانکاری
                        </label>
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