<!-- Page Content -->
<section class="container">
    
    <div class="row gy-5 pt-lg-2">
        <div class="col-lg-7">
            <div class="d-flex flex-column">

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
                            @foreach($project->projectImages as $imageKey => $imageItem)
                                <img class="rounded-3" src="{{asset($imageItem->image)}}" alt="Image">
                            @endforeach
                        </div>
                    </div>
                    <!-- Thumbnails nav-->
                    <ul class="tns-thumbnails mb-4" id="thumbnails">
                        @foreach($project->projectImages as $thumbnailImageKey => $thumbnailImageItem)
                            <li class="tns-thumbnail">
                                <img src="{{asset($thumbnailImageItem->image)}}" alt="Thumbnail">
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Page title + Features-->
                <div class="order-lg-2 order-1">
                    <h1 class="h2 mt-2 mb-4 text-center">
                        پروژه
                        {{$project->projectInfo->title}}
                    </h1>
                </div>
            </div>

            <!-- Overview-->
            <h2 class="h5">
                درباره پروژه
            </h2>
            <p class="mb-4 pb-2">
                {{$project->projectFacility->project_description}}
            </p>
        </div>

        <!-- Sidebar with details-->
        <aside class="col-lg-5">
            <div class="ps-lg-5">
                <h3 class="h5 mb-2">
                    پروژه
                    {{$project->projectInfo->title}}
                </h3>
                <!-- Property details-->
                @if(!is_null($project->projectInfo))
                    <div class="card border-0 bg-light mb-4">
                        <div class="card-body">
                            <h5 class="mb-0 pb-3">مشخصات</h5>
                            <ul class="list-unstyled mt-n2 mb-0">
                                @if(!is_null($project->project_type))
                                    <li class="mt-2 mb-0"><b>نوع پروژه: </b>
                                        @if($project->project_type == '1')
                                            پروژه مسکونی
                                        @elseif($project->project_type == '2')
                                            پروژه تجاری
                                        @elseif($project->project_type == '3')
                                            پروژه تجاری مسکونی
                                        @elseif($project->project_type == '4')
                                            پروژه تجاری اداری
                                        @elseif($project->project_type == '5')
                                            پروژه تفریحی و ورزشی
                                        @elseif($project->project_type == '6')
                                            پروژه پزشکی درمانی
                                        @elseif($project->project_type == '7')
                                            پروژه آموزشی
                                        @elseif($project->project_type == '8')
                                            پروژه کشاورزی و صنعتی
                                        @elseif($project->project_type == '9')
                                            سایر پروژه ها
                                        @endif
                                    </li>
                                @endif
                                @if(!is_null($project->projectInfo->total_area))
                                    <li class="mt-2 mb-0"><b>مساحت کل زمین: </b>
                                        {{$project->projectInfo->total_area}}
                                    </li>
                                @endif
                                @if(!is_null($project->projectInfo->floor_count))
                                    <li class="mt-2 mb-0"><b>تعداد طبقات: </b>
                                        {{$project->projectInfo->floor_count}}
                                    </li>
                                @endif
                                @if(!is_null($project->projectInfo->residential_unit_count) && $project->projectInfo->residential_unit_count)
                                    <li class="mt-2 mb-0"><b>تعداد واحد های مسکونی: </b>
                                        {{$project->projectInfo->residential_unit_count}}
                                    </li>
                                @endif
                                @if(!is_null($project->projectInfo->commercial_unit_count) && $project->projectInfo->commercial_unit_count)
                                    <li class="mt-2 mb-0"><b>تعداد واحد های تجاری: </b>
                                        {{$project->projectInfo->commercial_unit_count}}
                                    </li>
                                @endif
                                @if(!is_null($project->projectInfo->office_unit_count) && $project->projectInfo->office_unit_count)
                                    <li class="mt-2 mb-0"><b>تعداد واحد های اداری: </b>
                                        {{$project->projectInfo->office_unit_count}}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif
                <a class="btn btn-lg btn-primary w-100 mb-3" href="#contactSection">
                    تماس با ما
                </a>
                
                @if($project->welfareFacility->count())
                    <!-- Amenities-->
                    <div class="card border-0 bg-light mb-4">
                        <div class="card-body">
                            <h5>امکانات رفاهی</h5>
                            <ul class="list-unstyled row row-cols-md-2 row-cols-1 gy-2 mb-0 text-nowrap">
                                @foreach($project->welfareFacility as $facilityItem)
                                    <li class="col">
                                        <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>
                                        {{$facilityItem->title}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </aside>
    </div>
</section>
<!-- ./Page Content -->

<!-- Project Plan Images -->
@if(count($project->projectFacility->projectPlanImages))
    <section class="container pb-2 pb-lg-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h3 mb-0">نقشه های پروژه</h2>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
            <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
                @foreach($project->projectFacility->projectPlanImages as $projectPlanImageItem)
                    <!-- Item-->
                    <div class="col">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div class="card-img-top card-img-bottom card-img-hover">
                               
                                <!-- Elements related to lightgallery jquery plugin-->
                                <div data-simplebar>
                                    <div class="gallery" data-thumbnails="true">
                                        <div>
                                            <a class="gallery-item rounded rounded-md-3" href="{{asset($projectPlanImageItem->image)}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;نقشه پروژه&lt;/h6&gt;">
                                                <img src="{{asset($projectPlanImageItem->image_sm)}}" alt="Gallery thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif 
<!-- ./Project Plan Images -->

<!-- Project Adress and video section -->
<section class="container mb-5 pb-2 pb-lg-4">
    <div class="row">
        <div class="col-md-6">
            @if(
            $project->projectVideo 
            &&!is_null($project->projectVideo) 
            && $project->projectVideo->video 
            && !is_null($project->projectVideo->video)
            && file_exists($project->projectVideo->video)
            && $project->projectVideo->isVideoJobFinished() 
            && $project->projectVideo->isThumbnailJobFinished()
            )
                <div>
                    <div class="ratio ratio-16x9">
                        <video class="rounded-3" width="750" height="441" controls>
                            <source src="{{asset($project->projectVideo->video)}}" type="video/mp4">
                        </video>
                    </div>
                </div>
            @endif   
        </div>
        <div class="col-md-6">
            <!-- Addresses-->
            <div class="card card-horizontal" id="contactSection">
                <div class="card-body p-4">

                    <!-- Project address-->
                    <h6>
                        آدرس پروژه:
                    </h6>
                    <p class="mb-4">
                        {{$project->projectContact->project_address}}
                    </p>
                    
                    <!-- Main Office address-->
                    @if(count($project->projectContact->projectContactOfficeAddressItems))
                        <h6 class="mt-4">
                            آدرس دفتر مرکزی:
                        </h6>
                        <ul class="mb-0 pb-0">
                            @foreach ($project->projectContact->projectContactOfficeAddressItems as $projectContactOfficeAddressItem)
                                @if($projectContactOfficeAddressItem)
                                    <li>
                                        {{$projectContactOfficeAddressItem->address}}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Office phone numbers-->
                            @if(count($project->projectContact->projectContactOfficePhoneItems))
                            <h6 class="mt-4">
                                شماره تلفن ثابت:
                            </h6>
                            <ul class="mb-0 pb-0">
                                @foreach ($project->projectContact->projectContactOfficePhoneItems as $projectContactOfficePhoneItem)
                                    @if($projectContactOfficePhoneItem)
                                        <li>
                                            <a class="text-decoration-none" href="tel: {{$projectContactOfficePhoneItem->phone}}">
                                                {{$projectContactOfficePhoneItem->phone}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif

                            <!-- Mobile phone numbers-->
                            @if(count($project->projectContact->projectContactMobilePhoneItems))
                            <h6 class="mt-4">
                                شماره تلفن همراه:
                            </h6>
                            <ul class="mb-0 pb-0">
                                @foreach ($project->projectContact->projectContactMobilePhoneItems as $projectContactMobilePhoneItem)
                                    @if($projectContactMobilePhoneItem)
                                        <li>
                                            <a class="text-decoration-none" href="tel: {{$projectContactMobilePhoneItem->phone}}">
                                                {{$projectContactMobilePhoneItem->phone}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <!-- Email-->
                            @if($project->user->email)
                            <h6 class="mt-4">
                                ایمیل:
                            </h6>
                            <p class="mb-4">
                                <a class="text-decoration-none" href="mailto: {{$project->user->email}}">
                                    {{$project->user->email}}
                                </a>
                            </p>
                            @endif

                            <!-- Social Media Platforms-->
                            @if($project->projectContact->instagram
                            || $project->projectContact->telegram
                            || $project->projectContact->whatsapp
                            || $project->projectContact->x
                            || $project->projectContact->linkedin
                            || $project->projectContact->eitaa
                            )
                            <h6 class="mt-4">
                                شبکه های اجتماعی:
                            </h6>
                            @if($project->projectContact->instagram)
                                <a class="text-decoration-none me-2" href="{{$project->projectContact->instagram}}">
                                    <i class="fi-instagram text-body"></i>
                                </a>
                            @endif
                            @if($project->projectContact->telegram)
                                <a class="text-decoration-none me-2" href="{{$project->projectContact->telegram}}">
                                    <i class="fi-telegram text-body"></i>
                                </a>
                            @endif
                            @if($project->projectContact->whatsapp)
                                <a class="text-decoration-none me-2" href="{{$project->projectContact->whatsapp}}">
                                    <i class="fi-whatsapp text-body"></i>
                                </a>
                            @endif
                            @if($project->projectContact->x)
                                <a class="text-decoration-none me-2" href="{{$project->projectContact->x}}">
                                    <img width="16" src="{{asset('assets/frontend/img/jaban/x-icon/X_icon.svg.png')}}" alt="">
                                </a>
                            @endif
                            @if($project->projectContact->linkedin)
                                <a class="text-decoration-none me-2" href="{{$project->projectContact->linkedin}}">
                                    <i class="fi-linkedin text-body"></i>
                                </a>
                            @endif
                            @if($project->projectContact->eitaa)
                                <a class="text-decoration-none me-2" href="{{$project->projectContact->eitaa}}">
                                    <img width="15" src="{{asset('assets/frontend/img/jaban/eitaa-icon/eitaa-icon-black.svg')}}" alt="">
                                </a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <ul class="d-flex mb-4 list-unstyled fs-sm justify-content-center mt-4">
                <li class="me-3 pe-3 border-end">
                    زمان انتشار: 
                    <b> 
                        {{jdate($project->updated_at)->ago()}}    
                    </b>
                </li>
                <li class="me-3 pe-3 border-end">
                    شماره آگهی: 
                    <b>
                        {{$project->id}}
                    </b>
                </li>
                <li class="me-3 pe-3">بازدید: 
                    <b>48 نفر</b>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ./Project Adress and video section -->