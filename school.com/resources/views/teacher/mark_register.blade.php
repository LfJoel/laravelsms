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
                    <h3 class="mb-0">Marks Register</h3>
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
                                        <option {{ (Request::get('exam_id') == $exam->exam_id )?'selected':''}} value="{{$exam->exam_id}}">{{ $exam->exam_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-md-2 m-3">
                                    <label class="sr-only">Class</label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select Class Name</option>
                                        @foreach($getClass as $class)
                                        <option {{ (Request::get('class_id') == $class->class_id )?'selected':''}} value="{{$class->class_id}}">{{ $class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-auto m-3">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class=" col-auto m-3">
                                    <a href="{{url('teacher/marks_register')}}" class="btn btn-danger mb-2">Reset</a>
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
                    @if(!empty($getSubject) && !empty($getSubject->count()))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Marks Register</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STUDENT NAME</th>
                                        @foreach($getSubject as $subject)
                                        <th>{{strtoupper($subject->subject_name) }} </br>
                                            {{ $subject->subject_type}} : ({{ $subject->passing_mark}} / {{ $subject->full_marks}})
                                        </th>
                                        @endforeach
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($getStudent) && !empty($getStudent->count()))
                                    @foreach($getStudent as $student)

                                    <form method="post" class="Submitform">
                                        {{csrf_field()}}
                                        <input type="hidden" name="student_id" value="{{ $student->id}}">
                                        <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">
                                        <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">

                                        <tr>
                                            <td>{{$student->name}} {{$student->last_name}}</td>
                                            @php
                                            $i = 1;
                                            $totalStudentMark = 0;
                                            $totalFullMarks = 0;
                                            $totalPassingMark = 0;
                                            @endphp
                                            @foreach($getSubject as $subject)
                                            @php
                                            $totalMark = 0;
                                            $totalFullMarks = $totalFullMarks + $subject->full_marks;
                                            $totalPassingMark = $totalPassingMark + $subject->passing_mark;
                                            $getMark = $subject->getMark($student->id,Request::get('exam_id'),Request::get('class_id'),$subject->subject_id);
                                            if(!empty($getMark))
                                            {
                                            $totalMark = $getMark->class_work + $getMark->home_work + $getMark->test_work + $getMark->exam;
                                            }
                                            $totalStudentMark = $totalStudentMark + $totalMark;
                                            @endphp
                                            <td>
                                                <div class="mb-2">
                                                    Class Work
                                                    <input type="hidden" name="mark[{{ $i }}]['full_marks']" value="{{ $subject->full_marks }}">
                                                    <input type="hidden" name="mark[{{ $i }}]['passing_mark']" value="{{ $subject->passing_mark }}">
                                                    <input type="hidden" name="mark[{{ $i }}]['id']" value="{{ $subject->id }}">
                                                    <input type="hidden" name="mark[{{ $i }}]['subject_id']" value="{{ $subject->subject_id }}">
                                                    <input type="text" id="class_work_{{ $student->id}}{{ $subject->subject_id}}" name="mark[{{ $i }}]['class_work']" placeholder="Enter Mark" value="{{ !empty($getMark) ? $getMark->class_work : '' }}" class="form-control" style="width:200px;">
                                                </div>
                                                <div class="mb-2">
                                                    Home Work
                                                    <input type="text" id="home_work_{{ $student->id}}{{ $subject->subject_id}}" name="mark[{{ $i }}]['home_work']" placeholder="Enter Mark" class="form-control" style="width:200px;" value="{{ !empty($getMark) ? $getMark->home_work : '' }}">
                                                </div class="mb-2">
                                                <div class="mb-2">
                                                    Test Work
                                                    <input type="text" id="test_work_{{ $student->id}}{{ $subject->subject_id}}" name="mark[{{ $i }}]['test_work']" placeholder="Enter Mark" class="form-control" style="width:200px;" value="{{ !empty($getMark) ? $getMark->test_work : '' }}">
                                                </div>
                                                <div class="mb-2">
                                                    Exam
                                                    <input type="text" id="exam_{{ $student->id}}{{ $subject->subject_id}}" name="mark[{{ $i }}]['exam']" placeholder="Enter Mark" class="form-control" style="width:200px;" value="{{ !empty($getMark) ? $getMark->exam : '' }}">
                                                </div>
                                                <div class="mb-2">
                                                    <button type="button" data-schedule="{{$subject->id}}" class="btn btn-primary SaveSingleSubject" id="{{ $student->id}}" data-val="{{ $subject->subject_id}}" data-exam="{{ Request::get('exam_id') }}" data-class="{{Request::get('class_id')}}">Save</button>
                                                </div>
                                                <div class="mb-2">
                                                    @if(!empty($getMark))
                                                    <b>Total Mark : </b>{{ $totalMark }}
                                                    <br>
                                                    <b>Passing Mark : </b>{{ $subject->passing_mark }}
                                                    <br>
                                                    @php
                                                    $getLoopGrade=App\Models\MarksGradeModel::getGrade($totalMark);
                                                    @endphp
                                                    @if(!empty($getLoopGrade ))
                                                    <b>Grade :</b> {{ $getLoopGrade }}
                                                    <br>
                                                    @endif
                                                    @if($totalMark >= $subject->passing_mark )
                                                    <span class="text-success fw-bold">
                                                        Pass
                                                    </span>
                                                    @else
                                                    <span class="text-danger fw-bold">
                                                        Fail
                                                    </span>
                                                    <!--need to some work-->
                                                    @endif
                                                </div>
                                                @endif
                                            </td>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            <td>
                                                <button type="submit" placeholder="Enter Mark" class="btn btn-success">Save</button>
                                                </br>
                                                @if(!empty($totalStudentMark))
                                                <br>
                                                <b>Total Subject Mark :</b> {{ $totalFullMarks}}
                                                <br>
                                                <b>Total Passing Mark :</b> {{ $totalPassingMark}}
                                                <br>
                                                <b>Total Student Mark :</b> {{ $totalStudentMark}}
                                                </br>
                                                @php
                                                $percentage = ($totalStudentMark * 100) / $totalFullMarks;
                                                $getGrade =App\Models\MarksGradeModel::getGrade($percentage);
                                                @endphp
                                                <br>
                                                <b>Percentage :</b> {{ round($percentage,2)}}%
                                                <br>
                                                @if(!empty($getGrade))
                                                <b>Grade :</b> {{ $getGrade }}
                                                <br>
                                                @endif
                                            @endif
                                                <!--need to some work-->
                                            </td>
                                        </tr>
                                    </form>
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
    $('.Submitform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('teacher/submit_marks_register')}}",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                alert(data.message);
            }
        });

    });
    $('.SaveSingleSubject').click(function(e) {

        var student_id = $(this).attr('id');
        var subject_id = $(this).attr('data-val');
        var exam_id = $(this).attr('data-exam');
        var class_id = $(this).attr('data-class');
        var id = $(this).attr('data-schedule');

        var class_work = $('#class_work_' + student_id + subject_id).val();
        var home_work = $('#home_work_' + student_id + subject_id).val();
        var test_work = $('#test_work_' + student_id + subject_id).val();
        var exam = $('#exam_' + student_id + subject_id).val();


        $.ajax({
            type: "POST",
            url: "{{ url('teacher/single_submit_marks_register')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                student_id: student_id,
                subject_id: subject_id,
                exam_id: exam_id,
                class_id: class_id,
                class_work: class_work,
                home_work: home_work,
                test_work: test_work,
                exam: exam,
            },
            dataType: "json",
            success: function(data) {
                alert(data.message);
            }
        });
    });
</script>
@endsection