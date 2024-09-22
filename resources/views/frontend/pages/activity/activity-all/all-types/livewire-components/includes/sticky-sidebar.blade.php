<aside class="col-lg-3 home-page-sidebar">
    <div class="sticky-top" style="padding-top: 3rem;">
        <div class="offcanvas-lg offcanvas-end" id="blog-sidebar">
            <div class="offcanvas-header shadow-sm mb-2">
                <h2 class="h5 mb-0">سایدبار</h2>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#blog-sidebar"></button>
            </div>
            <div class="offcanvas-body">
                
                <!-- Categories-->
                <div class="card card-flush pb-2 pb-lg-0 mb-4">

                    <!-- Sort-->
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <label class="me-2 mb-0 text-nowrap" for="sortby"><i class="fi-arrows-sort mt-n1 me-2 align-middle opacity-70"></i>مرتب سازی براساس:</label>
                            <select class="form-select" id="sortby" wire:model="selectedSortOption">
                                <option value="newest">جدید ترین</option>
                                <option value="oldest">قدیمی ترین</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="">
                            <h3 class="h6">موقعیت مکانی</h3>

                            <select class="form-select mb-2" wire:model="selectedProvinceId" wire:change="loadCitiesByProvinceChange($event.target.value)">
                                <option value="" selected disabled>انتخاب استان</option>
                                @foreach ($provinces as $provinceItem)
                                    <option value="{{ $provinceItem->id }}">
                                        {{ $provinceItem->title }}
                                    </option>
                                @endforeach
                            </select>

                            <select class="form-select" wire:model="selectedCityId">
                                <option value="" selected disabled>انتخاب شهر</option>
                                @foreach($cities as $cityItem)
                                    <option value="{{ $cityItem->id }}">
                                        {{ $cityItem->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-body" wire:ignore>
                        <h3 class="h5">دسته بندی آگهی</h3>
                        
                        <!-- فیلتر آگهی ها-->
                        <ul class="tree list-unstyled p-0 mb-0" x-init="$(function(){$('ul.tree').checkTree()});">
                            <li class="list-unstyled">
                                <label>
                                    فروش کالا
                                </label>
                                <ul class="category-filter-last-loop-ul">
                                    @foreach($actGrpsShopArray as $actGrpsShopItem)
                                        <li class="list-unstyled mt-2 d-flex">
                                            <input class="me-1" type="checkbox" id="category_{{$actGrpsShopItem->id}}" wire:model="selectedSellingCategory.{{$actGrpsShopItem->id}}">
                                            <label for="category_{{$actGrpsShopItem->id}}">
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
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_{{$actGrpsEngAdsItem->id}}" wire:model="selectedEmployeeCategory.{{$actGrpsEngAdsItem->id}}">
                                                            <label for="category_{{$actGrpsEngAdsItem->id}}">
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
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_{{$actGrpsManagerAdsItem->id}}" wire:model="selectedEmployeeCategory.{{$actGrpsManagerAdsItem->id}}">
                                                            <label for="category_{{$actGrpsManagerAdsItem->id}}">
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
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_{{$actGrpsTechnicalAdsItem->id}}" wire:model="selectedEmployeeCategory.{{$actGrpsTechnicalAdsItem->id}}">
                                                            <label for="category_{{$actGrpsTechnicalAdsItem->id}}">
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
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsEngAdsItem->id}}" wire:model="selectedEmployerCategory.{{$actGrpsEngAdsItem->id}}">
                                                            <label for="category_emp_{{$actGrpsEngAdsItem->id}}">
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
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsManagerAdsItem->id}}" wire:model="selectedEmployerCategory.{{$actGrpsManagerAdsItem->id}}">
                                                            <label for="category_emp_{{$actGrpsManagerAdsItem->id}}">
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
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsTechnicalAdsItem->id}}" wire:model="selectedEmployerCategory.{{$actGrpsTechnicalAdsItem->id}}">
                                                            <label for="category_emp_{{$actGrpsTechnicalAdsItem->id}}">
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
                                    <li class="list-unstyled mt-2 d-flex">
                                        <input class="me-1" type="checkbox" id="category_inv_1" wire:model="selectedInvested">
                                        <label for="category_inv_1">
                                            سرمایه پذیر هستم
                                        </label>
                                    </li>
                                    <li class="list-unstyled mt-2 d-flex">
                                        <input class="me-1" type="checkbox" id="category_inv_2" wire:model="selectedInvestor">
                                        <label for="category_inv_2">
                                            سرمایه گذار هستم
                                        </label>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-unstyled mt-2">
                                <label>
                                    مزایده و مناقصه
                                </label>
                                <ul>
                                    <li class="list-unstyled mt-2 d-flex">
                                        <label>
                                            مزایده
                                        </label>
                                        <ul class="category-filter-last-loop-ul">
                                            @foreach($actGrpsAuctionArray as $actGrpsAuctionItem)
                                                <li class="list-unstyled mt-2 d-flex">
                                                    <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsAuctionItem->id}}" wire:model="selectedAuctionCategory.{{$actGrpsAuctionItem->id}}">
                                                    <label for="category_emp_{{$actGrpsAuctionItem->id}}">
                                                        {{$actGrpsAuctionItem->title}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="list-unstyled mt-2 d-flex">
                                        <label>
                                            مناقصه
                                        </label>
                                        <ul class="category-filter-last-loop-ul">
                                            <li class="list-unstyled mt-2">
                                                <label>
                                                    مناقصه خرید
                                                </label>
                                                <ul class="category-filter-last-loop-ul">
                                                    @foreach($actGrpsTenderBuyArray as $actGrpsTenderBuyItem)
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsTenderBuyItem->id}}" wire:model="selectedTenderBuyCategory.{{$actGrpsTenderBuyItem->id}}">
                                                            <label for="category_emp_{{$actGrpsTenderBuyItem->id}}">
                                                                {{$actGrpsTenderBuyItem->title}}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li class="list-unstyled mt-2">
                                                <label>
                                                    مناقصه اجرای پروژه
                                                </label>
                                                <ul class="category-filter-last-loop-ul">
                                                    @foreach($actGrpsTenderProjectArray as $actGrpsTenderProjectItem)
                                                        <li class="list-unstyled mt-2 d-flex">
                                                            <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsTenderProjectItem->id}}" wire:model="selectedTenderProjectCategory.{{$actGrpsTenderProjectItem->id}}">
                                                            <label for="category_emp_{{$actGrpsTenderProjectItem->id}}">
                                                                {{$actGrpsTenderProjectItem->title}}
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
                                    استعلام قیمت
                                </label>
                                <ul>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            استعلام خرید
                                        </label>
                                        <ul class="category-filter-last-loop-ul">
                                            @foreach($actGrpsInquiryBuyProjectArray as $actGrpsInquiryBuyProjectItem)
                                                <li class="list-unstyled mt-2 d-flex">
                                                    <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsInquiryBuyProjectItem->id}}" wire:model="selectedInquiryBuyProjectCategory.{{$actGrpsInquiryBuyProjectItem->id}}">
                                                    <label for="category_emp_{{$actGrpsInquiryBuyProjectItem->id}}">
                                                        {{$actGrpsInquiryBuyProjectItem->title}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <label>
                                            استعلام اجرای پروژه
                                        </label>
                                        <ul class="category-filter-last-loop-ul">
                                            @foreach($actGrpsInquiryProjectArray as $actGrpsInquiryProjectItem)
                                                <li class="list-unstyled mt-2 d-flex">
                                                    <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsInquiryProjectItem->id}}" wire:model="selectedInquiryProjectCategory.{{$actGrpsInquiryProjectItem->id}}">
                                                    <label for="category_emp_{{$actGrpsInquiryProjectItem->id}}">
                                                        {{$actGrpsInquiryProjectItem->title}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-unstyled mt-2">
                                <label>
                                    خدمات مهندسی و پیمانکاری
                                </label>
                                <ul class="category-filter-last-loop-ul">
                                    @foreach($actGrpsContractorArray as $actGrpsContractorItem)
                                        <li class="list-unstyled mt-2 d-flex">
                                            <input class="me-1" type="checkbox" id="category_emp_{{$actGrpsContractorItem->id}}" wire:model="selectedContractorCategory.{{$actGrpsContractorItem->id}}">
                                            <label for="category_emp_{{$actGrpsContractorItem->id}}">
                                                {{$actGrpsContractorItem->title}}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>

                        <div class="py-4">
                            <button class="btn btn-sm btn-primary me-3" type="button" wire:click="handleFilterButton">
                                <i class="fi-filter me-2"></i>
                                اعمال فیلتر
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" type="button" wire:click="resetFilterButton" x-on:click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                <i class="fi-rotate-right me-2"></i>
                                حذف فیلتر
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Links-->
                <div class="card card-flush pb-2 pb-lg-0 mb-4" wire:ignore>
                    <div class="card-body">
                        <h3 class="h5">لینک های ویژه</h3>

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

                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="">متخصصین و نیروی انسانی</a>

                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('blog-all')}}">مقالات</a>
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('about-us')}}">درباره ما</a>
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('contact-us')}}">تماس با ما</a>
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="{{route('faq')}}">سوالات متداول</a>
                        <a class="nav-link fw-normal d-flex justify-content-between py-1 px-0" href="">فرصت همکاری</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>