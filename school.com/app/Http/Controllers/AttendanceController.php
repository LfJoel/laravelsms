<?php

namespace App\Http\Controllers;

use App\Models\AssignClassTeacherModel;
use Auth;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\StudentAttendanceModel;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
  public function AttendanceStudent(Request $request)
  {
    $data['getClass'] = ClassModel::getClass();
    if (!empty($request->get('class_id')) && !empty($request->get('attendance_date'))) {
      $data['getStudent'] = User::getStudentClass($request->get('class_id'));
    }
    $data['header_tile'] = 'Attendance Student';
    return view('admin.attendance.student', $data);
  }

  public function AttendanceStudentSubmit(Request $request)
  {
    $check_attendance = StudentAttendanceModel::CheckAlreadyAttendance($request->student_id, $request->class_id, $request->attendance_date);
    if (!empty($check_attendance)) {
      $attendance = $check_attendance;
    } 
    else {
      $attendance = new StudentAttendanceModel;
      $attendance->student_id = $request->student_id;
      $attendance->class_id = $request->class_id;
      $attendance->attendance_date = $request->attendance_date;
      $attendance->created_by = Auth::user()->id;
    }
    $attendance->attendance_type= $request->attendance_type;
    $attendance->save();

    $json['message'] = 'Attendance Successfullt Saved';
    echo json_encode($json);
  }

  public function AttendanceReport(Request $request)
  {
    $data['getClass'] = ClassModel::getClass();
    $data['getRecord'] = StudentAttendanceModel::getRecord();
    $data['header_tile'] = 'Attendance Report';
    return view('admin.attendance.report', $data);
  }

  // teacher Side Function

  public function AttendanceStudentTeacher(Request $request)
  {
    $data['getClass'] = AssignClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
    
    if (!empty($request->get('class_id')) && !empty($request->get('attendance_date'))) 
    {
      $data['getStudent'] = User::getStudentClass($request->get('class_id'));
    }
    $data['header_tile'] = 'Attendance Student';
    return view('teacher.attendance.student', $data);
  }
  public function AttendanceReportTeacher(Request $request)
  {
    $getClass = AssignClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
    $classarray =array();
    foreach($getClass as $value){
      $classarray[] =$value->class_id;
    }
    $data['getClass'] =$getClass;
    $data['getRecord'] = StudentAttendanceModel::getRecordTeacher($classarray);
    $data['header_tile'] = 'Attendance Report';
    return view('teacher.attendance.report', $data);
  }
  
  // student side function 

  public function StudentMyAttendance(){

    $data['getClass'] = StudentAttendanceModel::getClassStudent(Auth::user()->id);
    $data['getRecord'] = StudentAttendanceModel::getRecordStudent(Auth::user()->id);
    $data['header_tile'] = 'My Attendance';
    return view('student.my_attendance', $data);
  }

  //parent side function

  public function MyStudentAttendanceParent($student_id){


    $data['getStudent'] = user::getSingle($student_id);
    $data['getClass'] = StudentAttendanceModel::getClassStudent($student_id);
    $data['getRecord'] = StudentAttendanceModel::getRecordStudent($student_id);
    $data['header_tile'] = 'Student Attendance';
    return view('parent.my_attendance', $data);
  }
  
}
