@extends('layouts.app')
    @section('style')
    <style type="text/css">
        </style>
        @endsection
     @section('content')
     <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">My Account</h3>
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
                    <div class="row g-4">
                        <!-- Start column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            @include('_message')
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <div class="card-title">
                                        My Account
                                    </div>
                                </div>
                                <form method="post" action="">
                                    {{csrf_field()}}
                                <div class="card-body">
                                    <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="name" name="name" class="form-control"  value="{{ old('name',$getRecord->name) }}">
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="name" name="last_name" class="form-control"  value="{{ old('last_name',$getRecord->last_name) }}">
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{ old('email',$getRecord->email) }}">
                                            <div class="text-danger">{{ $errors->first('email')}}</div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>


@endsection