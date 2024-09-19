<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">
            
            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <h4 class="pt-2 alert-heading">به طراحی صفحه کسب و کار خوش آمدید!</h4>
                    <ul>
                        <li>
                            برای طراحی صفحه کسب و کار خود، بایستی 5 مرحله روبرو را با دقت تکمیل نمایید. 
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
                    در این بخش اطلاعات عمومی کسب و کار خود را وارد نمایید.
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

            <!-- Business Type-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات عمومی
            </h2>

            <div class="row">
                <!-- Hero Motto-->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-slug">
                        اسلاگ یا URL
                    </label>
                    <span class="fw-bold">(اختیاری)</span>
                    <input class="form-control form-control-md" type="text" id="pr-business-slug" placeholder="اسلاگ مربوط به صفحه شخصی خود را وارد نمایید" wire:model="slug">

                    @if($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
            </div>

            <!-- About information-->
            <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
                اطلاعات درباره ما
            </h2>
           
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-about-us-title">
                        نام کسب و کار
                    </label>
                    <span class="text-danger">*</span>
                    <input class="form-control form-control-md" type="text" id="pr-business-about-us-title" placeholder="نام کسب و کار خود را وارد کنید" wire:model="title">

                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-business-about-us">
                        درباره ما
                    </label>
                    <span class="text-danger">*</span>

                    <textarea class="form-control" rows="5" id="pr-business-about-us" placeholder="توضیحات کوتاه در مورد کسب و کار خود وارد کنید" wire:model="aboutUs"></textarea>

                    @if($errors->has('aboutUs'))
                        <span class="text-danger">{{ $errors->first('aboutUs') }}</span>
                    @endif
                </div>
            </div>

            <!-- Upload Image -->
            <div class="mb-4 mt-3">
                <span class="h5 font-vazir">
                    <i class="fi-image text-primary fs-5 mt-n1 me-2"></i>
                    بارگذاری تصاویر
                </span>
                <label>
                    (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                </label>
            </div>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-description">
                        لوگوی کسب و کار خود را بارگذاری نمایید
                        <span class="text-danger">*</span>
                    </label>

                    <input type="hidden" wire:model="logoValidation">

                    @if($errors->has('logoValidation'))
                        <div class="text-danger">{{ $errors->first('logoValidation') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="mb-3">
                                <input class="form-control" type="file" wire:model="logo">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            @if($logo !== null && !is_string($logo)) 
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{$logo->temporaryUrl()}}">    
                                    </div>
                                </div>
                            @elseif($logo !== null && is_string($logo))
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{asset($logo)}}">    
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-description">
                        تصویر تابلو کسب و کار را بارگذاری نمایید
                        <span class="text-danger">*</span>
                    </label>

                    <input type="hidden" wire:model="businessBannerValidation">

                    @if($errors->has('businessBannerValidation'))
                        <div class="text-danger">{{ $errors->first('businessBannerValidation') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="mb-3">
                                <input class="form-control" type="file" wire:model="businessBanner">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            @if($businessBanner !== null && !is_string($businessBanner)) 
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{$businessBanner->temporaryUrl()}}">    
                                    </div>
                                </div>
                            @elseif($businessBanner !== null && is_string($businessBanner))
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{asset($businessBanner)}}">    
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
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