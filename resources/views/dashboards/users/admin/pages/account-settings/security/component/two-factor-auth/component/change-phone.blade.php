<div>
    <form wire:submit.prevent="changePhone" class="needs-validation mb-4" novalidate>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex input-group flex-row">
                    <input class="form-control" type="phone" placeholder="0910 000 0000" wire:model="phone" dir="ltr" style="">
                    <button class="btn btn-success disabled">
                        تأیید شده
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-start">
                    <div wire:loading.remove wire:target="changePhone">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            تغییر شماره
                        </button>
                    </div>
                    <div wire:loading wire:target="changePhone"> 
                        <button class="btn btn-secondary waves-effect waves-light">
                            <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
                            در حال ارسال
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('phone'))
            <div class="mt-2">
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            </div>
        @endif
    </form>   
</div>