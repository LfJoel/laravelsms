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
                    <h3 class="mb-0">My Student List {Total : {{ $getRecord->total() }}}</h3>
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
    
        </div>

        <!-- Start column -->

        <div class="row">

            <div class="col-md-12">
                @include('_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Student List </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0 " style="overflow: auto;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
        
                                    <th>Profile Picture</th>
                                    <th>Student Name</th>
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
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($getRecord as $value)
                                <tr>
                                   
                                    <td>
                                        @if(!empty($value->getProfile()))
                                        <img src="{{$value->getProfile()}}" alt="" style="height: 50px;width:50px; border-radius:50px;">
                                        @endif
                                    </td>
                                    <td>{{$value->name}} {{$value->last_name}}</td>
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
                                   
                                    <td>{{$value->email}}</td>
                                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
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