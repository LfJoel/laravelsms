<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use App\Models\AssignClassTeacherModel;
use App\Models\SubmitHomeworkModel;
use App\Models\User;

use Auth;
use Str;

class HomeworkController extends Controller
{

    //parent side function

    public function ParentMyStudentHomework($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $data['getRecord'] = HomeworkModel::getRecordStudent($getStudent->class_id, $getStudent->id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = 'Student Homework';
        return view('parent.homework.list', $data);
    }

    public function ParentMyStudentSubmittedHomework($student_id)
    {
        $getStudent = User::getSingle($student_id);
        $data['getRecord'] = SubmitHomeworkModel::getRecordStudent($getStudent->id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = 'Submitted Homework';
        return view('parent.homework.submitted_homework', $data);
    }

    //student side work

    public function StudentHomework()
    {
        $data['getRecord'] = HomeworkModel::getRecordStudent(Auth::user()->class_id, Auth::user()->id);
        $data['header_title'] = 'Student Homework';
        return view('student.homework.list', $data);
    }
    public function SubmitHomework($homework_id)
    {
        $data['getRecord'] = HomeworkModel::getSingle($homework_id);
        $data['header_title'] = 'Submit Homework';
        return view('student.homework.submit', $data);
    }
    public function InsertSubmitHomework($id, Request $request)
    {

        $submithomework = new SubmitHomeworkModel;
        $submithomework->homework_id = $id;
        $submithomework->student_id = Auth::user()->id;
        $submithomework->description = trim($request->description);
        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework', $filename);
            $submithomework->document_file = $filename;
        }
        $submithomework->save();
        return redirect('student/my_homework')->with('success', 'HomeWork Successfully Submited');
    }

    public function MySubmittedHomeworkStudent(Request $request)
    {
        $data['getRecord'] = SubmitHomeworkModel::getRecordStudent(Auth::user()->id);
        $data['header_title'] = 'Submitted Homework';
        return view('student.homework.submitted_list', $data);
    }
    //teacher side function

    public function TeacherHomework()
    {
        $class_ids = array();
        $getClass = AssignClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
        foreach ($getClass as $class) {
            $class_ids[] = $class->class_id;
        }
        $data['getRecord'] = HomeworkModel::getRecordTeacher($class_ids);
        $data['header_title'] = 'Teacher Homework';
        return view('teacher.homework.list', $data);
    }
    public function TeacherAdd()
    {
        $data['getClass'] = AssignClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
        $data['header_title'] = 'Add Homework';
        return view('teacher.homework.add', $data);
    }
    public function TeacherInsert(Request $request)
    {
        $homework = new HomeworkModel;
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;
        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework', $filename);
            $homework->document_file = $filename;
        }
        $homework->save();

        return redirect('teacher/homework/homework')->with('success', 'Homework successfully created');
    }
    public function TeacherEdit($id)
    {

        $getRecord = HomeworkModel::getsingle($id);
        $data['getRecord'] = $getRecord;
        $data['getClass'] = AssignClassTeacherModel::getClassSubjectGroup(Auth::user()->id);
        $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);

        $data['header_title'] = "Edit Homework";
        return view('teacher.homework.edit', $data);
    }

    public function Teacherupdate($id, Request $request)
    {
        $homework =  HomeworkModel::getsingle($id);
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;
        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework', $filename);
            $homework->document_file = $filename;
        }
        $homework->save();

        return redirect('teacher/homework/homework')->with('success', 'Homework successfully Updated');
    }
    public function SubmittedTeacher($homework_id)
    {
        $homework = HomeworkModel::getSingle($homework_id);
        if (!empty($homework)) {
            $data['homework_id'] = $homework_id;
            $data['getRecord'] = SubmitHomeworkModel::getRecord($homework_id);
            $data['header_title'] = 'Submitted Homework';
            return view('teacher.homework.submitted', $data);
        } else {
            abort(404);
        }
    }

    //Admin side function

    public function Homework()
    {
        $data['getRecord'] = HomeworkModel::getRecord();
        $data['header_title'] = 'Homework';
        return view('admin.homework.list', $data);
    }
    public function Add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add Homework';
        return view('admin.homework.add', $data);
    }


    public function Insert(Request $request)
    {
        $homework = new HomeworkModel;
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;
        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework', $filename);
            $homework->document_file = $filename;
        }
        $homework->save();

        return redirect('admin/homework/homework')->with('success', 'Homework successfully created');
    }
    public function Edit($id)
    {

        $getRecord = HomeworkModel::getsingle($id);
        $data['getRecord'] = $getRecord;
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);

        $data['header_title'] = "Edit Homework";
        return view('admin.homework.edit', $data);
    }
    public function delete($id)
    {
        $getRecord = HomeworkModel::getsingle($id);
        $getRecord->is_delete = 1;
        $getRecord->save();
        return redirect()->back()->with('success', 'Homework successfully deleted.');
    }
    public function Update($id, Request $request)
    {
        $homework =  HomeworkModel::getsingle($id);
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;
        if (!empty($request->file('document_file'))) {

            $ext = $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/homework', $filename);
            $homework->document_file = $filename;
        }
        $homework->save();

        return redirect('admin/homework/homework')->with('success', 'Homework successfully Updated');
    }
    public function Submitted($homework_id)
    {
        $homework = HomeworkModel::getSingle($homework_id);
        if (!empty($homework)) {
            $data['homework_id'] = $homework_id;
            $data['getRecord'] = SubmitHomeworkModel::getRecord($homework_id);
            $data['header_title'] = 'Submitted Homework';
            return view('admin.homework.submitted', $data);
        } else {
            abort(404);
        }
    }

    public function HomeworkReport()
    {
        $data['getRecord'] = SubmitHomeworkModel::getHomeworkReport();
        $data['header_title'] = 'Homework Report';
        return view('admin.homework.homework_report', $data);
    }
    // for all side same ajax function

    public function ajax_get_subject(Request $request)
    {
        $class_id = $request->class_id;
        $getSubject = ClassSubjectModel::MySubject($class_id);
        $html = '<option value="">Select</option>';
        foreach ($getSubject as $value) {
            $html .= ' <option value="' . $value->subject_id . '">' . $value->subject_name . '</option>';
        }
        $json['success'] = $html;
        echo json_encode($json);
    }
}
