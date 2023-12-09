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
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <div class="card-title">
                                        Add New Class
                                    </div>
                                </div>
                                <form method="post" action="">
                                    {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                            <label class="form-label">Class Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="class name">
                                            
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Amount ($)</label>
                                            <input type="number" name="amount" class="form-control" placeholder="amount">
                                            
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" >Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0">Active</option>
                                                <option value="1">InActive</option>
                                            </select>
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