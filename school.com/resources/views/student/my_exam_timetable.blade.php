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
                    <h3 class="mb-0">My Exam Timetable</h3>
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
            @foreach($getRecord as $value)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $value['name'] }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Day</th>
                                <th>Exam Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                                <th>Full Marks</th>
                                <th>Passing Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($value['exam'] as $valueS)
                            <tr>
                                <td>{{ $valueS['subject_name']}}</td>
                                <td>{{ date('l', strtotime($valueS['exam_date'])) }}</td>
                                <td>{{ date('d-m-Y', strtotime($valueS['exam_date'])) }}</td>
                                <td>{{ !empty($valueS['start_time']) ? date('h:i A' , strtotime($valueS['start_time'])) : ''}}</td>
                                <td>{{ !empty( $valueS['end_time']) ? date('h:i A' , strtotime( $valueS['end_time'])) : ''}}</td>
                                <td>{{ $valueS['room_number']}}</td>
                                <td>{{ $valueS['full_marks']}}</td>
                                <td>{{ $valueS['passing_mark']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            @endforeach

            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->


@endsection