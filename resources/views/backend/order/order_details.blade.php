@extends('admin_deshboard')
@section('admin')

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Order Details</h4>
                </div>
            </div>
        </div>

        <!-- Order Info -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('order.status.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $order->id }}">

                            <h5 class="mb-4 text-uppercase">
                                <i class="mdi mdi-account-circle me-1"></i> Order Details
                            </h5>

                            <div class="row align-items-center">

                                <!-- Left: Image + Name -->
                                <div class="col-md-3 text-center mb-4">
                                    <img src="{{ asset($order->customer->image) }}"
                                         class="rounded-circle img-thumbnail"
                                         style="width:120px; height:120px; object-fit:cover;">
                                    <h5 class="mt-2">{{ $order->customer->name }}</h5>
                                </div>

                                <!-- Right: Info -->
                                <div class="col-md-9">
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label>Email</label>
                                            <p class="fw-semibold">{{ $order->customer->email }}</p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Phone</label>
                                            <p class="fw-semibold">{{ $order->customer->phone }}</p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Order Date</label>
                                            <p class="fw-semibold">{{ $order->order_date }}</p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Invoice</label>
                                            <p class="fw-semibold">{{ $order->invoice_no }}</p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Payment</label>
                                            <p>
                                                @if($order->payment_status == 'HandCash')
                                                    <span class="badge bg-success">HandCash</span>
                                                @elseif($order->payment_status == 'Cheque')
                                                    <span class="badge bg-primary">Cheque</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Due</span>
                                                @endif
                                            </p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Paid</label>
                                            <p class="fw-bold text-success">${{ $order->pay }}</p>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Due</label>
                                            <p class="fw-bold text-danger">${{ $order->due }}</p>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Button -->
                            <div class="text-end mt-4">
                                <button type="submit"
                                        class="btn btn-success rounded-pill px-4">
                                    <i class="mdi mdi-check-circle me-1"></i> Complete Order
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mb-3">Ordered Products</h5>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center align-middle">

                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th class="text-start">Product Name</th>
                                        <th>Code</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($orderItem as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($item->product->product_image) }}"
                                                 style="width:45px; height:45px; object-fit:cover;"
                                                 class="rounded">
                                        </td>

                                        <td class="text-start">
                                            {{ $item->product->product_name }}
                                        </td>

                                        <td>{{ $item->product->product_code }}</td>

                                        <td>
                                            <span class="badge bg-info">
                                                {{ $item->quantity }}
                                            </span>
                                        </td>

                                        <td>${{ $item->product->selling_price }}</td>

                                        <td class="fw-bold text-success">
                                            ${{ $item->total }}
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