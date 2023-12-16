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
                    <h3 class="mb-0">Teacher List {Total : {{ $getRecord->total() }}}</h3>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/teacher/add')}}" class="btn btn-primary mb-0">Add New Teacher</a>
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
                                    <label class="form-label">Date of Joining</label>
                                    <input type="date" name="admission_date" value="{{ Request::get('admission_date')}}" class="form-control">

                                </div>

                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option {{ Request::get('gender')=='Male' ?'slected':''}} value="Male">Male</option>
                                        <option {{ Request::get('gender')=='Female' ?'slected':''}} value="Female">Female</option>
                                        <option {{ Request::get('gender')=='Others' ?'slected':''}} value="Others">Others</option>
                                    </select>
                                </div>

                            </div>

                            <div class="d-flex align-items-center justify-content-center">
                                <div class="col-md-2 m-3">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class="col-md-2 m-3">
                                    <a href="{{url('admin/teacher/list')}}" class="btn btn-danger mb-2">Reset</a>
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
                            <h3 class="card-title">teacher List </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 " style="overflow: auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Picture</th>
                                        <th>Teacher Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Date of Joining</th>
                                        <th>Mobile Number</th>
                                        <th>Marital Status</th>
                                        <th>Current Address</th>
                                        <th>Permanent Address</th>
                                        <th>Qualification</th>
                                        <th>Work Exdperience</th>
                                        <th>Note</th>
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
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->gender}}</td>
                                        <td>@if(!empty($value->date_of_birth))
                                            {{date('d-m-Y',strtotime($value->date_of_birth))}}
                                            @endif
                                        </td>
                                        <td>@if(!empty($value->admission_date))
                                            {{date('d-m-Y',strtotime($value->admission_date))}}
                                            @endif
                                        </td>
                                        <td>{{$value->mobile_number}}</td>
                                        <td>{{$value->marital_status}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>{{$value->permanent_address}}</td>
                                        <td>{{$value->qualification}}</td>
                                        <td>{{$value->work_experience}}</td>
                                        <td>{{$value->note}}</td>
                                        <td>
                                            @if($value->status == 0)
                                            Active
                                            @else
                                            InActive
                                            @endif
                                        </td>

                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td style="min-width:250px;">
                                            <a href="{{url('chat?receiver_id='.base64_encode($value->id))}}" class="btn btn-success btn-sm">Send Message</a>
                                            <a href="{{url('admin/teacher/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{url('admin/teacher/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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