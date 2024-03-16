<div>
    <form wire:submit.prevent="saveProfile" class="needs-validation" novalidate>
        <div class="card mb-4">
            <h5 class="card-header">جزئیات پروفایل</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    @if($profileImage && is_string($profileImage))
                        <img class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" style="background: url('{{$profileImage}}'); background-size: cover;">
                    @elseif($profileImage && !is_string($profileImage))
                        <img class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" style="background: url('{{$profileImage->temporaryUrl()}}'); background-size: cover;">
                    @else
                        <span class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" style="background: url('{{asset('assets/dashboards/assets/img/jaban/user.png')}}'); background-size: cover;"></span>
                    @endif
                    <div class="button-wrapper">
                        <label class="btn btn-primary me-2 mb-3 waves-effect waves-light" for="upload" tabindex="0">
                            <span class="d-none d-sm-block">آپلود عکس جدید</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input accept="image/png, image/jpeg" class="account-file-input" hidden="" id="upload" type="file" wire:model="profileImage">
                        </label>
                        <div class="text-muted">حداکثر 5 مگابایت و با فرمت png, jpeg ,jpg</div>
                        @if($errors->has('profileImage'))
                            <div class="mt-1">
                                <span class="text-danger">{{ $errors->first('profileImage') }}</span>
                            </div>
                        @endif 
                    </div>
                </div>
            </div>

            <hr class="my-0">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="firstname">نام</label>
                        <input disabled class="form-control" id="firstname" type="text" value="{{auth()->user()->firstname}}">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="mb-3 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="lastname">نام خانوادگی</label>
                        <input disabled class="form-control" type="text" value="{{auth()->user()->lastname}}">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="email">ایمیل</label>
                        <input disabled class="form-control" id="email" value="{{auth()->user()->email}}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">شماره تلفن</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control ltr" id="phoneNumber" type="text" value="{{auth()->user()->phone}}" wire:model="phone">
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary me-2 waves-effect waves-light" type="submit">ذخیره تغییرات</button>
                    <a class="btn btn-label-secondary waves-effect" href="{{route('admin.dashboard.index')}}">لغو</a>
                </div>
            </div>
            <!-- /Account -->
        </div>
    </form>    
</div>