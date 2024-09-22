<!-- List of all ads-->
<div class="pb-2">
    <h5 class="pb-3">کلیه آگهی ها</h5>
   
    @if(count($activities))
        <div class="row row-cols-xl-3 row-cols-sm-2 row-cols-1 gy-4 gx-3 gx-xxl-4 py-4">
            @foreach ($activities as $adsItem)

                <!-- Item-->
                <div class="card card-hover card-horizontal border-0 shadow-sm mb-4 mx-2">
                    <a class="card-img-top" href="{{route('activity', $adsItem->activity->slug)}}" style="background-image: url('{{$adsItem->activity->adsImagesUrl()}}');"></a>
                    <div class="card-body position-relative pb-3 d-flex flex-column justify-content-between">

                        @if($adsItem->type == 'selling')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی فروش کالا
                            </h4>
                        @elseif($adsItem->type == 'employee')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استخدام (کارجو)
                            </h4>
                        @elseif($adsItem->type == 'employer')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استخدام (کارفرما)
                            </h4>
                        @elseif($adsItem->type == 'investor')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی شراکت و سرمایه گذاری (سرمایه گذار)
                            </h4>
                        @elseif($adsItem->type == 'invested')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی شراکت و سرمایه گذاری (سرمایه پذیر)
                            </h4>
                        @elseif($adsItem->type == 'auction')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی مزایده
                            </h4>
                        @elseif($adsItem->type == 'tender_buy')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی مناقصه (خرید)
                            </h4>
                        @elseif($adsItem->type == 'tender_project')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی مناقصه (اجرای پروژه)
                            </h4>
                        @elseif($adsItem->type == 'inquiry_buy')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استعلام قیمت (خرید)
                            </h4>
                        @elseif($adsItem->type == 'inquiry_project')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی استعلام قیمت (اجرای پروژه)
                            </h4>
                        @elseif($adsItem->type == 'contractor')
                            <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                آگهی پیمانکاری
                            </h4>
                        @endif

                        <h3 class="h6 mb-2 fs-base">
                            <a class="nav-link" href="{{route('activity', $adsItem->activity->slug)}}">
                                {{$adsItem->item_title}}
                            </a>
                        </h3>
                        
                        <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                            <span class="d-inline-block me-4 fs-sm me-3 pe-3">
                                <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                {{jdate($adsItem->updated_at)->ago()}}
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