<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fa-solid fa-search"></i>
                </a>
            </li>
            <!--end::Navbar Search-->

            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="fa-regular fa-comments"></i>
                    <span class="navbar-badge badge text-bg-danger">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="../../dist/assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3">
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-end fs-7 text-danger"><i class="fa-solid fa-star"></i></span>
                                </h3>
                                <p class="fs-7">Call me whenever you can...</p>
                                <p class="fs-7 text-secondary">
                                    <i class="fa-regular fa-clock me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                        <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="../../dist/assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3">
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-end fs-7 text-secondary">
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                </h3>
                                <p class="fs-7">I got your message bro</p>
                                <p class="fs-7 text-secondary">
                                    <i class="fa-regular fa-clock me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                        <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="../../dist/assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 rounded-circle me-3">
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-end fs-7 text-warning">
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                </h3>
                                <p class="fs-7">The subject goes here</p>
                                <p class="fs-7 text-secondary">
                                    <i class="fa-regular fa-clock me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                        <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('chat') }}" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!--end::Messages Dropdown Menu-->

            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="fa-regular fa-bell"></i>
                    <span class="navbar-badge badge text-bg-warning">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa-solid fa-envelope me-2"></i> 4 new messages
                        <span class="float-end text-secondary fs-7">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa-solid fa-users me-2"></i> 8 friend requests
                        <span class="float-end text-secondary fs-7">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa-solid fa-file me-2"></i> 3 new reports
                        <span class="float-end text-secondary fs-7">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">
                        See All Notifications
                    </a>
                </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img src="" alt="Logo" class="brand-image opacity-75 shadow">
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">School</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img src="" alt="Logo" class="round opacity-75 shadow">
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">{{ Auth::user()->name}}</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav nav-pills sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                @if(Auth::user()->user_type ==1)
                <li class="nav-item ">
                    <a href="{{url('admin/dashboard')}}" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('admin/admin/list')}}" class="nav-link   @if(Request::segment(2) == 'admin') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('admin/teacher/list')}}" class="nav-link   @if(Request::segment(2) == 'teacher') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Teacher
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('admin/student/list')}}" class="nav-link   @if(Request::segment(2) == 'student') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Student
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('admin/parent/list')}}" class="nav-link   @if(Request::segment(2) == 'parent') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Parent
                        </p>
                    </a>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'class' || Request::segment(2) == 'class_time_table' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher' || Request::segment(2) == 'class_time_table' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                            Academics
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/class/list')}}" class="nav-link @if(Request::segment(2) == 'class') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Class</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/subject/list')}}" class="nav-link @if(Request::segment(2) == 'subject') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/assign_subject/list')}}" class="nav-link @if(Request::segment(2) == 'assign_subject') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Assign Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/assign_class_teacher/list')}}" class="nav-link @if(Request::segment(2) == 'assign_class_teacher') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Assign Class Teacher</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/class_time_table/list')}}" class="nav-link @if(Request::segment(2) == 'class_time_table') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Class Time Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'fees_collection') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'fees_collection' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                            Fees Collection
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/fees_collection/collect_fees')}}" class="nav-link @if(Request::segment(3) == 'collect_fees') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Collect Fees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/fees_collection/collect_fees_report')}}" class="nav-link @if(Request::segment(3) == 'collect_fees_report') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Collect Fees Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'examinations') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'class' || Request::segment(2) == 'examinations' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                            Examinations
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/examinations/exam/list')}}" class="nav-link @if(Request::segment(3) == 'exam') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Exam List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/examinations/exam_schedule')}}" class="nav-link @if(Request::segment(3) == 'exam_schedule') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Exam Schedule</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/examinations/marks_register')}}" class="nav-link @if(Request::segment(3) == 'marks_register') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Marks Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/examinations/marks_grade/list')}}" class="nav-link @if(Request::segment(3) == 'marks_grade') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Marks Grade</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'attendance' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                            Attendance
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/attendance/student')}}" class="nav-link @if(Request::segment(3) == 'student') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Student Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/attendance/report')}}" class="nav-link @if(Request::segment(3) == 'report') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Attendance Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'communicate') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'communicate' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                            Communicate
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/communicate/notice_board')}}" class="nav-link @if(Request::segment(3) == 'notice_board') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Notice Board</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/communicate/send_email')}}" class="nav-link @if(Request::segment(3) == 'send_email') active @endif">
                                <i class="nav-icon fa-solid fa-dashboard"></i>
                                <p>
                                    Send Email
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'homework' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                        Homework
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/homework/homework')}}" class="nav-link @if(Request::segment(3) == 'homework') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Homework</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/homework/homework_report')}}" class="nav-link @if(Request::segment(3) == 'homework_report') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Homework Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{url('admin/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Account
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('admin/setting')}}" class="nav-link @if(Request::segment(2) == 'setting') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('admin/change_password/')}}" class="nav-link   @if(Request::segment(2) == 'change_password') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                @elseif(Auth::user()->user_type ==2)
                <li class="nav-item ">
                    <a href="{{url('teacher/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('teacher/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Account
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('teacher/my_class_subject')}}" class="nav-link @if(Request::segment(2) == 'my_class_subject') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Class & Subject
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('teacher/teacher_my_students')}}" class="nav-link @if(Request::segment(2) == 'teacher_my_students') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Students
                        </p>
                    </a>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'homework' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                        Homework
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('teacher/homework/homework')}}" class="nav-link @if(Request::segment(3) == 'homework') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Homework</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{url('teacher/mark_register')}}" class="nav-link @if(Request::segment(2) == 'mark_register') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Mark Register
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('teacher/my_calendar')}}" class="nav-link @if(Request::segment(2) == 'my_calendar') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Calendar
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('teacher/my_exam_timetable')}}" class="nav-link @if(Request::segment(2) == 'my_timetable') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Exam Timetable
                        </p>
                    </a>
                </li>
                <li class="nav-item  @if(Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Request::segment(2) == 'attendance' ) active @endif">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                            Attendance
                            <i class="nav-arrow fa-solid fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('teacher/attendance/student')}}" class="nav-link @if(Request::segment(3) == 'student') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Student Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('teacher/attendance/report')}}" class="nav-link @if(Request::segment(3) == 'report') active @endif">
                                <i class="nav-icon fa-regular fa-circle"></i>
                                <p>Attendance Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('teacher/my_notice_board')}}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
                        <i class="nav-icon fa-regular fa-circle"></i>
                        <p>My Notice Board</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('teacher/change_password/')}}" class="nav-link   @if(Request::segment(2) == 'change_password') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                @elseif(Auth::user()->user_type ==3)
                <li class="nav-item">
                    <a href="{{url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/account')}}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Account
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/my_subject')}}" class="nav-link @if(Request::segment(2) == 'my_subject') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Subject
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/my_homework')}}" class="nav-link @if(Request::segment(2) == 'my_homework') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Homework
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/my_submitted_homework')}}" class="nav-link @if(Request::segment(2) == 'my_submitted_homework') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Submitted Homework
                        </p>
                    </a>
                </li>
           
                <li class="nav-item ">
                    <a href="{{url('student/my_calendar')}}" class="nav-link @if(Request::segment(2) == 'my_calendar') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Calendar
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/my_timetable')}}" class="nav-link @if(Request::segment(2) == 'my_timetable') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Timetable
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/my_attendance')}}" class="nav-link @if(Request::segment(2) == 'my_attendance') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Attendance
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('student/my_notice_board')}}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
                        <i class="nav-icon fa-regular fa-circle"></i>
                        <p>My Notice Board</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{url('student/my_exam_results')}}" class="nav-link @if(Request::segment(2) == 'my_exam_results') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Exam Results
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/my_exam_timetable')}}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Exam Timetable
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/fees')}}" class="nav-link @if(Request::segment(2) == 'fees') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Payment
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('student/change_password/')}}" class="nav-link   @if(Request::segment(2) == 'change_password') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                @elseif(Auth::user()->user_type ==4)
                <li class="nav-item">
                    <a href="{{url('parent/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('parent/account')}}" class="nav-link @if(Request::segment(2) == 'parent') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Account
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('parent/my_student')}}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
                        <i class="nav-icon fa-solid fa-dashboard"></i>
                        <p>
                            My Student
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('parent/my_notice_board')}}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
                        <i class="nav-icon fa-regular fa-circle"></i>
                        <p>My Notice Board</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('parent/my_student_notice_board')}}" class="nav-link @if(Request::segment(2) == 'my_student_notice_board') active @endif">
                        <i class="nav-icon fa-regular fa-circle"></i>
                        <p>My Student Notice Board</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('parent/change_password/')}}" class="nav-link   @if(Request::segment(2) == 'change_password') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{url('logout')}}" class="nav-link  @if(Request::segment(1) == 'logout') active @endif">
                        <i class="nav-icon fa-solid fa-sign-out"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->