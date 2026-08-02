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
                                <a href="javascript:void(0);">Edit Employee</a>
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Employee</h4>
                </div>
            </div>
        </div>

        <!-- Form Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('employee.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $employee->id }}">
                            <h5 class="mb-4 text-uppercase">
                                <i class="mdi mdi-account-circle me-1"></i>
                                Edit Employee
                            </h5>

                            <div class="row">

                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $employee->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $employee->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $employee->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $employee->address }}">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Experience -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee Experience</label>
                                    <select name="experience"
                                        class="form-select @error('experience') is-invalid @enderror">
                                        <option disabled>Select Year</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }} Year"
                                                {{ $employee->experience == $i.' Year' ? 'selected' : '' }}>
                                                {{ $i }} Year
                                            </option>
                                        @endfor
                                    </select>
                                    @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Salary -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee Salary</label>
                                    <input type="text" name="salary"
                                        class="form-control @error('salary') is-invalid @enderror"
                                        value="{{ $employee->salary }}">
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Vacation -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee Vacation</label>
                                    <input type="text" name="vacation"
                                        class="form-control @error('vacation') is-invalid @enderror"
                                        value="{{ $employee->vacation }}">
                                    @error('vacation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- City -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Employee City</label>
                                    <input type="text" name="city"
                                        class="form-control @error('city') is-invalid @enderror"
                                        value="{{ $employee->city }}">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Employee Image</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Preview Image -->
                                <div class="col-md-12 mb-3">
                                    <img id="showImage"
                                        src="{{ asset($employee->image) }}"
                                        class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">
                                </div>

                            </div>

                            <div class="text-end">
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light mt-2">
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

<script>
    $(document).ready(function () {
        $('#image').change(function (e) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
