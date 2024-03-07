<div>
    <div class="row mt-2 pt-4">
        @if($showResume)
            <!-- List of resumes-->
            <div class="col-md-12">
                <!-- Item-->
                <div class="card bg-secondary card-hover mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-start">
                                <img class="d-none d-sm-block" src="{{asset('assets/frontend/img/jaban/jaban_resume.png')}}" width="100" alt="Resume picture">
                                <div class="ps-sm-3">
                                    <h3 class="h6 card-title pb-1 mb-2">
                                        <a class="stretched-link text-nav text-decoration-none" wire:click="editResume">کارشناس پشتیبانی</a>
                                    </h3>
                                    <div class="fs-sm">
                                        <div class="text-nowrap mb-2"><i class="fi-map-pin text-muted me-1"> </i>
                                            @foreach ($locations as $location)
                                                {{$location->title}}،
                                            @endforeach
                                        </div>
                                        <div class="text-nowrap"><i class="fi-cash fs-base text-muted me-1"></i>
                                            {{$jobBudget}} تومان
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
                                        <li>
                                            <a class="dropdown-item">
                                                <i class="fi-download-file opacity-60 me-2"></i>
                                                دریافت نسخه PDF
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="dropdown-item"><i class="fi-trash opacity-60 me-2"></i>حذف</a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <strong class="fs-sm">80 بازدید</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h4>
                    شما هیچ رزومه ای ایجاد نکرده اید، لطفا اقدام به ثبت رزومه جدید نمایید.
                </h4>
                <div class="col-md-2">
                    <button class="btn btn-primary rounded-pill w-100" wire:click="addNewResume">
                        <i class="fi-plus fs-sm me-2"></i>
                        ثبت رزومه جدید
                    </button>
                </div>
            </div>
        @endif    
    </div>
</div>