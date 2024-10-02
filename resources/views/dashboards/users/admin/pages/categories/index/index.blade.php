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
                    @if(Route::currentRouteName() == 'admin.dashboard.category.subitem')
                        @can('category_edit')
                            <div class="col-md-7 d-flex justify-content-md-end">
                                <a href="{{route('admin.dashboard.category.index')}}" class="text-white btn btn-primary waves-effect waves-light">
                                    <i class="ti ti-arrow-back me-sm-1"></i> 
                                    بازگشت به لیست دسته بندی ها
                                </a>
                            </div>
                        @endcan  
                    @else
                        @can('category_create')
                            <div class="col-md-7 d-flex justify-content-md-end">
                                <a href="{{route('admin.dashboard.category.create')}}" class="text-white btn btn-primary waves-effect waves-light">
                                    افزودن دسته بندی
                                </a>
                            </div>
                        @endcan   
                    @endif
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
                                @foreach ($categories as $categoryKey => $categoryItem)
                                    <tr>
                                        <td>
                                            <bdi>
                                                {{($categoryKey + 1)}}
                                            </bdi>
                                        </td>
                                        <td>
                                            {{$categoryItem->category_name}}
                                        </td>
                                        <td>
                                            @if($categoryItem->parent !== 0)
                                                <span class="badge bg-label-dark">
                                                    {{$categoryItem->parentCategory->category_name}}
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
                                                    @if($categoryItem->child->count())
                                                        <li>
                                                            <a href="{{route('admin.dashboard.category.subitem', $categoryItem->id)}}" class="dropdown-item">
                                                                نمایش زیر دسته
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @can('category_destroy')
                                                        <li>
                                                            <form action="{{route('admin.dashboard.category.destroy', $categoryItem->id)}}" method="POST">
                                                                @method('delete')
                                                                @csrf
                
                                                                <button type="submit" class="dropdown-item text-danger" onclick ="return confirm('آیا برای انجام این کار اطمینان دارید؟ تمام فعالیت های مرتبط با این دسته بندی از سامانه حذف خواهد شد.')">
                                                                    حذف
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endcan    
                                                </ul>
                                            </div>
                                            @can('category_edit')
                                                <a href="{{route('admin.dashboard.category.edit', $categoryItem->id)}}" class="btn btn-sm btn-icon item-edit">
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
                            {{$categories->links('vendor.pagination.dashboards-datatables')}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection