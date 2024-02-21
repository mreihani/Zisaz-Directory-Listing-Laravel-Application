<div>
    <h4 class="font-vazir">برای ثبت آگهی ثبت نام کنید.</h4>
    <p class="pb-3">دسترسی به کلیه خدمات ویژه کارفرمایان در وب سایت.</p>
    <form wire:submit.prevent="registerEmployer" class="needs-validation" novalidate>
        <div class="row gx-2 gx-md-4">
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="js-fn-firstname">نام *</label>
                <input class="form-control" name="firstname" type="text" id="js-fn-firstname" placeholder="نام خود را وارد کنید" required wire:model="firstname">
                @if($errors->has('firstname'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif 
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="js-fn-lastname">نام خانوادگی *</label>
                <input class="form-control" name="lastname" type="text" id="js-fn-lastname" placeholder="نام خانوادگی خود را وارد کنید" required wire:model="lastname">
                @if($errors->has('lastname'))
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                @endif    
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="employer-registration-phone">شماره تلفن *</label>
                <input class="form-control" name="phone" type="phone" id="employer-registration-phone" placeholder="09123456789" required wire:model="phone" dir="ltr">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif   
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="js-email-email">پست الکترونیکی *</label>
                <input class="form-control" name="email" type="email" id="js-email-email" placeholder="example@gmail.com" required wire:model="email" dir="ltr">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif  
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="business_name">نام کسب و کار یا شرکت *</label>
                <input class="form-control" type="text" id="business_name" placeholder="نام شرکت را وارد کنید" required wire:model="business_name">
                @if($errors->has('business_name'))
                    <span class="text-danger">{{ $errors->first('business_name') }}</span>
                @endif  
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="type">نوع کسب و کار</label>
                <select class="form-select" id="type" name="type" wire:model="type">
                    <option value="business_owner">
                        صاحب کسب و کار (حقیقی)
                    </option>
                    <option value="company">
                        شرکت ها (حقوقی)
                    </option>
                    <option value="freelancer">
                        متخصصین
                    </option>
                </select>
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="agree-to-terms" required name="terms_and_conditions" wire:model="terms_and_conditions">
            <label class="form-check-label" for="agree-to-terms">با ثبت نام در این سایت <a href='#'> شرایط</a> و <a href='#'>قوانین </a> سایت را قبول دارم.</label>
        </div>
        @if($errors->has('terms_and_conditions'))
            <span class="text-danger mb-4">{{ $errors->first('terms_and_conditions') }}</span>
        @endif 
        <button wire:key class="btn btn-primary btn-lg w-100 rounded-pill" type="submit">ثبت نام</button>
    </form>
</div>