<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;
use Auth;
use Hash;
use Str;
use App\Models\SettingsModel;
class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title'] = "change password";

        return view('profile.change_password', $data);
    }

    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if (Auth::user()->user_type == 1) {
            return view('admin.my_account', $data);
        } elseif (Auth::user()->user_type == 2) {
            return view('teacher.my_account', $data);
        } elseif (Auth::user()->user_type ==  3) {
            return view('student.my_account', $data);
        } elseif (Auth::user()->user_type ==  4) {
            return view('parent.my_account', $data);
        } else {
            abort(404);
        }
    }
    public function  UpdateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;

        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id

        ]);
        $admin = User::getsingle($id);
        $admin->name = trim($request->name);
        $admin->last_name = trim($request->last_name);
        $admin->email = trim($request->email);
        $admin->save();

        return redirect()->back()->with('success', 'Account successfully Updated');
    }

    public function MySetting()
    {
        $data['getRecord'] = SettingsModel::getSingle();
        $data['header_title'] = "Setting";
        return view('admin.setting', $data);
    }
    public function UpdateMySetting(Request $request)
    {
        $setting = SettingsModel::getSingle();
        $setting->paypal_email = trim($request->paypal_email);
        $setting->stripe_key = trim($request->stripe_key);
        $setting->stripe_secret = trim($request->stripe_secret);
        $setting->save();
        return redirect()->back()->with('success', 'Setting successfully Updated');
    }
    public function UpdateMyAccountTeacher(Request $request)
    {
        $id = Auth::user()->id;
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


        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_pic'))) {
            if ($teacher->getProfile()) {
                unlink('upload/profile/' . $teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile', $filename);
            $teacher->profile_pic = $filename;
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->address = trim($request->address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->email = trim($request->email);

        $teacher->save();
        return redirect()->back()->with('success', 'Account successfully Updated');
    }
    public function  UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'caste' => 'max:50',
            'religion' => 'max:50',

        ]);
        // dd($request->all());
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_pic'))) {
            if ($student->getProfile()) {
                unlink('upload/profile/' . $student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile', $filename);
            $student->profile_pic = $filename;
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);


        $student->save();
        return redirect()->back()->with('success', 'Account successfully Updated');
    }
    public function  UpdateMyAccountParent(Request $request)
    {
        $id = Auth::user()->id;
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

        if (!empty($request->file('profile_pic'))) {
            if ($parent->getProfile()) {
                unlink('upload/profile/' . $parent->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile', $filename);
            $parent->profile_pic = $filename;
        }
        $parent->email = trim($request->email);


        $parent->save();

        return redirect()->back()->with('success', 'Account successfully Updated');
    }

    public function Update_change_password(Request $request)
    {

        $user = User::getSingle(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {

            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'Old Password is not Correct');
        }
        // dd($request->all());
    }
}
