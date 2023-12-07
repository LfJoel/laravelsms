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
                    <h3 class="mb-0">Add New Notice Board</h3>
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
                                Edit Notice Board
                            </div>
                        </div>
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="name" value="{{ $getRecord->title }}" name="title" class="form-control" required>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Notice Date</label>
                                    <input type="date" value="{{ $getRecord->notice_date }}" name="notice_date" class="form-control" required>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Publish Date</label>
                                    <input type="date" value="{{ $getRecord->publish_date }}" name="publish_date" class="form-control" required>

                                </div>
                                @php
                                $message_to_student = $getRecord->getMessageToSingle($getRecord->id,3);
                                $message_to_parent = $getRecord->getMessageToSingle($getRecord->id,4);
                                $message_to_teacher = $getRecord->getMessageToSingle($getRecord->id,2);
                                @endphp
                                <div class="modal-body">
                                    <label class="form-label">Message To:</label>

                                    <div class="mb-3">
                                        <label style="margin-right: 50px;">
                                            <input type="checkbox" {{ !empty($message_to_student) ? 'checked' :''}} value="3" name="message_to[]">
                                            Student
                                        </label>
                                        <label style="margin-right: 50px;">
                                            <input type="checkbox" {{ !empty($message_to_parent) ? 'checked' :''}} value="4" name="message_to[]">
                                            Parent
                                        </label>
                                        <label style="margin-right: 50px;">
                                            <input type="checkbox" {{ !empty($message_to_teacher) ? 'checked' :''}} value="2" name="message_to[]">
                                            Teacher
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message:</label>
                                        <div id="editor"><textarea name="message">{{ $getRecord->message }}</textarea></div>
                                    </div>
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
@section('script')

<script type="text/javascript">
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['link', 'image', 'video'],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                [{
                    'align': []
                }],
                ['clean']
            ]
        }
    });
</script>
@endsection