<!-- List of filtered ads-->
<div class="pb-2">

    <h5 class="pb-3">
        {{-- @if($type == 'selling')
            آگهی فروش کالا  
        @elseif($type == 'employee')
            آگهی استخدام - کارجو
        @elseif($type == 'employer')
            آگهی استخدام - کارفرما
        @elseif($type == 'investor')
            آگهی شراکت و سرمایه گذاری - سرمایه گذار
        @elseif($type == 'invested')
            آگهی شراکت و سرمایه گذاری - سرمایه پذیر
        @endif --}}

        آگهی
    </h5>
   
    @if(count($sidebarCategoryFilterCollectionAds) && count($sidebarCategoryFilterCollectionAds->pluck('subactivity')->where('ads_type', $type)))
        <div class="row">
            @foreach ($sidebarCategoryFilterCollectionAds as $filteredSidebarAdsItem)

                @if($filteredSidebarAdsItem->subactivity->ads_type == $type)

                    <!-- Item-->
                    <div class="col-xl-4 col-lg-12 col-sm-12 d-flex justify-content-center home-page-card-item">
                        <div class="card border-0 shadow-sm card-hover card-horizontal mb-4">
                            <a class="card-img-top" href="{{route('activity', $filteredSidebarAdsItem->slug)}}" style="background-image: url('{{$filteredSidebarAdsItem->adsImagesUrl()}}');"></a>
                            <div class="d-flex flex-column justify-content-between p-3">
                                <h4 class="fs-6 pt-1 mb-2">
                                    <a class="nav-link" href="{{route('activity', $filteredSidebarAdsItem->slug)}}">
                                        {{$filteredSidebarAdsItem->subactivity->item_title}}
                                    </a>
                                </h4>
                                <a class="text-decoration-none" href="{{route('activity', $filteredSidebarAdsItem->slug)}}">
                                    <div class="text-body fs-xs">
                                        <span class="me-2 pe-1">
                                            {{jdate($filteredSidebarAdsItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </a>
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