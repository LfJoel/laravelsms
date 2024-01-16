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
                    <h3 class="mb-0">New Homework</h3>
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
                    <!-- general form elements --> @include('_message')
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="card-title">
                                Add New Homework
                            </div>
                        </div>

                        <form method="post" action=""  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="mb-3">
                                    <label >Class</label>
                                    <select name="class_id" id="getClass" class="form-control" required>
                                        <option value="">Select</option>
                                        @foreach($getClass as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label >Subject</label>
                                    <select id="getSubject" name="subject_id" class="form-control" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Homework Date</label>
                                    <input type="date" name="homework_date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Submission Date</label>
                                    <input type="date" name="submission_date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Document</label>
                                    <input type="file" name="document_file" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description:</label>
                                    <textarea id="editor" style="width: 100%;" name="description"></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Send</button>
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
@section('script')
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
                $('#editor').summernote();
                $('#getClass').change(function() {
                        var class_id = $(this).val();

                        $.ajax({
                                type: "POST",
                                url: "{{ url('admin/ajax_get_subject')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    class_id: class_id,
                                },
                                    dataType: "json",
                                    success: function(data) {
                                        $('#getSubject').html(data.success);
                                    }
                                });
                        });
                });
</script>
@endsection