@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection
@section('content')
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">My Timetable</h3>
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
@foreach($getRecord as $value)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $value['name'] }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Week</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($value['week'] as  $valueW)
                                <tr>
                                    <td>{{ $valueW['week_name']}}</td>
                                    <td>{{ !empty($valueW['start_time']) ? date('h:i A' , strtotime($valueW['start_time'])) : ''}}</td>
                                    <td>{{ !empty( $valueW['end_time']) ? date('h:i A' , strtotime( $valueW['end_time'])) : ''}}</td>
                                    <td>{{ $valueW['room_number']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
      @endforeach

            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

@endsection


@section('script')


<script type="text/javascript">
    $(document).ready(function() {
        $('.getClass').change(function() {
            var class_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/class_time_table/get_subject')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.getSubject').html(response.html);

                },

            });

        });
    });
</script>

@endsection