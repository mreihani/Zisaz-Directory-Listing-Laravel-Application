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
   
    @if(count($sidebarCategoryFilterCollectionAds) && count($sidebarCategoryFilterCollectionAds->pluck('subactivity')->where('type', $type)))
        <div class="row row-cols-xl-3 row-cols-sm-2 row-cols-1 gy-4 gx-3 gx-xxl-4 py-4">
            @foreach ($sidebarCategoryFilterCollectionAds as $filteredSidebarAdsItem)

                @if($filteredSidebarAdsItem->subactivity->type == $type)

                    <!-- Item-->
                    <div class="col pb-sm-2">
                        <div class="position-relative">
                            <div class="position-relative mb-3">
                                <button class="btn btn-icon btn-light-primary btn-xs text-primary rounded-circle position-absolute top-0 end-0 m-3 zindex-5" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="نشان کردن" data-bs-original-title="نشان کردن">
                                    <i class="fi-bookmark"></i>
                                </button>
                                <img class="rounded-3" src="{{$filteredSidebarAdsItem->adsImagesUrl()}}" alt="Article img">
                            </div>
                            <h3 class="mb-2 fs-lg">
                                <a class="nav-link stretched-link" href="{{route('activity', $filteredSidebarAdsItem->slug)}}">
                                    {{$filteredSidebarAdsItem->subactivity->item_title}}
                                </a>
                            </h3>
                            <ul class="list-inline mb-0 fs-sm">
                                <li class="list-inline-item pe-1">
                                    <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                    {{jdate($filteredSidebarAdsItem->updated_at)->ago()}}
                                </li>
                            </ul>
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