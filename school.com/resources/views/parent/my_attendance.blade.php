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
                    <h3 class="mb-0">Attendance <span class="text-danger">{{$getStudent->name}} {{$getStudent->last_name}}(Total: {{$getRecord->total()}})</span></h3>
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
            <div class="col-md-12">
                <div class="card card-primary">
                    <form method="get">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="form-group col-md-2 m-3">
                                    <label>Class</label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select Class Name</option>
                                        @foreach($getClass as $class)
                                        <option {{ (Request::get('class_id') == $class->class_id ) ?'selected':''}} value="{{$class->class_id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label>Attendance Type</label>
                                    <select class="form-control" name="attendance_type">
                                        <option value="">Select</option>
                                        <option {{ (Request::get('attendance_type') == 1 )?'selected':''}} value="1">Present</option>
                                        <option {{ (Request::get('attendance_type') == 2 )?'selected':''}} value="2">Absent</option>
                                        <option {{ (Request::get('attendance_type') == 3 )?'selected':''}} value="3">Late</option>
                                        <option {{ (Request::get('attendance_type') == 4 )?'selected':''}} value="4">Half Day</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label>Attendance Date</label>
                                    <input type="date" class="form-control" value="{{ Request::get('attendance_date')}}" name="attendance_date">
                                </div>
                                <div class=" col-auto m-3">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class=" col-auto m-3">
                                    <a href="{{url('parent/my_student/attendance/.$getStudent->id')}}" class="btn btn-danger mb-2">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Attendance</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Attendance Type</th>
                                        <th>Attendance Date</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->class_name}}</td>
                                        <td>
                                            @if($value->attendance_type == 1)
                                            <span>Present</span>
                                            @elseif($value->attendance_type == 2)
                                            <span>Absent</span>

                                            @elseif($value->attendance_type == 3)
                                            <span>Late</span>
                                            @elseif($value->attendance_type == 4)
                                            <span>Half Day</span>
                                            @endif
                                        </td>
                                        <td>{{date('d-m-Y', strtotime($value->attendance_date))}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="100%">Record Not Found</td>
                                    </tr>
                                    @endforelse

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