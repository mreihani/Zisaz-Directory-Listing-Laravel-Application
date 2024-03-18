<div>
    <div class="card mb-4">
        <h5 class="card-header">تغییر رمز عبور</h5>
        <div class="card-body">
            <form wire:submit.prevent="save" class="needs-validation" novalidate>
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="currentPassword">رمز عبور فعلی</label>
                        <div class="input-group input-group-merge has-validation">
                            <input class="form-control" id="currentPassword" wire:model="currentPassword" placeholder="············" type="password">
                            <span class="input-group-text cursor-pointer">
                                <i class="ti ti-eye-off"></i>
                            </span>
                        </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    @if($errors->has('currentPassword'))
                        <div class="mt-1">
                            <span class="text-danger">{{ $errors->first('currentPassword') }}</span>
                        </div>
                    @endif 
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="newPassword">رمز عبور جدید</label>
                        <div class="input-group input-group-merge has-validation">
                            <input class="form-control" id="newPassword" wire:model="password" placeholder="············" type="password">
                            <span class="input-group-text cursor-pointer">
                                <i class="ti ti-eye-off"></i>
                            </span>
                        </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        @if($errors->has('password'))
                            <div class="mt-1">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        @endif 
                    </div>
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="confirmPassword">تأیید رمز عبور جدید</label>
                        <div class="input-group input-group-merge has-validation">
                            <input class="form-control" id="confirmPassword" wire:model="password_confirmation" placeholder="············" type="password">
                            <span class="input-group-text cursor-pointer">
                                <i class="ti ti-eye-off"></i>
                            </span>
                        </div><div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        @if($errors->has('password_confirmation'))
                            <div class="mt-1">
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        @endif 
                    </div>
                    <div class="col-12 mb-4">
                        <h6>توصیه می شود رمز عبور شامل این موارد باشد:</h6>
                        <ul class="ps-3 mb-0">
                            <li class="mb-1">حداقل 8 کارکتر</li>
                            <li class="mb-1">حداقل یک حرف کوچک</li>
                            <li>حداقل یک عدد یا نماد خاص</li>
                        </ul>
                    </div>
                    <div>
                        <button class="btn btn-primary me-2 waves-effect waves-light" type="submit">بروزرسانی رمز</button>
                        <a class="btn btn-label-secondary waves-effect" href="{{route('admin.dashboard.index')}}">لغو</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>