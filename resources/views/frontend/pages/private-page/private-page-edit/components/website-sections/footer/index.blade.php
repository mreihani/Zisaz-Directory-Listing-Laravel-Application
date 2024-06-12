<div>
    <form wire:submit.prevent="save" novalidate>
        <div class="bg-light rounded-3 p-4 p-md-5 mb-3">

            <input type="hidden" wire:model="privateSiteId">

            <!-- Hero Alert message-->
            <div class="alert alert-accent" role="alert">
                <ul class="mb-0">
                    <li>
                        در این بخش باید فوتر سایت خود را طراحی کنید.
                    </li>
                </ul>
            </div>

           <!-- Upload Image -->
           <h2 class="h5 font-vazir mb-4 mt-3">
                <i class="fi-image text-primary fs-5 mt-n1 me-2"></i>
                بارگذاری لوگو
                <span class="text-danger">*</span>
            </h2>
           
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold" for="pr-description">
                        لوگوی کسب و کار خود را بارگذاری نمایید
                    </label>

                    <label>
                        (فرمت مجاز تصویر PNG، JPG و حداکثر حجم مجاز 4 مگابایت است)
                    </label>

                    <input type="hidden" wire:model="logoValidation">

                    @if($errors->has('logoValidation'))
                        <div class="text-danger">{{ $errors->first('logoValidation') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="mb-3">
                                <input class="form-control" type="file" wire:model="logo">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            @if($logo !== null && !is_string($logo)) 
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{$logo->temporaryUrl()}}">    
                                    </div>
                                </div>
                            @elseif($logo !== null && is_string($logo))
                                <div class="border rounded-3 p-1" style="width: 150px;">
                                    <div class="d-flex justify-content-center p-1">
                                        <img src="{{asset($logo)}}">    
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
            
                </div>
            </div>   

        </div>
            
        <div class="d-flex flex-column flex-sm-row bg-light rounded-3 p-4 px-md-5">
            <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" wire:click.prevent="back">
                <i class="fi-chevron-left fs-sm me-2"></i>
                مرحله قبل
            </a>
            <button type="submit" class="btn btn-primary btn-lg rounded-pill ms-sm-auto">
                ذخیره
                <i class="fi-chevron-right fs-sm ms-2"></i>
            </button>
        </div>

    </form> 
</div>