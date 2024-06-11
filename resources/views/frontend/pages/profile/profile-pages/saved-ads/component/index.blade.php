<div class="col-lg-8 col-md-7 mb-5">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h2 mb-0">
            آگهی های من
        </h1>

        <a class="fw-bold text-decoration-none" href="{{route('user.create-activity.index', ['type' => 'ads'])}}">
            <i class="fi-plus mt-n1 me-2"></i>
            افزودن آگهی جدید
        </a>
    </div>
    
    <!-- Nav tabs-->
    <ul class="nav nav-tabs border-bottom mb-4" role="tablist">
        <li class="nav-item mb-3">
            <a class="nav-link active" href="#" role="tab" aria-selected="true">
                <i class="fi-file fs-base me-2"></i>
                منتشر شده
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link" href="#" role="tab" aria-selected="false">
                <i class="fi-rotate-right fs-base me-2"></i>
                در انتظار تأیید
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link" href="#" role="tab" aria-selected="false">
                <i class="fi-x fs-base me-2"></i>
                رد شده
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link" href="#" role="tab" aria-selected="false">
                <i class="fi-eye-off fs-base me-2"></i>
                غیر فعال شده
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link" href="#" role="tab" aria-selected="false">
                <i class="fi-trash fs-base me-2"></i>
                حذف شده
            </a>
        </li>
    </ul>

    @if(count($userAds))
        @foreach ($userAds as $adItem)
            <!-- Item-->
            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4" >
                <a class="card-img-top" href="{{route('activity', $adItem->slug)}}" style="background-image: url('{{$adItem->adsImagesUrl()}}');">
                    <div class="position-absolute start-0 top-0 pt-3 ps-3">
                        <span class="d-table badge bg-info">
                            تأیید شده
                        </span>
                    </div>
                </a>
                <div class="card-body position-relative pb-3 d-flex flex-column justify-content-between">

                    <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
                        <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                        <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                            <li>
                                <a class="dropdown-item" href="{{route('user.activity.edit', $adItem->id)}}">
                                    <i class="fi-edit opacity-60 me-2"></i>
                                    ویرایش  
                                </a>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-star opacity-60 me-2"></i>
                                    ارتقا
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-eye-off opacity-60 me-2"></i>
                                    غیر فعال کردن
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-trash opacity-60 me-2"></i>
                                    حذف
                                </button>
                            </li>
                        </ul>
                    </div>

                    @if($adItem->subactivity->type == 'selling')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی فروش کالا
                        </h4>
                    @elseif($adItem->subactivity->type == 'employee')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی استخدام (کارجو)
                        </h4>
                    @elseif($adItem->subactivity->type == 'employer')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی استخدام (کارفرما)
                        </h4>
                    @elseif($adItem->subactivity->type == 'investor')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی شراکت و سرمایه گذاری (سرمایه گذار)
                        </h4>
                    @elseif($adItem->subactivity->type == 'invested')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی شراکت و سرمایه گذاری (سرمایه پذیر)
                        </h4>
                    @elseif($adItem->subactivity->type == 'auction')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی مزایده
                        </h4>
                    @elseif($adItem->subactivity->type == 'tender_buy')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی مناقصه (خرید)
                        </h4>
                    @elseif($adItem->subactivity->type == 'tender_project')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی مناقصه (اجرای پروژه)
                        </h4>
                    @elseif($adItem->subactivity->type == 'inquiry_buy')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی استعلام قیمت (خرید)
                        </h4>
                    @elseif($adItem->subactivity->type == 'inquiry_project')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی استعلام قیمت (اجرای پروژه)
                        </h4>
                    @elseif($adItem->subactivity->type == 'contractor')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            آگهی پیمانکاری
                        </h4>
                    @endif

                    <h3 class="h6 mb-2 fs-base">
                        <a class="nav-link" href="{{route('activity', $adItem->slug)}}">
                            {{$adItem->subactivity->item_title}}
                        </a>
                    </h3>
                    {{-- @if($adItem->subactivity->item_description)
                        <p class="mb-2 fs-sm text-muted">
                            {{Str::of($adItem->subactivity->item_description)->limit(70)}}
                        </p>
                    @endif
                    <div>
                        <b>زمینه فعالیت: </b>
                        {{$adItem->activityGroups->pluck('title')->implode('، ')}}
                    </div> --}}
                    
                    <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end text-nowrap">
                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                            {{jdate($adItem->updated_at)->ago()}}
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end text-nowrap">
                            شماره آگهی:
                            {{$adItem->id}}
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 text-nowrap">
                            <i class="fi-eye-on mt-n1 me-1 fs-base text-muted align-middle"></i>
                            100
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="mx-2">
            <div class="alert alert-accent" role="alert">
                هیچ موردی یافت نشد!
            </div>
        </div>
    @endif
</div>