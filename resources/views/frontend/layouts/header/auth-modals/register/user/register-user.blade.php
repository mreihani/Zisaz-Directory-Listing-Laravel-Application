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
                <label class="form-label" for="user-registration-email">پست الکترونیکی (اختیاری)</label>
                <input class="form-control" name="email" type="email" id="user-registration-email" placeholder="example@gmail.com" wire:model="email" dir="ltr">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif  
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="type_of_activity"> نوع فعالیت حساب کاربری را تعیین نمایید<span class="text-danger">*</span></label>
                <select class="form-select form-select-md" wire:model="type_of_activity_id" wire:change="loadUserAccountOnChange($event.target.value)">
                    <option value="" disabled>انتخاب نوع فعالیت</option>
                    @foreach ($typeOfActivityObj as $typeOfActivityItem)
                        <option value="{{$typeOfActivityItem->id}}">
                            {{$typeOfActivityItem->title}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('type_of_activity_id'))
                    <span class="text-danger">{{ $errors->first('type_of_activity_id') }}</span>
                @endif   
            </div>
            <div class="col-sm-6 mb-4">
                <label class="form-label" for="user_account_category">گروه بندی حساب کاربری را تعیین نمایید <span class="text-danger">*</span></label>
                <select class="form-select form-select-md" wire:model="user_account_category_id">
                    <option value="" selected="true" disabled>انتخاب گروه بندی حساب کاربری</option>
                    @foreach ($userAccountCategoryObj as $userAccountCategoryItem)
                        <option value="{{$userAccountCategoryItem->id}}">
                            {{$userAccountCategoryItem->title}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('user_account_category_id'))
                    <span class="text-danger">{{ $errors->first('user_account_category_id') }}</span>
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

        <div wire:loading.remove wire:target="registerUser">
            <button wire:key class="btn btn-primary btn-lg w-100 rounded-pill mt-4" type="submit">
                ثبت نام
            </button>
        </div>    

        <div class="d-flex justify-content-center">
            <div wire:loading wire:target="registerUser">
                <button wire:key class="btn btn-primary btn-lg w-100">
                    <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
                    در حال ارسال پیامک
                </button>
            </div>
        </div>

    </form>
</div>