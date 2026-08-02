@extends('admin_deshboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style type="text/css">

    .form-check-label{
        text-transform: capitalize;
    }

    .permission-group{
        border-bottom: 1px solid #e5e5e5;
        padding: 15px 0;
    }

</style>

<div class="content">

    <!-- Start Content -->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                <div class="page-title-box d-flex justify-content-between align-items-center">

                    <h4 class="page-title">Edit Role In Permission</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">
                                    Edit Role In Permission
                                </a>
                            </li>
                        </ol>
                    </div>

                </div>

            </div>
        </div>
        <!-- end page title -->


        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <form id="myForm" method="post" action="{{ route('role.permission.update',$role->id) }}" enctype="multipart/form-data">

                            @csrf

                            <!-- Role Name -->
                            <div class="row mb-4">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="form-label">
                                            Roles Name
                                        </label>

                                        <h4 class="text-primary">
                                            {{ $role->name }}
                                        </h4>

                                    </div>

                                </div>

                            </div>


                            <!-- Select All -->
                            <div class="form-check form-check-primary mb-3">

                                <input class="form-check-input"
                                       type="checkbox"
                                       id="customckeck15">

                                <label class="form-check-label fw-bold"
                                       for="customckeck15">

                                    Select All Permissions

                                </label>

                            </div>

                            <hr>


                            <!-- Permission Groups -->
                            @foreach($permission_groups as $group)

                                @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                @endphp

                                <div class="row permission-group align-items-start">

                                    <!-- Group Name -->
                                    <div class="col-md-3">

                                        <div class="form-check form-check-primary mt-1">

                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="group{{ $loop->index }}"
                                                   {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>

                                            <label class="form-check-label fw-bold"
                                                   for="group{{ $loop->index }}"

                                                {{ $group->group_name }}

                                            </label>

                                        </div>

                                    </div>


                                    <!-- Permissions -->
                                    <div class="col-md-9">

                                        <div class="row">

                                            @foreach($permissions as $permission)

                                                <div class="col-md-4">

                                                    <div class="form-check mb-2 form-check-primary">

                                                        <input class="form-check-input"
                                                               type="checkbox"
                                                               name="permission[]"
                                                               value="{{ $permission->id }}"
                                                               id="customckeck{{ $permission->id }}"
                                                               {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                                                        <label class="form-check-label"
                                                               for="customckeck{{ $permission->id }}">

                                                            {{ $permission->name }}

                                                        </label>

                                                    </div>

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
                                    Update Permission

                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div>
    <!-- container -->

</div>
<!-- content -->


<script type="text/javascript">

    // Select All Permissions
    $('#customckeck15').click(function(){

        if ($(this).is(':checked')) {

            $('input[type=checkbox]').prop('checked', true);

        } else {

            $('input[type=checkbox]').prop('checked', false);

        }

    });

</script>

@endsection