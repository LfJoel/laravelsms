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

            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Homework</h3>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('teacher/homework/homework/add')}}" class="btn btn-primary mb-0">Add New Homework</a>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <label>Class</label>
                                        <input type="text" name="class_name" value="{{ Request::get('class_name')}}" class="form-control mb-2" placeholder="Class Name">
                                    </div>
                                    <div class="col-auto">
                                        <label>Subject</label>
                                        <input type="text" name="subject_name" value="{{ Request::get('subject_name')}}" class="form-control mb-2" placeholder="Subject Name">
                                    </div>
                                    <div class="col-auto">
                                        <label>From Homework Date</label>
                                        <input type="date" name="from_homework_date" value="{{ Request::get('from_homework_date')}}" class="form-control mb-2">
                                    </div>
                                    <div class="col-auto">
                                        <label>To Homework Date</label>
                                        <input type="date" name="to_homework_date" value="{{ Request::get('to_homework_date')}}" class="form-control mb-2">
                                    </div>
                                    <div class="col-auto">
                                        <label>From Submission Date</label>
                                        <input type="date" name="from_submission_date" value="{{ Request::get('from_submission_date')}}" class="form-control mb-2">
                                    </div>
                                    <div class="col-auto">
                                        <label>From Submission Date</label>
                                        <input type="date" name="to_submission_date" value="{{ Request::get('to_submission_date')}}" class="form-control mb-2">
                                    </div>
                                    <div class="col-auto">
                                        <label>From Created Date</label>
                                        <input type="date" name="from_created_at" value="{{ Request::get('from_created_at')}}" class="form-control mb-2">
                                    </div>
                                    <div class="col-auto">
                                        <label>To Created Date</label>
                                        <input type="date" name="to_created_at" value="{{ Request::get('to_created_at')}}" class="form-control mb-2">
                                    </div>
                                
                                    

                                </div>

                            </div>
                            <div class="row align-items-center justify-content-center">
                                        <div class="col-auto">
                                        <button class="btn btn-primary mb-2">Search </button>
                                            <a href="{{url('teacher/homework/homework')}}" class="btn btn-danger mb-2">Reset</a>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Homework</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Homework Date</th>
                                        <th>Submission Date</th>
                                        <th>Document</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{$value->class_name }}</td>
                                        <td>{{$value->subject_name }}</td>
                                        <td>{{date('d-m-Y', strtotime($value->homework_date)) }}</td>
                                        <td>{{date('d-m-Y', strtotime($value->submission_date)) }}</td>
                                        <td>
                                            @if(!empty($value->getDocument()))
                                            <a href="{{ $value->getDocument()}}" class="btn btn-primary btn-sm" download="">Download</a>
                                            @endif
                                        </td>
                                        <td>{{ $value->created_by_name}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('teacher/homework/homework/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{url('teacher/homework/homework/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="{{url('teacher/homework/homework/submitted/'.$value->id)}}" class="btn btn-success btn-sm">Submitted Homework</a>

                                        </td>
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