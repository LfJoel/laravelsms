<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Auth;

class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = 'class list';
        return view('admin.class.list', $data);
    }
    public function add()
    {

        $data['header_title'] = "Add New class";
        return view('admin.class.add', $data);
    }

    public function insert(Request $request)
    {

        $save = new ClassModel;
        $save->name = $request->name;
        $save->amount = $request->amount;
        $save->status = $request->status;
        $save->created_by = Auth::User()->id;
        $save->save();
        
        return redirect('admin/class/list')->with('success', 'Class Successfully Created');
    }

    /**
     * Edit existing class
     */
    public function edit($id)
    {

        $data['getRecord'] = ClassModel::getsingle($id);
        if (!empty($data)) {
            $data['header_title'] = "Edit Class";
            return view('admin.class.edit', $data);
        } else {

            abort(404);
        }
    }

    /**
     * Update class
     */

    public function update($id, Request $request)
    {


        $save = ClassModel::getsingle($id);
        $save->name = trim($request->name);
        $save->amount = trim($request->amount);
        $save->status = trim($request->status);
        $save->save();

        return redirect('admin/class/list')->with('success', 'Class successfully updated.');
    }
    public function delete($id)
    {

        $user = ClassModel::getsingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/class/list')->with('success', 'Class successfully deleted.');
    }
}
