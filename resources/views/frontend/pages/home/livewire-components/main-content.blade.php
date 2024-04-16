<div>
    <section class="position-relative bg-white rounded-xxl-4 zindex-5" style="margin-top: 30px;">
        <div class="container pt-4 pb-5 mb-md-4">
            <div class="row">

                <!-- Sticky sidebar-->
                <aside class="col-lg-3 col-md-3">
                    <div class="sticky-top" style="padding-top: 7rem;">
                        <div class="offcanvas-lg offcanvas-end" id="blog-sidebar">
                            <div class="offcanvas-header shadow-sm mb-2">
                                <h2 class="h5 mb-0">سایدبار</h2>
                                <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#blog-sidebar"></button>
                            </div>
                            <div class="offcanvas-body">
                                <!-- Sort-->
                                <div class="d-flex align-items-center mb-4">
                                    <label class="me-2 mb-0 text-nowrap" for="sortby"><i class="fi-arrows-sort mt-n1 me-2 align-middle opacity-70"></i>مرتب سازی براساس:</label>
                                    <select class="form-select" id="sortby">
                                        <option>جدیدترین</option>
                                        <option>قدیمی ترین</option>
                                        <option>پربازدید</option>
                                        <option>اسپانسری</option>
                                    </select>
                                </div>
                                <!-- Categories-->
                                <div class="card card-flush pb-2 pb-lg-0 mb-4">
                                    <div class="card-body">
                                        <h3 class="h5">دسته بندی ها</h3>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">آگهی ها</a>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">کسب و کار ها</a>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">پروژه ها</a>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">متخصصین و نیروی انسانی</a>
                                    </div>
                                </div>
                                <!-- Links-->
                                <div class="card card-flush pb-2 pb-lg-0 mb-4">
                                    <div class="card-body">
                                        <h3 class="h5">لینک های ویژه</h3>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('jobs')}}">آگهی ها استخدام</a>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('blog-all')}}">مقالات</a>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('about-us')}}">درباره ما</a>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('contact-us')}}">تماس با ما</a>
                                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('faq')}}">سوالات متداول</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- List of jobs-->
                <div class="col-lg-9 col-md-9 position-relative mb-4 mb-md-0" style="z-index: 1025;">
                    <!-- Main-->
                    <div class="col-lg-12 blog-list mt-5 pt-5" style="padding-right: 50px;">

                        <!-- List of selling ads-->
                        <div class="border-bottom pb-2">
                            <h5 class="pb-3">آگهی فروش کالا</h5>
                            <div class="row">
                                @if(count($sellingAds))
                                    @foreach ($sellingAds as $sellingAdsItem)
                                        <!-- Item-->
                                        <article class="col-sm-4 mb-4">
                                            <div class="card card-hover border-0 shadow-sm h-100">
                                                <a class="card-img-top overflow-hidden position-relative" href="">
                                                    <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                                    <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
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
                                        </article>
                                    @endforeach
                                @else
                                    <div class="alert alert-accent" role="alert">
                                        هیچ موردی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- List of employee ads-->
                        <div class="border-bottom pb-2 pt-3">
                            <h5 class="pb-3">آگهی استخدام - کارجو</h5>
                            <div class="row">
                                @if(count($employeeAds))
                                    @foreach ($employeeAds as $employeeAdsItem)
                                        @if($employeeAdsItem->employment->where('employment_ads_type','employee'))
                                            <!-- Item-->
                                            <article class="col-sm-4 mb-4">
                                                <div class="card card-hover border-0 shadow-sm h-100">
                                                    <a class="card-img-top overflow-hidden position-relative" href="">
                                                        <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                                        <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
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
                                            </article>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="alert alert-accent" role="alert">
                                        هیچ موردی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- List of employer ads-->
                        <div class="border-bottom pb-2 pt-3">
                            <h5 class="pb-3">آگهی استخدام - کارفرما</h5>
                            <div class="row">
                                @if(count($employerAds))
                                    @foreach ($employerAds as $employerAdsItem)
                                        @if($employerAdsItem->employment->where('employment_ads_type','employee'))
                                            <!-- Item-->
                                            <article class="col-sm-4 mb-4">
                                                <div class="card card-hover border-0 shadow-sm h-100">
                                                    <a class="card-img-top overflow-hidden position-relative" href="">
                                                        <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                                        <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
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
                                            </article>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="alert alert-accent" role="alert">
                                        هیچ موردی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- List of investment investor ads-->
                        <div class="border-bottom pb-2 pt-3">
                            <h5 class="pb-3">آگهی شراکت و سرمایه گذاری - سرمایه گذار</h5>
                            <div class="row">
                                @if(count($investorAds))
                                    @foreach ($investorAds as $investorAdsItem)
                                        @if($investorAdsItem->investment->where('investment_ads_type','investor'))
                                            <!-- Item-->
                                            <article class="col-sm-4 mb-4">
                                                <div class="card card-hover border-0 shadow-sm h-100">
                                                    <a class="card-img-top overflow-hidden position-relative" href="">
                                                        <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                                        <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
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
                                            </article>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="alert alert-accent" role="alert">
                                        هیچ موردی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- List of investment invested ads-->
                        <div class="border-bottom pb-2 pt-3">
                            <h5 class="pb-3">آگهی شراکت و سرمایه گذاری - سرمایه پذیر</h5>
                            <div class="row">
                                @if(count($investedAds))
                                    @foreach ($investedAds as $investedAdsItem)
                                        @if($investedAdsItem->investment->where('investment_ads_type','invested'))
                                            <!-- Item-->
                                            <article class="col-sm-4 mb-4">
                                                <div class="card card-hover border-0 shadow-sm h-100">
                                                    <a class="card-img-top overflow-hidden position-relative" href="">
                                                        <span class="badge bg-faded-info position-absolute top-0 end-0 fs-sm rounded-pill m-3">جدید</span>
                                                        <img class="d-block" src="{{asset('assets/frontend/img/job-board/blog/01.jpg')}}" alt="Image">
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
                                            </article>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="alert alert-accent" role="alert">
                                        هیچ موردی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- List of custom pages-->
                        <div class="border-bottom pb-2 pt-3">
                            <h5 class="pb-3">کسب و کارها</h5>
                            <div class="row">

                                <div class="alert alert-accent" role="alert">
                                    هیچ موردی یافت نشد!
                                </div>
                                
                            </div>
                        </div>

                        <!-- List of all ads-->
                        <div class="pb-2">
                            <h5 class="pb-3 pt-3">کلیه آگهی ها</h5>
                            <div class="row">
                                @if(count($adsRegistrations))
                                    @foreach ($adsRegistrations as $adsRegistrationItem)
                                        <!-- Item-->
                                        <article class="col-sm-4 mb-4">
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
                                        </article>
                                    @endforeach
                                @else
                                    <div class="alert alert-accent" role="alert">
                                        هیچ موردی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            
            </div>
        </div>
      </section>
</div>
