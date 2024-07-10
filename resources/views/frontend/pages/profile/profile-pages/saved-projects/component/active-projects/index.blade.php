<div class="col-lg-8 col-md-7 mb-5">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h2 mb-0">
            پروژه های من
        </h1>

        <a class="fw-bold text-decoration-none" href="{{route('user.project.create')}}">
            <i class="fi-plus mt-n1 me-2"></i>
            افزودن پروژه جدید
        </a>
    </div>
    
    <!-- Nav tabs-->
    @include('frontend.pages.profile.profile-pages.saved-projects.component.layouts.nav')

    @if(count($projects))
        @foreach ($projects as $projectItem)
            <!-- Item-->
            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4" >
                <a class="card-img-top" href="{{route('project', $projectItem->slug)}}" style="background-image: url('{{asset($projectItem->projectImages->first()->image_sm)}}');">
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
                                <a class="dropdown-item" href="{{route('user.project.edit', $projectItem->id)}}">
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
                                <a class="dropdown-item" href="{{route('user.project.destroy', $projectItem->id)}}" onclick="if(confirm('آیا برای حذف این آیتم اطمینان دارید؟')){return true}">
                                    <i class="fi-trash opacity-60 me-2"></i>
                                    حذف
                                </a>
                            </li>
                        </ul>
                    </div>

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
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end">
                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                            {{jdate($projectItem->updated_at)->ago()}}
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end text-nowrap">
                            شماره پروژه:
                            {{$projectItem->id}}
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