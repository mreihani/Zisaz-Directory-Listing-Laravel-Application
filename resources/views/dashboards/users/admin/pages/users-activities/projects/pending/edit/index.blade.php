@extends('dashboards.users.admin.master')
@section('main')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-0">
            تغییر وضعیت پروژه
        </h4>
        <div class="magazine">
            <form action="{{route('admin.dashboard.users-activities.project.pending.update', $project->id)}}" method="POST">
                @method('PUT')
                @csrf

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                    <div class="d-flex flex-column justify-content-center">
                        <p class="text-muted">
                            می توانید پروژه مورد نظر را تأیید یا رد نمایید. در صورت رد کردن حتما بایستی توضیحات وارد شود.
                        </p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <a class="btn btn-label-secondary" href="{{route('admin.dashboard.users-activities.project.pending.index')}}">
                                بازگشت
                            </a>
                        </div>
                        <button class="btn btn-primary" type="submit">ذخیره</button>
                    </div>
                </div>

                <!-- Page content-->
                @include('frontend.pages.project.project-index.main-content')

                <div class="row">
                    <div class="col-12">
                        <!-- Change status -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div>
                                    <label class="form-label" for="zisaz-magazine-category-name">
                                        تغییر وضعیت
                                    </label>
                                    <span class="text-danger">*</span>
                                    <select class="form-select" id="defaultSelect" name="verify_status">
                                        <option value="" selected disabled>
                                            وضعیت پروژه را انتخاب نمایید
                                        </option>
                                        <option value="verified" {{old('verify_status') == 'verified' ? 'selected' : ''}}>
                                            تأیید
                                        </option>
                                        <option value="rejected" {{old('verify_status') == 'rejected' ? 'selected' : ''}}>
                                            رد
                                        </option>
                                    </select>
                                </div>

                                @error("verify_status")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror   
                            </div>

                            <div class="mb-2 d-none" id="description-form">
                                <div class="card-body">
                                    <label class="form-label" for="reasons-to-reject">
                                        توضیحات و علت رد شدن
                                    </label>
                                    <span class="text-danger">*</span>
                                    <textarea class="form-control" id="reasons-to-reject" rows="3" name="reject_description"></textarea>

                                    @error("reject_description")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror   
                                </div>
                            </div>
                        </div>
                        <!-- /Change status -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- / Content --> 
</div>
<!-- Content wrapper -->

@endsection

@push('page-styles-early')
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/simplebar/dist/simplebar.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/tiny-slider/dist/tiny-slider.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/nouislider/dist/nouislider.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/vendor/lightgallery.js/dist/css/lightgallery.min.css')}}"/>  
    <link rel="stylesheet" href="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.css')}}"/>  
    <link rel="stylesheet" media="screen" href="{{asset('assets/frontend/css/theme.min.css')}}">
@endpush

@push('page-scripts-top')
    <script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/jaban-create-activity-map/leaflet.js')}}"></script>
@endpush

@push('page-scripts')
    <script>
        document.getElementById('defaultSelect').addEventListener('change', function() {
            var selectValue = this.value;
            var descriptionForm = document.getElementById('description-form');

            if (selectValue === 'rejected') {
                descriptionForm.classList.remove('d-none');
            } else {
                descriptionForm.classList.add('d-none');
            }
        });
    </script>
    <script>
        let verifyStatus = {!! json_encode(old('verify_status')) !!};
        var descriptionForm = document.getElementById('description-form');

        if (verifyStatus === 'rejected') {
            descriptionForm.classList.remove('d-none');
        } else {
            descriptionForm.classList.add('d-none');
        }
    </script>
    <script type="text/javascript">
        function calcHeight(iframeElement){
            var the_height=  iframeElement.contentWindow.document.body.scrollHeight;
            iframeElement.height=  the_height;
        }
    </script>

    <script src="{{asset('assets/frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/parallax-js/dist/parallax.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/nouislider/dist/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/frontend/vendor/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/theme.min.js')}}"></script>
@endpush



