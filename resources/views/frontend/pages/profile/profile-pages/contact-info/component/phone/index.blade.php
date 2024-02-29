<div>
    @if($confirmationCode)
        @livewire('frontend.pages.profile.profile-pages.contact-info.phone.sms-verification')
    @else 
        <form wire:submit.prevent="changePhone" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-9">
                    <div class="input-group flex-row-reverse mb-3">
                        <input class="form-control" type="phone" placeholder="شماره تلفن" wire:model="phone">
                        <button class="btn btn-success disabled">
                            <i class="fi-check-circle"></i>
                            تأیید شده
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex align-items-center justify-content-center">
                        <div wire:loading.remove wire:target="changePhone">
                            <button type="submit" class="btn btn-sm btn-translucent-accent mt-1">
                                <i class="fi-device-mobile"></i>
                                تغییر شماره
                            </button>
                        </div>
                        <div wire:loading wire:target="changePhone"> 
                            <button class="btn btn-sm btn-accent mt-1">
                                <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
                                در حال ارسال
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @if($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </form>    
    @endif
</div>