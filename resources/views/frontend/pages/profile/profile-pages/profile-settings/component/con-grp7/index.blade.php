<div>
    <form wire:submit.prevent="saveProfile" class="needs-validation" novalidate>
        <!-- Account details -->
        <div class="row pt-4 mt-2">
            <div class="col-lg-3">
                <h2 class="h5 font-vazir">اطلاعات حساب کاربری</h2>
            </div>
            <div class="col-lg-9">
                <div class="border rounded-3 p-3" id="account-details">
                    <div class="row">
                        <div class="col-md-8 d-flex flex-column justify-content-center">
                            <!-- Full name-->
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="ps-2">
                                        <label class="form-label fw-bold">نام و نام خانوادگی</label>
                                        <div id="fn-value">
                                            {{auth()->user()->firstname}} {{auth()->user()->lastname}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Phone number-->
                            <div class="">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <div class="ps-2">
                                        <label class="form-label fw-bold">شماره تماس</label>
                                        <div id="phone-value">
                                            {{auth()->user()->phone}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Profile picture -->
                            <div class="">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div wire:ignore x-data x-init="
                                        FilePond.setOptions({
                                            server: {
                                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                    @this.upload('profile_image', file, load, error, progress)
                                                },
                                                revert: (filename, load) => {
                                                    @this.removeUpload('profile_image', filename, load)
                                                },
                                            },
                                            @if($profile_image)
                                                files: [
                                                    {
                                                        source: '{{$profile_image}}',
                                                        options:{
                                                            type: 'public'
                                                        }
                                                    }
                                                ]
                                            @endif
                                        });
                                        var Pond = FilePond.create($refs.input);
                                        this.addEventListener('pondReset', e => {
                                            Pond.removeFiles();
                                        });
                                    ">
                                        <div class="flex-shrink-0 order-sm-2" style="width: 10rem; height: 10rem;">
                                            <input 
                                            class="file-uploader bg-secondary"
                                            type="file" 
                                            accept="image/png, image/jpeg"
                                            data-label-idle="&lt;i class=&quot;d-inline-block fi-camera-plus fs-2 text-muted mb-2&quot;&gt;&lt;/i&gt;&lt;br&gt;&lt;span class=&quot;fw-bold&quot;&gt;تغییر تصویر پروفایل&lt;/span&gt;"
                                            data-style-panel-layout="compact" 
                                            data-image-preview-height="160" 
                                            data-image-crop-aspect-ratio="1:1" 
                                            data-image-resize-target-width="200"
                                            data-image-resize-target-height="200"
                                            wire:model="profile_image">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($errors->has('profile_image'))
                                <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                            @endif  
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Activity details -->
        <div class="row pt-4 mt-2">
            <div class="col-lg-3">
                <h2 class="h5 font-vazir">نوع فعالیت حساب کاربری</h2>
            </div>
            <div class="col-lg-9">
                <div class="border rounded-3 p-3" id="account-details">
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column justify-content-center">
                            <!-- Activity Field -->
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="ps-2">
                                        <label class="form-label fw-bold">نوع فعالیت حساب کاربری</label>
                                        <div id="activity-field-value">
                                            {{auth()->user()->userGroupType->groupable->conAct->title}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Account activity group -->
                            <div class="">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="ps-2">
                                        <label class="form-label fw-bold">گروه بندی حساب کاربری</label>
                                        <div id="activity-field-value">
                                            {{auth()->user()->userGroupType->groupable->title}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Type -->
        <div class="row pt-4 mt-2">
            <div class="col-md-3">
                <h2 class="h5 font-vazir">جزئیات پیمانکار</h2>
            </div>
            <div class="col-md-9">
                <div class="border rounded-3 p-3">
                    <div class="row pb-3">
                        <div class="col-md-12">
                            <div class="">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="ps-2">
                                        <label class="form-label fw-bold">نوع پیمانکار</label>
                                        <span class="text-danger">*</span>
                                    </div>
                                </div>
                                <select class="form-select mt-3" wire:model="companyType" wire:change="changeCompanyType($event.target.value)">
                                    <option selected value="" disabled>انتخاب نوع پیمانکار</option>
                                    <option value="corporate">پیمانکار شرکتی</option>
                                    <option value="independent">پیمانکار شخصی</option>
                                </select>
                                @if($errors->has('companyType'))
                                    <span class="text-danger">{{ $errors->first('companyType') }}</span>
                                @endif   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Company Specs -->
        @if($showCompanySpecs)
            <div class="row pt-4 mt-2" wire:transition>
                <div class="col-lg-3">
                    <h2 class="h5 font-vazir">
                        مشخصات شرکت
                    </h2>
                </div>
                <div class="col-lg-9">
                    <div class="border rounded-3 p-3" id="company-specs">
                        <div class="row">
                            <div class="col-md-12 d-flex flex-column justify-content-center">
                            
                                <div class="border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ps-2">
                                            <label class="form-label fw-bold">نام شرکت</label>
                                            <span class="text-danger">*</span>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control mt-3" type="text" wire:model="companyName" placeholder="نام شرکت را وارد نمایید">
                                    </div>
                                    @if($errors->has('companyName'))
                                        <span class="text-danger">{{ $errors->first('companyName') }}</span>
                                    @endif 
                                </div>

                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ps-2">
                                            <label class="form-label fw-bold">شماره ثبت</label>
                                            <span class="text-danger">*</span>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="form-control mt-3" type="text" wire:model="companyRegNum" placeholder="شماره ثبت شرکت را وارد نمایید">
                                    </div>
                                    @if($errors->has('companyRegNum'))
                                        <span class="text-danger">{{ $errors->first('companyRegNum') }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    
       <!-- Company details -->
       <div class="row pt-4 mt-2">
        <div class="col-md-3">
            <h2 class="h5 font-vazir">زمینه فعالیت</h2>
        </div>

        <div class="col-md-9">
            <div class="border rounded-3 p-3">
                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            لطفا زمینه فعالیت خود را با توجه به دسته بندی های زیر تعیین نمایید
                        </label>
                        <span class="text-danger">*</span>
                        @if($errors->has('shopActGrpsId'))
                            <span class="text-danger">{{ $errors->first('shopActGrpsId') }}</span>
                        @endif 

                        <div class="mt-3">
                            <label class="form-label fw-bold pb-1 mb-2">انبوه سازی ساختمان</label>
                        </div>
                 
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsMassConstArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_mass_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_mass_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            پیمانکاران کل
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsWholeContractorArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_whole_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_whole_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            خاکبرداری و ایمنی گود
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsExcavationArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_excav_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_excav_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            اجرای فونداسیون، اسکلت و سقف
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsFoundationArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_foundation_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_foundation_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            اجرای نما
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsExteriorArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_exterior_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_exterior_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            تأسیسات برقی و مکانیکی
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-3 gx-3 gx-lg-3 skills">
                            @foreach($shopActGrpsMechanicalArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_mechanical_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_mechanical_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            اجرای انواع عایق
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsInsulationArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_insulation_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_insulation_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            پیمانکاران متفرقه
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsOtherArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_other_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_other_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            درب و پنجره
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsDoorArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_door_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_door_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            دکوراسیون داخلی
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsInteriorArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_interior_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_interior_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-bold pb-1 mb-2">
                            محوطه سازی باغ و پارک
                        </label>
                        
                        <div class="row row-cols-sm-2 row-cols-md-4 gx-3 gx-lg-4 skills">
                            @foreach($shopActGrpsGardenArray as $chunkArray)
                                <div class="col">
                                    @foreach($chunkArray as $chunkItem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="shop_act_grps_park_{{$chunkItem['id']}}"
                                                wire:model="shopActGrpsId.{{$chunkItem['id']}}">
                                            <label class="form-check-label" for="shop_act_grps_park_{{$chunkItem['id']}}">
                                                {{$chunkItem['title']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
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
                    {{-- <button class="btn btn-link btn-sm px-0" type="button"><i class="fi-trash me-2"></i>حذف اکانت</button> --}}
                </div>
            </div>
        </div>
    </form>
</div>