@extends('admin_deshboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title mb-0">Edit Permission</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Edit Permission</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mb-4 text-uppercase">
                            <i class="mdi mdi-account-circle me-1"></i> Edit Permission
                        </h5>

                        <form id="myForm" method="post" action="{{ route('permission.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $permission->id }}">

                            <div class="row">

                                <!-- Permission Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Permission Name</label>
                                        <input type="text" 
                                               name="name" 
                                               class="form-control" 
                                               value="{{ $permission->name }}">
                                    </div>
                                </div>

                                <!-- Group Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Group Name</label>
                                        <select name="group_name" class="form-select">
                                            <option disabled>Select Group</option>

                                            <option value="pos" {{ $permission->group_name == 'pos' ? 'selected' : '' }}>Pos</option>
                                            <option value="employee" {{ $permission->group_name == 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="customer" {{ $permission->group_name == 'customer' ? 'selected' : '' }}>Customer</option>
                                            <option value="supplier" {{ $permission->group_name == 'supplier' ? 'selected' : '' }}>Supplier</option>
                                            <option value="salary" {{ $permission->group_name == 'salary' ? 'selected' : '' }}>Salary</option>
                                            <option value="attendence" {{ $permission->group_name == 'attendence' ? 'selected' : '' }}>Attendence</option>
                                            <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}>Category</option>
                                            <option value="product" {{ $permission->group_name == 'product' ? 'selected' : '' }}>Product</option>
                                            <option value="expense" {{ $permission->group_name == 'expense' ? 'selected' : '' }}>Expense</option>
                                            <option value="orders" {{ $permission->group_name == 'orders' ? 'selected' : '' }}>Orders</option>
                                            <option value="stock" {{ $permission->group_name == 'stock' ? 'selected' : '' }}>Stock</option>
                                            <option value="roles" {{ $permission->group_name == 'roles' ? 'selected' : '' }}>Roles</option>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2">
                                    <i class="mdi mdi-content-save"></i> Update
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Validation -->
<script>
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