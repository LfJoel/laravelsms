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
                    <h3 class="mb-0"> My Account</h3>
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
                    @include('_message')
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="card-title">
                            My Account
                            </div>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">First Name </label>
                                        <input type="name" name="name" class="form-control" value="{{old('name', $getRecord->name)}}" required>
                                        <div class="text-danger">{{ $errors->first('name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="name" name="last_name" class="form-control" value="{{old('last_name', $getRecord->last_name)}}" required>
                                        <div class="text-danger">{{ $errors->first('last_name')}}</div>
                                    </div>

                                   
                                    
                                 
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Male' )? 'selected' :''}} value="Male">Male</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Female' )? 'selected' :''}} value="Female">Female</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Others' )? 'selected' :''}} value="Others">Others</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('gender')}}</div>

                                    </div>
           
                               
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile_number" value="{{old('mobile_number', $getRecord->mobile_number)}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('mobile_number')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Occupation</label>
                                        <input type="text" name="occupation" class="form-control" value="{{old('occupation', $getRecord->last_name)}}" required>
                                        <div class="text-danger">{{ $errors->first('occupation')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{old('address', $getRecord->last_name)}}" required>
                                        <div class="text-danger">{{ $errors->first('address')}}</div>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" name="profile_pic" class="form-control">
                                        <div class="text-danger">{{ $errors->first('profile_pic')}}</div>
                                        @if(!empty($getRecord->getProfile()))
                                        <img src="{{ $getRecord->getProfile() }}" alt="" style="width:100px;">

                                        @endif
                                    </div>
                                   
                                  
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{old('email', $getRecord->email)}}">
                                    <div class="text-danger">{{ $errors->first('email')}}</div>
                                </div>
                        


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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