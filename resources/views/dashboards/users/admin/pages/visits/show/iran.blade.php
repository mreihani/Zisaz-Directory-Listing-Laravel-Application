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
                نمودار بازدیدهای ایران
            </h5>

            <!-- Line Area Chart -->
            <div class="col-12 mb-4">
                <div id="lineAreaChart"></div>
            </div>
            <!-- /Line Area Chart -->
        </div>
    </div>

@endsection

@push('page-styles')
    <link href="{{asset('assets/dashboards/assets/vendor/libs/apex-charts/apex-charts.css')}}" rel="stylesheet"/>
@endpush

@push('page-scripts')
    <script src="{{asset('assets/dashboards/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endpush

@push('page-scripts-after-main')
    <script>
        'use strict';

        (function () {
        let cardColor, headingColor, labelColor, borderColor, legendColor;

        if (isDarkStyle) {
            cardColor = config.colors_dark.cardColor;
            headingColor = config.colors_dark.headingColor;
            labelColor = config.colors_dark.textMuted;
            legendColor = config.colors_dark.bodyColor;
            borderColor = config.colors_dark.borderColor;
        } else {
            cardColor = config.colors.cardColor;
            headingColor = config.colors.headingColor;
            labelColor = config.colors.textMuted;
            legendColor = config.colors.bodyColor;
            borderColor = config.colors.borderColor;
        }

        // Color constant
        const chartColors = {
            area: {
                series1: '#29dac7',
                series2: '#60f2ca',
            }
        };

        // Line Area Chart
        // --------------------------------------------------------------------
        const areaChartEl = document.querySelector('#lineAreaChart'),
            areaChartConfig = {
            chart: {
                height: 400,
                type: 'area',
                parentHeightOffset: 0,
                toolbar: {
                show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: false,
                curve: 'straight'
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start',
                labels: {
                colors: legendColor,
                useSeriesColors: false
                }
            },
            grid: {
                borderColor: borderColor,
                xaxis: {
                lines: {
                    show: true
                }
                }
            },
            colors: [chartColors.area.series2, chartColors.area.series1],
            series: [
                {
                    name: 'بازدیدهای ایران',
                    data: @json($iranVisitors)
                },
                {
                    name: 'بازدیدهای یکتای ایران',
                    data: @json($iranUniqueVisitors)
                }
            ],
            xaxis: {
                categories: @json($dateSpan),
                axisBorder: {
                show: false
                },
                axisTicks: {
                show: false
                },
                labels: {
                style: {
                    colors: labelColor,
                    fontSize: '13px'
                }
                }
            },
            yaxis: {
                labels: {
                style: {
                    colors: labelColor,
                    fontSize: '13px'
                }
                }
            },
            fill: {
                opacity: 1,
                type: 'solid'
            },
            tooltip: {
                shared: false
            }
            };

            if (typeof areaChartEl !== undefined && areaChartEl !== null) {
                const areaChart = new ApexCharts(areaChartEl, areaChartConfig);
                areaChart.render();
            }
        })();
    </script>
@endpush