@extends('admin_deshboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Paid Salary</a>
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Paid Salary</h4>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('employe.salary.store') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $paysalary->id }}">

                                <h5 class="mb-4 text-uppercase">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    Paid Salary
                                </h5>

                                @php
                                    $advance = optional($paysalary->advance)->advance_salary ?? 0;
                                    $due = $paysalary->salary - $advance;
                                @endphp

                                <div class="row">

                                    <!-- Employee Name -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Employee Name</label>
                                            <strong class="text-white">{{ $paysalary->name }}</strong>
                                        </div>
                                    </div>

                                    <!-- Salary Month -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Salary Month</label>
                                            <strong class="text-white">{{ date("F", strtotime('-1 month')) }}</strong>
                                            <input type="hidden" name="month" value="{{ date("F", strtotime('-1 month')) }}">
                                        </div>
                                    </div>

                                    <!-- Employee Salary -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Employee Salary</label>
                                            <strong class="text-white">{{ $paysalary->salary }}</strong>
                                            <input type="hidden" name="paid_amount" value="{{ $paysalary->salary }}">
                                        </div>
                                    </div>

                                    <!-- Advance Salary -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Advance Salary</label>
                                            <strong class="text-white">
                                                @if($advance == 0)
                                                    No Advance
                                                @else
                                                    {{ $advance }}
                                                @endif
                                            </strong>
                                            <input type="hidden" name="advance_salary" value="{{ $advance }}">
                                        </div>
                                    </div>

                                    <!-- Due Salary -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Due Salary</label>
                                            <strong class="text-white">
                                                @if($advance == 0)
                                                    <span>No Salary</span>
                                                @else
                                                    {{ round($due) }}
                                                @endif
                                            </strong>
                                            <input type="hidden" name="due_salary" value="{{ round($due) }}">
                                        </div>
                                    </div>

                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                                        <i class="mdi mdi-content-save"></i> Paid Salary
                                    </button>
                                </div>

                            </form>
                        </div>
                        <!-- end settings content -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection