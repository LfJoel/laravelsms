<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExaminationModel;
use Auth;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;

class ExaminationController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ExaminationModel::getRecord();
        $data['header_title'] = "Exam List";
        return view('admin.examinations.exam.list', $data);
    }
    public function exam_add()
    {
        $data['header_title'] = "Add New Exam";
        return view('admin.examinations.exam.add', $data);
    }
    public function exam_insert(Request $request)
    {

        // dd()
        $exam = new ExaminationModel;

        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();


        return redirect('admin/examinations/exam/list')->with('success', 'Exam Successfully Created');
    }

    public function exam_edit($id)
    {

        $data['getRecord'] = ExaminationModel::getSingle($id);
        if (!empty($data['getRecord'])) {

            $data['header_title'] = "Edit Exam";
            return view('admin.examinations.exam.edit', $data);
        } else {
            abort(404);
        }
    }

    public function  exam_update($id, Request $request)
    {

        $exam = ExaminationModel::getsingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', 'Exam successfully updated.');
    }
    public function exam_delete($id)
    {

        $getRecord = ExaminationModel::getsingle($id);

        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', 'Exam successfully deleted.');
        } else {
            return redirect()->back()->with('error', 'Exam not deleted.');
        }
    }

    // exam_schedule menu functions


    public function exam_schedule(Request $request)
    {

        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExaminationModel::getExam();

        $result = array();
        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {

            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            foreach ($getSubject as $value) {

                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;

                $ExamSchedule = ExamScheduleModel::getSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);

                if (!empty($ExamSchedule)) {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;

                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] =  $ExamSchedule->end_time;
                    $dataS['room_number'] = $ExamSchedule->room_number;
                    $dataS['full_marks'] =  $ExamSchedule->full_marks;
                    $dataS['passing_mark'] =  $ExamSchedule->passing_mark;
                } else {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_mark'] = '';
                }

                $result[] = $dataS;
            }
        }
        $data['getRecord'] = $result;


        return view('admin.examinations.exam_schedule', $data);
    }


    public function exam_schedule_insert(Request $request)
    {

        ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);

        if (!empty($request->schedule)) {

            foreach ($request->schedule as $Schedule) {
                if (
                    !empty($Schedule['subject_id']) && !empty($Schedule['exam_date']) &&
                    !empty($Schedule['start_time']) && !empty($Schedule['end_time']) &&
                    !empty($Schedule['room_number']) && !empty($Schedule['full_marks']) &&
                    !empty($Schedule['passing_mark'])
                ) {
                    $exam_schedule = new ExamScheduleModel;
                    $exam_schedule->exam_id = $request->exam_id;
                    $exam_schedule->class_id = $request->class_id;
                    $exam_schedule->subject_id = $Schedule['subject_id'];
                    $exam_schedule->exam_date = $Schedule['exam_date'];
                    $exam_schedule->start_time = $Schedule['start_time'];
                    $exam_schedule->end_time = $Schedule['end_time'];
                    $exam_schedule->room_number = $Schedule['room_number'];
                    $exam_schedule->full_marks = $Schedule['full_marks'];
                    $exam_schedule->passing_mark = $Schedule['passing_mark'];
                    $exam_schedule->created_by = Auth::user()->id;

                    $exam_schedule->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Exam Schedule Successfully Saved.');
    }


    // student side function 
    public function MyExamTimetable(Request $request)
    {

        $class_id = Auth::user()->class_id;


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
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Timetable";
        return view('student.my_exam_timetable', $data);
    }


    // teacher side function MyExamTimetableTeacher

    public function MyExamTimetableTeacher()
    {

        $getClass =  AssignClassTeacherModel::getClassSubjectGroup(Auth::user()->id);

        $result = array();
        foreach ($getClass as $class) {

            $dataC = array();
            $dataC['class_name'] = $class->class_name;
            $getExam = ExamScheduleModel::getExam($class->class_id);

            $examArray = array();
            foreach ($getExam  as $exam) {
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;

                $getExamTimetable = ExamScheduleModel::getExamTimetable($exam->exam_id, $class->class_id);

                $subjectArray = array();
                foreach ($getExamTimetable  as $valueS) {

                    $dataS = array();
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] =  $valueS->exam_date;
                    $dataS['start_time'] =  $valueS->start_time;
                    $dataS['end_time'] =  $valueS->end_time;
                    $dataS['room_number'] =  $valueS->room_number;
                    $dataS['full_marks'] =  $valueS->full_marks;
                    $dataS['passing_mark'] = $valueS->passing_mark;
                    $subjectArray[] = $dataS;
                }
                $dataE['subject'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;
            $result[] = $dataC;
        }

        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Timetable";
        return view('teacher.my_exam_timetable', $data);
    }


    // parent side function ParentViewExamTimetable

    public function ParentViewExamTimetable($student_id)
    {

$getStudent = User::getSingle($student_id);
        $class_id = $getStudent->class_id;
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
        $data['getRecord'] = $result;
        $data['getStudent'] =$getStudent ;
        $data['header_title'] = "Exam Timetable";
        return view('parent.exam_timetable', $data);
    }
}
