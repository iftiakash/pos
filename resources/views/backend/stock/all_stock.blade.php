@extends('admin_deshboard')
@section('admin')

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">

                    <h4 class="page-title">All Product</h4>

                    <div>
                        <a href="{{ route('import.product') }}" class="btn btn-info btn-sm rounded-pill">Import</a>
                        <a href="{{ route('export') }}" class="btn btn-danger btn-sm rounded-pill">Export</a>
                        <a href="{{ route('add.product') }}" class="btn btn-primary btn-sm rounded-pill">Add Product</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Table -->
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
                                        <th>Category</th>
                                        <th>Supplier</th>
                                        <th>Code</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>

                                <!-- Body -->
                                <tbody>
                                    @foreach($product as $key => $item)
                                    <tr>

                                        <!-- Sl -->
                                        <td>{{ $key + 1 }}</td>

                                        <!-- Image -->
                                        <td>
                                            <img src="{{ asset($item->product_image) }}"
                                                 class="rounded"
                                                 style="width:45px; height:45px; object-fit:cover;">
                                        </td>

                                        <!-- Name -->
                                        <td class="text-start fw-semibold">
                                            {{ $item->product_name }}
                                        </td>

                                        <!-- Category -->
                                        <td>
                                            {{ $item->category->category_name ?? '' }}
                                        </td>

                                        <!-- Supplier -->
                                        <td>
                                            {{ $item->supllier->name ?? '' }}
                                        </td>

                                        <!-- Code -->
                                        <td>
                                            {{ $item->product_code }}
                                        </td>

                                        <!-- Stock -->
                                        <td>
                                            @if($item->product_store <= 5)
                                                <span class="badge bg-danger">
                                                    {{ $item->product_store }}
                                                </span>
                                            @elseif($item->product_store <= 20)
                                                <span class="badge bg-warning text-dark">
                                                    {{ $item->product_store }}
                                                </span>
                                            @else
                                                <span class="badge bg-success">
                                                    {{ $item->product_store }}
                                                </span>
                                            @endif
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