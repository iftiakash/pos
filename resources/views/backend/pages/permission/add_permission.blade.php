@extends('admin_deshboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title mb-0">Add Permission</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Add Permission</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mb-4 text-uppercase">
                            <i class="mdi mdi-account-circle me-1"></i> Add Permission
                        </h5>

                        <form id="myForm" method="post" action="{{ route('permission.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <!-- Permission Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Permission Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>

                                <!-- Group Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Group Name</label>
                                        <select name="group_name" class="form-select">
                                            <option selected disabled>Select Group</option>
                                            <option value="pos">Pos</option>
                                            <option value="employee">Employee</option>
                                            <option value="customer">Customer</option>
                                            <option value="supplier">Supplier</option>
                                            <option value="salary">Salary</option>
                                            <option value="attendence">Attendence</option>
                                            <option value="category">Category</option>
                                            <option value="product">Product</option>
                                            <option value="expense">Expense</option>
                                            <option value="orders">Orders</option>
                                            <option value="stock">Stock</option>
                                            <option value="roles">Roles</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2">
                                    <i class="mdi mdi-content-save"></i> Save
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Validation Script -->
<script type="text/javascript">
$(document).ready(function (){
    $('#myForm').validate({
        rules: {
            name: { required: true },
            group_name: { required: true },
        },
        messages: {
            name: { required: 'Please Enter Permission Name' },
            group_name: { required: 'Please Select Group Name' },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        },
    });
});
</script>

@endsection