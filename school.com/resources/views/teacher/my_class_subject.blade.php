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
                    <h3 class="mb-0">My Class & Subject</h3>
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


            <!-- Start column -->

            <div class="row">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assign Class Teacher List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Subject Type</th>
                                        <th>My Class Timetable</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{$value->class_name}}</td>
                                        <td>{{$value->subject_name}}</td>
                                        <td>{{$value->subject_type}}</td>


                                        <td>
                                            @php
                                            $ClassSubject = $value->getMyTimetable($value->class_id,$value->subject_id);
                                            @endphp

                                            @if(!empty($ClassSubject))

                                            {{date('h:i A' , strtotime($ClassSubject->start_time)) }} to {{date('h:i A' , strtotime($ClassSubject->end_time))}}
                                            
                                            <br/>

                                            Room Number : {{ $ClassSubject ->room_number}}
                                            @endif
                                        </td>

                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>

                                            <a href="{{url('teacher/my_class_subject/class_timetable/'.$value->class_id.'/'.$value->subject_id)}}" class="btn btn-success">My Class Timetable</a>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

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