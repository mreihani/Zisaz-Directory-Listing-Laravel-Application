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
    
        <!-- Shop details -->
        <div class="row pt-4 mt-2">
            <div class="col-md-3">
                <h2 class="h5 font-vazir">اطلاعات فروشگاه</h2>
            </div>

            <div class="col-md-9">
                <div class="border rounded-3 p-3">
                    <div class="row pb-3 mb-2">
                        <div class="col-md-12">
                            <div class="border-bottom pb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="ps-2">
                                        <label class="form-label fw-bold">
                                            نام فروشگاه
                                        </label>
                                        <span class="text-danger">*</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <input class="form-control mt-3" type="text" placeholder="نام فروشگاه خود را وارد نمایید" wire:model="shop_name">
                                </div>
                                @if($errors->has('shop_name'))
                                    <span class="text-danger">{{ $errors->first('shop_name') }}</span>
                                @endif   
                            </div>
                        </div>
                    </div>

                    <div class="row pb-3">
                        <div class="col-sm-6 mb-4">
                            <label class="form-label" for="type_of_activity"> صنف فعالیت فروشگاه را تعیین نمایید<span class="text-danger">*</span></label>
                            <select class="form-select form-select-md" wire:model="type_of_activity_id" wire:change="loadShopActivityGrpOnChange($event.target.value)">
                                <option value="" disabled>انتخاب صنف فعالیت</option>
                                @foreach ($typeOfActivityObj as $typeOfActivityItem)
                                    <option value="{{$typeOfActivityItem->id}}">
                                        {{$typeOfActivityItem->title}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('type_of_activity_id'))
                                <span class="text-danger">{{ $errors->first('type_of_activity_id') }}</span>
                            @endif   
                        </div>
                      
                        <div class="col-sm-6 mb-4">
                            <label class="form-label" for="user_account_category">گروه بندی صنف را تعیین نمایید <span class="text-danger">*</span></label>
                            <select class="form-select form-select-md" wire:model="shop_act_grps_id">
                                <option value="" selected="true" disabled>انتخاب گروه بندی صنف</option>
                                @foreach ($activityGroupObj as $activityGroupItem)
                                    <option value="{{$activityGroupItem->id}}">
                                        {{$activityGroupItem->title}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('shop_act_grps_id'))
                                <span class="text-danger">{{ $errors->first('shop_act_grps_id') }}</span>
                            @endif   
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








