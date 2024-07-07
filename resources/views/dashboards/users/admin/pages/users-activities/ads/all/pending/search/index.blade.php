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
                جستجوی آگهی های در بررسی
            </h5>

            <div class="card-header flex-column flex-md-row">
                <div class="head-label text-center"></div>
                
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-start">
                        <form method="GET" action="{{route('admin.dashboard.users-activities.ads.all.pending.search')}}">
                            <div class="input-group">
                                <button class="btn btn-outline-primary waves-effect" id="button-addon1" type="submit">
                                    <i class="ti ti-search h-mirror me-1"></i>
                                    جستجو
                                </button>
                                <input aria-describedby="button-addon1" class="form-control" placeholder="" type="search" name="q" value="{{$searchString}}">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7 d-flex justify-content-md-end">
                        <a href="{{route('admin.dashboard.users-activities.ads.all.pending.index')}}" class="text-white btn btn-primary waves-effect waves-light">
                            <i class="ti ti-arrow-back me-sm-1"></i> 
                            بازگشت به لیست آگهی ها
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
                                        عنوان آگهی
                                    </th>
                                    <th>
                                        نام و نام خانوادگی آگهی دهنده
                                    </th>
                                    <th>
                                        نوع آگهی
                                    </th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activityKey => $activityItem)
                                    <tr>
                                        <td>
                                            <bdi>
                                                {{ ($activities->currentPage() - 1) * $activities->perPage() + $activityKey + 1 }}
                                            </bdi>
                                        </td>
                                        <td>
                                            <a href="{{route('activity', $activityItem->slug)}}">
                                                {{$activityItem->subactivity->item_title}}
                                            </a>
                                        </td>
                                        <td>
                                            
                                            {{$activityItem->user->firstname}}
                                            {{$activityItem->user->lastname}}
                                        </td>
                                        <td>
                                            @if($activityItem->subactivity->type == 'selling')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    فروش کالا
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'employee')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    استخدام کارجو
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'employer')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    استخدام کارفرما
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'invested')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    سرمایه پذیر
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'investor')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    سرمایه گذار
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'auction')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    مزایده
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'tender_buy')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    مناقصه خرید
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'tender_project')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    مناقصه اجرای پروژه
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'inquiry_buy')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    استعلام قیمت خرید
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'inquiry_project')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    استعلام قیمت اجرای پروژه
                                                </span>
                                            @elseif($activityItem->subactivity->type == 'contractor')
                                                <span class="badge rounded-pill bg-label-primary">
                                                    پیمانکاری
                                                </span>
                                            @endif
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <form action="{{route('admin.dashboard.users-activities.ads.all.pending.destroy', $activityItem->id)}}" method="POST">
                                                @method('delete')
                                                @csrf

                                                <button type="submit" class="border-none bg-transparent" onclick ="return confirm('آیا برای انجام این کار اطمینان دارید؟')">
                                                    <i class="text-primary ti ti-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{route('admin.dashboard.users-activities.ads.all.pending.edit', $activityItem->id)}}" class="btn btn-sm btn-icon item-edit">
                                                <i class="text-primary ti ti-zoom-check"></i>
                                            </a>
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
                            {{$activities->links('vendor.pagination.dashboards-datatables')}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
