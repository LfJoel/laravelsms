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
                    <h3 class="mb-0">Fees Report</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">

            <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form method="get">
                        <div class="card-body">
                            <div class="row ">
                                <div class="form-group col-md-2 ">
                                    <label>Class</label>
                                    <select class="form-control" name="class_id" >
                                        <option value="">Select Class Name</option>
                                        @foreach($getClass as $class)
                                        <option {{ (Request::get('class_id') == $class->id ) ?'selected':''}} value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label>Student First Name</label>
                                    <input type="text" name="student_name" value="{{ Request::get('student_name')}}" class="form-control mb-2" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label >Student Last Name</label>
                                    <input type="text" name="student_last_name" value="{{ Request::get('student_last_name')}}" class="form-control mb-2" placeholder="Last Name">
                                </div>
                                <div class="form-group col-md-2">
                                        <label>From Created Date</label>
                                        <input type="date" name="from_created_at" value="{{ Request::get('from_created_at')}}" class="form-control mb-2">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>To Created Date</label>
                                        <input type="date" name="to_created_at" value="{{ Request::get('to_created_at')}}" class="form-control mb-2">
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label>Payment Type</label>
                                    <select class="form-control" name="payment_type">
                                        <option value="">Select</option>
                                        <option {{ (Request::get('payment_type') == 'Paypal' )?'selected':''}} value="Paypal">Paypal</option>
                                        <option {{ (Request::get('payment_type') == 'Stripe' )?'selected':''}} value="Stripe">Stripe</option>
                                        <option {{ (Request::get('payment_type') == 'Cash' )?'selected':''}} value="Paypal">Cash</option>
                                        <option {{ (Request::get('payment_type') == 'Cheque' )?'selected':''}} value="Stripe">Cheque</option>
                                    </select>
                                </div>
                               
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center">
                                <div class=" col-auto ">
                                    <button class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class=" col-auto ">
                                    <a href="{{url('admin/fees_collection/collect_fees_report')}}" class="btn btn-danger mb-2">Reset</a>
                                </div>
                                </div>
                    </form>
                </div>
            </div>
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Fees Report</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Class Name</th>
                                        <th>Total Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Remaining Amount</th>
                                        <th>Payment Type</th>
                                        <th>Remark</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($getRecord))
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->student_name}} {{$value->last_name}}</td>
                                        <td>{{$value->class_name}}</td>
                                        <td>${{number_format(($value->total_amount),2) }}</td>
                                        <td>${{number_format(($value->paid_amount),2) }}</td>
                                        <td>${{number_format(($value->remaining_amount),2) }}</td>
                                        <td>{{$value->payment_type}}</td>
                                        <td>{{$value->remark}}</td>
                                        <td>{{$value->created_by_name}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
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
                                {{ $getRecord->onEachSide(5)->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection