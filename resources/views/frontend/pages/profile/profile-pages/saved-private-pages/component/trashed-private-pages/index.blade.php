<div class="col-lg-8 col-md-7 mb-5">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h2 mb-0">
            کسب و کارهای من
        </h1>

        <a class="fw-bold text-decoration-none" href="{{route('user.personal-website.create')}}">
            <i class="fi-plus mt-n1 me-2"></i>
            افزودن کسب و کار جدید
        </a>
    </div>

    <!-- Warning alert -->
    @if(count($psites))
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <span class="fw-bold">توجه:</span> کسب و کار های حذف شده تا مدت 6 ماه در سامانه به صورت غیر فعال باقی می مانند، شما می توانید تا قبل از این زمان مجددا آن ها را بازگردانی نمایید؛ اما پس از گذشت این زمان به صورت خودکار برای همیشه از سامانه حذف خواهند شد.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <!-- Nav tabs-->
    @include('frontend.pages.profile.profile-pages.saved-private-pages.component.layouts.nav')

    @if(count($psites))
        @foreach ($psites as $psiteItem)
            <!-- Item-->
            <div class="card card-hover card-horizontal border-0 shadow-sm mb-4" >
                <a class="card-img-top" href="#" style="background-image: url('{{asset($psiteItem->info->business_banner)}}');">
                    <div class="position-absolute start-0 top-0 pt-3 ps-3">
                        <span class="d-table badge bg-dark">
                            حذف شده
                        </span>
                    </div>
                </a>
                <div class="card-body position-relative pb-3 d-flex flex-column justify-content-between">

                    <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
                        <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi-dots-vertical"></i></button>
                        <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                            <li>
                                <form action="{{route('user.personal-website.restore', $psiteItem->id)}}" method="POST" class="dropdown-item">
                                    @method('put')
                                    @csrf

                                    <button type="submit" class="border-none bg-transparent border-0" onclick ="return confirm('آیا برای بازگردانی این آیتم اطمینان دارید؟')">
                                        <i class="fi-upload-file opacity-60 me-2"></i>
                                        بازگردانی
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                    <h3 class="h6 mb-2 fs-base">
                        <a class="nav-link" href="#">
                            {{$psiteItem->info->title}}
                        </a>
                    </h3>
                    
                    <div class="d-flex align-items-center justify-content-center text-center border-top pt-3 pb-2 mt-3">
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end">
                            <i class="fi-clock mt-n1 me-1 fs-base text-muted align-middle"></i>
                            {{jdate($psiteItem->updated_at)->ago()}}
                        </span>
                        <span class="d-inline-block me-4 fs-sm me-3 pe-3 border-end text-nowrap">
                            شماره وبسایت:
                            {{$psiteItem->id}}
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