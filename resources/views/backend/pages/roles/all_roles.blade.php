@extends('admin_deshboard')
@section('admin')

<div class="content">
    <div class="container-fluid">
        
        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex justify-content-between align-items-center">
                    
                    <h4 class="page-title mb-0">All Roles</h4>

                    <a href="{{ route('add.roles') }}" 
                       class="btn btn-primary rounded-pill">
                        Add Roles
                    </a>

                </div>
            </div>
        </div>     

        <!-- Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" 
                               class="table table-bordered table-striped dt-responsive nowrap w-100 text-center">

                            <thead class="table-dark">
                                <tr>
                                    <th style="width:5%">Sl</th>
                                    <th>Roles Name</th> 
                                    <th style="width:20%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($roles as $key => $item)
                                <tr>
                                    <td class="align-middle">{{ $key+1 }}</td> 

                                    <td class="align-middle text-start">
                                        {{ $item->name }}
                                    </td> 

                                    <td class="align-middle">
                                        <a href="{{ route('edit.roles',$item->id) }}" 
                                           class="btn btn-primary btn-sm me-1 rounded-pill">
                                            Edit
                                        </a>

                                        <a href="{{ route('delete.roles',$item->id) }}" 
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