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
                            <h3 class="mb-0">Setting</h3>
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
                                <form method="post" action=""  enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="card-body">
                                <div class="mb-3">
                                        <label class="form-label">Fevicon Icon</label>
                                        <input type="file" name="fevicon_icon" class="form-control">
                                        <div class="text-danger">{{ $errors->first('profile_pic')}}</div>
                                        @if(!empty($getRecord->getFevicon()))
                                        <img src="{{ $getRecord->getFevicon() }}" alt="" style="width:100px;">

                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                        <div class="text-danger">{{ $errors->first('profile_pic')}}</div>
                                        @if(!empty($getRecord->getLogo()))
                                        <img src="{{ $getRecord->getLogo() }}" alt="" style="width:100px;">
                                        @endif
                                    </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Paypal Business Email address</label>
                                            <input type="email" name="paypal_email" class="form-control" aria-describedby="emailHelp" value="{{ $getRecord->paypal_email}}" placeholder="Email address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Stripe Public Key</label>
                                            <input type="text" name="stripe_key" class="form-control"  value="{{ $getRecord->stripe_key}}">
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Stripe Secret Key</label>
                                            <input type="text" name="stripe_secret" class="form-control"  value="{{ $getRecord->stripe_secret}}">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
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