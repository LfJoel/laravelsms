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
                    <h3 class="mb-0">Add New Student</h3>
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
                                Add New Student
                            </div>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">

                                <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" name="profile_pic" class="form-control">
                                        <div class="text-danger">{{ $errors->first('profile_pic')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
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
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile_number" value="{{old('mobile_number')}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('mobile_number')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Occupation</label>
                                        <input type="text" name="occupation" value="{{old('occupation')}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('occupation')}}</div>

                                    </div>
                                   
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" value="{{old('address')}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('address')}}</div>

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
                                <button type="submit" class="btn btn-primary">submit</button>
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