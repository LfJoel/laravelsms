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
                            <h3 class="mb-0">Edit Exam</h3>
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
                                        Edit Exam
                                    </div>
                                </div>
                                <form method="post" action="">
                                    {{csrf_field()}}
                                <div class="card-body">
                                    <div class="mb-3">
                                            <label class="form-label">Grade Name</label>
                                            <input type="name" name="name" class="form-control"  value="{{ old('name',$getRecord->name) }}">
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Percent From</label>
                                            <input type="number" name="percent_from" class="form-control" value="{{ old('percent_from',$getRecord->percent_from) }}" placeholder="Percent From">
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Percent To</label>
                                            <input type="number" name="percent_to" class="form-control" value="{{ old('percent_to',$getRecord->percent_to) }}" placeholder="Percent To">
                                            
                                        </div>
                                        <div class="card-footer text-center p-4">
                                        <button type="submit" class="btn btn-success">Update</button>
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