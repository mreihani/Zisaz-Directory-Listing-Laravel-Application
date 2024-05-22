<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش اطلاعات مربوط به خدمات کسب و کار خود را برای کاربران نمایش دهید.
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
                        <input class="form-check-input" type="checkbox" id="is-section-displayed" wire:model="isHidden">
                        <label class="form-check-label" for="is-section-displayed">
                            با تایید این گزینه این بخش در وبسایت شما نمایش داده خواهد شد
                        </label>
                    </div>
                </div>
            </div>

            <!-- About information-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات خدمات ما
            </h2>

            <div class="row">

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-header-description">
                        شرح خدمات
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="text" id="pr-business-header-description" placeholder="شرح مختصری از خدمات را وارد کنید" wire:model="headerDescription">

                    @if($errors->has('headerDescription'))
                        <span class="text-danger">{{ $errors->first('headerDescription') }}</span>
                    @endif
                </div>
            
            </div>

            <!-- Service Item Repeater -->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-list text-primary fs-5 mt-n1 me-2"></i>
                موارد خدمات
            </h2>

            @foreach ($itemInputs as $itemKey => $itemValue)
               <div class="row mt-3">
                    <div class="col-sm-10">

                        <div class="mb-2">
                            <label class="form-label fw-bold" for="pr-description">
                                خدمت مورد نظر را شرح دهید
                                <span class="text-danger">*</span>
                            </label>

                            
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <div>
                                        <input class="form-control" type="text" wire:model="itemTitle.{{$itemValue}}" placeholder="عنوان خدمت را وارد نمایید">
                                    </div>
                                    @error('itemTitle.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <div>
                                        <textarea class="form-control" wire:model="itemDescription.{{$itemValue}}" rows="5" placeholder="توضیحات کوتاه در مورد خدمت وارد کنید"></textarea>
                                    </div>
                                    @error('itemDescription.'.$itemValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                        <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeItem({{$itemKey}})">
                            <i class="fi-trash fs-sm me-2"></i>
                            حذف
                        </button>
                    </div>
                </div>

            @endforeach
            
            <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addItem({{$itemIteration}})">
                <i class="fi-plus fs-sm me-2"></i>
                افزودن خدمت دیگر
            </button>
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