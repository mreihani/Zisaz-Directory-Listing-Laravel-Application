<div>
    <div class="modal fade" id="signup-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 734px;">
            <div class="modal-content">
                <div class="modal-body p-sm-5">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
                    <ul class="nav nav-pills flex-column flex-sm-row border-bottom pb-4 mt-sm-n2 my-4 justify-content-evenly" role="tablist">
                        <li class="nav-item ms-sm-3 mb-sm-0"><a class="nav-link active" href="#job-seeker" data-bs-toggle="tab" role="tab" aria-controls="job-seeker" aria-selected="true"><i class="fi-user me-2"></i>من کارجو هستم</a></li>
                        <li class="nav-item mb-sm-0"><a class="nav-link" href="#employer" data-bs-toggle="tab" role="tab" aria-controls="employer" aria-selected="false"><i class="fi-briefcase me-2"></i>من کارفرما هستم</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="job-seeker" role="tabpanel">
                            <form wire:submit.prevent="registerUser" class="needs-validation" novalidate>
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
                                        <label class="form-label" for="js-phone">شماره تلفن *</label>
                                        <input class="form-control" name="phone" type="phone" id="js-phone" placeholder="09123456789" required wire:model="phone">
                                        @if($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif   
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="js-email-email">پست الکترونیکی</label>
                                        <input class="form-control" name="email" type="email" id="js-email-email" placeholder="example@gmail.com" wire:model="email">
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif  
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agree-to-terms" required name="terms_and_conditions" wire:model="terms_and_conditions">
                                    <label class="form-check-label" for="agree-to-terms">با ثبت نام در این سایت <a href='#'> شرایط</a> و <a href='#'>قوانین </a> سایت را قبول دارم.</label>
                                </div>
                                @if($errors->has('terms_and_conditions'))
                                    <span class="text-danger mb-4">{{ $errors->first('terms_and_conditions') }}</span>
                                @endif 
                                <button wire:key class="btn btn-primary btn-lg w-100 rounded-pill mt-4" type="submit">ثبت نام</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="employer" role="tabpanel">
                            <h4 class="font-vazir">برای ثبت آگهی ثبت نام کنید.</h4>
                            <p class="pb-3">دسترسی به کلیه خدمات ویژه کارفرمایان در وب سایت.</p>
                            <form class="needs-validation" novalidate>
                                <div class="row gx-2 gx-md-4">
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="js-fn-employer-firstname">نام *</label>
                                        <input class="form-control" name="firstname" type="text" id="js-fn-employer-firstname" placeholder="نام خود را وارد کنید" required>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="js-fn-employer-lastname">نام خانوادگی *</label>
                                        <input class="form-control" name="lastname" type="text" id="js-fn-employer-lastname" placeholder="نام خانوادگی خود را وارد کنید" required>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="js-phone-employer-phone">شماره تلفن *</label>
                                        <input class="form-control" name="phone" type="number" id="js-phone-employer-phone" placeholder="شماره تلفن خود را وارد نمایید" required>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="js-email-employer-">پست الکترونیکی</label>
                                        <input class="form-control" name="email" type="email" id="js-email-employer-" placeholder="یک ایمیل معتبر وارد کنید">
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="em-company">نام شرکت</label>
                                        <input class="form-control" type="text" id="em-company" placeholder="نام شرکت را وارد کنید" required>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <label class="form-label" for="em-location">آدرس شرکت</label>
                                        <input class="form-control" type="text" id="em-location" placeholder="کشور , شهر , آدرس" required>
                                    </div>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="agree-to-terms2" required>
                                    <label class="form-check-label" for="agree-to-terms2">با ثبت نام در این سایت <a href='#'> شرایط</a> و <a href='#'>قوانین </a> سایت را قبول دارم.</label>
                                </div>
                                <button class="btn btn-primary btn-lg w-100 rounded-pill" type="submit">ثبت نام</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- SMS Verification Modal-->
                    @if($smsVerificationSectionVisible)
                        @livewire('frontend.auth.register.sms-verification') 
                    @endif

                    <div class="pt-4 pb-3 pb-sm-0 mt-2">قبلا ثبت نام کرده اید؟ 
                        <a href="#signin-modal" data-bs-toggle="modal" data-bs-dismiss="modal">
                            ورود به حساب کاربری
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
