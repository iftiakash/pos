@extends('admin_deshboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style type="text/css">

    .form-check-label{
        text-transform: capitalize;
        margin-left: 5px;
    }

    .permission-group{
        border-bottom: 1px solid #e5e5e5;
        padding: 15px 0;
    }

    .permission-items{
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .permission-items .form-check{
        min-width: 220px;
    }

</style>

<div class="content">

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Add Role In Permission</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">
                                Add Role In Permission
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <form id="myForm" method="post" action="{{ route('role.permission.store') }}" enctype="multipart/form-data">
                            @csrf

                            <h5 class="mb-4 text-uppercase">
                                <i class="mdi mdi-account-circle me-1"></i>
                                Add Role In Permission
                            </h5>

                            <!-- Role Select -->
                            <div class="row mb-4">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">All Roles</label>

                                        <select name="role_id" class="form-select">
                                            <option selected disabled>Select Roles</option>

                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                    
                                <!-- Check All -->
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="form-check form-check-primary">
                                        <input class="form-check-input" type="checkbox" id="customckeck15">

                                        <label class="form-check-label fw-bold" for="customckeck15">
                                            Select All Permissions
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <!-- Permission Groups -->
                            @foreach($permission_groups as $group)

                            <div class="row permission-group">

                                <!-- Group Name -->
                                <div class="col-md-3">

                                    <div class="form-check form-check-primary mt-2">
                                        <input class="form-check-input group-checkbox" type="checkbox">

                                        <label class="form-check-label fw-bold">
                                            {{ $group->group_name }}
                                        </label>
                                    </div>

                                </div>

                                <!-- Permissions -->
                                <div class="col-md-9">

                                    @php
                                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                    @endphp

                                    <div class="permission-items">

                                        @foreach($permissions as $permission)

                                        <div class="form-check form-check-primary">

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="permission[]"
                                                value="{{ $permission->id }}"
                                                id="customckeck{{ $permission->id }}"
                                            >

                                            <label class="form-check-label"
                                                for="customckeck{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>

                                        </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                            @endforeach

                            <!-- Submit Button -->
                            <div class="text-end mt-4">
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light">

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


<script type="text/javascript">

    // Select All
    $('#customckeck15').click(function () {

        $('input:checkbox').prop('checked', $(this).is(':checked'));

    });

</script>

@endsection