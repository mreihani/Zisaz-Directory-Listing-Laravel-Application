<div class="col-lg-8 col-md-7 mb-5">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h2 mb-0">
            کسب و کارهای من
        </h1>

        <a class="fw-bold text-decoration-none" href="{{route('user.personal-website.create')}}">
            <i class="fi-plus mt-n1 me-2"></i>
            افزودن کسب و کار جدید
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
            <a class="nav-link" href="{{route('user.dashboard.saved-personal-websites.index')}}" role="tab" aria-selected="false">
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
            <a class="nav-link" href="{{route('user.dashboard.saved-personal-websites.index', ['type=trashed'])}}" role="tab" aria-selected="false">
                <i class="fi-trash fs-base me-2"></i>
                حذف شده
            </a>
        </li>
    </ul>

    @if(count($psites))
        @foreach ($psites as $psiteItem)
            <!-- Item-->
            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4" >
                <a class="card-img-top" href="{{route('site', $psiteItem->slug)}}" style="background-image: url('{{asset($psiteItem->hero->psiteHeroSliders->first()->slider_image)}}');">
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
                                <a class="dropdown-item" href="{{route('user.personal-website.edit', $psiteItem->id)}}">
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
                                <a class="dropdown-item" href="{{route('user.personal-website.destroy', $psiteItem->id)}}" onclick="if(confirm('آیا برای حذف این آیتم اطمینان دارید؟')){return true}">
                                    <i class="fi-trash opacity-60 me-2"></i>
                                    حذف
                                </a>
                            </li>
                        </ul>
                    </div>

                    @if($psiteItem->business_type == '1')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی فروشگاه
                        </h4>
                    @elseif($psiteItem->business_type == '2')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی شرکت ساختمانی
                        </h4>
                    @elseif($psiteItem->business_type == '3')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی دفتر طراحی و مهندسی
                        </h4>
                    @elseif($psiteItem->business_type == '4')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی پروژه های انبوه سازی شخصی
                        </h4>
                    @elseif($psiteItem->business_type == '5')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی و ارائه اطلاعات تماس و تجربیات شخصی
                        </h4>
                    @elseif($psiteItem->business_type == '6')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی آزمایشگاه مصالح ساختمانی
                        </h4>
                    @elseif($psiteItem->business_type == '7')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی کارخانه تولید نیازهای ساخت و ساز
                        </h4>
                    @elseif($psiteItem->business_type == '8')
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی فعالیت در زمینه ماشین آلات ساختمانی
                        </h4>
                    @endif

                    <h3 class="h6 mb-2 fs-base">
                        <a class="nav-link" href="{{route('site', $psiteItem->slug)}}">
                            {{$psiteItem->hero->title}}
                        </a>
                    </h3>
                    
                    <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end">
                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                            {{jdate($psiteItem->updated_at)->ago()}}
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end text-nowrap">
                            شماره وبسایت:
                            {{$psiteItem->id}}
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3">
                            <i class="fi-eye-on mt-n1 me-1 fs-base text-muted align-middle"></i>
                            بازدید:
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