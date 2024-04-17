<aside class="col-lg-4 col-md-4">
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
                    </select>
                </div>
                <!-- Categories-->
                <div class="card card-flush pb-2 pb-lg-0 mb-4" wire:ignore>
                    <div class="card-body">
                        <h3 class="h5">دسته بندی ها</h3>
                        
                        <!-- فیلتر آگهی ها-->
                        <ul class="tree list-unstyled p-0 mb-0" x-init="$(function(){$('ul.tree').checkTree({});});">
                            <li class="list-unstyled">
                                <label>
                                    آگهی ها
                                </label>
                                <ul>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            فروش کالا
                                        </label>
                                        <ul class="category-filter-last-loop-ul">
                                            @foreach($actGrpsShopArray as $actGrpsShopItem)
                                                <li class="list-unstyled mt-2">
                                                    <label wire:click="loadSpecificCategorySidebarFilterAds({{$actGrpsShopItem->id}}, 'selling')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                        {{$actGrpsShopItem->title}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            کار و استخدام
                                        </label>
                                        <ul>
                                            <li class="list-unstyled mt-2">
                                                <label>
                                                    کارجو هستم
                                                </label>
                                                <ul>
                                                    <li class="list-unstyled mt-2">
                                                        <label>
                                                            مهندسین
                                                        </label>
                                                        <ul class="category-filter-last-loop-ul">
                                                            @foreach($actGrpsEngAdsArray as $actGrpsEngAdsItem)
                                                                <li class="list-unstyled mt-2">
                                                                    <label wire:click="loadSpecificCategorySidebarFilterAds({{$actGrpsEngAdsItem->id}}, 'employee')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                                        {{$actGrpsEngAdsItem->title}}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li class="list-unstyled mt-2">
                                                        <label>
                                                            مدیران و پرسنل اداری
                                                        </label>
                                                        <ul class="category-filter-last-loop-ul">
                                                            @foreach($actGrpsManagerAdsArray as $actGrpsManagerAdsItem)
                                                                <li class="list-unstyled mt-2">
                                                                    <label wire:click="loadSpecificCategorySidebarFilterAds({{$actGrpsManagerAdsItem->id}}, 'employee')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                                        {{$actGrpsManagerAdsItem->title}}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li class="list-unstyled mt-2">
                                                        <label>
                                                            استادکاران و کارگران
                                                        </label>
                                                        <ul class="category-filter-last-loop-ul">
                                                            @foreach($actGrpsTechnicalAdsArray as $actGrpsTechnicalAdsItem)
                                                                <li class="list-unstyled mt-2">
                                                                    <label wire:click="loadSpecificCategorySidebarFilterAds({{$actGrpsTechnicalAdsItem->id}}, 'employee')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                                        {{$actGrpsTechnicalAdsItem->title}}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="list-unstyled mt-2">
                                                <label>
                                                    کارفرما هستم
                                                </label>
                                                <ul>
                                                    <li class="list-unstyled mt-2">
                                                        <label>
                                                            مهندسین
                                                        </label>
                                                        <ul class="category-filter-last-loop-ul">
                                                            @foreach($actGrpsEngAdsArray as $actGrpsEngAdsItem)
                                                                <li class="list-unstyled mt-2">
                                                                    <label wire:click="loadSpecificCategorySidebarFilterAds({{$actGrpsEngAdsItem->id}}, 'employer')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                                        {{$actGrpsEngAdsItem->title}}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li class="list-unstyled mt-2">
                                                        <label>
                                                            مدیران و پرسنل اداری
                                                        </label>
                                                        <ul class="category-filter-last-loop-ul">
                                                            @foreach($actGrpsManagerAdsArray as $actGrpsManagerAdsItem)
                                                                <li class="list-unstyled mt-2">
                                                                    <label wire:click="loadSpecificCategorySidebarFilterAds({{$actGrpsManagerAdsItem->id}}, 'employer')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                                        {{$actGrpsManagerAdsItem->title}}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li class="list-unstyled mt-2">
                                                        <label>
                                                            استادکاران و کارگران
                                                        </label>
                                                        <ul class="category-filter-last-loop-ul">
                                                            @foreach($actGrpsTechnicalAdsArray as $actGrpsTechnicalAdsItem)
                                                                <li class="list-unstyled mt-2">
                                                                    <label wire:click="loadSpecificCategorySidebarFilterAds({{$actGrpsTechnicalAdsItem->id}}, 'employer')" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                                                        {{$actGrpsTechnicalAdsItem->title}}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            شراکت و سرمایه گذاری
                                        </label>
                                        <ul>
                                            <li class="list-unstyled mt-2">
                                                <label>
                                                    سرمایه پذیر هستم
                                                </label>
                                            </li>
                                            <li class="list-unstyled mt-2">
                                                <label>
                                                    سرمایه گذار هستم
                                                </label>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <!-- فیلتر کسب و کار ها-->
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">کسب و کار ها</a>

                        <!-- فیلتر پروژه ها-->
                        <ul class="tree list-unstyled p-0 mb-0">
                            <li class="list-unstyled">
                                <label>
                                    پروژه ها
                                </label>
                                <ul>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            مسکونی
                                        </label>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            تجاری
                                        </label>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            تجاری مسکونی
                                        </label>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            تجاری و اداری
                                        </label>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            باغ ویلا
                                        </label>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            توریستی و تفریحی
                                        </label>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            صنعتی
                                        </label>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <!-- فیلتر مزایده و مناقصه-->
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="#">مزایده و مناقصه</a>

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
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="">فرصت همکاری</a>
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="">متخصصین و نیروی انسانی</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>