@extends('admin_deshboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Edit Admin</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Edit Admin</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Row -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <form id="myForm" method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $adminuser->id }}">

                            <h5 class="mb-4 text-uppercase">
                                <i class="mdi mdi-account-circle me-1"></i>
                                Edit Admin
                            </h5>

                            <div class="row">

                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Name</label>

                                        <input type="text"
                                            name="name"
                                            class="form-control"
                                            value="{{ $adminuser->name }}">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email</label>

                                        <input type="email"
                                            name="email"
                                            class="form-control"
                                            value="{{ $adminuser->email }}">
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Phone</label>

                                        <input type="text"
                                            name="phone"
                                            class="form-control"
                                            value="{{ $adminuser->phone }}">
                                    </div>
                                </div>

                                <!-- Roles -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Assign Roles</label>

                                        <select name="roles" class="form-select">
                                            <option selected disabled>Select Role</option>

                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $adminuser->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                                    <i class="mdi mdi-content-save"></i>
                                    Save
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

    $(document).ready(function () {

        $('#myForm').validate({

            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                roles: {
                    required: true,
                },
            },

            messages: {
                name: {
                    required: 'Please Enter User Name',
                },
                email: {
                    required: 'Please Enter User Email',
                },
                phone: {
                    required: 'Please Enter User Phone',
                },
                roles: {
                    required: 'Please Select User Role',
                },
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
            },

        });

    });

</script>

@endsection