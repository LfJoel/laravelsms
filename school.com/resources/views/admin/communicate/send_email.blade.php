@extends('layouts.app')
@section('style')

<!-- Bootstrap-select CSS -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-IYsfdsM2qNuYwCx9q6KO2Ki4z46hFQEaFLJ/aEEqBXQmbzKrL6ZbT5ilDqEHQ6E/bFBdBdx2nE9i0pAIlIJbPQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
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
                    <h3 class="mb-0">Send Email</h3>
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
                            Email
                            </div>
                        </div>  
                       
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Subject:</label>
                                    <input type="text" name="subject" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect">User (Parent / Student / Teacher)</label>
                                    <select name="user_id" class="form-control select2" id="exampleSelect" style="width: 100%;">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label">Message To:</label>
                                    <div class="mb-3">
                                        <label style="margin-right: 50px;">
                                            <input type="checkbox" value="3" name="message_to[]">
                                            Student
                                        </label>
                                        <label style="margin-right: 50px;">
                                            <input type="checkbox" value="4" name="message_to[]">
                                            Parent
                                        </label>
                                        <label style="margin-right: 50px;">
                                            <input type="checkbox" value="2" name="message_to[]">
                                            Teacher
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message:</label>
                                        <textarea style="width: 100%;" name="message" id="editor"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> -->

<script type="text/javascript">


$(document).ready(function() {
    $('.select2').select2({
        ajax: {
            url: "{{url('admin/communicate/search_user')}}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
});
    //     $('.select2').select2({
    //     ajax: {
    //         url: "{{url('admin/communicate/search_user')}}",
    //         dataType:'json',
    //         delay: 250,
    //         data: function(data){
    //             return{
    //                 search:data.term,
    //             };
    //         },
    //     },
    //     processResults:function(response){
    //         return{
    //             results:response
    //         };
    //     },
    // });
    
   


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