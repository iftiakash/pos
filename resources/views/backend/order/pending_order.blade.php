@extends('admin_deshboard')
@section('admin')

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Pending Orders</h4>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable"
                               class="table table-bordered table-striped table-hover dt-responsive nowrap w-100 text-center">

                            <!-- Table Head -->
                            <thead class="table-light">
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th class="text-start">Name</th>
                                    <th>Order Date</th>
                                    <th>Payment</th>
                                    <th>Invoice</th>
                                    <th>Pay</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach($orders as $key => $item)
                                <tr class="align-middle">

                                    <!-- Serial -->
                                    <td>{{ $key + 1 }}</td>

                                    <!-- Image -->
                                    <td>
                                        <img src="{{ asset($item->customer->image) }}"
                                             class="rounded-circle"
                                             style="width:45px; height:45px; object-fit:cover;">
                                    </td>

                                    <!-- Name -->
                                    <td class="text-start fw-semibold">
                                        {{ $item->customer->name }}
                                    </td>

                                    <!-- Date -->
                                    <td>{{ $item->order_date }}</td>

                                    <!-- Payment -->
                                    <td>
                                        @if($item->payment_status == 'HandCash')
                                            <span class="badge bg-success">HandCash</span>
                                        @elseif($item->payment_status == 'Cheque')
                                            <span class="badge bg-primary">Cheque</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Due</span>
                                        @endif
                                    </td>

                                    <!-- Invoice -->
                                    <td>{{ $item->invoice_no }}</td>

                                    <!-- Pay -->
                                    <td class="fw-bold text-success">
                                        ${{ $item->pay }}
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        @if($item->order_status == 'pending')
                                            <span class="badge bg-danger">Pending</span>
                                        @else
                                            <span class="badge bg-success">Complete</span>
                                        @endif
                                    </td>

                                    <!-- Action -->
                                    <td>
                                        <a href="{{ route('order.details',$item->id) }}"
                                           class="btn btn-primary btn-sm rounded-pill">
                                            Details
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection