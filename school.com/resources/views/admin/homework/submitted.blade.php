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
                    <h3 class="mb-0">Submitted Homework</h3>
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
                                        <label>Student First Name</label>
                                        <input type="text" name="first_name" value="{{ Request::get('first_name')}}" class="form-control mb-2" placeholder="first name">
                                    </div>
                                    <div class="col-auto">
                                        <label>Student Last Name</label>
                                        <input type="text" name="last_name" value="{{ Request::get('last_name')}}" class="form-control mb-2" placeholder="last name">
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
                                    <a href="{{url('admin/homework/homework/submitted/'.$homework_id)}}" class="btn btn-danger mb-2">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Submitted Homework</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Document</th>
                                        <th>Description</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                                        <td> 
                                            @if(!empty($value->getDocument()))
                                            <a href="{{ $value->getDocument()}}" class="btn btn-primary btn-sm" download="">Download</a>
                                            @endif
                                        </td>
                                        <td>{!! $value->description !!}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                   
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