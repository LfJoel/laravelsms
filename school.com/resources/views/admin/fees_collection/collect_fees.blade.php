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
                <div class="col-sm-12">
                    <h3 class="mb-0">Collect Fees</h3>
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
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Class Name</label>
                                    <select class="form-control" name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach($getClass as $class)
                                        <option {{ (Request::get('class_id')== $class->id)? 'selected' : '' }} value="{{ $class->id}}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <label>Student First Name</label>
                                    <input type="text" name="first_name" value="{{ Request::get('first_name')}}" class="form-control mb-2" placeholder="first name">
                                </div>
                                <div class="col-auto">
                                    <label>Student Last Name</label>
                                    <input type="text" name="last_name" value="{{ Request::get('last_name')}}" class="form-control mb-2" placeholder="last name">
                                </div>
                                <div class="col-auto">
                                    <label>Student ID</label>
                                    <input type="text" name="student_id" value="{{ Request::get('student_id')}}" class="form-control mb-2" placeholder="ID">
                                </div>
                                <div class="row pt-4">
                                    <div class="col-auto">
                                        <button class="btn btn-primary mb-2">Search</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/fees_collection/collect_fees')}}" class="btn btn-danger mb-2">Reset</a>
                                    </div>
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
                                        <th>Class Name</th>
                                        <th>Total Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Remaining Amount</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($getRecord))
                                    @forelse($getRecord as $value)
                                    @php
                                    $paid_amount = $value->getPaidAmount($value->id,$value->class_id);
                                    $remaining_mount = $value->amount - $paid_amount;

                                    @endphp
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}} {{$value->last_name}}</td>
                                        <td>{{$value->class_name}}</td>
                                        <td>${{number_format(($value->amount),2) }}</td>
                                        <td>${{number_format($paid_amount,2) }}</td>
                                        <td>${{number_format($remaining_mount,2) }}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/fees_collection/collect_fees/add_fees/'.$value->id)}}" class="btn btn-success">Collect Fees</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%">Record Not Found.</td>
                                    </tr>
                                    @endforelse
                                    @else
                                    <tr>
                                        <td colspan="100%">Record Not Found.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div style="padding: 10px;">
                                @if(!empty($getRecord))
                                {{ $getRecord->onEachSide(5)->links() }}
                                @endif
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