<!-- List of selling ads-->
<div class="border-bottom pb-2">
    <h5 class="pb-3">آگهی فروش کالا</h5>

    @if(count($sellingAds))
        <div class="row">
            @foreach ($sellingAds as $key => $sellingAdsItem)

                <!-- Item-->
                <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                    <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                        <a class="card-img-top" href="{{route('activity', $sellingAdsItem->slug)}}" style="background-image: url('{{$sellingAdsItem->adsImagesUrl()}}');"></a>
                        <div class="d-flex flex-column justify-content-between p-3">
                            <h4 class="fs-6 pt-1 mb-2">
                                <a class="nav-link" href="{{route('activity', $sellingAdsItem->slug)}}">
                                    {{$sellingAdsItem->selling->item_title}}
                                </a>
                            </h4>
                            <a class="text-decoration-none" href="{{route('activity', $sellingAdsItem->slug)}}">
                                <div class="text-body fs-xs">
                                    <span class="me-2 pe-1">
                                        {{jdate($sellingAdsItem->updated_at)->ago()}}
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
            
            <!-- More Items Card-->
            <div class="d-flex justify-content-center">
                <button 
                    type="button"
                    class="fw-bolder text-decoration-none mb-3 btn btn-sm btn-translucent-accent rounded-pill" 
                    href=""
                    wire:click.prevent="loadSpecificCategory( @js(get_class($sellingAdsItem->selling)), '{{$sellingAdsItem->selling->ads_type}}')" 
                    x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
                >
                    مشاهده بیشتر
                </button>
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
                    <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                        <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                            <a class="card-img-top" href="{{route('activity', $employeeAdsItem->slug)}}" style="background-image: url('{{$employeeAdsItem->adsImagesUrl()}}');"></a>
                            <div class="d-flex flex-column justify-content-between p-3">
                                <h4 class="fs-6 pt-1 mb-2">
                                    <a class="nav-link" href="{{route('activity', $employeeAdsItem->slug)}}">
                                        {{$employeeAdsItem->employment->item_title}}
                                    </a>
                                </h4>
                                <a class="text-decoration-none" href="{{route('activity', $employeeAdsItem->slug)}}">
                                    <div class="text-body fs-xs">
                                        <span class="me-2 pe-1">
                                            {{jdate($employeeAdsItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
            
            <!-- More Items Card-->
            <div class="d-flex justify-content-center">
                <button 
                    type="button"
                    class="fw-bolder text-decoration-none mb-3 btn btn-sm btn-translucent-accent rounded-pill" 
                    href=""
                    wire:click.prevent="loadSpecificCategory( @js(get_class($employeeAdsItem->employment)), '{{$employeeAdsItem->employment->ads_type}}')" 
                    x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
                >
                    مشاهده بیشتر
                </button>
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
                @if($employerAdsItem->employment->where('employment_ads_type','employer'))

                    <!-- Item-->
                    <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                        <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                            <a class="card-img-top" href="{{route('activity', $employerAdsItem->slug)}}" style="background-image: url('{{$employerAdsItem->adsImagesUrl()}}');"></a>
                            <div class="d-flex flex-column justify-content-between p-3">
                                <h4 class="fs-6 pt-1 mb-2">
                                    <a class="nav-link" href="{{route('activity', $employerAdsItem->slug)}}">
                                        {{$employerAdsItem->employment->item_title}}
                                    </a>
                                </h4>
                                <a class="text-decoration-none" href="{{route('activity', $employerAdsItem->slug)}}">
                                    <div class="text-body fs-xs">
                                        <span class="me-2 pe-1">
                                            {{jdate($employerAdsItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach

            <!-- More Items Card-->
            <div class="d-flex justify-content-center">
                <button 
                    type="button"
                    class="fw-bolder text-decoration-none mb-3 btn btn-sm btn-translucent-accent rounded-pill" 
                    href=""
                    wire:click.prevent="loadSpecificCategory( @js(get_class($employerAdsItem->employment)), '{{$employerAdsItem->employment->ads_type}}')" 
                    x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
                >
                    مشاهده بیشتر
                </button>
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
                    <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                        <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                            <a class="card-img-top" href="{{route('activity', $investorAdsItem->slug)}}" style="background-image: url('{{$investorAdsItem->adsImagesUrl()}}');"></a>
                            <div class="d-flex flex-column justify-content-between p-3">
                                <h4 class="fs-6 pt-1 mb-2">
                                    <a class="nav-link" href="{{route('activity', $investorAdsItem->slug)}}">
                                        {{$investorAdsItem->investment->item_title}}
                                    </a>
                                </h4>
                                <a class="text-decoration-none" href="{{route('activity', $investorAdsItem->slug)}}">
                                    <div class="text-body fs-xs">
                                        <span class="me-2 pe-1">
                                            {{jdate($investorAdsItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach

            <!-- More Items Card-->
            <div class="d-flex justify-content-center">
                <button 
                    type="button"
                    class="fw-bolder text-decoration-none mb-3 btn btn-sm btn-translucent-accent rounded-pill" 
                    href=""
                    wire:click.prevent="loadSpecificCategory( @js(get_class($investorAdsItem->investment)), '{{$investorAdsItem->investment->ads_type}}')" 
                    x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
                >
                    مشاهده بیشتر
                </button>
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
                    <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                        <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                            <a class="card-img-top" href="{{route('activity', $investedAdsItem->slug)}}" style="background-image: url('{{$investedAdsItem->adsImagesUrl()}}');"></a>
                            <div class="d-flex flex-column justify-content-between p-3">
                                <h4 class="fs-6 pt-1 mb-2">
                                    <a class="nav-link" href="{{route('activity', $investedAdsItem->slug)}}">
                                        {{$investedAdsItem->investment->item_title}}
                                    </a>
                                </h4>
                                <a class="text-decoration-none" href="{{route('activity', $investedAdsItem->slug)}}">
                                    <div class="text-body fs-xs">
                                        <span class="me-2 pe-1">
                                            {{jdate($investedAdsItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- More Items Card-->
            <div class="d-flex justify-content-center">
                <button 
                    type="button"
                    class="fw-bolder text-decoration-none mb-3 btn btn-sm btn-translucent-accent rounded-pill" 
                    href=""
                    wire:click.prevent="loadSpecificCategory( @js(get_class($investedAdsItem->investment)), '{{$investedAdsItem->investment->ads_type}}')" 
                    x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})"
                >
                    مشاهده بیشتر
                </button>
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
                <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                    <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                        <a class="card-img-top" href="{{route('activity', $adsRegistrationItem->slug)}}" style="background-image: url('{{$adsRegistrationItem->adsImagesUrl()}}');"></a>
                        <div class="d-flex flex-column justify-content-between p-3">
                            <h4 class="fs-6 pt-1 mb-2">
                                <a class="nav-link" href="{{route('activity', $adsRegistrationItem->slug)}}">
                                    {{$adsRegistrationItem->subactivity->item_title}}
                                </a>
                            </h4>
                            <a class="text-decoration-none" href="{{route('activity', $adsRegistrationItem->slug)}}">
                                <div class="text-body fs-xs">
                                    <span class="me-2 pe-1">
                                        {{jdate($adsRegistrationItem->updated_at)->ago()}}
                                    </span>
                                </div>
                            </a>
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