@extends('dashboards.users.admin.master')
@section('main')

@push('page-styles')
    <!-- Vendors CSS -->
    <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" rel="stylesheet"/>
    <!-- Row Group CSS -->
    <link href="{{asset('assets/dashboards/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}" rel="stylesheet"/>
@endpush

@push('page-scripts')
    <!-- Vendors JS -->
    <script src="{{asset('assets/dashboards/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <!-- Page JS -->
    <script src="{{asset('assets/dashboards/assets/js/tables-datatables-basic.js')}}"></script>
@endpush

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="content-wrapper">
        <div class="card">

            <h5 class="card-header">
                جستجوی و فیلتر بازدیدها
            </h5>

            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center"></div>
                
                <form method="GET" action="{{route('admin.dashboard.visits.search')}}">
                   
                    <!-- Filters -->
                    <div class="d-grid p-3 border">
                        <div class="row g-0">
                            <div class="col-md-6 p-2 d-flex justify-content-start">
                                <button class="btn btn-primary waves-effect" id="button-addon1" type="submit">
                                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" /></svg>
                                    اعمال فیلتر
                                </button>
                            </div>
                            <div class="col-md-6 p-2 d-flex justify-content-end">
                                <a href="{{route('admin.dashboard.visits.export-excel', request()->except('page'))}}" class="btn btn-outline-secondary me-1 waves-effect waves-light" role="button">
                                    دریافت اکسل
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M8 11h8v7h-8z" /><path d="M8 15h8" /><path d="M11 11v7" /></svg>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="q">
                                        نام و نام خانوادگی کاربر
                                    </label>
                                    <input aria-describedby="button-addon1" class="form-control" placeholder="نام و نام خانوادگی" type="search" name="q" value="{{request('q')}}">
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="ip">
                                        آی پی
                                    </label>
                                    <input aria-describedby="defaultFormControlHelp" class="form-control" id="ip" placeholder="192.168.1.1" type="text" name="ip" value="{{old('ip', request('ip'))}}">
                                </div>
                                @error("ip")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="device">
                                        دستگاه
                                    </label>
                                    <input aria-describedby="defaultFormControlHelp" class="form-control" id="device" placeholder="WebKit" type="text" name="device" value="{{old('device', request('device'))}}">
                                </div>
                                @error("device")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="platform">
                                        پلتفرم
                                    </label>
                                    <input aria-describedby="defaultFormControlHelp" class="form-control" id="platform" placeholder="Windows" type="text" name="platform" value="{{old('platform', request('platform'))}}">
                                </div>
                                @error("platform")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="browser">
                                        مرورگر
                                    </label>
                                    <input aria-describedby="defaultFormControlHelp" class="form-control" id="browser" placeholder="Chrome" type="text" name="browser" value="{{old('browser', request('browser'))}}">
                                </div>
                                @error("browser")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="country">
                                        کشور
                                    </label>
                                    <input aria-describedby="defaultFormControlHelp" class="form-control" id="country" placeholder="Iran" type="text" name="country" value="{{old('country', request('country'))}}">
                                </div>
                                @error("country")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="province">
                                        استان
                                    </label>
                                    <input aria-describedby="defaultFormControlHelp" class="form-control" id="province" placeholder="Fars" type="text" name="province" value="{{old('province', request('province'))}}">
                                </div>
                                @error("province")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="city">
                                        شهر
                                    </label>
                                    <input aria-describedby="defaultFormControlHelp" class="form-control" id="city" placeholder="Shiraz" type="text" name="city" value="{{old('city', request('city'))}}">
                                </div>
                                @error("city")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="filter-start-date">
                                        تاریخ شروع
                                    </label>
                                    <input class="form-control bdi flatpickr-input" id="filter-start-date" placeholder="1403-01-01" type="text" readonly="readonly" name="startDate" value="{{old('startDate', request('startDate'))}}">
                                </div>

                                <input type="hidden" name="dateValidation">
                                @error("dateValidation")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 p-2">
                                <div>
                                    <label class="form-label" for="filter-end-date">
                                        تاریخ پایان
                                    </label>
                                    <input class="form-control bdi flatpickr-input active" id="filter-end-date" placeholder="1403-02-01" type="text" readonly="readonly" name="endDate" value="{{old('endDate', request('endDate'))}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./Filters -->

                </form>
            </div>

            <div class="card-datatable">

                <div class="row dt-row">
                    <div class="col-sm-12">
                        <table class="datatables-direct-basic table">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>
                                        نام و نام خانوادگی
                                    </th>
                                    <th>
                                        آدرس بازدید
                                    </th>
                                    <th>
                                        دستگاه
                                    </th>
                                    <th>
                                        پلتفرم
                                    </th>
                                    <th>
                                        مرورگر
                                    </th>
                                    <th>
                                        آی پی
                                    </th>
                                    <th>
                                        کشور
                                    </th>
                                    <th>
                                        استان
                                    </th>
                                    <th>
                                        شهر
                                    </th>
                                    <th>
                                        زمان بازدید
                                    </th>
                                    <th>
                                        تاریخچه فعالیت کاربر
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($visits as $visitKey => $visitItem)
                                    <tr>
                                        <td>
                                            <bdi>
                                                {{ ($visits->currentPage() - 1) * $visits->perPage() + $visitKey + 1 }}
                                            </bdi>
                                        </td>
                                        <td>
                                            @if(!is_null($visitItem->user))
                                                {{$visitItem->user->firstname}} {{$visitItem->user->lastname}}
                                            @else
                                                کاربر میهمان
                                            @endif
                                        </td>
                                        <td>
                                            <button title="{{$visitItem->url}}" class="btn btn-primary btn-sm" onclick="copyToClipboard(this, '{{$visitItem->url}}')">
                                                رونوشت
                                            </button>
                                        </td>
                                        <td>
                                            {{$visitItem->device}}
                                        </td>
                                        <td>
                                            {{$visitItem->platform}}
                                        </td>
                                        <td>
                                            {{$visitItem->browser}}
                                        </td>
                                        <td>
                                            {{$visitItem->ip}}
                                        </td>
                                        <td>
                                            {{!is_null($visitItem->country) ? $visitItem->country : 'نامشخص'}}
                                        </td>
                                        <td>
                                            {{!is_null($visitItem->province) ? $visitItem->province : 'نامشخص'}}
                                        </td>
                                        <td>
                                            {{!is_null($visitItem->city) ? $visitItem->city : 'نامشخص'}}
                                        </td>
                                        <td>
                                            {{jdate($visitItem->created_at)}}
                                        </td>
                                        <td>
                                            @if(!is_null($visitItem->user))
                                                <a href="{{route('admin.dashboard.visits.history.index', ['userId' => $visitItem->user->id])}}" class="btn btn-sm btn-icon item-edit">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-history"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8l0 4l2 2" /><path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach        
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{$visits->links('vendor.pagination.dashboards-datatables')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page-styles')
    <link href="{{asset('assets/dashboards/assets/vendor/libs/flatpickr/flatpickr.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/dashboards/assets/vendor/libs/pickr/pickr-themes.css')}}" rel="stylesheet"/>
@endpush

@push('page-scripts')
    <script>
        function copyToClipboard(button, text) {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            button.textContent = 'کپی شد!';
            
            setTimeout(function() {
                button.textContent = 'رونوشت';
            }, 2000); // Change back to 'Copy Link' after 2 seconds
        }
    </script>

    <script src="{{asset('assets/dashboards/assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/vendor/libs/jdate/jdate.min.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/vendor/libs/flatpickr/flatpickr-jdate.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/vendor/libs/flatpickr-jalali/dist/l10n/fa.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/vendor/libs/pickr/pickr.js')}}"></script>
    <script src="{{asset('assets/dashboards/assets/js/forms-pickers-jalali.js')}}"></script>

    <script>
        const filterStartDate = document.querySelector('#filter-start-date');
        if (filterStartDate) {
            filterStartDate.flatpickr({
                monthSelectorType: 'static',
                locale: 'fa',
                altFormat: 'Y/m/d',
            });
        }
        const filterEndDate = document.querySelector('#filter-end-date');
        if (filterEndDate) {
            filterEndDate.flatpickr({
                monthSelectorType: 'static',
                locale: 'fa',
                altFormat: 'Y/m/d',
            });
        }
    </script>
@endpush