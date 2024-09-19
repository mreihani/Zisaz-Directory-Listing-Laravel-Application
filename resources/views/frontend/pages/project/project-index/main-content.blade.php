<div class="container pt-5 pb-lg-4 mt-5 mb-sm-2">
    
    <!-- Page content-->
    <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 col-md-5 pe-xl-4 mb-5">

            <div class="card card-body border-0 shadow-sm pb-5 me-lg-1">

                <!-- About Project Section -->
                <section>
                    <div class="mt-1">
                        <div class="fw-bolder text-dark">
                            نام پروژه
                        </div>
                        <div>
                            {{$project->projectInfo->title}}
                        </div>
                    </div>

                    @if(!empty($project->projectFacility) && !is_null($project->projectFacility->project_description))
                        <div class="mt-3 mb-3">
                            <div class="fw-bolder text-dark">
                                درباره پروژه
                            </div>
                            <div>
                                {{$project->projectFacility->project_description}}
                            </div>
                        </div>
                    @endif
                </section>
                
                <hr class="mb-4 mt-2">

                <!-- About User Section -->
                <section class="mt-3">
                    <div class="d-flex d-md-block d-lg-flex align-items-start pt-lg-2 mb-4">
                        <img class="rounded-circle" src="{{$project->user->avatar()}}" width="48" alt="">
                        <div class="pt-md-2 pt-lg-0 ps-3 ps-md-0 ps-lg-3">
                            <h2 class="fs-lg mb-0">
                                نام سازنده
                            </h2>
                            <div>
                                {{$project->user->firstname}} {{$project->user->firstname}}
                            </div>
                        </div>
                    </div>

                    @if(!empty($project->projectInfo) && !is_null($project->projectInfo->constructor_bio))
                        <div class="mt-1">
                            <div class="fw-bolder text-dark">
                                درباره سازنده
                            </div>
                            <div>
                                {{$project->projectInfo->constructor_bio}}
                            </div>
                        </div>
                    @endif
                </section>

                <hr class="mb-4 mt-4">

                <!-- Address Section -->
                <section>
                    <div>
                        <div class="fw-bolder text-dark">
                            آدرس پروژه
                        </div>
                        <div>
                            <i class="fi-map-pin text-body"></i>
                            نشانی:
                            {{$project->projectContact->project_address}}
                        </div>
                    </div>

                    <div class="mt-3" dir="ltr">
                        @if(!empty($project->projectContact) && count($project->projectContact->projectContactPhoneItems))
                            @foreach ($project->projectContact->projectContactPhoneItems as $phoneItem)
                                <a class="text-decoration-none text-dark mx-1" href="tel:{{$phoneItem->phone}}">
                                    {{$phoneItem->phone}}
                                </a>
                            @endforeach
                        @endif
                    </div>

                    @if(!empty($project->projectContact->instagram) 
                    || !empty($project->projectContact->telegram) 
                    || !empty($project->projectContact->whatsapp) 
                    || !empty($project->projectContact->x) 
                    || !empty($project->projectContact->linkedin) 
                    || !empty($project->projectContact->eitaa))
                        <div class="mt-4">
                            <div class="fw-bolder text-dark mb-2">
                                شبکه های اجتماعی
                            </div>

                            @if(!empty($project->projectContact->instagram))
                                <a class="btn btn-icon btn-light my-1" href="{{$project->projectContact->instagram}}">
                                    <i class="fi-instagram text-body"></i>
                                </a>
                            @endif

                            @if(!empty($project->projectContact->telegram))
                                <a class="btn btn-icon btn-light my-1" href="{{$project->projectContact->telegram}}">
                                    <i class="fi-telegram text-body"></i>
                                </a>
                            @endif

                            @if(!empty($project->projectContact->whatsapp))
                                <a class="btn btn-icon btn-light my-1" href="{{$project->projectContact->whatsapp}}">
                                    <img width="16" src="{{asset('assets/frontend/img/jaban/x-icon/X_icon.svg.png')}}" alt="">
                                </a>
                            @endif

                            @if(!empty($project->projectContact->x))
                                <a class="btn btn-icon btn-light my-1" href="{{$project->projectContact->x}}">
                                    <i class="fi-whatsapp text-body"></i>
                                </a>
                            @endif

                            @if(!empty($project->projectContact->linkedin))
                                <a class="btn btn-icon btn-light my-1" href="{{$project->projectContact->linkedin}}">
                                    <i class="fi-linkedin text-body"></i>
                                </a>
                            @endif

                            @if(!empty($project->projectContact->eitaa))
                                <a class="btn btn-icon btn-light my-1" href="{{$project->projectContact->eitaa}}">
                                    <img width="15" src="{{asset('assets/frontend/img/jaban/eitaa-icon/eitaa-icon-black.svg')}}" alt="">
                                </a>
                            @endif
                        </div>
                    @endif

                    <!-- About us nav-->
                    @if(!empty($projectFirstSliderSlideOne) && $projectFirstSliderSlideOne->display_banner)
                        <div class="card card-body border-0 shadow-sm pb-5 me-lg-1 mt-3">
                            <div class="tns-carousel-wrapper tns-controls-static tns-nav-outside mt-4">
                                <div class="tns-carousel-inner text-center" data-carousel-options="{&quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 2000, &quot;gutter&quot;: 16}">

                                    @if(!empty($projectFirstSliderSlideOne))
                                        <div>
                                            <a href="{{asset($projectFirstSliderSlideOne->url)}}">
                                                <img class="rounded-3" src="{{asset($projectFirstSliderSlideOne->image)}}" alt="Carousel image">
                                            </a>
                                        </div>
                                    @endif

                                    @if(!empty($projectFirstSliderSlideTwo))
                                        <div>
                                            <a href="{{asset($projectFirstSliderSlideTwo->url)}}">
                                                <img class="rounded-3" src="{{asset($projectFirstSliderSlideTwo->image)}}" alt="Carousel image">
                                            </a>
                                        </div>
                                    @endif

                                    @if(!empty($projectFirstSliderSlideThree))
                                        <div>
                                            <a href="{{asset($projectFirstSliderSlideThree->url)}}">
                                                <img class="rounded-3" src="{{asset($projectFirstSliderSlideThree->image)}}" alt="Carousel image">
                                            </a>
                                        </div>
                                    @endif

                                    @if(!empty($projectFirstSliderSlideFour))
                                        <div>
                                            <a href="{{asset($projectFirstSliderSlideFour->url)}}">
                                                <img class="rounded-3" src="{{asset($projectFirstSliderSlideFour->image)}}" alt="Carousel image">
                                            </a>
                                        </div>
                                    @endif

                                    @if(!empty($projectFirstSliderSlideFive))
                                        <div>
                                            <a href="{{asset($projectFirstSliderSlideFive->url)}}">
                                                <img class="rounded-3" src="{{asset($projectFirstSliderSlideFive->image)}}" alt="Carousel image">
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row mt-4">
                        <div class="alert alert-info d-flex" role="alert">
                            <div class="col-6 d-flex flex-column">
                                <span class="fw-bolder text-dark">
                                    لینک پروژه
                                </span>
                                <span class="text-wrap">
                                    <a class="text-info text-decoration-none" href="{{Request::root()}}/project-item/{{$project->slug}}">
                                        {{Request::root()}}/project-item/{{$project->slug}}
                                    </a>
                                </span>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <button id="copyUrlBtn" class="btn btn-icon bg-info btn-xs text-white rounded-circle shadow-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="کپی لینک" data-bs-original-title="کپی لینک">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-copy">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                        <path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </aside>
        
        <div class="col-lg-8 col-md-7 mb-5">

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

            <!-- Project Plan Images -->
            @if(!empty($project->projectFacility) && count($project->projectFacility->projectPlanImages))
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

            <!-- Short Info Content-->
            <div class="row">
                <div class="col-md-3">
                    <span class="fw-bolder">
                        کاربری پروژه:
                    </span>
                    <span>
                        @if(!is_null($project->project_type))
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
                        @endif
                    </span>
                </div>
                <div class="col-md-3">
                    <span class="fw-bolder">
                        مساحت زمین:
                    </span>
                    <span>
                        @if(!empty($project->projectInfo) && !is_null($project->projectInfo->total_area))
                            {{$project->projectInfo->total_area}}
                            متر مربع
                        @endif
                    </span>
                </div>
                <div class="col-md-3">
                    <span class="fw-bolder">
                        تعداد طبقات:
                    </span>
                    <span>
                        @if(!empty($project->projectInfo) && !is_null($project->projectInfo->floor_count))
                            {{$project->projectInfo->floor_count}}
                            طبقه
                        @endif
                    </span>
                </div>
                <div class="col-md-3">
                    <span class="fw-bolder">
                        مساحت کل زیر بنا:
                    </span>
                    <span>
                        @if(!empty($project->projectInfo) && !is_null($project->projectInfo->floor_area))
                            {{$project->projectInfo->floor_area}}
                            متر مربع
                        @endif
                    </span>
                </div>
            </div>

            <hr class="mb-4 mt-4">

            <!-- Project Facilities -->
            @if(!empty($project->welfareFacility) && count($project->welfareFacility))
                <section class="container pb-2 pb-lg-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h2 class="h3 mb-0">امکانات خاص پروژه</h2>
                    </div>
                    <ul class="list-unstyled row row-cols-md-3 row-cols-1 gy-2 mb-0 text-nowrap">
                        @foreach($project->welfareFacility as $facilityItem)
                            <li class="col">
                                <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>
                                {{$facilityItem->title}}
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endif 

            <!-- Video Content-->
            @if(!empty($project->projectVideo) && !is_null($project->projectVideo->video) && !$project->projectVideo->is_hidden) 
                <div class="ratio ratio-16x9 mt-5">
                    <video class="rounded-3" width="750" height="441" controls>
                        <source src="{{asset($project->projectVideo->video)}}" type="video/mp4">
                    </video>
                </div>
            @endif
                
            <hr class="mb-4 mt-4">

            <!-- Other projects Content-->
            {{-- @if(!empty($project->welfareFacility) && count($project->welfareFacility))
                <section class="container pb-2 pb-lg-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h2 class="h3 mb-0">سایر پروژه های سازنده</h2>
                    </div>

                   
                </section>
            @endif  --}}

            @if($similarProjects->count())
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2">
                        <div class="h3 mb-0">
                            سایر پروژه های این سازنده
                        </div>
                        <div>
                            <a class="text-decoration-none text-dark" href="#">
                                بیشتر
                                <i class="fi-chevron-right" style="font-size: 10px;"></i>
                            </a>
                        </div>
                    </div>
        
                    <!-- Item-->
                    <div class="py-4 responsive-two-column-grid">
                        @foreach ($similarProjects as $projectItem)
            
                            <!-- Item-->
                            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4 mx-2" >
                                <a class="card-img-top" href="{{route('project', $projectItem->slug)}}" style="background-image: url('{{asset($projectItem->projectImages->first()->image_sm)}}');"></a>
                                <div class="card-body position-relative pb-3 d-flex flex-column justify-content-between">
                
                                    @if($projectItem->project_type == '1')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه مسکونی
                                        </h4>
                                    @elseif($projectItem->project_type == '2')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تجاری
                                        </h4>
                                    @elseif($projectItem->project_type == '3')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تجاری مسکونی
                                        </h4>
                                    @elseif($projectItem->project_type == '4')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تجاری اداری
                                        </h4>
                                    @elseif($projectItem->project_type == '5')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه تفریحی و ورزشی
                                        </h4>
                                    @elseif($projectItem->project_type == '6')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه پزشکی درمانی
                                        </h4>
                                    @elseif($projectItem->project_type == '7')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه آموزشی
                                        </h4>
                                    @elseif($projectItem->project_type == '8')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            پروژه کشاورزی و صنعتی
                                        </h4>
                                    @elseif($projectItem->project_type == '9')
                                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                                            سایر پروژه ها
                                        </h4>
                                    @endif
                                      
                                    <h3 class="h6 mb-2 fs-base">
                                        <a class="nav-link" href="{{route('project', $projectItem->slug)}}">
                                            {{$projectItem->projectInfo->title}}
                                        </a>
                                    </h3>
                                    
                                    <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                                        <span class="d-inline-block me-4 fs-sm me-3 pe-3">
                                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                                            {{jdate($projectItem->updated_at)->ago()}}
                                        </span>
                                    </div>
                                </div>
                            </div>
            
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Magazine Content-->
            @if($mags->count())
                <!-- Mag Content-->
                <section class="container mb-5 mt-5 pb-lg-5">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 pb-2">
                        <h2 class="h3 mb-sm-0 ">
                            مجله زی ساز
                        </h2>
                        <a class="btn btn-link fw-normal me-sm-3 p-0" href="{{route('get-mags')}}">
                            مشاهده همه
                            <i class="fi-arrow-long-left ms-2"></i>
                        </a>
                    </div>
                    <!-- Carousel-->
                    <div class="tns-carousel-wrapper tns-nav-outside">
                        <div class="tns-carousel-inner d-block" data-carousel-options="{&quot;controls&quot;: false, &quot;gutter&quot;: 24, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1,&quot;nav&quot;:true},&quot;500&quot;:{&quot;items&quot;:2},&quot;850&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}}}">

                            @foreach($mags as $mag)
                                <!-- Item-->
                                <article>
                                    <a class="d-block mb-3" href="{{route('mag', $mag->slug)}}">
                                        <img class="rounded-3" src="{{asset($mag->image_sm)}}" alt="Post image">
                                    </a>
                                    <a class="fs-sm text-uppercase text-decoration-none" href="{{route('mag', $mag->slug)}}">
                                        {{$mag->title}}
                                    </a>
                                    <h3 class="fs-base pt-1">
                                        <a class="nav-link" href="{{route('mag', $mag->slug)}}">
                                            {!! \Illuminate\Support\Str::limit($mag->body, 100, '...') !!}
                                        </a>
                                    </h3>
                                    <a class="d-flex align-items-center text-decoration-none" href="{{route('mag', $mag->slug)}}">
                                        <div class="ps-2">
                                            <div class="d-flex text-body fs-xs">
                                                <span class="me-2 pe-1">
                                                    <i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>
                                                    {{jdate($mag->updated_at)->format('%A, %d %B %y')}}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                            
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>
</div>

<script>
    const copyUrlBtn = document.getElementById('copyUrlBtn');

    // Get the parent element of the button (div with class 'row')
    const parentElement = copyUrlBtn.closest('.row');

    // Find the anchor tag within the parent element
    const anchorTag = parentElement.querySelector('a');

    // Get the href attribute value of the anchor tag
    const hrefLink = anchorTag.getAttribute('href');

    copyUrlBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(hrefLink);
    });
</script>
