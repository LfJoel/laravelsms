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
                    <h3 class="mb-0">Add New Assign teacher</h3>
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
                                Assign Class Teacher
                            </div>
                        </div>
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">Class Name</label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select Class</option>
                                        @foreach($getClass as $class)
                                        <option {{ ( $getRecord->class_id == $class->id)? 'selected' : '' }} value="{{$class ->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Teacher Name</label>
                                    <select class="form-control" name="teacher_id" required>
                                        <option value="">Select Teacher</option>
                                        @foreach($getClassTeacher as $getTeacher)
                                        <option {{ ( $getRecord->teacher_id == $getTeacher->id)? 'selected' : '' }} value="{{$getTeacher->id}}">{{$getTeacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option {{ ( $getRecord->status == 0)? 'selected' : '' }} value="0">Active</option>
                                        <option {{ ( $getRecord->status == 1)? 'selected' : '' }} value="1">InActive</option>
                                    </select>
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