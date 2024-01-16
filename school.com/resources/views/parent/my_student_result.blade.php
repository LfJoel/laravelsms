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
                    <h3 class="mb-0">Exam Result <span class="text-danger">({{ $getStudent->name}} {{ $getStudent->last_name}})</span></h3>
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

                @foreach($getRecord as $value)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $value['exam_name']}}</h3>
                            <a class="btn btn-danger btn-sm" style="float: right;"href="{{ url('parent/my_exam_results/print?exam_id='.$value['exam_id'].'&student_id='.$getStudent->id)}}" target="_blank">Print</a>

                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Class Work</th>
                                        <th>Test Work</th>
                                        <th>Home Work</th>
                                        <th>Exam</th>
                                        <th>Total Score</th>
                                        <th>Passing Mark</th>
                                        <th>Full Mark</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total_score = 0;
                                    $full_mark = 0;
                                    $result_val = 0;
                                    @endphp
                                    @foreach($value['subject'] as $exam)
                                    @php
                                    $total_score = $total_score + $exam['total_score'];
                                    $full_mark = $full_mark + $exam['full_marks'];

                                    @endphp
                                    <tr>
                                        <td>{{ $exam['subject_name']}}</td>
                                        <td>{{ $exam['class_work']}}</td>
                                        <td>{{ $exam['test_work']}}</td>
                                        <td>{{ $exam['home_work']}}</td>
                                        <td>{{ $exam['exam']}}</td>
                                        <td>{{ $exam['total_score']}}</td>
                                        <td>{{ $exam['passing_mark']}}</td>
                                        <td>{{ $exam['full_marks']}}</td>
                                        <td>
                                            @if($exam['total_score'] >= $exam['passing_mark'])

                                            <span class="text-success fw-bold">
                                                Pass
                                            </span>
                                            @else
                                            @php
                                            $result_val = 1;
                                            @endphp
                                            <span class="text-danger fw-bold">
                                                Fail
                                            </span>
                                            @endif

                                        </td>

                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="2"><b>Grand Total: {{$total_score}}/{{$full_mark}}</b></td>
                                        @php
                                        $percentage = ($total_score * 100) / $full_mark;
                                        $getGrade=App\Models\MarksGradeModel::getGrade($percentage);

                                        @endphp
                                        <td><b>Percentage: {{ round($percentage, 2)}}%</b></td>
                                        <td colspan="2"><b>Grade: {{ $getGrade  }}</b></td>
                                        <td colspan="5">
                                            <b>Result: @if($result_val == 1)
                                                <span class="text-danger ">
                                                    Fail
                                                </span>
                                                @else
                                                <span class="text-success">
                                                    Pass
                                                </span>
                                                @endif
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

@endsection