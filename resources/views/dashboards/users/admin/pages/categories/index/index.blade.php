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
                دسته بندی ها
            </h5>

            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center"></div>
                
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-start">
                        <form method="GET" action="{{route('admin.dashboard.category.search')}}">
                            <div class="input-group">
                                <button class="btn btn-outline-primary waves-effect" id="button-addon1" type="submit">
                                    <i class="ti ti-search h-mirror me-1"></i>
                                    جستجو
                                </button>
                                <input aria-describedby="button-addon1" class="form-control" placeholder="" type="search" name="q">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7 d-flex justify-content-md-end">
                        <div class="text-end pt-3 pt-md-0">
                            <div class="btn-group flex-wrap">
                                <span class="btn btn-primary">
                                    <i class="ti ti-plus me-sm-1"></i> 
                                    <a href="{{route('admin.dashboard.category.create')}}" class="text-white">
                                        افزودن دسته بندی
                                    </a>
                                </span>
                            </div>
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
                                    <th>عنوان</th>
                                    <th>والد</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mergedCollection as $mergedCollectionKey => $mergedCollectionItem)
                                    <tr>
                                        <td>
                                            <bdi>
                                                {{($mergedCollectionKey + 1)}}
                                            </bdi>
                                        </td>
                                        <td>
                                            {{$mergedCollectionItem->title}}
                                        </td>
                                        <td>
                                            @if(isset($mergedCollectionItem->activityCategory))
                                                <span class="badge bg-label-dark">
                                                    {{$mergedCollectionItem->activityCategory->title}}
                                                </span>
                                            @else
                                                <span class="badge bg-label-primary">
                                                    دسته اصلی
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-inline-block">
                                                <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="text-primary ti ti-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                                    @if(!isset($mergedCollectionItem->activityCategory))
                                                        <li>
                                                            <a href="{{route('admin.dashboard.category.show-subitem', $mergedCollectionItem->id)}}" class="dropdown-item">
                                                                نمایش زیر دسته
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if(isset($mergedCollectionItem->activityCategory))
                                                        <li>
                                                            <a href="{{route('admin.dashboard.category.destroy-actgrp', $mergedCollectionItem->id)}}" 
                                                                class="dropdown-item text-danger"
                                                                onclick ="return confirm('آیا برای انجام این کار اطمینان دارید؟ تمام فعالیت های مرتبط با این دسته بندی از سامانه حذف خواهد شد.')">
                                                                حذف
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{route('admin.dashboard.category.destroy-actcat', $mergedCollectionItem->id)}}" 
                                                                class="dropdown-item text-danger"
                                                                onclick ="return confirm('آیا برای انجام این کار اطمینان دارید؟ تمام فعالیت های مرتبط با این دسته بندی از سامانه حذف خواهد شد.')">
                                                                حذف
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            @if(isset($mergedCollectionItem->activityCategory))
                                                <a href="{{route('admin.dashboard.category.edit-actgrp', $mergedCollectionItem->id)}}" class="btn btn-sm btn-icon item-edit">
                                                    <i class="text-primary ti ti-pencil"></i>
                                                </a>
                                            @else
                                                <a href="{{route('admin.dashboard.category.edit-actcat', $mergedCollectionItem->id)}}" class="btn btn-sm btn-icon item-edit">
                                                    <i class="text-primary ti ti-pencil"></i>
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
                            {{$mergedCollection->links('vendor.pagination.dashboards-datatables')}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection