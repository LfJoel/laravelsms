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
                    <h3 class="mb-0">Class Timetable List</h3>
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
                    <form method="get" >
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group  col-md-2 m-3">
                                    <label class="form-label">Class Name</label>
                                    <select class="form-control getClass" name="class_id">
                                        <option value="">Select Class</option>


                                        @foreach($getClass as $class)
                                        <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}} value="{{ $class->id }}"> {{$class->name}}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="form-group col-md-2 m-3">
                                    <label class="form-label">Subject Name</label>
                                    <select class="form-control getSubject" name="subject_id">
                                        <option value="">Select Subject</option>
                                        @if(!empty($getSubject))

                                        @foreach($getSubject as $subject)
                                        <option {{(Request::get('subject_id') ==  $subject->subject_id ) ? 'selected' : ''}} value="{{ $subject->subject_id}}"> {{$subject->subject_name}}</option>
                                        @endforeach

                                        @endif
                                    </select>
                                </div>
                                <div class="row  pt-5">
                                <div class="col-auto">
                                        <button class="btn btn-primary mb-2">Search Class</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/class_time_table/list')}}" class="btn btn-danger mb-2">Reset</a>
                                    </div>

                                </div>
                               
                            </div>
                            
                                    
                               
                        </div>
                    </form>
                </div>
            </div>

            @include('_message')

            @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
            <!-- Start column -->

            <form action="{{ url('admin/class_time_table/add')}}" method="post">
                {{csrf_field()}}

                <input type="hidden" name="subject_id" value="{{Request::get('subject_id')}}">
                <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Class Timetable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Week</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($week as $value)
                                <tr>
                                    <th>
                                        <input type="hidden" name="timetable[{{ $i }}][week_id]" value="{{$value['week_id']}}">

                                        {{$value['week_name']}}
                                    </th>

                                    <td>
                                        <input type="time" name="timetable[{{ $i }}][start_time]" value="{{$value['start_time']}}" class="form_control">
                                    </td>
                                    <td>
                                        <input type="time" name="timetable[{{ $i }}][end_time]" value="{{$value['end_time']}}" class="form_control">
                                    </td>
                                    <td>
                                        <input type="text" style="width:200px;" value="{{$value['room_number']}}" name="timetable[{{ $i }}][room_number]" class="form_control">
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div style="text-align:center; padding:25px;">
                            <button class="btn btn-primary">Submit</button>

                        </div>
                    </div>
                </div>
            </form>

            @endif

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
    $(document).ready(function() {
        $('.getClass').change(function() {
            var class_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/class_time_table/get_subject')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.getSubject').html(response.html);

                },

            });

        });
    });
</script>

@endsection