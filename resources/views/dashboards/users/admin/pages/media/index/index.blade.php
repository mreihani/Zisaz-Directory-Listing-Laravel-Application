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
                لیست رسانه ها
            </h5>

            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center"></div>
                
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-start">
                        <form method="GET" action="{{route('admin.dashboard.media.search')}}">
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
                        <a href="{{route('admin.dashboard.media.create')}}" class="text-white btn btn-primary waves-effect waves-light">
                            افزودن رسانه
                        </a>
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
                                        پیش نمایش
                                    </th>
                                    <th>
                                        نوع فایل
                                    </th>
                                    <th>نام فایل</th>
                                    <th>
                                        حجم فایل
                                    </th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mediaFiles as $mediaFileKey => $mediaFileItem)
                                    <tr>
                                        <td>
                                            <bdi>
                                                {{ ($mediaFiles->currentPage() - 1) * $mediaFiles->perPage() + $mediaFileKey + 1 }}
                                            </bdi>
                                        </td>
                                        <td>
                                            @if($mediaFileItem->file_type == 'image')
                                                <a href="{{asset($mediaFileItem->file_path)}}">
                                                    <img src="{{asset($mediaFileItem->thumbnail)}}" alt="image">
                                                </a>
                                            @elseif($mediaFileItem->file_type == 'video')
                                                <a href="{{asset($mediaFileItem->file_path)}}">
                                                    <img width="50" height="50" src="{{asset($mediaFileItem->thumbnail)}}" alt="image">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($mediaFileItem->file_type == 'image')
                                                <span class="badge rounded-pill bg-label-info">
                                                    تصویر
                                                </span>
                                            @elseif($mediaFileItem->file_type == 'video')
                                                <span class="badge rounded-pill bg-label-success">
                                                    ویدئو
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{asset($mediaFileItem->file_path)}}" dir="ltr">
                                                {{$mediaFileItem->file_name}}
                                            </a>
                                        </td>
                                        <td>
                                            {{ number_format($mediaFileItem->file_size / 1024 / 1024, 2) }}
                                            (مگابایت)
                                        </td>
                                        <td>
                                            <form action="{{route('admin.dashboard.media.destroy', $mediaFileItem->id)}}" method="POST">
                                                @method('delete')
                                                @csrf

                                                <button type="submit" class="border-none bg-transparent" onclick ="return confirm('آیا برای انجام این کار اطمینان دارید؟')">
                                                    <i class="text-primary ti ti-trash"></i>
                                                </button>
                                            </form>
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
                            {{$mediaFiles->links('vendor.pagination.dashboards-datatables')}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection