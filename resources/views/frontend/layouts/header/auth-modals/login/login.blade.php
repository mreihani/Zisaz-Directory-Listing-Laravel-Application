<div>
    <div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-6 border-end-md p-4 p-sm-5">
                            <h2 class="h3 mb-4 mb-sm-5">سلام!<br>به سایت ما خوش آمدید.</h2><img class="d-block mx-auto rotate-img" src="{{asset('assets/frontend/img/signin-modal/signin.svg')}}" width="344" alt="Illustartion">
                            <div class="mt-4 mt-sm-5">هنوز ثبت نام نکرده اید؟ <a href="#signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">ثبت نام</a></div>
                        </div>
                        <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                            <form wire:submit.prevent="loginUser" class="needs-validation" novalidate>
                                <div class="mb-4">
                                    <label class="form-label" for="js-phone-login">شماره تلفن *</label>
                                    <input class="form-control" name="phone" type="phone" id="js-phone-login" placeholder="09123456789" required wire:model="phone">
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif   
                                </div>
                                <button wire:key class="btn btn-primary btn-lg w-100" type="submit">ورود به حساب کاربری</button>
                            </form>

                            <!-- SMS Verification Modal-->
                            <div class="mb-4">
                                @if($smsVerificationSectionVisible)
                                    @livewire('frontend.auth.login.sms-verification') 
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
