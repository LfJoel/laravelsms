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
                    <h3 class="mb-0">Exam Schedule</h3>
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
                                <div class=" col-md-2 m-3">
                                    <label class="sr-only">Exam</label>
                                    <select class="form-control" name="exam_id" required>
                                        <option value="">Select Exam Name</option>
                                        @foreach($getExam as $exam)
                                        <option {{ (Request::get('exam_id') == $exam->id )?'selected':''}} value="{{$exam->id}}">{{ $exam->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-md-2 m-3">
                                    <label class="sr-only">Class</label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select Class Name</option>
                                        @foreach($getClass as $class)
                                        <option {{ (Request::get('class_id') == $class->id )?'selected':''}} value="{{$class->id}}">{{ $class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-auto m-3">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class=" col-auto m-3">
                                    <a href="{{url('admin/examinations/exam_schedule')}}" class="btn btn-danger mb-2">Reset</a>
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

                    @if(!empty($getRecord))
                    <form action="{{ url('admin/examinations/exam_schedule_insert')}}" method="post">
                        {{csrf_field()}}

                        <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">
                        <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Exam Schedule</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Exam Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>
                                            <th>Full Marks</th>
                                            <th>Passing Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value['subject_name']}}
                                                <input type="hidden" class="form-contol" name="schedule[{{ $i }}][subject_id]" value="{{$value['subject_id']}}">
                                            </td>
                                            <td>
                                                <input type="date" class="form-contol" name="schedule[{{ $i }}][exam_date]" value="{{$value['exam_date']}}">
                                            </td>
                                            <td>
                                                <input type="time" class="form-contol" name="schedule[{{ $i }}][start_time]" value="{{$value['start_time']}}"> 
                                            </td>
                                            <td>
                                                <input type="time" class="form-contol" name="schedule[{{ $i }}][end_time]" value="{{$value['end_time']}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-contol" name="schedule[{{ $i }}][room_number]" value="{{$value['room_number']}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-contol" name="schedule[{{ $i }}][full_marks]" value="{{$value['full_marks']}}"> 
                                            </td>
                                            <td>
                                                <input type="text" class="form-contol" name="schedule[{{ $i }}][passing_mark]" value="{{$value['passing_mark']}}">
                                            </td>
                                        </tr>
                                        @php
                                        $i++;
                                        @endphp
                                        @endforeach


                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
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