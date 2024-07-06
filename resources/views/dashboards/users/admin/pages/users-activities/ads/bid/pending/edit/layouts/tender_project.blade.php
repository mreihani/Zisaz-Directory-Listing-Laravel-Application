<!-- Page content-->
<section class="container bg-white mb-5 pb-5">
    
    <div class="row gy-5 pt-lg-2">
        <div class="col-lg-7">
            <div class="d-flex flex-column">

                <!-- Ads Images (carousel)-->
                @if($activity->adsImages->count())
                    <!-- Carousel with slides count-->
                    <div class="order-lg-1 order-2">
                        <div class="tns-carousel-wrapper">
                            <div class="tns-slides-count text-light">
                                <i class="fi-image fs-lg me-2"></i>
                                <div class="pe-1">
                                    <span class="tns-current-slide fs-5 fw-bold"></span>
                                    <span class="fs-5 fw-bold">/</span>
                                    <span class="tns-total-slides fs-5 fw-bold"></span>
                                </div>
                            </div>
                            <div class="tns-carousel-inner" data-carousel-options="{&quot;navAsThumbnails&quot;: true, &quot;navContainer&quot;: &quot;#thumbnails&quot;, &quot;gutter&quot;: 12, &quot;responsive&quot;: {&quot;0&quot;:{&quot;controls&quot;: false},&quot;500&quot;:{&quot;controls&quot;: true}}}">
                                @foreach($activity->adsImages as $adsImageItem)
                                    <div>
                                        <img class="rounded-3" src="{{asset($adsImageItem->image)}}" alt="Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Thumbnails nav-->
                        <ul class="tns-thumbnails" id="thumbnails">
                            @foreach($activity->adsImages as $adsImageItem)
                                <li class="tns-thumbnail">
                                    <img src="{{asset($adsImageItem->image)}}" alt="Thumbnail">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Page title + Features-->
                <div class="order-lg-2 order-1 mt-3">
                    <h1 class="h2 mb-2">
                        {{$activity->subactivity->item_title}}
                    </h1>
                    @if($activity->subactivity->address)
                        <p class="mb-2 pb-1 fs-base">
                            {{$activity->subactivity->address}}
                        </p>
                    @endif
                </div>
            </div>
            <!-- Overview-->
            @if($activity->subactivity->item_description)
                <h2 class="h5">
                    توضیحات
                </h2>
                <p class="mb-4 pb-2">
                    {{$activity->subactivity->item_description}}
                </p>
            @endif
        
        </div>
        <!-- Sidebar with details-->
        <aside class="col-lg-5">
            <div class="ps-lg-5">
                
                <!-- Property details-->
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body">
                        <h5 class="mb-0 pb-3">مشخصات</h5>
                        <ul class="list-unstyled mt-n2 mb-0">
                            @if($activity->activityGroups->count())
                                <li class="mt-2 mb-0">
                                    <b>زمینه فعالیت: </b>
                                    {{$activity->activityGroups->pluck('title')->implode('، ')}}
                                </li>
                            @endif
                            <li class="mt-2 mb-0">
                                <b>موقعیت مکانی: </b>
                                {{$activity->subactivity->city->province->title}}،
                                {{$activity->subactivity->city->title}}
                            </li>
                            <li class="mt-2 mb-0 d-flex">
                                <b>تلفن:&nbsp;</b>
                                @livewire('frontend.auth.login.open-login-modal', ['phone' => $activity->user->phone])
                            </li>
                            @if($activity->subactivity->auctioneer)
                                <li class="mt-2 mb-0">
                                    <b>مناقصه گذار: </b>
                                    @if($activity->subactivity->auctioneer == "private_company")
                                    شرکت خصوصی
                                    @elseif($activity->subactivity->auctioneer == "public_company")
                                    شرکت دولتی
                                    @elseif($activity->subactivity->auctioneer == "individual")
                                    شخص حقیقی
                                    @endif
                                </li>
                            @endif
                            @if($activity->subactivity->auction_number)
                                <li class="mt-2 mb-0">
                                    <b>شماره مناقصه: </b>
                                    {{$activity->subactivity->auction_number}}
                                </li>
                            @endif
                            @if($activity->subactivity->auction_exp_date_start && $activity->subactivity->auction_exp_date_end)
                                <li class="mt-2 mb-0">
                                    <b>تاریخ اعتبار مناقصه: </b>
                                    {{$activity->subactivity->auction_exp_date_start}}
                                    الی
                                    {{$activity->subactivity->auction_exp_date_end}}
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                @if($activity->license->count())
                    <a class="btn btn-lg btn-primary w-100 mb-3" href="{{route('get-license-item-zip', [$activity->id])}}">
                        <i class="fi-download-file"></i>
                        دانلود مدارک
                    </a>
                @endif
                
                <!-- Post meta-->
                <ul class="d-flex mb-4 list-unstyled fs-sm">
                    <li class="me-3 pe-3 border-end">زمان انتشار: 
                        <b> 
                            {{jdate($activity->subactivity->updated_at)->ago()}}    
                        </b>
                    </li>
                    <li class="me-3 pe-3 border-end">شماره آگهی: 
                        <b>
                            {{$activity->id}}
                        </b>
                    </li>
                    <li class="me-3 pe-3">بازدید: <b>100 نفر</b></li>
                </ul>
            </div>
        </aside>
    </div>
</section>