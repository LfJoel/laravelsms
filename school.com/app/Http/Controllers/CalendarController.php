<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectTimetableModel;
use Auth;
use App\Models\ExamScheduleModel;
use App\Models\User;
use App\Models\AssignClassTeacherModel;


class CalendarController extends Controller
{
    public function MyCalendar()
    {

        $data['getMyTimetable'] = $this->getTimetable(Auth::user()->class_id); // to get time table separate function called getTimetable

        $data['geExamTimetable'] = $this->geExamTimetable(Auth::user()->class_id); // to get exam time table separate function called getTimetable

        $data['header_title'] = "My Calendar";
        return view('student.my_calendar', $data);
    }

    // parent side 

    public function MyCalendarParent($student_id)
    {

        $getStudent = User::getSingle($student_id);

        $data['getMyTimetable'] = $this->getTimetable($getStudent->class_id); // to get time table separate function called getTimetable
        $data['geExamTimetable'] = $this->geExamTimetable($getStudent->class_id); // to get exam time table separate function called getTimetable

        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Student Calendar";
        return view('parent.my_calendar', $data);
    }

    // teacher side calender

    public function MyCalendarTeacher()
    {

        $getTeacher = Auth::user()->id;

        $data['getClassTimetable']  = AssignClassTeacherModel::getCalendarTeacher($getTeacher);

        $data['header_title'] = "Teacher Calendar";
        return view('teacher.my_calendar', $data);
    }

    public function getTimetable($class_id)
    {
        // time table

        $result = array();

        $getRecord = ClassSubjectModel::MySubject($class_id);
        foreach ($getRecord as $value) {
            $dataS['name'] = $value->subject_name;
            $getWeek = WeekModel::getRecord();
            $week = array();
            foreach ($getWeek as $valueW) {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;
                $dataW['full_calendar_day'] = $valueW->full_calendar_day;

                $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
                if (!empty($ClassSubject)) {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                    $week[] = $dataW;
                }
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }
        return $result;
    }
    public function geExamTimetable($class_id)
    {
        // exam  time table

        $getExam = ExamScheduleModel::getExam($class_id);

        $result = array();
        foreach ($getExam as $value) {

            $dataE = array();
            $dataE['name'] = $value->exam_name;

            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
            $resultS = array();
            foreach ($getExamTimetable  as $valueS) {

                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] =  $valueS->exam_date;
                $dataS['start_time'] =  $valueS->start_time;
                $dataS['end_time'] =  $valueS->end_time;
                $dataS['room_number'] =  $valueS->room_number;
                $dataS['full_marks'] =  $valueS->full_marks;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] = $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }

        return $result;
    }
}
