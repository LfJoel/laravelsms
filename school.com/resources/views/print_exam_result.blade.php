<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Exam Result</title>
    <style>
        @page {
            size: 8.3in 11.7in;
        }

        @page {
            size: A4;
        }

        .margin-bottom {
            margin-bottom: 3px;
        }

        @media print {
            @page {
                margin: 0px;
                margin-left: 20px;
                margin-right: 20px;
            }
        }

        .container {
            max-width: 800px;
            margin: 10px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .school-logo {
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 10px;
        }

        .container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .container table,
        .container th,
        .container td {
            border: 1px solid black;
        }

        .container th,
        .container td {
            padding: 12px;
            text-align: left;
        }

        .container th {
            color: black;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .school-logo {
                max-width: 80px;
                max-height: 80px;
            }
        }

        @media (max-width: 600px) {
            .container {
                max-width: 100%;
            }
        }
    </style>

</head>

<body>
    <div id="page">
        <table style="width: 100%; text-align:center;">
            <tr>
                <td width="5%"></td>
                <td td width="15%"><img style="width: 110px;" class="img-img-thumbnail" src="https://cdn1.vectorstock.com/i/1000x1000/40/40/cartoon-school-building-education-vector-15064040.jpg"></td>
                <td align="left">
                    <H1>BATMAN INTERNATIONAL SCHOOL </H1>
                </td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td width="5%"></td>
                <td width="70%">
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="25%">Name of Student : </td>
                                <td style="border-bottom: 1px solid; width:100%;">{{ $getStudent->name }}{{ $getStudent->last_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="25%">Admission Number :</td>
                                <td style="border-bottom: 1px solid; width:100%;">{{ $getStudent->admission_number}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="25%">Class Name :</td>
                                <td style="border-bottom: 1px solid; width:100%;">{{ $getClass->class_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="margin-bottom" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td width="25%">Exam :</td>
                                <td style="border-bottom: 1px solid; width:100%;">{{ $getExam->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="5%"></td>
                <td width="20%" valign="top">
                    <img style="border-radius:
                     10px ;height:100px;width:100px;" src="{{ $getStudent->getProfile()}}" alt="">
                    <br>
                    Gender : {{ $getStudent->gender}}
                </td>
            </tr>
        </table>

        <br>
        <div class="container">
            <table>
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
                    @foreach($getMarks as $exam)
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
                        <td colspan="2">
                            @php
                            $percentage = ($total_score * 100) / $full_mark;
                            $getGrade=App\Models\MarksGradeModel::getGrade($percentage);

                            @endphp
                            <b>Percentage: {{ round($percentage, 2)}}%</b>
                        </td>
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
    <div>
        <p> facilis provident ut consequuntur fugit consequatur incidunt suscipit veritatis nulla assumenda maxime, iure voluptates eum ab debitis asperiores. Aspernatur incidunt ad dolores veniam recusandae cupiditate ipsam et eligendi, quae, fuga consequuntur repellat corrupti autem accusamus perferendis eum nam? Mollitia totam voluptatibus voluptatem. Pariatur fugit vel ratione repellendus quia iste deserunt, perferendis labore eveniet dicta fuga dolore, enim accusantium tenetur, officia adipisci sequi dolorem nesciunt dignissimos ducimus delectus rem dolores totam repudiandae. In vitae odit alias vero modi magnam, minus beatae rem doloremque nemo perspiciatis, quod illo iste libero!</p>

    </div>

    <table class="margin-bottom" style="width: 100%;">
        <tbody>
            <tr>
                <td width="27%">Signature :</td>
                <td style="border-bottom: 1px solid; width:50%;"></td>
            </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        // window.print();
    </script>
</body>

</html>