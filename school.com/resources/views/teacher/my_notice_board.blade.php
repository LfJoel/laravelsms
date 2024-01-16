@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection
@section('content')
<!--begin::App Main-->
<main class="app-main">

    <div class="app-content-header">

        <div class="content-wrpper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>My Notice Board</h1>
                        </div>
                    </div>
                </div>

            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <form method="get">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Title</label>
                                                <input type="text" name="title" value="{{ Request::get('title')}}" class="form-control mb-2" placeholder="title">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Notice Date From</label>
                                                <input type="date" name="notice_date_from" value="{{ Request::get('notice_date_from')}}" class="form-control mb-2" placeholder="Notice Date From">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Notice Date To</label>
                                                <input type="date" name="notice_date_to" value="{{ Request::get('notice_date_to')}}" class="form-control mb-2" placeholder="Notice Date To">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center justify-content-center ">
                                        <div class="col-auto">
                                            <button class="btn btn-primary mb-2">Search</button>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{url('teacher/my_notice_board')}}" class="btn btn-danger mb-2">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">

                            @foreach($getRecord as $value)
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h1 class="card-title">Read Mail</h1>
                                </div>
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between">
                                        <h5>{{ $value->title }}</h5>
                                        <h6>
                                            <span class="float-right">{{ date('d-m-Y',strtotime($value->notice_date))}}</span>
                                        </h6>
                                    </div>
                                    <div class="p-1">
                                        <p>{{$value->message}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-12">
                                {{ $getRecord->onEachSide(5)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</main>
<!--end::App Main-->

@endsection