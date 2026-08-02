@extends('admin_deshboard')

@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <!-- Breadcrumb can be added here -->
                        </ol>
                    </div>
                    <h4 class="page-title">All Employee Attendance</h4>
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
                                    <th>Date</th>
                                    <th>Attendance Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($details as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <img src="{{ asset($item->employee->image) }}"
                                             alt="Employee Image"
                                             style="width:50px; height:40px;">
                                    </td>

                                    <td>{{ $item->employee->name }}</td>

                                    <td>
                                        {{ date('Y-m-d', strtotime($item->date)) }}
                                    </td>

                                    <td>
                                        {{ $item->attend_status }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->

@endsection