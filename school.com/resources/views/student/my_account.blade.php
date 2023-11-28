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
                    <h3 class="mb-0">My Account</h3>
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
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="name" name="name" class="form-control" value="{{old('name', $getRecord->name)}}" required>
                                        <div class="text-danger">{{ $errors->first('name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                        <input type="name" name="last_name" class="form-control" value="{{old('last_name', $getRecord->last_name)}}" required>
                                        <div class="text-danger">{{ $errors->first('last_name')}}</div>
                                    </div>

                                    
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Gender<span class="text-danger">*</span></label>
                                        <select class="form-control" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Male' )? 'selected' :''}} value="Male">Male</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Female' )? 'selected' :''}} value="Female">Female</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Others' )? 'selected' :''}} value="Others">Others</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('gender')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" value="{{old('date_of_birth', $getRecord->date_of_birth)}}" class="form-control" required>
                                        <div class="text-danger">{{ $errors->first('date_of_birth')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Caste</label>
                                        <input type="text" name="caste" value="{{old('caste', $getRecord->caste)}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('caste')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Religion</label>
                                        <input type="text" name="religion" value="{{old('religion', $getRecord->religion)}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('religion')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile_number" value="{{old('mobile_number', $getRecord->mobile_number)}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('mobile_number')}}</div>

                                    </div>
  
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" name="profile_pic" class="form-control">
                                        <div class="text-danger">{{ $errors->first('profile_pic')}}</div>
                                        @if(!empty($getRecord->getProfile()))
                                        <img src="{{ $getRecord->getProfile() }}" alt="" style="width:100px;">

                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <input type="text" name="blood_group" value="{{old('blood_group', $getRecord->blood_group)}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('blood_group')}}</div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Height</label>
                                        <input type="text" name="height" value="{{old('height', $getRecord->height)}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('height')}}</div>

                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Weight</label>
                                        <input type="text" name="weight" value="{{old('weight', $getRecord->weight)}}" class="form-control">
                                        <div class="text-danger">{{ $errors->first('weight')}}</div>

                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label">Email address<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{old('email', $getRecord->email)}}">
                                    <div class="text-danger">{{ $errors->first('email')}}</div>
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