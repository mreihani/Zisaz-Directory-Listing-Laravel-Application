<div class="col-lg-8 col-md-7 mb-5">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h2 mb-0">
            رزومه های من
        </h1>
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
            <a class="nav-link" href="#" role="tab" aria-selected="false">
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
            <a class="nav-link" href="#" role="tab" aria-selected="false">
                <i class="fi-archive fs-base me-2"></i>
                آرشیو
            </a>
        </li>
    </ul>

    @if(count($userResumes))
        @foreach ($userResumes as $resumeItem)
            <!-- Item-->
            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4">
                <a class="card-img-top" href="{{route('activity', $resumeItem->slug)}}" style="background-image: url('{{$resumeItem->adsImagesUrl()}}');">
                    <div class="position-absolute start-0 top-0 pt-3 ps-3">
                        <span class="d-table badge bg-info">
                            تأیید شده
                        </span>
                    </div>
                </a>
                <div class="card-body position-relative pb-3">
                    {{-- <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
                        <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fi-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                            <li>
                                <a class="dropdown-item" href="{{route('user.activity.edit', $resumeItem->id)}}">
                                    <i class="fi-edit opacity-60 me-2"></i>
                                    ویرایش
                                </a>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-flame opacity-60 me-2"></i>
                                    نردبان
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-power opacity-60 me-2"></i>
                                    غیرفعال
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <i class="fi-trash opacity-60 me-2"></i>
                                    حذف
                                </button>
                            </li>
                        </ul>
                    </div> --}}

                    @if($resumeItem->subactivity->resume_goal == 1)
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی تخصص، تجربیات و پروژه های شخصی
                        </h4>
                    @elseif($resumeItem->subactivity->resume_goal == 2)
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی فروشگاه
                        </h4>
                    @elseif($resumeItem->subactivity->resume_goal == 3)
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی شرکت ساختمانی
                        </h4>
                    @elseif($resumeItem->subactivity->resume_goal == 4)
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی دفتر طراحی و مهندسی
                        </h4>
                    @elseif($resumeItem->subactivity->resume_goal == 5)
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی آزمایشگاه مصالح ساختمانی
                        </h4>
                    @elseif($resumeItem->subactivity->resume_goal == 6)
                        <h4 class="mb-1 fs-sm fw-normal text-uppercase text-primary">
                            معرفی کارخانه تولیدی
                        </h4>
                    @endif

                    <h3 class="h6 mb-2 fs-base">
                        <a class="nav-link" href="{{route('activity', $resumeItem->slug)}}">
                            {{$resumeItem->subactivity->item_title}}
                        </a>
                    </h3>
                    @if($resumeItem->subactivity->resume_description)
                        <p class="mb-2 fs-sm text-muted">
                            {{Str::of($resumeItem->subactivity->resume_description)->limit(70)}}
                        </p>
                    @endif
                    <div>
                        <b>زمینه فعالیت: </b>
                        {{$resumeItem->activityGroups->pluck('title')->implode('، ')}}
                    </div>
                    <div class="d-flex align-items-center justify-content-center border-top pt-3 pb-2 mt-3">
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end">
                            <a class="dropdown-item" href="{{route('user.activity.edit', $resumeItem->id)}}">
                                <i class="fi-edit opacity-60 me-2"></i>
                                ویرایش
                            </a>
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end">
                            <a class="dropdown-item" href="">
                                <i class="fi-archive opacity-60 me-2"></i>
                                آرشیو
                            </a>
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3">
                            <a class="dropdown-item" href="">
                                <i class="fi-trash opacity-60 me-2"></i>
                                حذف
                            </a>
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-center border-top pt-3 pb-2 mt-3">
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end">
                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                            زمان انتشار:
                            {{jdate($resumeItem->updated_at)->ago()}}
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end">
                            شماره رزومه:
                            {{$resumeItem->id}}
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