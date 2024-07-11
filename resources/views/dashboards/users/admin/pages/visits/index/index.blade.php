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


<div class="container-xxl">
    @if(session()->has('success'))
        <div class="alert alert-icon alert-success alert-bg alert-inline show-code-action mt-3 mb-0">
            <i style="color:#50cd89" class="fas fa-check"></i> {{session('success')}}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-icon alert-warning alert-bg alert-inline show-code-action mt-3 mb-0">
            <i class="fa-solid fa-xmark-circle"></i> {{session('error')}}
        </div>
    @endif

    @foreach($errors->all() as $error)
        <div class="alert alert-icon alert-warning alert-bg alert-inline show-code-action mt-3 mb-0">
            <i class="fa-solid fa-xmark-circle"></i> {{session('error')}}
        </div>
    @endforeach
</div>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="content-wrapper">
        <div class="card">

            <h5 class="card-header">
                لیست بازدیدها
            </h5>

            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center"></div>
                
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-start">
                        <form method="GET" action="{{route('admin.dashboard.visits.search')}}">
                            <div class="input-group">
                                <button class="btn btn-outline-primary waves-effect" id="button-addon1" type="submit">
                                    <i class="ti ti-search h-mirror me-1"></i>
                                    جستجو
                                </button>
                                <input aria-describedby="button-addon1" class="form-control" placeholder="" type="search" name="q">
                            </div>
                        </form>
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
@endpush