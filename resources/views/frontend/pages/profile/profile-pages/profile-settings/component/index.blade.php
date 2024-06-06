<div class="col-lg-8 col-md-7 mb-5 account">

    <h1 class="h2">
        اطلاعات حساب کاربری
    </h1>

    <!-- Change Phone number-->
    <div class="row pt-4 mt-2 mb-4">
        <div class="col-lg-12">
            <div class="border rounded-3 p-3">
                <div class="">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="ps-2">
                            <label class="form-label fw-bold">شماره همراه</label>
                        </div>
                    </div>
                    @livewire('frontend.pages.profile.profile-pages.profile-settings.phone.index')
                </div>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="saveProfile" class="needs-validation" novalidate>
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

        <div class="d-flex align-items-center justify-content-between mt-4 pb-1">
            <button class="btn btn-primary px-3 px-sm-4" type="submit">
                ذخیره تغییرات
            </button>
        </div>
    </form>
</div>








