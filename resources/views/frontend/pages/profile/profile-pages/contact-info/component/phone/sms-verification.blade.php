<div wire:transition>
    <form wire:submit.prevent="userVerificationCode" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-10">
                <div class="mt-3">
                    <input class="form-control" type="text" placeholder="کد تأیید پیامک شده را وارد نمایید" wire:model="verification_code_login">
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-sm btn-translucent-accent mt-3">
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

