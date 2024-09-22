<!-- List of filtered ads-->
<div class="pb-2">

    <h5 class="pb-3">
        آگهی
    </h5>
   
    @if(count($sidebarFilterCollection))
        <div class="row row-cols-xl-3 row-cols-sm-2 row-cols-1 gy-4 gx-3 gx-xxl-4 py-4">
            @foreach ($sidebarFilterCollection as $sidebarFilterItem)

                <!-- Item-->
                <div class="card card-hover card-horizontal border-0 shadow-sm mb-4 mx-2">
                    <a class="card-img-top" href="{{route('activity', $sidebarFilterItem->slug)}}" style="background-image: url('{{$sidebarFilterItem->adsImagesUrl()}}');"></a>
                    <div class="card-body position-relative pb-3 d-flex flex-column justify-content-between">

                        @if($sidebarFilterItem->subactivity()->get()->first()->type == 'selling')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی فروش کالا
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'employee')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استخدام (کارجو)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'employer')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استخدام (کارفرما)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'investor')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی شراکت و سرمایه گذاری (سرمایه گذار)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'invested')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی شراکت و سرمایه گذاری (سرمایه پذیر)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'auction')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی مزایده
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'tender_buy')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی مناقصه (خرید)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'tender_project')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی مناقصه (اجرای پروژه)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'inquiry_buy')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استعلام قیمت (خرید)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'inquiry_project')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استعلام قیمت (اجرای پروژه)
                            </h4>
                        @elseif($sidebarFilterItem->subactivity()->get()->first()->type == 'contractor')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی پیمانکاری
                            </h4>
                        @endif

                        <h3 class="h6 mb-2 fs-base">
                            <a class="nav-link" href="{{route('activity', $sidebarFilterItem->slug)}}">
                                {{$sidebarFilterItem->subactivity()->get()->first()->item_title}}
                            </a>
                        </h3>
                        
                        <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                            <span class="d-inline-block me-4 fs-sm me-3 pe-3">
                                <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                {{jdate($sidebarFilterItem->updated_at)->ago()}}
                            </span>
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