@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection
@section('content')
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Student List {Total : {{ $getRecord->total() }}}</h3>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/student/add')}}" class="btn btn-primary mb-0">Add New Student</a>
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
            <div class="col-md-12">
                <div class="card card-primary">
                    <form method="get">
                        <div class="card-body p-0">
                            <div class="row">

                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">First Name </label>
                                    <input type="text" name="name" class="form-control" value="{{ Request::get('name')}}">
                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ Request::get('last_name')}}">
                                </div>

                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Admission Number</label>
                                    <input type="text" name="admission_number" value="{{ Request::get('admission_number')}}" class="form-control">

                                </div>
                                <!-- <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Roll Number</label>
                                    <input type="text" name="roll_number" value="{{old('roll_number')}}" class="form-control">

                                </div> -->
                               <div class="form-group col-md-2 m-3"> 
                                    <label class="form-label">Class</label>
                                    <input type="text" name="class" value="{{ Request::get('class')}}" class="form-control">

                                </div>
                               <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option {{ Request::get('gender')=='Male' ?'slected':''}} value="Male">Male</option>
                                        <option {{ Request::get('gender')=='Female' ?'slected':''}}  value="Female">Female</option>
                                        <option  {{ Request::get('gender')=='Others' ?'slected':''}}  value="Others">Others</option>
                                    </select>

                                </div>'
                                 <!-- 
                               <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{old('date_of_birth')}}" class="form-control">

                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Caste</label>
                                    <input type="text" name="caste" value="{{old('caste')}}" class="form-control">

                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Religion</label>
                                    <input type="text" name="religion" value="{{old('religion')}}" class="form-control">

                                </div> 

                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Admission Date</label>
                                    <input type="date" name="admission_date" value="{{old('admission_date')}}" class="form-control">

                                </div>

                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Blood Group</label>
                                    <input type="text" name="blood_group" value="{{old('blood_group')}}" class="form-control">
                                    <div class="text-danger"></div>

                                </div>
                                < <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Height</label>
                                    <input type="text" name="height" value="{{old('height')}}" class="form-control">

                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Weight</label>
                                    <input type="text" name="weight" value="{{old('weight')}}" class="form-control">

                                </div>  
                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">InActive</option>
                                    </select>
                                </div>-->
                           
                              
                               
                          
                            </div>
                            <div class="row">
                            <div class="col-md-2  m-3">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class="col-md-2  m-3">
                                    <a href="{{url('admin/student/list')}}" class="btn btn-danger mb-2">Reset</a>
                                </div>
                            </div>
                            
                        
                      

                       
                        
                               
                        
                </div>

                </form>
            </div>
        </div>

        <!-- Start column -->

        <div class="row">

            <div class="col-md-12">
                @include('_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Student List </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0 " style="overflow: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Profile Picture</th>
                                    <th>Student Name</th>
                                    <th>Parent Name</th>
                                    <th>Admission Number</th>
                                    <th>Roll Number</th>
                                    <th>Class</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Caste</th>
                                    <th>Religion</th>
                                    <th>Mobile Number</th>
                                    <th>Admission Date</th>
                                    <th>Height</th>
                                    <th>Weight</th>
                                    <th>Blood Group</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($getRecord as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>
                                        @if(!empty($value->getProfile()))
                                        <img src="{{$value->getProfile()}}" alt="" style="height: 50px;width:50px; border-radius:50px;">
                                        @endif
                                    </td>
                                    <td>{{$value->name}} {{$value->last_name}}</td>
                                    <td>{{$value->parent_name}} {{$value->parent_last_name}}</td></td>
                                    <td>{{$value->admission_number}}</td>
                                    <td>{{$value->roll_number}}</td>
                                    <td>{{$value->class_name}}</td>
                                    <td>{{$value->gender}}</td>
                                    <td>@if(!empty($value->date_of_birth))
                                        {{date('d-m-Y',strtotime($value->date_of_birth))}}
                                        @endif
                                    </td>
                                    <td>{{$value->caste}}</td>
                                    <td>{{$value->religion}}</td>
                                    <td>{{$value->mobile_number}}</td>
                                    <td>@if(!empty($value->admission_date))
                                        {{date('d-m-Y',strtotime($value->admission_date))}}
                                        @endif
                                    </td>
                                    <td>{{$value->blood_group}}</td>
                                    <td>{{$value->height}}</td>
                                    <td>{{$value->weight}}</td>
                                    <td>
                                            @if($value->status == 0)
                                            Active
                                            @else
                                            InActive
                                            @endif
                                        </td>
                                    <td>{{$value->email}}</td>
                                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                    <td style="min-width:150px;">
                                        <a href="{{url('admin/student/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{url('admin/student/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="padding: 10px;">
                            {{ $getRecord->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

@endsection