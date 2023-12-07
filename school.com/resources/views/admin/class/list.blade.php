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
                    <h3 class="mb-0">Class List </h3>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/class/add')}}" class="btn btn-primary mb-0">Add New Class</a>
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
                                    <input type="text" name="name" value="{{ Request::get('name')}}" class="form-control mb-2" placeholder="Name">
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only">Date</label>
                                    <input type="date" name="date" value="{{ Request::get('date')}}" class="form-control mb-2" placeholder="date">
                                </div>

                                <div class="col-auto">
                                    <button class="btn btn-primary mb-2">Search Class</button>
                                </div>
                                <div class="col-auto">
                                    <a href="{{url('admin/class/list')}}" class="btn btn-danger mb-2">Reset</a>
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
                            <h3 class="card-title">Class List </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>
                                            @if($value->status == 0)
                                            Active
                                            @else
                                            InActive
                                            @endif
                                        </td>
                                        <td>{{$value->created_by_name}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/class/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('admin/class/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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