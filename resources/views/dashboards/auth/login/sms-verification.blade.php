<div wire:transition>
    <div class="p-2 mt-4 mx-auto" style="max-width: 734px;">
        <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
        <div class="">
            <div class="tab-pane fade show active" id="job-seeker" role="tabpanel">
                <div>
                    <form wire:submit.prevent="loginUserVerificationCode" class="needs-validation" novalidate>
                        <div class="row gx-2 gx-md-4">
                            <div class="col-sm-12 mb-4">
                                <label class="form-label" for="js-fn">کد تأیید را وارد نمایید *</label>
                                <input autofocus class="form-control" name="verification_code_login" type="text" id="js-fn" placeholder="کد پیامک شده" required wire:model="verification_code_login">
                                @if($errors->has('verification_code_login'))
                                    <span class="text-danger mb-4">{{ $errors->first('verification_code_login') }}</span>
                                @endif 
                            </div>
                        </div>
                        <button class="btn btn-success btn-lg w-100 rounded-pill" type="submit">تأیید</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

