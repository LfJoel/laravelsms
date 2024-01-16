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
                            <h3 class="mb-0">Add New Admin</h3>
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
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <div class="card-title">
                                        Add New Admin
                                    </div>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="card-body">
                                   <div class="mb-3">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" name="profile_pic" class="form-control">
                                        <div class="text-danger">{{ $errors->first('profile_pic')}}</div>
                                    </div>
                                    <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="name" name="name" class="form-control" value="{{old('name')}}">
                                    
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{old('email')}}">
                                            <div class="text-danger">{{ $errors->first('email')}}</div>
                                            
                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                       
    
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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