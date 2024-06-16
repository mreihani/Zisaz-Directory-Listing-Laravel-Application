<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="projectId">

            <!-- Alert message-->
            <div class="alert alert-accent" role="alert">
                <h4 class="pt-2 alert-heading">
                    ثبت پروژه
                </h4>
                    <ul>
                        <li>
                            برای ثبت پروژه خود، بایستی 4 مرحله روبرو را با دقت تکمیل نمایید. 
                        </li>
                        <li>
                            اطلاعات وارد شده در هر قسمت پس از زدن دکمه "مرحله بعد" در سامانه ذخیره می شود. 
                        </li>
                        <li>
                            اگر در هر مرحله نیاز به توضیح بیشتری داشتید می توانید با پشتیبانی تماس حاصل فرمایید.
                        </li>
                    </ul>
                <hr>
                <p class="pt-3 mb-2">
                    در این قسمت اطلاعات و تصاویر پروژه از شما دریافت می گردد.
                </p>
            </div>

            <!-- Personal info-->
            <h2 class="h5 font-vazir mb-4">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات فردی
            </h2>

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

           <!-- Business Type-->
           <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات پروژه
            </h2>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold">
                        نوع پروژه را مشخص نمایید
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select form-select-md" wire:model="projectType">
                        <option value="" disabled="">انتخاب نوع پروژه</option>
                        <option value="1">
                            پروژه مسکونی
                        </option>
                        <option value="2">
                            پروژه تجاری 
                        </option>
                        <option value="3">
                            پروژه تجاری مسکونی
                        </option>
                        <option value="4">
                            پروژه تجاری اداری 
                        </option>
                        <option value="5">
                            پروژه تفریحی و ورزشی 
                        </option>
                        <option value="6">
                            پروژه پزشکی درمانی 
                        </option>
                        <option value="7">
                            پروژه آموزشی 
                        </option>
                        <option value="8">
                            پروژه کشاورزی و صنعتی 
                        </option>
                        <option value="9">
                            سایر پروژه ها
                        </option>
                    </select>

                    @if($errors->has('projectType'))
                        <span class="text-danger">{{ $errors->first('projectType') }}</span>
                    @endif
                </div>

                <!-- Total Area -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-total-area">
                        مساحت کل زمین
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="number" id="pr-business-total-area" placeholder="مساحت کل زمین را وارد نمایید" wire:model="totalArea">

                    @if($errors->has('totalArea'))
                        <span class="text-danger">{{ $errors->first('totalArea') }}</span>
                    @endif
                </div>

                <!-- Floor Count -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-number-floors">
                        تعداد طبقات
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="number" id="pr-business-number-floors" placeholder="تعداد طبقات را وارد نمایید" wire:model="floorCount">

                    @if($errors->has('floorCount'))
                        <span class="text-danger">{{ $errors->first('floorCount') }}</span>
                    @endif
                </div>

                <!-- Residential Unit Count -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-residentian-unit-count">
                        تعداد واحد های مسکونی
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    <input class="form-control form-control-md" type="number" id="pr-business-residentian-unit-count" placeholder="تعداد واحد های مسکونی را وارد نمایید" wire:model="residentialUnitCount">

                    @if($errors->has('residentialUnitCount'))
                        <span class="text-danger">{{ $errors->first('residentialUnitCount') }}</span>
                    @endif
                </div>

                <!-- Commercial Unit Count -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-commercial-unit-count">
                        تعداد واحد های تجاری
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    <input class="form-control form-control-md" type="number" id="pr-business-commercial-unit-count" placeholder="تعداد واحد های تجاری را وارد نمایید" wire:model="commercialUnitCount">

                    @if($errors->has('commercialUnitCount'))
                        <span class="text-danger">{{ $errors->first('commercialUnitCount') }}</span>
                    @endif
                </div>

                <!-- Office Unit Count -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-office-unit-count">
                        تعداد واحد های اداری
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    <input class="form-control form-control-md" type="number" id="pr-business-office-unit-count" placeholder="تعداد واحد های اداری را وارد نمایید" wire:model="officeUnitCount">

                    @if($errors->has('officeUnitCount'))
                        <span class="text-danger">{{ $errors->first('officeUnitCount') }}</span>
                    @endif
                </div>
            </div>

            <!-- Project Images -->
            <div>
                @foreach ($projectInputs as $projectKey => $projectValue)
                    @if(count($projectImages) && isset($projectImages[$projectValue]) && is_string($projectImages[$projectValue]))
                        <div class="row mt-3">
                            <div class="col-sm-10">

                                <!-- File uploader -->
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="pr-description">
                                        تصویر پروژه را بارگذاری نمایید
                                        <span class="text-danger">*</span>
                                    </label>

                                    <label>
                                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                    </label>

                                    @error('projectImages.'.$projectValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <input disabled class="form-control image-input-selector" type="file" wire:model="projectImages.{{$projectValue}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12 d-flex justify-content-center">
                                                    <div class="border rounded-3 p-1" style="width: 150px;">
                                                        <div class="d-flex justify-content-center p-1">
                                                            <img src="{{asset($projectImages[$projectValue])}}">    
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeProjectImage({{$projectKey}})">
                                    <i class="fi-trash fs-sm me-2"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="row mt-3">
                            <div class="col-sm-10">

                                <!-- File uploader -->
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="pr-description">
                                        تصویر پروژه را بارگذاری نمایید
                                        <span class="text-danger">*</span>
                                    </label>

                                    <label>
                                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                                    </label>

                                    @error('projectImages.'.$projectValue) <div class="text-danger error mb-2">{{ $message }}</div> @enderror
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <input class="form-control" type="file" wire:model="projectImages.{{$projectValue}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            @if(count($projectImages) && isset($projectImages[$projectValue])) 
                                                <div class="row">
                                                    <div class="col-sm-12 d-flex justify-content-center">
                                                        <div class="border rounded-3 p-1" style="width: 150px;">
                                                            <div class="d-flex justify-content-center p-1">
                                                                <img src="{{$projectImages[$projectValue]->temporaryUrl()}}">    
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
                                <button class="btn btn-sm btn-outline-danger" type="button" wire:click="removeProjectImage({{$projectKey}})">
                                    <i class="fi-trash fs-sm me-2"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                <button class="btn btn-link btn-lg text-primary px-0 mb-md-n2" type="button" wire:click="addProjectImage({{$projectIteration}})">
                    <i class="fi-image fs-sm me-2"></i>
                    افزودن تصویر دیگر
                </button>
            </div>

        </div>

        <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
            <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                مرحله بعد
                <i class="fi-chevron-right fs-sm ms-2"></i>
            </button>
        </div>

    </form> 
</div>