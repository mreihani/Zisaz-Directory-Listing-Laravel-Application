@extends('dashboards.users.admin.master')
@section('main')

@push('page-styles')
    <link href="{{asset('assets/dashboards/assets/vendor/css/pages/page-profile.css')}}" rel="stylesheet"/>
@endpush

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/js/pages-profile.js')}}"></script>
@endpush

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    
    @include('dashboards.users.admin.pages.profile.layouts.header')

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body"> <small class="card-text text-uppercase">درباره</small>
                    <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-user text-heading"></i><span class="fw-medium mx-2 text-heading">نام کامل:</span> <span>پیمان معادی</span>                                                </li>
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-check text-heading"></i><span class="fw-medium mx-2 text-heading">وضعیت:</span> <span>فعال</span> </li>
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-crown text-heading"></i><span class="fw-medium mx-2 text-heading">نقش:</span> <span>توسعه دهنده</span>                                                </li>
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-flag text-heading"></i><span class="fw-medium mx-2 text-heading">کشور:</span> <span>ایران</span> </li>
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-file-description text-heading"></i><span class="fw-medium mx-2 text-heading">زبان ها:</span> <span>فارسی</span>                                                </li>
                    </ul> <small class="card-text text-uppercase">مخاطبین</small>
                    <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-phone-call"></i><span class="fw-medium mx-2 text-heading">تماس با ما:</span> <span><bdi>0913 000 0000</bdi></span>                                                </li>
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-brand-skype"></i><span class="fw-medium mx-2 text-heading">اسکایپ: نـوید</span> <span>@TEST</span> </li>
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-mail"></i><span class="fw-medium mx-2 text-heading">پست الکترونیکی:</span> <span>john.doe@example.com</span>                                                </li>
                    </ul> <small class="card-text text-uppercase">تیم ها</small>
                    <ul class="list-unstyled mb-0 mt-3">
                    <li class="d-flex align-items-center mb-3"> <i class="ti ti-brand-angular text-danger me-2"></i>
                        <div class="d-flex flex-wrap"> <span class="fw-medium me-2 text-heading">توسعه دهنده آنگولار</span> <span>(126 اعضا)</span> </div>
                    </li>
                    <li class="d-flex align-items-center"> <i class="ti ti-brand-react-native text-info me-2"></i>
                        <div class="d-flex flex-wrap"> <span class="fw-medium me-2 text-heading">توسعه دهنده ری‌اکت</span> <span>(98 اعضا)</span> </div>
                    </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
        </div>
    </div>
</div>
<!-- / Content -->

@endsection