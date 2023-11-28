@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Add New Teacher</h3>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
                <!-- Start column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="card-title">
                                Add New Teacher
                            </div>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">First Name<span class="text-danger">*</span></label>
                                        <input type="name" name="name" class="form-control" value="{{old('name')}}" required>
                                        <div class="text-danger">{{ $errors->first('name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                        <input type="name" name="last_name" class="form-control" value="{{old('last_name')}}" required>
                                        <div class="text-danger">{{ $errors->first('last_name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Gender<span class="text-danger">*</span></label>
                                        <select class="form-control" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender') == 'Male' )? 'selected' :''}} value="Male">Male</option>
                                            <option {{ (old('gender') == 'Female' )? 'selected' :''}} value="Female">Female</option>
                                            <option {{ (old('gender') == 'Others' )? 'selected' :''}} value="Others">Others</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('gender')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" value="{{old('date_of_birth')}}" class="form-control" required>
                                        <div class="text-danger">{{ $errors->first('date_of_birth')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Date of Joining<span class="text-danger">*</span></label>
                                        <input type="date" name="admission_date" value="{{old('admission_date')}}" class="form-control" required>
                                        <div class="text-danger">{{ $errors->first('admission_date')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile_number" value="{{old('mobile_number')}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('mobile_number')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Marital Status</label>
                                        <input type="text" name="marital_status" value="{{old('marital_status')}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('marital_status')}}</div>

                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" name="profile_pic" class="form-control">
                                        <div class="text-danger">{{ $errors->first('profile_pic')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Note</label>
                                        <textarea class="form-control" name="note" value="{{old('note')}}" ></textarea>
                                        <div class="text-danger">{{ $errors->first('note')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Qualification</label>
                                        <textarea class="form-control" name="qualification" value="{{old('qualification')}}"></textarea>
                                        <div class="text-danger">{{ $errors->first('qualification')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Current Address</label>
                                        <textarea class="form-control" name="address" value="{{old('address')}}"></textarea>
                                        <div class="text-danger">{{ $errors->first('address')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Permanent Address</label>
                                        <textarea class="form-control" name="permanent_address" value="{{old('permanent_address')}}"></textarea>
                                        <div class="text-danger">{{ $errors->first('permanent_address')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Work Experience</label>
                                        <textarea class="form-control" name="work_experience" value="{{old('work_experience')}}"></textarea>
                                        <div class="text-danger">{{ $errors->first('work_experience')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                        <select class="form-control" name="status">
                                            <option {{ (old('status') == 0 )? 'selected' :''}} value="0">Active</option>
                                            <option {{ (old('status') == 1 )? 'selected' :''}} value="1">InActive</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('status')}}</div>

                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label">Email address<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{old('email')}}">
                                    <div class="text-danger">{{ $errors->first('email')}}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control">
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>


@endsection