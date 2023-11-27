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
                    <h3 class="mb-0">Parent Student List ({{ $getParent->name}} {{ $getParent->last_name}})</h3>
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
                <div class="card-body">
                    <div class="row">
                    <div class="col-auto">
                        <label class="sr-only">Student ID</label>
                        <input type="text" name="id" value="{{ Request::get('id')}}"  class="form-control mb-2" placeholder="ID">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only">Name</label>
                        <input type="text" name="name" value="{{ Request::get('name')}}"  class="form-control mb-2" placeholder="Name">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" >Last Name</label>
                        <input type="text" name="last_name" value="{{ Request::get('last_name')}}" class="form-control mb-2"  placeholder="Email">
                    </div>
                
                    <div class="col-auto">
                        <button  class="btn btn-primary mb-2">Search</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{url('admin/parent/my-child/'.$parent_id)}}" class="btn btn-success mb-2">Reset</a>
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
@if(!empty($getSreachStudent))                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">student List </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Parent Name</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($getSreachStudent as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>
                                        @if(!empty($value->getProfile()))
                                        <img src="{{$value->getProfile()}}" alt="" style="height: 50px;width:50px; border-radius:50px;">
                                        @endif
                                    </td>
                                    <td>{{$value->name}} {{$value->last_name}}</td>

                                    <td>{{$value->email}}</td>
                                    <td>{{$value->parent_name}}</td>
                                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>

                                    <td style="min-width:150px;">
                                        <a href="{{url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-primary btn-sm">Add student to parent</a>
                                    </td>
                                </tr>
                                @endforeach
                            
                                </tbody>
                            </table>
                            <div style="padding: 10px;">
                            </div>
                        </div>
                    </div>

                @endif    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Parent student List </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Picture</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Parent Name</th>
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
                                    <td>{{$value->parent_name}}</td>
                                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>

                                    <td style="min-width:150px;">
                                        <a href="{{url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            
                                </tbody>
                            </table>
                            <div style="padding: 10px;">
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