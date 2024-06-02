<div>
    <form class="contact-form" wire:submit.prevent="save" novalidate>
        <div class="row">
            <div class="col-md-6">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <input type="text" wire:model="name" id="name" placeholder="نام و نام خانوادگی" />
            </div>
            <div class="col-md-6">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <input type="email" wire:model="email" id="email" placeholder="ایمیل" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <input type="text" wire:model="phone" id="phone" placeholder="تلفن" />
            </div>
            <div class="col-md-6">
                @if($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
                <input type="text" wire:model="subject" id="subject" placeholder="موضوع" />
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif
                <textarea wire:model="message" id="message" placeholder="پیام خود را بنویسید" rows="5"></textarea>
            </div>
        </div>
        @if(!$isFormSent) 
            <div class="row">
                <div class="col-12">
                    <div class="button text-center rounded-buttons">
                        <button type="submit" class="btn primary-btn rounded-full"> ارسال پیام </button>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <!-- Success alert -->
                    <div class="alert alert-success d-flex" role="alert">
                        <i class="fi-check-circle me-2 me-sm-3 lead"></i>
                        <div>
                            پیام شما با موفقیت ارسال گردید. از شما متشکریم.
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </form>
</div>