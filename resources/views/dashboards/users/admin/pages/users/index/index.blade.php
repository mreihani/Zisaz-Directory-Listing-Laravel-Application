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
                لیست کاربران
            </h5>

            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center"></div>
                
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-start">
                        <form method="GET" action="{{route('admin.dashboard.users.search')}}">
                            <div class="input-group">
                                <button class="btn btn-outline-primary waves-effect" id="button-addon1" type="submit">
                                    <i class="ti ti-search h-mirror me-1"></i>
                                    جستجو
                                </button>
                                <input aria-describedby="button-addon1" class="form-control" placeholder="" type="search" name="q">
                            </div>
                        </form>
                    </div>
                    @can('user_create')
                        <div class="col-md-7 d-flex justify-content-md-end">
                            <a href="{{route('admin.dashboard.user.create')}}" class="text-white btn btn-primary waves-effect waves-light">
                                افزودن کاربر
                            </a>
                        </div>
                    @endcan
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
                                        شماره تماس
                                    </th>
                                    <th>
                                        نوع کاربر
                                    </th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $userKey => $userItem)
                                    <tr>
                                        <td>
                                            <bdi>
                                                {{ ($users->currentPage() - 1) * $users->perPage() + $userKey + 1 }}
                                            </bdi>
                                        </td>
                                        <td>
                                            {{$userItem->firstname}} {{$userItem->lastname}}
                                        </td>
                                        <td>
                                            <a href="tel: {{$userItem->phone}}">
                                                {{$userItem->phone}}
                                            </a>
                                        </td>
                                        <td>
                                            @if($userItem->role == 'admin')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    مدیر کل
                                                </span>
                                            @elseif($userItem->role == 'senior_support')
                                                <span class="badge rounded-pill bg-label-success">
                                                    پشتیبان ارشد
                                                </span>
                                            @elseif($userItem->role == 'support_level_one')
                                                <span class="badge rounded-pill bg-label-success">
                                                    پشتیبان سطح یک
                                                </span>
                                            @elseif($userItem->role == 'marketer')
                                                <span class="badge rounded-pill bg-label-success">
                                                    بازاریاب
                                                </span>
                                            @elseif($userItem->role == 'editor')
                                                <span class="badge rounded-pill bg-label-success">
                                                    نویسنده
                                                </span>
                                            @elseif($userItem->role == 'real_estate_manager')
                                                <span class="badge rounded-pill bg-label-success">
                                                    مدیر املاک
                                                </span>
                                            @elseif($userItem->role == 'real_estate_agent')
                                                <span class="badge rounded-pill bg-label-success">
                                                    مشاور املاک
                                                </span>
                                            @elseif($userItem->role == 'construction')
                                                <span class="badge rounded-pill bg-label-secondary">
                                                    کاربر عادی
                                                </span>
                                            @endif
                                        </td>
                                        <td class="d-flex align-items-center">
                                            @can('user_destroy')
                                                <form action="{{route('admin.dashboard.user.destroy', $userItem->id)}}" method="POST">
                                                    @method('delete')
                                                    @csrf

                                                    <button type="submit" class="border-none bg-transparent" onclick ="return confirm('آیا برای انجام این کار اطمینان دارید؟')">
                                                        <i class="text-primary ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                            @can('user_edit')
                                                <a href="{{route('admin.dashboard.user.edit', $userItem->id)}}" class="btn btn-sm btn-icon item-edit">
                                                    <i class="text-primary ti ti-pencil"></i>
                                                </a>
                                            @endcan
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
                            {{$users->links('vendor.pagination.dashboards-datatables')}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
