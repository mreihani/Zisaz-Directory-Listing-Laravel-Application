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
                            @livewire('frontend.auth.register.user.register-user')
                        </div>
                        <div class="tab-pane fade" id="employer" role="tabpanel">
                            @livewire('frontend.auth.register.employer.register-employer')
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
