@extends('admin_deshboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title mb-0">Edit Roles</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Edit Roles</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mb-4 text-uppercase">
                            <i class="mdi mdi-account-circle me-1"></i> Edit Roles
                        </h5>

                        <form id="myForm" method="post" action="{{ route('roles.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $roles->id }}">

                            <div class="mb-3">
                                <label class="form-label">Role Name</label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control" 
                                       value="{{ $roles->name }}">
                            </div>

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
        },
        messages: {
            name: { required: 'Please Enter Role Name' },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },
        highlight: function(element){
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element){
            $(element).removeClass('is-invalid');
        },
    });
});
</script>

@endsection