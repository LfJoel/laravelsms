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
                    <h3 class="mb-0">Parent List {Total : {{ $getRecord->total() }}}</h3>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/parent/add')}}" class="btn btn-primary mb-0">Add New Parent</a>
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
                        <label class="sr-only">Name</label>
                        <input type="text" name="name" value="{{ Request::get('name')}}"  class="form-control mb-2" placeholder="Name">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" >Last Name</label>
                        <input type="text" name="email" value="{{ Request::get('email')}}" class="form-control mb-2"  placeholder="Email">
                    </div>
                   
                    <div class="col-auto">
                        <button  class="btn btn-primary mb-2">Search</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{url('admin/parent/list')}}" class="btn btn-danger mb-2">Reset</a>
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
                            <h3 class="card-title">Parent List </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>gender</th>
                                        <th>Phone</th>
                                        <th>Occupation</th>
                                        <th>Address</th>
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
                                    <td>{{$value->mobile_number}}</td>
                                    <td>{{$value->occupation}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>
                                            @if($value->status == 0)
                                            Active
                                            @else
                                            InActive
                                            @endif
                                        </td>
                                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                    <td>
                                        <a href="{{url('admin/parent/edit/'.$value->id)}}" class="btn btn-primary btn-sm mb-2">Edit</a>
                                        <a href="{{url('admin/parent/delete/'.$value->id)}}" class="btn btn-danger btn-sm mb-2">Delete</a>
                                        <a href="{{url('admin/parent/my-child/'.$value->id)}}" class="btn btn-dark btn-sm mb-2">my child</a>
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