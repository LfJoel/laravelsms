<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExaminationModel;
use Auth;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\AssignClassTeacherModel;
use App\Models\MarksGradeModel;
use App\Models\User;
use App\Models\MarksRegisterModel;

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


    public function marks_register(Request $request)
    {

        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExaminationModel::getExam();

        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {

            $data['getSubject']  = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent']  = User::getStudentClass($request->get('class_id'));
        }
        $data['header_title'] = "Marks Register";
        return view('admin.examinations.marks_register', $data);
    }

    // student side function 
    public function MyExamResultPrint(Request $request)
    {
        $exam_id = $request->exam_id;
        $student_id = $request->student_id;
        $data['getExam'] = ExaminationModel::getSingle($exam_id);
        $data['getStudent'] = User::getSingle($student_id);

        $data['getClass'] = MarksRegisterModel::getClass($exam_id, $student_id);
        $getExamSubject = MarksRegisterModel::getExamSubject($exam_id, $student_id);

        $dataSubject = array();

        foreach ($getExamSubject  as $exam) {

            $total_score =  $exam['class_work'] + $exam['test_work'] + $exam['home_work'] + $exam['exam'];
            $dataS = array();
            $dataS['subject_name'] = $exam['subject_name'];
            $dataS['class_work'] = $exam['class_work'];
            $dataS['test_work'] = $exam['test_work'];
            $dataS['home_work'] = $exam['home_work'];
            $dataS['exam'] = $exam['exam'];
            $dataS['total_score'] =  $total_score;
            $dataS['full_marks'] = $exam['full_marks'];
            $dataS['passing_mark'] = $exam['passing_mark'];
            $dataSubject[] = $dataS;
        }
        $data['getMarks'] = $dataSubject;

        return view('print_exam_result', $data);
    }
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
    public function MyExamResultsStudent()
    {

        $result = array();
        $getExam = MarksRegisterModel::getExam(Auth::user()->id);
        foreach ($getExam as $value) {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $dataE['exam_id'] = $value->exam_id;

            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, Auth::user()->id);

            $dataSubject = array();

            foreach ($getExamSubject  as $exam) {

                $total_score =  $exam['class_work'] + $exam['test_work'] + $exam['home_work'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] =  $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;
        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Result";
        return view('student.my_exam_results', $data);
    }

    // teacher side function 

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
    public function mark_register_teachers(Request $request)
    {
        $data['getClass'] =  AssignClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
        $data['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);

        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {

            $data['getSubject']  = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent']  = User::getStudentClass($request->get('class_id'));
        }
        $data['header_title'] = "Marks Register";
        return view('teacher.mark_register', $data);
    }

    // parent side function 

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
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Exam Timetable";
        return view('parent.exam_timetable', $data);
    }

    public function MyStudentExamResultParent($student_id)
    {

        $data['getStudent'] = User::getSingle($student_id);

        $result = array();
        $getExam = MarksRegisterModel::getExam($student_id);
        foreach ($getExam as $value) {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, $student_id);
            $dataSubject = array();

            foreach ($getExamSubject  as $exam) {

                $total_score =  $exam['class_work'] + $exam['test_work'] + $exam['home_work'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] =  $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;
        }
        $data['getRecord'] = $result;
        $data['header_title'] = "Student Exam Result";
        return view('parent.my_student_result', $data);
    }


    // Admin Side function

    // public function submit_marks_register(Request $request)
    // {

    //     $validation = 0;
    //     if (!empty($request->mark)) {

    //         foreach ($request->mark as $mark) {

    //             $class_work = !empty($mars['class_work']) ? $mark['class_work'] : 0;
    //             $home_work = !empty($mark['home_work']) ? $mark['home_work'] : 0;
    //             $test_work = !empty($mark['test_work']) ? $mark['test_work'] : 0;
    //             $exam = !empty($mark['exam']) ? $mark['exam'] : 0;
    //             $subject_id = !empty($mark['subject_id']) ? $mark['subject_id'] : 0;
    //             $full_marks = !empty($mark['full_marks']) ? $mark['full_marks'] : 0;
    //             $passing_mark = !empty($mark['passing_mark']) ? $mark['passing_mark'] : 0;


    //             if($full_marks >= $totsl_mark){
    //                 $getMark = MarksRegisterModel::checkAlreadymark(
    //                     $request->student_id,
    //                     $request->exam_id,
    //                     $request->class_id,
    //                     $subject_id
    //                 );
    //                 if (!empty($getMark)) {
    //                     $save = $getMark;
    //                 } else {
    //                     $save = new MarksRegisterModel;
    //                     $save->created_by = Auth::user()->id;
    //                 }
    //                 $save->student_id = $request->student_id;
    //                 $save->class_id = $request->class_id;
    //                 $save->exam_id = $request->exam_id;
    //                 $save->subject_id = $subject_id;
    //                 $save->class_work = $class_work;
    //                 $save->home_work = $home_work;
    //                 $save->test_work = $test_work;
    //                 $save->exam = $exam;
    //                 $save->full_marks = $full_marks;
    //                 $save->passing_mark = $passing_mark;
    //                 $save->save();
    //             }
    //             else {
    //                 $validation = 1;
    //             }
    //             }
                
    //     } 
    //     $json['message'] = "Mark Register Successfully Saved";

    //     echo json_encode($json);
    // }
    public function single_submit_marks_register(Request $request)
    {

        $id = $request->id;
        $getExamSchedule = ExamScheduleModel::getRecordSingle($id);
        $full_marks = $getExamSchedule->full_marks;
        $class_work = !empty($request->class_work) ? $request->class_work : 0;
        $home_work = !empty($request->home_work) ? $request->home_work : 0;
        $test_work = !empty($request->test_work) ? $request->test_work : 0;
        $exam = !empty($request->exam) ? $request->exam : 0;

        $total_mark = $class_work + $home_work +  $test_work + $exam;
        if ($full_marks >= $total_mark) {
            $getMark = MarksRegisterModel::checkAlreadymark(
                $request->student_id,
                $request->exam_id,
                $request->class_id,
                $request->subject_id
            );

            if (!empty($getMark)) {
                $save = $getMark;
            } else {
                $save = new MarksRegisterModel;
                $save->created_by = Auth::user()->id;
            }
            $save->student_id = $request->student_id;
            $save->class_id = $request->class_id;
            $save->exam_id = $request->exam_id;
            $save->subject_id = $request->subject_id;
            $save->class_work = $class_work;
            $save->home_work = $home_work;
            $save->test_work = $test_work;
            $save->exam = $exam;
            $save->full_marks = $getExamSchedule->full_marks;
            $save->passing_mark = $getExamSchedule->passing_mark;
            $save->save();
            $json['message'] = "Mark Register Successfully Saved";
        } else {
            $json['message'] = "YourTotal Mark is Greater than Full Mark";
        }
        echo json_encode($json);
    }


    //Admin side Mark Grade functions

    public function marks_grade()
    {
        $data['getRecord'] = MarksGradeModel::getRecord();

        $data['header_title'] = "Marks Grade";
        return view('admin.examinations.marks_grade.list', $data);
    }
    public function marks_grade_add()
    {
        $data['header_title'] = "Add New Marks Grade";
        return view('admin.examinations.marks_grade.add', $data);
    }
    public function marks_grade_insert(Request $request)
    {

        $mark_grade = new MarksGradeModel;

        $mark_grade->name = trim($request->name);
        $mark_grade->percent_from = trim($request->percent_from);
        $mark_grade->percent_to = trim($request->percent_to);
        $mark_grade->created_by = Auth::user()->id;
        $mark_grade->save();

        return redirect('admin/examinations/marks_grade/list')->with('success', 'Marks Grade  SuccessFully Created');
    }

    public function marks_grade_edit($id)
    {

        $data['getRecord'] = MarksGradeModel::getsingle($id);
        if (!empty($data)) {
            $data['header_title'] = "Edit Marks Grade";
            return view('admin.examinations.marks_grade.edit', $data);
        } else {
            abort(404);
        }
    }

    public function marks_grade_update($id, Request $request)
    {

        $mark_grade = MarksGradeModel::getsingle($id);
        $mark_grade->name = trim($request->name);
        $mark_grade->percent_from = trim($request->percent_from);
        $mark_grade->percent_to = trim($request->percent_to);
        $mark_grade->save();

        return redirect('admin/examinations/marks_grade/list')->with('success', 'Marks Grade successfully updated.');
    }
    public function marks_grade_delete($id)
    {

        $mark_grade = MarksGradeModel::getsingle($id);
        $mark_grade->delete();

        return redirect('admin/examinations/marks_grade/list')->with('success', 'Marks Grade successfully deleted.');
    }
}
