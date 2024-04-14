<div>
    <form wire:submit.prevent="userVerificationCode" class="needs-validation mb-4" novalidate>
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <input autofocus class="form-control" type="text" placeholder="کد تأیید پیامک شده را وارد نمایید" wire:model="verification_code_login">
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-start">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        تأیید شماره
                    </button>
                </div>
            </div>
        </div>
        @if($errors->has('verification_code_login'))
            <span class="text-danger">{{ $errors->first('verification_code_login') }}</span>
        @endif
    </form>
</div>

