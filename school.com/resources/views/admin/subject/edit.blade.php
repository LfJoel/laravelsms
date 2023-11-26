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
                            <h3 class="mb-0">Edit Subject</h3>
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
                                       Edit Subject
                                    </div>
                                </div>
                                <form method="post" action="">
                                    {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                            <label class="form-label">Subject Name</label>
                                            <input type="text" name="name" class="form-control"  value="{{ $getRecord -> name}}">
                                            
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" >Subject Type </label>
                                            <select class="form-control" name="type" required>
                                                <option value="">Select Type</option>
                                                <option {{ ($getRecord -> type == 'Theory')? 'selected':''}} value="Theory">Theory</option>
                                                <option {{ ($getRecord -> type == 'Practical')? 'selected':''}}  value="Practical">Practical</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" >Status</label>
                                            <select class="form-control" name="status">
                                            <option {{ ( $getRecord->status == 0)? 'selected' : '' }} value="0"> Active</option>
                                                <option {{ ( $getRecord->status == 1)? 'selected' : '' }}  value="1">InActive</option>
                                            </select>
                                        </div>

                                        
            
    
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">update</button>
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