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
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold" for="pr-fn">نام </label>
                    <input {{empty(auth()->user()->firstname) ? '' : 'disabled'}} class="form-control form-control-md" type="text" id="pr-fn" wire:model="firstname" placeholder="نام خود را وارد نمایید">

                    @if($errors->has('firstname'))
                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                    @endif  
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold" for="pr-sn">نام خانوادگی </label>
                    <input {{empty(auth()->user()->lastname) ? '' : 'disabled'}} class="form-control form-control-md" type="text" id="pr-sn" wire:model="lastname" placeholder="نام خانوادگی خود را وارد نمایید">

                    @if($errors->has('lastname'))
                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                    @endif  
                </div>
                <div class="col-sm-6 mb-4">
                    <label class="form-label fw-bold" for="pr-sn">شماره تماس </label>
                    <input disabled class="form-control form-control-md" type="text" id="pr-sn" value="{{auth()->user()->phone}}" placeholder="">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="border rounded-3 p-3" id="auth-info">
                        <!-- Bio-->
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="ps-2">
                                    <label class="form-label fw-bold">
                                        توضیح مختصر درباره خود بنویسید
                                    </label>
                                    <span class="">
                                        (اختیاری)
                                    </span>
                                </div>
                            </div>
                            <div>
                                <textarea class="form-control" id="account-bio" rows="6" wire:model="constructorBio" placeholder="بیوگرافی خود را اینجا بنویسید"></textarea>
                            </div>
                            @if($errors->has('constructorBio'))
                                <span class="text-danger">{{ $errors->first('constructorBio') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
          
           <h2 class="h5 font-vazir mb-4 mt-5">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات پروژه
            </h2>

            <!-- Project title -->
            <div class="col-md-12 mb-4">
                <label class="form-label fw-bold" for="pr-business-project-name">
                    نام پروژه
                </label>
                <span class="text-danger">*</span>
                <input class="form-control form-control-md" type="text" id="pr-business-project-name" placeholder="نام پروژه را وارد نمایید" wire:model="title">

                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <!-- Business Type-->
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

                <!-- Total Floor Area -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-floor-area">
                        مساحت کل زیر بنا
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="number" id="pr-floor-area" placeholder="مساحت کل زیر بنا را وارد نمایید" wire:model="floorArea">

                    @if($errors->has('floorArea'))
                        <span class="text-danger">{{ $errors->first('floorArea') }}</span>
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