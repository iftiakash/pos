@extends('admin_deshboard')
@section('admin')

<div class="content">

    <!-- Start Content -->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                <div class="page-title-box d-flex justify-content-between align-items-center">

                    <h4 class="page-title">All Roles Permission</h4>

                    <div class="page-title-right">
                        <a href="{{ route('add.roles.permission') }}"
                           class="btn btn-primary rounded-pill waves-effect waves-light">
                            <i class="mdi mdi-plus-circle me-1"></i>
                            Add Role in Permission
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover dt-responsive nowrap w-100 align-middle">

                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th width="20%">Roles Name</th>
                                        <th width="55%">Permission Name</th>
                                        <th width="20%" class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($roles as $key => $item)

                                    <tr>

                                        <td>{{ $key + 1 }}</td>

                                        <td>
                                            <strong>{{ $item->name }}</strong>
                                        </td>

                                        <td>

                                            @foreach($item->permissions as $perm)

                                                <span class="badge bg-danger me-1 mb-1 p-2">
                                                    {{ $perm->name }}
                                                </span>

                                            @endforeach

                                        </td>

                                        <td class="text-center">

                                            <a href="{{ route('admin.edit.roles',$item->id) }}"
                                               class="btn btn-info btn-sm rounded-pill">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </a>

                                            <a href="{{ route('admin.delete.roles',$item->id) }}"
                                               class="btn btn-danger btn-sm rounded-pill"
                                               id="delete">
                                                <i class="mdi mdi-delete"></i> Delete
                                            </a>

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
        <!-- end row -->

    </div>
    <!-- container -->

</div>
<!-- content -->

@endsection