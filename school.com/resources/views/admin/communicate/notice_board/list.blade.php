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
            <div class="col-md-12">
                <div class="card card-primary">
                    <form method="get">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ Request::get('title')}}" class="form-control mb-2" placeholder="title">
                                </div>
                                <div class="col-auto">
                                    <label>Notice Date From</label>
                                    <input type="date" name="notice_date_from" value="{{ Request::get('notice_date_from')}}" class="form-control mb-2" placeholder="Notice Date From">
                                </div>
                                <div class="col-auto">
                                    <label>Notice Date To</label>
                                    <input type="date" name="notice_date_to" value="{{ Request::get('notice_date_to')}}" class="form-control mb-2" placeholder="Notice Date To">
                                </div>
                                <div class="col-auto">
                                    <label>Publish Date From</label>
                                    <input type="date" name="publish_date_from" value="{{ Request::get('publish_date_from')}}" class="form-control mb-2" placeholder="Publish Date From">
                                </div>
                                <div class="col-auto">
                                    <label>Publish Date To</label>
                                    <input type="date" name="publish_date_to" value="{{ Request::get('publish_date_to')}}" class="form-control mb-2" placeholder="Publish Date To">
                                </div>
                                <div class="col-auto">
                                    <label>Message To</label>
                                    <select name="message_to" id="" class="form-control">
                                        <option  value="">Select</option>
                                        <option {{ (Request::get('message_to') == 3) ? 'selected' : ''}} value="3">Student</option>
                                        <option {{ (Request::get('message_to') == 4) ? 'selected' : ''}} value="4">Parent</option>
                                        <option {{(Request::get('message_to') == 2) ? 'selected' : ''}} value="2">Teacher</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="row align-items-center justify-content-center ">
                            <div class="col-auto">
                                <button class="btn btn-primary mb-2">Search</button>
                            </div>
                            <div class="col-auto">
                                <a href="{{url('admin/communicate/notice_board')}}" class="btn btn-danger mb-2">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Notice Board</h3>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/communicate/notice_board/add')}}" class="btn btn-primary mb-0">Add New Notice Board</a>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin List </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Notice Date</th>
                                        <th>Published Date</th>
                                        <th>Message To</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>
                                            {{$value->id}}
                                        </td>
                                        <td>
                                            {{$value->title}}
                                        </td>
                                        <td>{{date('d-m-Y', strtotime($value->notice_date))}}</td>
                                        <td>{{date('d-m-Y', strtotime($value->publish_date))}}</td>
                                        <td>
                                            @foreach($value->getMessage as $message)
                                            @if($message->message_to == 2)
                                            <div>Teacher</div>
                                            @elseif($message->message_to == 3)
                                            <div>Student</div>
                                            @elseif($message->message_to == 4)
                                            <div>Parent</div>
                                            @endif

                                            @endforeach
                                        </td>
                                        <td> {{$value->created_by_name}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/communicate/notice_board/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{url('admin/communicate/notice_board/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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