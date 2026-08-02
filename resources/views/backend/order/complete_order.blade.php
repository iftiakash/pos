@extends('admin_deshboard')
@section('admin')

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Complete Orders</h4>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="basic-datatable"
                                   class="table table-bordered table-striped table-hover dt-responsive nowrap w-100 text-center align-middle">

                                <!-- Head -->
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

                                <!-- Body -->
                                <tbody>
                                    @foreach($orders as $key => $item)
                                    <tr>

                                        <!-- Sl -->
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

                                        <!-- Order Date -->
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
                                            <span class="badge bg-success">
                                                {{ $item->order_status }}
                                            </span>
                                        </td>

                                        <!-- Action -->
                                        <td>
                                            <a href="{{ url('order/invoice-download/'.$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light"> PDF Invoice </a> 
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
</div>

@endsection