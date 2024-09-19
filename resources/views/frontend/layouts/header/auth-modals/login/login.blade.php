<div>
    <div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-6 border-end-md p-4 p-sm-5">
                            <h2 class="h3 mb-4 mb-sm-5">
                                سلام!<br>
                                
                                به پلتفرم زی ساز خوش آمدید.
                            </h2>
                            <img class="d-block mx-auto rotate-img" src="{{asset('assets/frontend/img/jaban/categories/technical.jpg')}}" width="344" alt="Illustartion">
                        </div>
                        <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                            @if(!$smsVerificationSectionVisible)
                                <form wire:submit.prevent="loginUser" class="needs-validation" novalidate>
                                    <div class="mb-4">
                                        <label class="form-label" for="user-login-phone">شماره تلفن *</label>
                                        <input class="form-control" name="phone" type="phone" id="user-login-phone" placeholder="09123456789" required wire:model="phone" autofocus>
                                        @if($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif   
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember" wire:model="remember" type="checkbox"/>
                                            <label class="form-check-label" for="remember"> مرا به خاطر بسپار</label>
                                        </div>
                                    </div>
                                    <div wire:loading.remove wire:target="loginUser">
                                        <button wire:key class="btn btn-primary btn-lg w-100" type="submit">ورود / عضویت</button>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div wire:loading wire:target="loginUser">
                                            <button wire:key class="btn btn-primary btn-lg w-100">
                                                <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
                                                در حال ارسال پیامک
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif

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

@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('signin-modal'));

            myModal._element.addEventListener('shown.bs.modal', function () {
                document.getElementById('user-login-phone').focus();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const interval = setInterval(() => {
                var inputElement = document.getElementById('js-fn');
                if (inputElement) {
                    inputElement.focus();
                    clearInterval(interval); // Stop the interval once the input field is focused
                }
            }, 100); // Check every 100 milliseconds
        });
    </script>
@endpush
