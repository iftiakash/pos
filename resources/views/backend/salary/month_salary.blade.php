@extends('admin_deshboard')

@section('admin')

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('add.advance.salary') }}"
                               class="btn btn-primary rounded-pill waves-effect waves-light">
                                Add Advance Salary
                            </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Last Month Salary</h4>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable"
                               class="table dt-responsive nowrap w-100">

                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($paidsalary as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <img src="{{ asset($item->employee->image) }}"
                                             style="width:50px; height:40px;">
                                    </td>

                                    <td>{{ $item->employee->name }}</td>

                                    <td>{{ $item->salary_month }}</td>

                                    <td>{{ $item->employee->salary }}</td>

                                    <td>
                                        <span class="badge bg-success">
                                            Full Paid
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('edit.advance.salary', $item->id) }}"
                                           class="btn btn-blue rounded-pill waves-effect waves-light">
                                            History
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