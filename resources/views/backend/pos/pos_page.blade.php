@extends('admin_deshboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">POS</a>
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">POS</h4>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 col-xl-6">
                <div class="card text-center">
                    <div class="card-body">

                        @php
                            $allcart = Cart::content();
                        @endphp

                        <!-- Cart Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>SubTotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($allcart as $cart)
                                        <tr>
                                            <td>{{ $cart->name }}</td>

                                            <td>
                                                <form method="POST" action="{{ url('/cart-update/'.$cart->rowId) }}">
                                                    @csrf
                                                    <div class="d-flex align-items-center">
                                                        <input type="number"
                                                               name="qty"
                                                               value="{{ $cart->qty }}"
                                                               min="1"
                                                               class="form-control form-control-sm me-2"
                                                               style="width:70px;">

                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>

                                            <td>{{ $cart->price }}</td>
                                            <td>{{ $cart->price * $cart->qty }}</td>

                                            <td>
                                                <a href="{{ url('/cart-remove/'.$cart->rowId) }}"
                                                   class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Summary -->
                        <div class="bg-primary mt-3 p-3 text-white">
                            <p>Quantity : {{ Cart::count() }}</p>
                            <p>SubTotal : {{ Cart::subtotal() }}</p>
                            <p>Vat : {{ Cart::tax() }}</p>

                            <h4 class="mt-2">Total</h4>
                            <h2>{{ Cart::total() }}</h2>
                        </div>

                        <!-- Customer Form -->
                        <form id="myForm" method="POST" action="{{ url('/create-invoice') }}" class="mt-3">
                            @csrf

                            <div class="form-group mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label mb-0">All Customer</label>

                                    <a href="{{ route('add.customer') }}"
                                       class="btn btn-primary btn-sm rounded-pill">
                                        Add Customer
                                    </a>
                                </div>

                                <select name="customer_id" class="form-select">
                                    <option selected disabled>Select Customer</option>
                                    @foreach($customer as $cus)
                                        <option value="{{ $cus->id }}">
                                            {{ $cus->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success w-100">
                                Create Invoice
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable"
                               class="table dt-responsive nowrap w-100">

                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($product as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>
                                            <img src="{{ asset($item->product_image) }}"
                                                 style="width:50px; height:40px;">
                                        </td>

                                        <td>{{ $item->product_name }}</td>

                                        <td>
                                            <form method="POST" action="{{ url('/add-cart') }}">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="hidden" name="name" value="{{ $item->product_name }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $item->selling_price }}">

                                                <button type="submit" class="btn btn-sm btn-dark">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </form>
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

<!-- Validation Script -->
<script>
$(document).ready(function () {
    $('#myForm').validate({
        rules: {
            customer_id: { required: true }
        },
        messages: {
            customer_id: { required: 'Please Select Customer' }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>

@endsection