<!-- List of selling ads-->
<div class="border-bottom pb-2">
    <h5 class="pb-3">آگهی فروش کالا</h5>

    @if(count($sellingAds))
        <div class="row">
            @foreach ($sellingAds as $key => $sellingAdsItem)
                <!-- Item-->
                <div class="col-sm-3 mb-4">
                    <div class="card card-hover border-0 shadow-sm h-100">
                        <a class="card-img-top overflow-hidden position-relative" href="">
                            <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                            <span style="
                                background-image: url('{{($sellingAdsItem->adsImages->first() !== null) ? asset($sellingAdsItem->adsImages->first()->image) : asset('assets/frontend/img/jaban/png.png')}}');
                                width: 196px;
                                height: 100px;
                                background-size: cover;
                                display:block;
                            "></span>
                        </a>
                        <div class="card-body">
                            <a class="fs-sm text-uppercase text-decoration-none" href="">
                                {{$sellingAdsItem->selling->item_title}}
                            </a>
                            <h3 class="fs-base pt-1 mb-2">
                                <a class="nav-link" href="">
                                    {{$sellingAdsItem->selling->item_description}}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- More Items Card-->
            <div class="col-sm-3 mb-4">
                <div class="position-relative home-page-more-item-card">
                    <a class="card-img-top overflow-hidden position-relative card card-hover border-0 shadow-sm h-100" href="" wire:click.prevent="loadSpecificCategory( @js(get_class($sellingAdsItem->selling)), '{{$sellingAdsItem->selling->ads_type}}')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                        <div class="home-page-more-card-overlay-div card card-hover border-0 shadow-sm h-100"></div> 
                        <img class="d-block" src="{{asset('assets/frontend/img/jaban/more_ads.jpg')}}" alt="Image">
                        <p class="fw-bolder">
                            مشاهده بیشتر
                        </p>
                    </a>
                </div>
            </div>

        </div>
    @else
        <div class="mx-2">
            <div class="alert alert-accent" role="alert">
                هیچ موردی یافت نشد!
            </div>
        </div>
    @endif
</div>

<!-- List of employee ads-->
<div class="border-bottom pb-2 pt-3">
    <h5 class="pb-3">آگهی استخدام - کارجو</h5>

    @if(count($employeeAds))
        <div class="row">
            @foreach ($employeeAds as $employeeAdsItem)
                @if($employeeAdsItem->employment->where('employment_ads_type','employee'))
                    <!-- Item-->
                    <div class="col-sm-3 mb-4">
                        <div class="card card-hover border-0 shadow-sm h-100">
                            <a class="card-img-top overflow-hidden position-relative" href="">
                                <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                <span style="
                                    background-image: url('assets/frontend/img/job-board/blog/01.jpg');
                                    width: 196px;
                                    height: 100px;
                                    background-size: cover;
                                    display:block;
                                "></span>
                            </a>
                            <div class="card-body">
                                <a class="fs-sm text-uppercase text-decoration-none" href="">
                                    {{$employeeAdsItem->employment->item_title}}
                                </a>
                                <h3 class="fs-base pt-1 mb-2">
                                    <a class="nav-link" href="">
                                        {{$employeeAdsItem->employment->item_description}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            
            <!-- More Items Card-->
            <div class="col-sm-3 mb-4">
                <div class="position-relative home-page-more-item-card">
                    <a class="card-img-top overflow-hidden position-relative card card-hover border-0 shadow-sm h-100" href="" wire:click.prevent="loadSpecificCategory( @js(get_class($employeeAdsItem->employment)), '{{$employeeAdsItem->employment->ads_type}}')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                        <div class="home-page-more-card-overlay-div card card-hover border-0 shadow-sm h-100"></div> 
                        <img class="d-block" src="{{asset('assets/frontend/img/jaban/more_ads.jpg')}}" alt="Image">
                        <p class="fw-bolder">
                            مشاهده بیشتر
                        </p>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="mx-2">
            <div class="alert alert-accent" role="alert">
                هیچ موردی یافت نشد!
            </div>
        </div>
    @endif
</div>

<!-- List of employer ads-->
<div class="border-bottom pb-2 pt-3">
    <h5 class="pb-3">آگهی استخدام - کارفرما</h5>

    @if(count($employerAds))
        <div class="row">
            @foreach ($employerAds as $employerAdsItem)
                @if($employerAdsItem->employment->where('employment_ads_type','employee'))
                    <!-- Item-->
                    <div class="col-sm-3 mb-4">
                        <div class="card card-hover border-0 shadow-sm h-100">
                            <a class="card-img-top overflow-hidden position-relative" href="">
                                <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                <span style="
                                    background-image: url('assets/frontend/img/job-board/blog/01.jpg');
                                    width: 196px;
                                    height: 100px;
                                    background-size: cover;
                                    display:block;
                                "></span>
                            </a>
                            <div class="card-body">
                                <a class="fs-sm text-uppercase text-decoration-none" href="">
                                    {{$employerAdsItem->employment->item_title}}
                                </a>
                                <h3 class="fs-base pt-1 mb-2">
                                    <a class="nav-link" href="">
                                        {{$employerAdsItem->employment->item_description}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- More Items Card-->
            <div class="col-sm-3 mb-4">
                <div class="position-relative home-page-more-item-card">
                    <a class="card-img-top overflow-hidden position-relative card card-hover border-0 shadow-sm h-100" href="" wire:click.prevent="loadSpecificCategory( @js(get_class($employerAdsItem->employment)), '{{$employerAdsItem->employment->ads_type}}')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                        <div class="home-page-more-card-overlay-div card card-hover border-0 shadow-sm h-100"></div> 
                        <img class="d-block" src="{{asset('assets/frontend/img/jaban/more_ads.jpg')}}" alt="Image">
                        <p class="fw-bolder">
                            مشاهده بیشتر
                        </p>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="mx-2">
            <div class="alert alert-accent" role="alert">
                هیچ موردی یافت نشد!
            </div>
        </div>
    @endif
</div>

<!-- List of investment investor ads-->
<div class="border-bottom pb-2 pt-3">
    <h5 class="pb-3">آگهی شراکت و سرمایه گذاری - سرمایه گذار</h5>

    @if(count($investorAds))
        <div class="row">
            @foreach ($investorAds as $investorAdsItem)
                @if($investorAdsItem->investment->where('investment_ads_type','investor'))
                    <!-- Item-->
                    <div class="col-sm-3 mb-4">
                        <div class="card card-hover border-0 shadow-sm h-100">
                            <a class="card-img-top overflow-hidden position-relative" href="">
                                <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                <span style="
                                    background-image: url('assets/frontend/img/job-board/blog/01.jpg');
                                    width: 196px;
                                    height: 100px;
                                    background-size: cover;
                                    display:block;
                                "></span>
                            </a>
                            <div class="card-body">
                                <a class="fs-sm text-uppercase text-decoration-none" href="">
                                    {{$investorAdsItem->investment->item_title}}
                                </a>
                                <h3 class="fs-base pt-1 mb-2">
                                    <a class="nav-link" href="">
                                        {{$investorAdsItem->investment->item_description}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- More Items Card-->
            <div class="col-sm-3 mb-4">
                <div class="position-relative home-page-more-item-card">
                    <a class="card-img-top overflow-hidden position-relative card card-hover border-0 shadow-sm h-100" href="" wire:click.prevent="loadSpecificCategory( @js(get_class($investorAdsItem->investment)), '{{$investorAdsItem->investment->ads_type}}')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                        <div class="home-page-more-card-overlay-div card card-hover border-0 shadow-sm h-100"></div> 
                        <img class="d-block" src="{{asset('assets/frontend/img/jaban/more_ads.jpg')}}" alt="Image">
                        <p class="fw-bolder">
                            مشاهده بیشتر
                        </p>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="mx-2">
            <div class="alert alert-accent" role="alert">
                هیچ موردی یافت نشد!
            </div>
        </div>
    @endif
</div>

<!-- List of investment invested ads-->
<div class="border-bottom pb-2 pt-3">
    <h5 class="pb-3">آگهی شراکت و سرمایه گذاری - سرمایه پذیر</h5>

    @if(count($investedAds))
        <div class="row">
            @foreach ($investedAds as $investedAdsItem)
                @if($investedAdsItem->investment->where('investment_ads_type','invested'))
                    <!-- Item-->
                    <div class="col-sm-3 mb-4">
                        <div class="card card-hover border-0 shadow-sm h-100">
                            <a class="card-img-top overflow-hidden position-relative" href="">
                                <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                <span style="
                                    background-image: url('assets/frontend/img/job-board/blog/01.jpg');
                                    width: 196px;
                                    height: 100px;
                                    background-size: cover;
                                    display:block;
                                "></span>
                            </a>
                            <div class="card-body">
                                <a class="fs-sm text-uppercase text-decoration-none" href="">
                                    {{$investedAdsItem->investment->item_title}}
                                </a>
                                <h3 class="fs-base pt-1 mb-2">
                                    <a class="nav-link" href="">
                                        {{$investedAdsItem->investment->item_description}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- More Items Card-->
            <div class="col-sm-3 mb-4">
                <div class="position-relative home-page-more-item-card">
                    <a class="card-img-top overflow-hidden position-relative card card-hover border-0 shadow-sm h-100" href="" wire:click.prevent="loadSpecificCategory( @js(get_class($investedAdsItem->investment)), '{{$investedAdsItem->investment->ads_type}}')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                        <div class="home-page-more-card-overlay-div card card-hover border-0 shadow-sm h-100"></div> 
                        <img class="d-block" src="{{asset('assets/frontend/img/jaban/more_ads.jpg')}}" alt="Image">
                        <p class="fw-bolder">
                            مشاهده بیشتر
                        </p>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="mx-2">
            <div class="alert alert-accent" role="alert">
                هیچ موردی یافت نشد!
            </div>
        </div>
    @endif
    
</div>

<!-- List of custom pages-->
<div class="border-bottom pb-2 pt-3">
    <h5 class="pb-3">کسب و کارها</h5>
    
    <div class="mx-2">
        <div class="alert alert-accent" role="alert">
            هیچ موردی یافت نشد!
        </div>
    </div>
</div>

<!-- List of all ads-->
<div class="pb-2">
    <h5 class="pb-3 pt-3">کلیه آگهی ها</h5>
    
    @if(count($adsRegistrations))
        <div class="row">
            @foreach ($adsRegistrations as $adsRegistrationItem)
                <!-- Item-->
                <div class="col-sm-3 mb-4">
                    <div class="card card-hover border-0 shadow-sm h-100">
                        <a class="card-img-top overflow-hidden position-relative" href="">
                            <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                            <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
                        </a>
                        <div class="card-body">
                            <a class="fs-sm text-uppercase text-decoration-none" href="">
                                {{$adsRegistrationItem->subactivity->item_title}}
                            </a>
                            <h3 class="fs-base pt-1 mb-2">
                                <a class="nav-link" href="">
                                    {{$adsRegistrationItem->subactivity->item_description}}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="mx-2">
            <div class="alert alert-accent" role="alert">
                هیچ موردی یافت نشد!
            </div>
        </div>
    @endif
</div>