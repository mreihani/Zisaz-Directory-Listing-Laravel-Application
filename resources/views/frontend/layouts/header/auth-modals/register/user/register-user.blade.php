<div>
    <form wire:submit.prevent="registerUser" class="needs-validation" novalidate>
        <div class="row gx-2 gx-md-4">
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="user-registration-firstname">نام *</label>
                <input class="form-control" name="firstname" type="text" id="user-registration-firstname" placeholder="نام خود را وارد کنید" required wire:model="firstname">
                @if($errors->has('firstname'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif    
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="user-registration-lastname">نام خانوادگی *</label>
                <input class="form-control" name="lastname" type="text" id="user-registration-lastname" placeholder="نام خانوادگی خود را وارد کنید" required wire:model="lastname">
                @if($errors->has('lastname'))
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                @endif    
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="user-registration-phone">شماره تلفن *</label>
                <input class="form-control" name="phone" type="phone" id="user-registration-phone" placeholder="09123456789" required wire:model="phone" dir="ltr">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif   
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="user-registration-email">پست الکترونیکی *</label>
                <input class="form-control" name="email" type="email" id="user-registration-email" placeholder="example@gmail.com" required wire:model="email" dir="ltr">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif  
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="user-registration-agree-to-terms" required name="terms_and_conditions" wire:model="terms_and_conditions">
            <label class="form-check-label" for="agree-to-terms">با ثبت نام در این سایت <a href='#'> شرایط</a> و <a href='#'>قوانین </a> سایت را قبول دارم.</label>
        </div>
        @if($errors->has('terms_and_conditions'))
            <span class="text-danger mb-4">{{ $errors->first('terms_and_conditions') }}</span>
        @endif 
        <button wire:key class="btn btn-primary btn-lg w-100 rounded-pill mt-4" type="submit">ثبت نام</button>
    </form>
</div>