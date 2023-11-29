<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;
use Auth;

class AssignClassTeacherController extends Controller
{   
    public function list()
    {

        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        $data['header_tile'] = 'Assign Class Teacher';
        return view('admin.assign_class_teacher.list', $data);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getClassTeacher'] = User::getClassTeacher();

        $data['header_title'] = "Add Assign Class Teacher";
        return view('admin.assign_class_teacher.add', $data);
    }
    public function insert(Request $request)
    {
        if (!empty($request->teacher_id)) {


            foreach ($request->teacher_id as $teacher_id) {

                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::User()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class Teacher successfully');
        } else {
            return redirect()->back()->with('error', 'Due to some error pls tr again');
        }
    }
    public function edit($id)
    {

        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getClassTeacher'] = User::getClassTeacher();    
            $data['header_title'] = "Edit Assign class teacher";
            return view('admin.assign_class_teacher.edit', $data);
        } else {
            abort(404);
        }
    }
     public function update(Request $request)
    {


        AssignClassTeacherModel::deleteTeacher($request->class_id);
        if (!empty($request->teacher_id)) {


            foreach ($request->teacher_id as $teacher_id) {

                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::User()->id;
                    $save->save();
                }
            }
        }
        return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class Teacher Updated successfully');
   
    }
    public function edit_single($id)
    {
        

        $getRecord = AssignClassTeacherModel::getSingle($id);
        // dd($getRecord->all());
        if (!empty($getRecord)){
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getClassTeacher'] = User::getClassTeacher(); 
            $data['header_title'] = "Edit Assign Teacher";
            return view('admin.assign_class_teacher.edit_single', $data);
        } 
        else {
           abort(404);
        }
    }
    public function update_single(Request $request, $id)
    {


        // dd($request->all());

        $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $request->teacher_id);
        if (!empty($getAlreadyFirst)) {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class Teacher Updated successfully');
        } 
        else {

            $save = AssignClassTeacherModel::getSingle($id);
            $save->class_id = $request->class_id;
            $save->teacher_id = $request->teacher_id;
            $save->status = $request->status;
            $save->save();


            return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class Teacher Updated successfully');
        }
    }
    public function delete($id)
    {

        $save = AssignClassTeacherModel::getSingle($id);
        $save->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }


    // teacher part functions

    public function MyClassSubject(){

        $data['getRecord'] =  AssignClassTeacherModel::getClassSubject(Auth::user()->id);

        $data['header_title'] = "My Class & Subject";
        return view('teacher.my_class_subject', $data);
    }
}
