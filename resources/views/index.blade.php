@extends('admin_deshboard')

@section('admin')

@php
    $date = date('d-F-Y');

    $today_paid = App\Models\Order::where('order_date', $date)->sum('pay');

    $total_paid = App\Models\Order::sum('pay');
    $total_due  = App\Models\Order::sum('due');

    $completeorder = App\Models\Order::where('order_status', 'complete')->get();
    $pendingorder  = App\Models\Order::where('order_status', 'pending')->get();
@endphp

<div class="content">

    <!-- Start Content -->
    <div class="container-fluid">

        <!-- Start Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex align-items-center mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text"
                                       class="form-control border-0"
                                       id="dash-daterange">

                                <span class="input-group-text bg-blue border-blue text-white">
                                    <i class="mdi mdi-calendar-range"></i>
                                </span>
                            </div>

                            <a href="javascript:void(0);"
                               class="btn btn-blue btn-sm ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>

                            <a href="javascript:void(0);"
                               class="btn btn-blue btn-sm ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>

                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row">

            <!-- Total Paid -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                    <i class="fe-heart font-22 avatar-title text-white"></i>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1">
                                        $
                                        <span data-plugin="counterup">
                                            {{ $total_paid }}
                                        </span>
                                    </h3>

                                    <p class="text-muted mb-1 text-truncate">
                                        Total Paid
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Due -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                    <i class="fe-shopping-cart font-22 avatar-title text-white"></i>
                                </div>
                            </div>

                           <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1">
                                        ${{ number_format((float)$total_due, 2) }}
                                    </h3>

                                    <p class="text-muted mb-1 text-truncate">
                                        Total Due
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Complete Order -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                    <i class="fe-bar-chart-line font-22 avatar-title text-white"></i>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1">
                                        <span data-plugin="counterup">
                                            {{ count($completeorder) }}
                                        </span>
                                    </h3>

                                    <p class="text-muted mb-1 text-truncate">
                                        Complete Order
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Order -->
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1">
                                        <span data-plugin="counterup">
                                            {{ count($pendingorder) }}
                                        </span>
                                    </h3>

                                    <p class="text-muted mb-1 text-truncate">
                                        Pending Order
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row -->

        <!-- Continue remaining content with same indentation pattern -->

    </div>
    <!-- End Container -->

</div>
<!-- End Content -->

@endsection