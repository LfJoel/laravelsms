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
                    <h3 class="mb-0">Assign Class to Teacher</h3>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/assign_class_teacher/add')}}" class="btn btn-primary mb-0">Add New Assign Class to Teacher</a>
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
                                    <label class="sr-only">Class Name</label>
                                    <input type="text" name="class_name" value="{{ Request::get('class_name')}}" class="form-control mb-2" placeholder="Class Name">
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only">Teacher Name</label>
                                    <input type="text" name="teacher_name" value="{{ Request::get('teacher_name')}}" class="form-control mb-2" placeholder="Teacher Name">
                                </div>
                                <div class="form-group col-auto">
                                    <label class="sr-only">Status</label>

                                    <select class="form-control" name="status">
                                        <option value="">Select</option>
                                        <option {{(Request::get('status') == 100) ? 'selected': ''}} value="100">Active</option>
                                        <option {{(Request::get('status') == 1) ? 'selected': ''}} value="1">Inactive</option>
                                    </select>

                                </div>
                                <div class="col-auto">
                                    <label class="sr-only">Date</label>
                                    <input type="date" name="date" value="{{ Request::get('date')}}" class="form-control mb-2" placeholder="date">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class="col-auto">
                                    <a href="{{url('admin/assign_class_teacher/list')}}" class="btn btn-danger mb-2">Reset</a>
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
                            <h3 class="card-title">Assign Class Teacher List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Teacher Name</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->class_name}}</td>
                                        <td>{{$value->teacher_name}}</td>
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
                                            <a href="{{url('admin/assign_class_teacher/edit_single/'.$value->id)}}" class="btn btn-success btn-sm">Edit Single</a>
                                            <a href="{{url('admin/assign_class_teacher/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{url('admin/assign_class_teacher/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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