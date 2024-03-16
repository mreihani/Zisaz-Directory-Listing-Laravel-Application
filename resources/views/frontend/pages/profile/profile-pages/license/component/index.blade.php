<div>
    @if($section == 1) 
        @if($licenses)
            @foreach ($licenses as $licenseLoopItem)
                <div class="card bg-secondary card-hover mt-3 mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="position-relative flex-shrink-0">
                                   <a href="{{route('assets', [auth()->user()->id, $licenseLoopItem->license_image])}}">
                                        <img
                                        style="
                                            height:50px; 
                                            background:url({{route('assets', [auth()->user()->id, $licenseLoopItem->license_image])}});
                                            background-size: cover;"
                                        class="me-2" 
                                        width="50" 
                                        alt="">
                                    </a>
                                </div>
                                <p class="fs-md fw-bold text-dark opacity-80 px-1 mt-2">
                                    <a href="{{route('assets', [auth()->user()->id, $licenseLoopItem->license_image])}}" class="text-decoration-none">
                                        @if($licenseLoopItem->license_type == 'eng_license')
                                            پروانه اشتغال مهندسی 
                                        @elseif($licenseLoopItem->license_type == 'ocp_license')
                                            گواهی نامه شغلی 
                                        @elseif($licenseLoopItem->license_type == 'news_ads')
                                            آگهی رسمی روزنامه
                                        @elseif($licenseLoopItem->license_type == 'business_license')
                                            پروانه کسب و کار
                                        @elseif($licenseLoopItem->license_type == 'other')
                                            سایر
                                        @endif
                                    </a>
                                </p>
                            </div>
                            
                            <div class="dropdown content-overlay">
                                <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm"
                                    type="button"
                                    id="contextMenu1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fi-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="contextMenu1">
                                    <li>
                                        <a class="dropdown-item" wire:click="editLicense({{$licenseLoopItem->id}})" style="cursor: pointer;">
                                            <i class="fi-edit opacity-60 me-2"></i>
                                            ویرایش
                                        </a>
                                    </li>
                                    <li>
                                        <a 
                                            class="dropdown-item"  
                                            style="cursor: pointer;"
                                            onclick="confirm('آیا برای انجام این کار اطمینان دارید؟') || event.stopImmediatePropagation()"
                                            wire:click="deleteLicense({{$licenseLoopItem->id}})"
                                            >
                                            <i class="fi-trash opacity-60 me-2"></i>
                                            حذف
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row d-flex justify-content-center pt-4">
                <div class="col-sm-2">
                    <a class="btn btn-primary rounded-pill w-100" wire:click="addNewLicense">
                        <i class="fi-plus fs-sm me-2"></i>
                        افزودن مجوز جدید
                    </a>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                <p class="text-primary">
                    <i class="fi-alert-circle fs-sm"></i>
                    در صورتی که مجوزهای قانونی ندارید، از این مرحله می توانید عبور کنید.
                </p>
                <h5>
                    برای بارگذاری مجوز خود بر روی دکمه زیر کلیک کنید.
                </h5>
                <div class="col-md-2">
                    <button class="btn btn-primary rounded-pill w-100" wire:click="addNewLicense">
                        <i class="fi-plus fs-sm me-2"></i>
                        بارگذاری مجوز
                    </button>
                </div>
            </div>
        @endif
    @elseif($section == 2)
        @livewire('frontend.pages.profile.profile-pages.license.add')
    @elseif($section == 3)
        @livewire('frontend.pages.profile.profile-pages.license.edit', ['licenseItem' => $licenseItem])
    @endif
</div>








