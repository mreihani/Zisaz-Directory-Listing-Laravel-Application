<div>
    <!-- Account Activity details -->
    <div class="bg-light rounded-3 p-4 p-md-5 mb-3">
        <h2 class="h5 font-vazir mb-4">
            <i class="fi-award text-primary fs-5 mt-n1 me-2"></i>
            مجوز ها
        </h2>
        
        <label class="form-label" for="pr-title">عنوان مجوز <span class="text-danger">*</span></label>
        <input class="form-control form-control-lg mb-4" type="text" id="pr-title" placeholder="عنوان مجوز خود را وارد نمایید" required="">
       
        <!-- Filepond uploader -->
        <div class="mb-4">
            <label class="form-label" for="pr-description">
                تصویر مجوز خود را بارگذاری نمایید
                <span class="text-danger">*</span>
            </label>
            <input class="file-uploader" type="file" data-max-file-size="10MB" accept="image/png, image/jpeg" data-label-idle='<div class="btn btn-primary mb-3"><i class="fi-cloud-upload me-1"></i> بارگذاری تصویر مجوز </div><div>png, jpeg :فرمت مجاز تصاویر برای بارگذاری</div>'>
        </div>



        <!-- Item-->
        <div class="card bg-secondary card-hover mb-2">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-start">
                        <img class="d-none d-sm-block" src="{{asset('assets/frontend/img/jaban/jaban_resume.png')}}" width="100" alt="Resume picture">
                        <div class="ps-sm-3">
                            <h3 class="h6 card-title pb-1 mb-2" style="cursor: pointer;">
                                <a class="stretched-link text-nav text-decoration-none" wire:click="editResume">کارشناس پشتیبانی</a>
                            </h3>
                            <div class="fs-sm">
                                <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>
                                    {{-- @foreach ($locations as $location)
                                        {{$location->title}}،
                                    @endforeach --}}
                                </div>
                                <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>
                                    {{-- {{$jobBudget}} تومان --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-end justify-content-between">
                        <div class="dropdown position-relative zindex-10 mb-3">
                            <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fi-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                                <li>
                                    <button class="dropdown-item" wire:click="editResume">
                                        <i class="fi-edit opacity-60 me-2"></i>
                                        ویرایش
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Action buttons-->
    <div class="row">
        <div class="col-lg-9">
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-primary rounded-pill px-3 px-sm-4" type="button">
                    ذخیره تغییرات
                </button>
            </div>
        </div>
    </div>
</div>








