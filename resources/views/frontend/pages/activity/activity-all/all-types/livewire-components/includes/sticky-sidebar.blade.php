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

                    <div class="card-body">
                        <h3 class="h5">دسته بندی ها</h3>

                        @if(!count($subCategories)) 
                            <ul class="list-unstyled p-0 mb-0 cursor-pointer">
                                @foreach($parentCategories as $parentCategory)
                                    <li class="my-3" wire:click="selectedCategory({{$parentCategory->id}})">
                                        @if(!empty($parentCategory->category_image)) <img class="category-image" src="{{asset($parentCategory->category_image)}}" alt=""> @endif
                                        {{$parentCategory->category_name}}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="mb-3 cursor-pointer fw-bold" wire:click="showAllItems">
                                <i class="fi-arrow-right"></i>
                                همه آگهی ها
                            </div>
                            <ul class="list-unstyled p-0 mb-0">
                                <li class="list-unstyled">
                                    <label class="fw-bold">
                                        {{$subCategories[0]->parentCategory->category_name}}
                                    </label>
                                    <ul class="list-unstyled pr-4 mb-0 cursor-pointer floating-right-border">
                                        @foreach($subCategories as $subCategory)
                                            <li class="my-3 mx-2" wire:click="selectedCategory({{$subCategory->id}})">
                                                @if(!empty($subCategory->category_image)) <img class="category-image" src="{{asset($subCategory->category_image)}}" alt=""> @endif
                                                {{$subCategory->category_name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        @endif
                        
                        <div class="py-4">
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