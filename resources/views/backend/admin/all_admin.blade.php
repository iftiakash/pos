@extends('admin_deshboard')

@section('admin')

<div class="content">

    <!-- Start Content -->
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">

                <div class="page-title-box d-flex justify-content-between align-items-center">

                    <h4 class="page-title">
                        All Admin
                        <span class="btn btn-danger btn-sm">
                            {{ count($alladminuser) }}
                        </span>
                    </h4>

                    <div class="page-title-right">
                        <a href="{{ route('add.admin') }}"
                           class="btn btn-primary rounded-pill waves-effect waves-light">
                            Add Admin
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <!-- End Page Title -->

        <!-- Table Row -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable"
                               class="table table-bordered table-striped dt-responsive nowrap w-100">

                            <thead class="table-dark">
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th width="220px">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($alladminuser as $key => $item)

                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <!-- Image -->
                                    <td>
                                        <img src="{{ (!empty($item->photo))
                                                ? url('upload/admin_image/'.$item->photo)
                                                : url('upload/no_image.jpg') }}"
                                             style="width:50px; height:50px; object-fit:cover;"
                                             class="rounded-circle">
                                    </td>

                                    <!-- Name -->
                                    <td>{{ $item->name }}</td>

                                    <!-- Email -->
                                    <td>{{ $item->email }}</td>

                                    <!-- Phone -->
                                    <td>{{ $item->phone }}</td>

                                    <!-- Roles -->
                                    <td>

                                        @foreach($item->roles as $role)

                                            <span class="badge bg-danger">
                                                {{ $role->name }}
                                            </span>

                                        @endforeach

                                    </td>

                                    <!-- Action -->
                                    <td>

                                        <a href="{{ route('edit.admin', $item->id) }}"
                                           class="btn btn-info btn-sm rounded-pill">
                                            Edit
                                        </a>

                                        <a href="{{ route('delete.admin', $item->id) }}"
                                           class="btn btn-danger btn-sm rounded-pill"
                                           id="delete">
                                            Delete
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
</div>

@endsection