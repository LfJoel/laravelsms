<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Str;


class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_tile'] = 'Parent list';
        return view('admin.parent.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Parent";
        return view('admin.parent.add', $data);
    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'occupation' => 'max:255',
            'address' => 'max:255',
            'mobile_number' => 'max:15|min:8'


        ]);
        
        $parent = new User;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->occupation  = trim($request->occupation);
        $parent->address  = trim($request->address);
        $parent->mobile_number  = trim($request->mobile_number);

        if (!empty($request->file('profile_pic'))) {

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename= strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile', $filename);
            $parent->profile_pic = $filename;
        }
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        $parent->password = Hash::make($request->password);

        $parent->user_type = 4;
        $parent->save();
        return redirect('admin/parent/list')->with('success', 'Parent successfully created');
    }
    public function edit($id)
    {

        $data['getRecord'] = User::getsingle($id);
        // $data['getRecord'] = User::getProfile();
        if (!empty($data)) {
            $data['header_title'] = "Edit parent";
            return view('admin.parent.edit', $data);
        } else {

            abort(404);
        }
    }
    public function update($id, Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'occupation' => 'max:255',
            'address' => 'max:255',
            'mobile_number' => 'max:15|min:8'

        ]);
        // dd($request->all());
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->occupation  = trim($request->occupation);
        $parent->address  = trim($request->address);
        $parent->mobile_number  = trim($request->mobile_number);

        if(!empty($request->file('profile_pic'))){
            if($parent->getProfile()){
                unlink('upload/profile/'.$parent->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile',$filename);
            $parent->profile_pic = $filename;
        }
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);

        if (!empty($request->password)) {
            $parent->password = Hash::make($request->password);
        }
        
        $parent->save();

        return redirect('admin/parent/list')->with('success','parent successfully updated');
    }
    public function delete($id)
    {
        $getRecord = User::getsingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect('admin/parent/list')->with('success', 'parent successfully deleted.');
        }
        else{
            abort(404);
        }
        
    }

    public function myChild($id){
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['getSreachStudent'] = User::getSreachStudent();
        $data['header_tile'] = 'Parent student list';
        return view('admin.parent.mychild', $data);
    }

    public function AssignStudentParent($student_id ,$parent_id){
        $student = User::getsingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();
        return redirect()->back()->with('success', 'Student  successfully assigned.');

    }
    public function AssignStudentParentDelete($student_id){
        $student = User::getsingle($student_id);
        $student->parent_id = null;
        $student->save();
        return redirect()->back()->with('success', 'Student  Successfully Assign Deleted.');

    }
    public function  MyStudentParent(){
 
        $id =Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_tile'] = 'My Student';
        return view('parent.my_student', $data);
    }
   
    
}
