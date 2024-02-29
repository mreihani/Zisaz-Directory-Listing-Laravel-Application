<div>
    <div class="modal fade" id="signup-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 734px;">
            <div class="modal-content">
                <div class="modal-body p-sm-5">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="job-seeker" role="tabpanel">
                            @if(!$smsVerificationSectionVisible)
                                @livewire('frontend.auth.register.user.register-user')
                            @endif
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
