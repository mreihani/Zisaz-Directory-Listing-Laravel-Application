<div>
    <form wire:submit.prevent="loginUser" class="needs-validation" novalidate>
        <div class="mb-3">
            <label class="form-label" for="phone">شماره تلفن</label>
            <input autofocus class="form-control" id="phone" wire:model="phone" placeholder="شماره تلفن خود را وارد کنید" type="text"/>
            
            <div>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif  
            </div>
        </div>

        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">رمز عبور</label>
            </div>
            <div class="input-group input-group-merge">
                <input aria-describedby="password" class="form-control" id="password" wire:model="password" placeholder="············" type="password"/>
                <span class="input-group-text cursor-pointer">
                    <i class="ti ti-eye-off"></i>
                </span>
            </div>
            @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif  
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" id="remember" wire:model="remember" type="checkbox"/>
                <label class="form-check-label" for="remember"> مرا به خاطر بسپار</label>
            </div>
        </div>
        
        <div class="mb-3" wire:loading.remove wire:target="loginUser">
            <button class="btn btn-primary d-grid w-100" type="submit">ورود به سامانه</button>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <div wire:loading wire:target="loginUser">
                <span class="btn btn-secondary w-100">
                    <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
                    در حال ورود
                </span>
            </div>
        </div>

    </form>

    <!-- SMS Verification Modal-->
    <div class="mb-2">
        @if($smsVerificationSectionVisible)
            @livewire('dashboards.auth.login.sms-verification')
        @endif
    </div>
</div>