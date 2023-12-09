<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimeTableController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CommunicateController;
use App\Http\Controllers\FeesCollectionController;
use App\Http\Controllers\HomeworkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Login

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot_password', [AuthController::class, 'forgotpassword']);
Route::post('forgot_password', [AuthController::class, 'postforgotpassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'postreset']);



//Dashboard


// Teacher
Route::group(['middleware' => 'teacher'], function () {

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('teacher/change_password/', [UserController::class, 'change_password']);
    Route::post('teacher/change_password/', [UserController::class, 'Update_change_password']);
    Route::get('teacher/account', [UserController::class, 'MyAccount']);
    Route::post('teacher/account', [UserController::class, 'UpdateMyAccountTeacher']);
    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);
    Route::get('teacher/teacher_my_students', [StudentController::class, 'TeacherMyStudents']);

    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}', [ClassTimeTableController::class, 'MyTimetableTeacher']);
    Route::get('teacher/my_exam_timetable', [ExaminationController::class, 'MyExamTimetableTeacher']);

    Route::get('teacher/my_calendar', [CalendarController::class, 'MyCalendarTeacher']);

    Route::get('teacher/mark_register', [ExaminationController::class, 'mark_register_teachers']);
    Route::post('teacher/submit_marks_register', [ExaminationController::class, 'submit_marks_register']);
    Route::post('teacher/single_submit_marks_register', [ExaminationController::class, 'single_submit_marks_register']);

    //Attendance
    Route::get('teacher/attendance/student', [AttendanceController::class, 'AttendanceStudentTeacher']);
    Route::post('teacher/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);

    //Attendance Report 
    Route::get('teacher/attendance/report', [AttendanceController::class, 'AttendanceReportTeacher']);

    //notice board
    Route::get('teacher/my_notice_board', [CommunicateController::class, 'TeacherMyNoticeBoard']);

    //Homework
    Route::get('teacher/homework/homework', [HomeworkController::class, 'TeacherHomework']);
    Route::get('teacher/homework/homework/add', [HomeworkController::class, 'TeacherAdd']);
    Route::post('teacher/homework/homework/add', [HomeworkController::class, 'TeacherInsert']);
    Route::get('teacher/homework/homework/edit/{id}', [HomeworkController::class, 'TeacherEdit']);
    Route::post('teacher/homework/homework/edit/{id}', [HomeworkController::class, 'TeacherUpdate']);
    Route::get('teacher/homework/homework/delete/{id}', [HomeworkController::class, 'Delete']);
    Route::post('teacher/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);

    Route::get('teacher/homework/homework/submitted/{id}', [HomeworkController::class, 'SubmittedTeacher']);
});

// student

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('student/change_password/', [UserController::class, 'change_password']);
    Route::post('student/change_password/', [UserController::class, 'Update_change_password']);
    Route::get('student/account', [UserController::class, 'MyAccount']);
    Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);
    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);
    Route::get('student/my_timetable', [ClassTimeTableController::class, 'MyTimetable']);
    Route::get('student/my_exam_timetable', [ExaminationController::class, 'MyExamTimetable']);
    Route::get('student/my_calendar', [CalendarController::class, 'MyCalendar']);
    Route::get('student/my_exam_results', [ExaminationController::class, 'MyExamResultsStudent']);

    Route::get('student/my_attendance', [AttendanceController::class, 'StudentMyAttendance']);

    Route::get('student/my_notice_board', [CommunicateController::class, 'StudentMyNoticeBoard']);
    Route::get('student/my_homework', [HomeworkController::class, 'StudentHomework']);

    Route::get('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomework']);
    Route::post('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'InsertSubmitHomework']);
    Route::get('student/my_submitted_homework', [HomeworkController::class, 'MySubmittedHomeworkStudent']);
   
    Route::get('student/fees', [FeesCollectionController::class, 'StudentPayment']);
    Route::post('student/fees', [FeesCollectionController::class, 'StudentPaymentInsert']);

    Route::get('student/paypal/payment-error', [FeesCollectionController::class, 'PaymentError']);
    Route::get('student/paypal/payment-success', [FeesCollectionController::class, 'PaymentSuccess']);


    Route::get('student/stripe/payment-error', [FeesCollectionController::class, 'PaymentError']);
    Route::get('student/stripe/payment-success', [FeesCollectionController::class, 'PaymentSuccessStripe']);

    Route::get(' student/my_exam_results/print', [ExaminationController::class, 'MyExamResultPrint']);


});

// parent

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('parent/change_password/', [UserController::class, 'change_password']);
    Route::post('parent/change_password/', [UserController::class, 'Update_change_password']);
    Route::get('parent/account', [UserController::class, 'MyAccount']);
    Route::post('parent/account', [UserController::class, 'UpdateMyAccountParent']);
    Route::get('parent/my_student', [ParentController::class, 'MyStudentParent']);
    Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'ParentViewSubject']);


    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}', [ClassTimeTableController::class, 'MyTimetableParent']);

    Route::get('parent/my_student/exam_timetable/{student_id}', [ExaminationController::class, 'ParentViewExamTimetable']);

    Route::get('parent/my_student/calendar/{student_id}', [CalendarController::class, 'MyCalendarParent']);

    Route::get('parent/my_student/exam_result/{student_id}', [ExaminationController::class, 'MyStudentExamResultParent']);
    Route::get(' parent/my_student/attendance/{student_id}', [AttendanceController::class, 'MyStudentAttendanceParent']);

    //notice board
    Route::get('parent/my_notice_board', [CommunicateController::class, 'ParentMyNoticeBoard']);
    Route::get('parent/my_student_notice_board', [CommunicateController::class, 'ParentMyStudentNoticeBoard']);

    Route::get('parent/my_student/homework/{id}', [HomeworkController::class, 'ParentMyStudentHomework']);
    Route::get('parent/my_student/submitted_homework/{id}', [HomeworkController::class, 'ParentMyStudentSubmittedHomework']);
    
    Route::get('parent/my_student/fees_collection/{student_id}', [FeesCollectionController::class, 'ParentMyStudentPayFee']);

    Route::post('parent/my_student/fees_collection/{student_id}', [FeesCollectionController::class, 'ParentStudentPayment']);

    Route::get('parent/paypal/payment-error/{student_id}', [FeesCollectionController::class, 'ParentPaymentError']);
    Route::get('parent/paypal/payment-success/{student_id}', [FeesCollectionController::class, 'ParentPaymentSuccess']);

    Route::get('parent/stripe/payment-error/{student_id}', [FeesCollectionController::class, 'ParentPaymentError']);
    Route::get('parent/stripe/payment-success/{student_id}', [FeesCollectionController::class, 'PaymentSuccessStripeParent']);
});


//Admin 

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/account', [UserController::class, 'MyAccount']);
    Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);
    Route::get('admin/change_password/', [UserController::class, 'change_password']);
    Route::post('admin/change_password/', [UserController::class, 'Update_change_password']);
    //setting
    Route::get('admin/setting', [UserController::class, 'MySetting']);
    Route::post('admin/setting', [UserController::class, 'UpdateMySetting']);


    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'adminAdd']);
    Route::post('admin/admin/add', [AdminController::class, 'NewadminAdd']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);

    Route::get('admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);

    //class url
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);

    //subject url

    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);


    //assign subject url

    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);

    // Class Time Table

    Route::get('admin/class_time_table/list', [ClassTimeTableController::class, 'list']);
    Route::post('admin/class_time_table/get_subject', [ClassTimeTableController::class, 'get_subject']);
    Route::post('admin/class_time_table/add', [ClassTimeTableController::class, 'insert_update']);


    //Assign Class To teacher

    Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);
    Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
    Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);



    //student

    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);

    //parent

    Route::get('admin/parent/list', [ParentController::class, 'list']);
    Route::get('admin/parent/add', [ParentController::class, 'add']);
    Route::post('admin/parent/add', [ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
    Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/my-child/{id}', [ParentController::class, 'myChild']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'AssignStudentParentDelete']);

    // Examinations

    Route::get('admin/examinations/exam/list', [ExaminationController::class, 'list']);
    Route::get('admin/examinations/exam/add', [ExaminationController::class, 'exam_add']);
    Route::post('admin/examinations/exam/add', [ExaminationController::class, 'exam_insert']);
    Route::get('admin/examinations/exam/edit/{id}', [ExaminationController::class, 'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}', [ExaminationController::class, 'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationController::class, 'exam_delete']);

    Route::get('admin/examinations/exam_schedule', [ExaminationController::class, 'exam_schedule']);

    Route::post('admin/examinations/exam_schedule_insert', [ExaminationController::class, 'exam_schedule_insert']);

    Route::get('admin/examinations/marks_register', [ExaminationController::class, 'marks_register']);
    // Route::post('admin/examinations/submit_marks_register', [ExaminationController::class, 'submit_marks_register']);
    Route::post('admin/examinations/single_submit_marks_register', [ExaminationController::class, 'single_submit_marks_register']);


    //Mark Grade 

    Route::get('admin/examinations/marks_grade/list', [ExaminationController::class, 'marks_grade']);
    Route::get('admin/examinations/marks_grade/add', [ExaminationController::class, 'marks_grade_add']);
    Route::post('admin/examinations/marks_grade/add', [ExaminationController::class, 'marks_grade_insert']);
    Route::get('admin/examinations/marks_grade/edit/{id}', [ExaminationController::class, 'marks_grade_edit']);
    Route::get('admin/examinations/marks_grade/delete/{id}', [ExaminationController::class, 'marks_grade_delete']);
    Route::post('admin/examinations/marks_grade/edit/{id}', [ExaminationController::class, 'marks_grade_update']);


    //Attendance
    Route::get('admin/attendance/student', [AttendanceController::class, 'AttendanceStudent']);
    Route::post('admin/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);

    //Attendance Report 
    Route::get('admin/attendance/report', [AttendanceController::class, 'AttendanceReport']);

    //Communicate
    Route::get('admin/communicate/notice_board', [CommunicateController::class, 'NoticeBoard']);
    Route::get('admin/communicate/notice_board/add', [CommunicateController::class, 'AddNoticeBoard']);
    Route::post('admin/communicate/notice_board/add', [CommunicateController::class, 'InsertNoticeBoard']);
    Route::get('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'EditNoticeBoard']);
    Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'UpdateNoticeBoard']);
    Route::get('admin/communicate/notice_board/delete/{id}', [CommunicateController::class, 'NoticeBoardDelete']);


    //Send Email
    Route::get('admin/communicate/send_email', [CommunicateController::class, 'SendEmail']);
    Route::get('admin/communicate/search_user', [CommunicateController::class, 'SearchUser']);
    Route::post('admin/communicate/send_email', [CommunicateController::class, 'SendEmailUser']);

    //Homework
    Route::get('admin/homework/homework', [HomeworkController::class, 'Homework']);
    Route::get('admin/homework/homework/add', [HomeworkController::class, 'Add']);
    Route::post('admin/homework/homework/add', [HomeworkController::class, 'Insert']);
    Route::get('admin/homework/homework/edit/{id}', [HomeworkController::class, 'Edit']);
    Route::post('admin/homework/homework/edit/{id}', [HomeworkController::class, 'Update']);
    Route::get('admin/homework/homework/delete/{id}', [HomeworkController::class, 'Delete']);
    Route::post('admin/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject']);
    Route::get('admin/homework/homework/submitted/{id}', [HomeworkController::class, 'Submitted']);
    Route::get('admin/homework/homework_report', [HomeworkController::class, 'HomeworkReport']);

    //Fees Collection
    Route::get('admin/fees_collection/collect_fees', [FeesCollectionController::class, 'collect_fees']);
    Route::get('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_add']);
    Route::post('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_insert']);

    Route::get('admin/fees_collection/collect_fees_report', [FeesCollectionController::class, 'collect_fees_report']);



});
