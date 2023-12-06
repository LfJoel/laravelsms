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
                    <h3 class="mb-0">Student Attendance</h3>
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
                            <div class="row justify-content-center">
                                <div class="form-group col-md-2 m-3">
                                    <label>Class</label>
                                    <select class="form-control" name="class_id" id="getClass" required>
                                        <option value="">Select Class Name</option>
                                        @foreach($getClass as $class)
                                        <option {{ (Request::get('class_id') == $class->class_id )?'selected':''}} value="{{$class->class_id}}">{{ $class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label>Attendance Date</label>
                                    <input type="date" class="form-control" id="getAttendanceDate" value="{{ Request::get('attendance_date')}}" required name="attendance_date">
                                </div>
                                <div class=" col-auto m-3">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class=" col-auto m-3">
                                    <a href="{{url('teacher/attendance/student')}}" class="btn btn-danger mb-2">Reset</a>
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
                    @if(!empty(Request::get('class_id')) && !empty(Request::get('attendance_date')))

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($getStudent) && !empty($getStudent->count()))
                                    @foreach($getStudent as $value)
                                    @php
                                    $attendance_type = '';
                                    $getAttendance = $value->getAttendance($value->id,Request::get('class_id'),Request::get('attendance_date'));
                                    if(!empty($getAttendance->attendance_type))
                                    {
                                        $attendance_type = $getAttendance->attendance_type;
                                    }
                                    @endphp
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}} {{$value->last_name}}</td>
                                        <td>
                                            <label class="p-3">
                                                <input class="saveAttendance" {{ ($attendance_type == '1') ? 'checked': '' }} type="radio" value="1" id="{{$value->id}}" name="attendance{{$value->id}}">Present
                                            </label>
                                            <label class="p-3">
                                                <input class="saveAttendance" {{ ($attendance_type == '2') ? 'checked': '' }} type="radio" value="2" id="{{$value->id}}" name="attendance{{$value->id}}">Absent
                                            </label>
                                            <label class="p-3">
                                                <input class="saveAttendance" {{ ($attendance_type == '3') ? 'checked': '' }} type="radio" value="3" id="{{$value->id}}" name="attendance{{$value->id}}">Late
                                            </label>
                                            <label>
                                                <input class="saveAttendance" {{ ($attendance_type == '4') ? 'checked': '' }} type="radio" value="4" id="{{$value->id}}" name="attendance{{$value->id}}">Half Day
                                            </label>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @endif
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
@section('script')

<script type="text/javascript">
    $('.saveAttendance').change(function(e) {
        var student_id = $(this).attr('id');
        var attendance_type = $(this).val();
        var class_id = $('#getClass').val();
        var attendance_date = $('#getAttendanceDate').val();
        $.ajax({
            type: "POST",
            url: "{{ url('teacher/attendance/student/save')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                student_id: student_id,
                attendance_type: attendance_type,
                class_id: class_id,
                attendance_date: attendance_date,
            },
            dataType: "json",
            success: function(data) {
                alert(data.message);
            }
        });
    });
</script>
@endsection