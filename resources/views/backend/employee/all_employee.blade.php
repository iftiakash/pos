@extends('admin_deshboard')
@section('admin')

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">

                    <h4 class="page-title">All Employee</h4>

                    <a href="{{ route('add.employee') }}" 
                       class="btn btn-primary rounded-pill waves-effect waves-light">
                        Add Employee
                    </a>

                </div>
            </div>
        </div>
        <!-- End Page Title -->


        <!-- Employee Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" 
                               class="table table-bordered table-striped dt-responsive nowrap w-100">

                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($employee as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <img src="{{ asset($item->image) }}" 
                                             style="width:50px; height:40px; object-fit:cover;">
                                    </td>

                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->salary }}</td>

                                    <td>
                                        <a href="{{ route('edit.employee', $item->id) }}" 
                                           class="btn btn-blue btn-sm rounded-pill">
                                            Edit
                                        </a>

                                        <a href="{{ route('delete.employee',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
</div>


@endsection
