<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Auth;
use Str;
class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_tile'] = 'teacher list';
        return view('admin.teacher.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New teacher";
        return view('admin.teacher.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'marital_status' => 'max:50',
            'mobile_number' => 'max:15|min:8'
            

        ]);
        // dd($request->all());
        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender );

        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }        
        if(!empty($request->admission_date)){
            $teacher->admission_date = trim($request->admission_date);
        }
        if(!empty($request->file('profile_pic'))){

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile',$filename);
            $teacher->profile_pic = $filename;
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);       
         $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        
        $teacher->user_type = 2;
        $teacher->save();
        return redirect('admin/teacher/list')->with('success','Student successfully created');
    }
    public function edit($id)
    {

        $data['getRecord'] = User::getsingle($id);
        if (!empty($data)) {
            $data['header_title'] = "Edit Student";
            return view('admin.teacher.edit', $data);
        } else {

            abort(404);
        }
    }

    public function update($id, Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'marital_status' => 'max:50',
            'mobile_number' => 'max:15|min:8'
        ]);
        // dd($request->all());
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);


        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->file('profile_pic'))){
            if($teacher->getProfile()){
                unlink('upload/profile/'.$teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile',$filename);
            $teacher->profile_pic = $filename;
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);       
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        if (!empty($request->password)) {
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();
        return redirect('admin/teacher/list')->with('success','teacher successfully Updated');
    }

    public function delete($id)
    {
        $getRecord = User::getsingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect('admin/teacher/list')->with('success', 'teacher successfully deleted.');
        }
        else{
            abort(404);
        }
        
    }

}
