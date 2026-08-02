@extends('admin_deshboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">Add Customer</a>
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Customer</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- form row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase">
                                    <i class="mdi mdi-account-circle me-1"></i> Add Customer
                                </h5>

                                <div class="row">

                                    <!-- Customer Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Customer Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Customer Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Customer Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Customer Phone -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Customer Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Customer Address -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Customer Address</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Shop Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Customer Shop Name</label>
                                        <input type="text" name="shopname"
                                            class="form-control @error('shopname') is-invalid @enderror">
                                        @error('shopname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Account Holder -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Account Holder</label>
                                        <input type="text" name="account_holder"
                                            class="form-control @error('account_holder') is-invalid @enderror">
                                        @error('account_holder')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Account Number -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Account Number</label>
                                        <input type="text" name="account_number"
                                            class="form-control @error('account_number') is-invalid @enderror">
                                        @error('account_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Bank Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Bank Name</label>
                                        <input type="text" name="bank_name"
                                            class="form-control @error('bank_name') is-invalid @enderror">
                                        @error('bank_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Bank Branch -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Bank Branch</label>
                                        <input type="text" name="bank_branch"
                                            class="form-control @error('bank_branch') is-invalid @enderror">
                                        @error('bank_branch')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Customer City -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Customer City</label>
                                        <input type="text" name="city"
                                            class="form-control @error('city') is-invalid @enderror">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Customer Image -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Customer Image</label>
                                        <input type="file" name="image" id="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Preview Image -->
                                    <div class="col-md-12 mb-3">
                                        <img id="showImage"
                                            src="{{ url('upload/no_image.jpg') }}"
                                            class="rounded-circle avatar-lg img-thumbnail"
                                            alt="profile-image">
                                    </div>

                                </div>

                                <div class="text-end">
                                    <button type="submit"
                                        class="btn btn-success waves-effect waves-light mt-2">
                                        <i class="mdi mdi-content-save"></i> Save
                                    </button>
                                </div>

                            </form>
                        </div>
                        <!-- end settings content-->

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
</div>

<script>
    $(document).ready(function () {
        $('#image').change(function (e) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
