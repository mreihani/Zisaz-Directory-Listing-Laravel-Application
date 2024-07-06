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
            <!-- Work Exp-->
            @if($activity->subactivity->invested_academic)
                <h2 class="h5">
                    شرح سابقه کار
                </h2>
                <p class="mb-4 pb-2">
                    {{$activity->subactivity->invested_academic}}
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
                            @if($activity->subactivity->investment_value)
                                <li class="mt-2 mb-0">
                                    <b>مبلغ سرمایه گذاری: </b>
                                    {{$activity->subactivity->investment_value}}

                                    تومان       
                                </li>
                            @endif
                            @if($activity->subactivity->return_time)
                                <li class="mt-2 mb-0">
                                    <b>زمان برگشت سرمایه: </b>
                                    @if($activity->subactivity->return_time == "6mo")
                                    6 ماهه
                                    @elseif($activity->subactivity->return_time == "12mo")
                                    1 ساله
                                    @elseif($activity->subactivity->return_time == "18mo")
                                    18 ماهه
                                    @elseif($activity->subactivity->return_time == "24mo")
                                    24 ماهه
                                    @elseif($activity->subactivity->return_time == "moreThanTwoYrs")
                                    بیشتر از 2 سال
                                    @endif
                                </li>
                            @endif
                            @if($activity->subactivity->yearly_profit_percent)
                                <li class="mt-2 mb-0">
                                    <b>درصد سود پیشبینی سالیانه: </b>
                                    {{$activity->subactivity->yearly_profit_percent}}
                                </li>
                            @endif
                            @if($activity->subactivity->gauranteed_profit_percent)
                                <li class="mt-2 mb-0">
                                    <b>درصد سود تضمین شده توسط سرمایه پذیر: </b>
                                    {{$activity->subactivity->gauranteed_profit_percent}}
                                </li>
                            @endif
                            @if($activity->subactivity->investment_bail)
                                <li class="mt-2 mb-0">
                                    <b>ضمانت یا وثیقه: </b>
                                    {{$activity->subactivity->investment_bail}}
                                </li>
                            @endif
                            <li class="mt-2 mb-0">
                                <b>موقعیت مکانی: </b>
                                {{$activity->subactivity->city->province->title}}،
                                {{$activity->subactivity->city->title}}
                            </li>
                            <li class="mt-2 mb-0">
                                <b>موقعیت مکانی سرمایه گذاری: </b>
                                {{$activity->subactivity->investedCity->province->title}}،
                                {{$activity->subactivity->investedCity->title}}
                            </li>
                            <li class="mt-2 mb-0 d-flex">
                                <b>تلفن:&nbsp;</b>
                                @livewire('frontend.auth.login.open-login-modal', ['phone' => $activity->user->phone])
                            </li>
                        </ul>
                    </div>
                </div>
                
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