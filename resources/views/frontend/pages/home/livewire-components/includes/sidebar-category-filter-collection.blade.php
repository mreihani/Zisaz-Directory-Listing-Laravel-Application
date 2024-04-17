<!-- List of filtered ads-->
<div class="pb-2">

    {{-- <h5 class="pb-3">
        @if($type == 'selling')
            آگهی فروش کالا  
        @elseif($type == 'employee')
            آگهی استخدام - کارجو
        @elseif($type == 'employer')
            آگهی استخدام - کارفرما
        @elseif($type == 'investor')
            آگهی شراکت و سرمایه گذاری - سرمایه گذار
        @elseif($type == 'invested')
            آگهی شراکت و سرمایه گذاری - سرمایه پذیر
        @endif
    </h5> --}}
   
    @if(count($sidebarCategoryFilterCollectionAds) && count($sidebarCategoryFilterCollectionAds->pluck('subactivity')->where('ads_type',$type)))
        <div class="row">
            @foreach ($sidebarCategoryFilterCollectionAds as $filteredSidebarAdsItem)

                @if($filteredSidebarAdsItem->subactivity->ads_type == $type)
                    <!-- Item-->
                    <div class="col-sm-3 mb-4">
                        <div class="card card-hover border-0 shadow-sm h-100">
                            <a class="card-img-top overflow-hidden position-relative" href="">
                                <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
                            </a>
                            <div class="card-body">
                                <a class="fs-sm text-uppercase text-decoration-none" href="">
                                    {{$filteredSidebarAdsItem->subactivity->item_title}}
                                </a>
                                <h3 class="fs-base pt-1 mb-2">
                                    <a class="nav-link" href="">
                                        {{$filteredSidebarAdsItem->subactivity->item_description}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif

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