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
                    <h3 class="mb-0">My Calender</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
                <!-- Start column -->
                <div class="col-md-12">
                    <div id="calendar"></div>
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


<script src="{{ url('public/dist/fullcalendar/index.global.js') }}"></script>


<script type="text/javascript">
    var events = new Array();

    @foreach($getClassTimetable as $value)
    events.push({
        title: "{{ $value->class_name}} - {{ $value->subject_name}} ",
        daysOfWeeks: ["{{$value->full_calendar_day}}"],
        startTime: "{{ $value->start_time }}",
        endTime: "{{ $value->end_time }}",
    });
    @endforeach

    var calendarID = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarID, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '<?= date('Y-m-d') ?>',
        navLinks: true, // can click day/week names to navigate views
        editable: false,
        events:events,
        initialView:'timeGridDay',
    });
    calendar.render();
</script>
@endsection