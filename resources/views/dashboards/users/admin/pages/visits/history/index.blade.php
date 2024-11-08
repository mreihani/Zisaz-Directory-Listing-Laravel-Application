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
                تاریخچه بازدیدهای
                {{$visitorUser->firstname}} {{$visitorUser->lastname}}
            </h5>

            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center"></div>
                
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-start">
                       
                    </div>
                    <div class="col-md-12 d-flex justify-content-md-end">
                        <div class="col-md-6 p-2 d-flex justify-content-start">
                            <a href="{{route('admin.dashboard.visits.export-excel', request()->except('page'))}}" class="btn btn-outline-secondary me-1 waves-effect waves-light" role="button">
                                دریافت اکسل
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M8 11h8v7h-8z" /><path d="M8 15h8" /><path d="M11 11v7" /></svg>
                            </a>
                        </div>
                        <div class="col-md-6 p-2 d-flex justify-content-end">
                            <a href="{{route('admin.dashboard.visits.index')}}" class="text-white btn btn-primary waves-effect waves-light">
                                <i class="ti ti-arrow-back me-sm-1"></i> 
                                بازگشت به لیست بازدید ها
                            </a>
                        </div>
                    </div>
                </div>
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