<div>
    <form wire:submit.prevent="save" class="needs-validation mb-2" novalidate>
        <h5>
            ورود دو مرحله ای
        </h5>
        <p class="w-75"> احراز هویت دو مرحله ای با ارسال پیامک، یک لایه امنیتی اضافی به حساب شما اضافه می کند.</p>

        <div class="form-check form-switch mt-2">
            <input class="form-check-input" id="flexSwitchCheckDefault" type="checkbox" wire:model="twoFactorAuth">
            <label class="form-check-label" for="flexSwitchCheckDefault">
                وضعیت ورود دو مرحله ای
            </label>
        </div>

        <button type="submit" class="btn btn-primary waves-effect waves-light mt-3">
            ذخیره
        </button>
    </form>    
</div>