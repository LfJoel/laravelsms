<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Symfony\Contracts\Service\Attribute\Required;
use Str;

class AdminController extends Controller
{
    /**
     * list the admin
     */

    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }

    /**
     * return add new admin page
     */
    public function adminAdd()
    {

        $data['header_title'] = "Add New Admin";
        return view('admin.admin.add', $data);
    }

    /**
     * add new admin
     */
    public function NewadminAdd(Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users'

        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        if (!empty($request->file('profile_pic'))) {

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile', $filename);
            $user->profile_pic = $filename;
        }
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin successfully created.');
        // dd($request->all());
    }


     /**
     * Edit existing admin
     */
    public function edit($id)
    {

        $data['getRecord'] = User::getsingle($id);
        if (!empty($data)) {
            $data['header_title'] = "Edit Admin";
            return view('admin.admin.edit', $data);
        } else {

            abort(404);
        }
    }

     /**
     * Update admin
     */

    public function update($id, Request $request)
    {


        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id

        ]);
        $user = User::getsingle($id);
        $user->name = trim($request->name);
        if (!empty($request->email)) {
            $user->email = trim($request->email);
        }
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        if (!empty($request->file('profile_pic'))) {
            if ($user->getProfile()) {
                unlink('upload/profile/' . $user->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile', $filename);
            $user->profile_pic = $filename;
        }
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin successfully updated.');
    }
    public function delete($id)
    {

        $user = User::getsingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin successfully deleted.');
    }
}
