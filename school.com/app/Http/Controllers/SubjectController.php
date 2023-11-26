<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Auth;

class SubjectController extends Controller
{

    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }
    public function add()
    {

        $data['header_title'] = "Add New Subject";
        return view('admin.subject.add', $data);
    }
    public function insert(Request $request)
    {

        $save = new SubjectModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::User()->id;
        $save->save();
        return redirect('admin/subject/list')->with('success', 'Subject Successfully Created');
    }
    public function edit($id)
    {

        $data['getRecord'] = SubjectModel::getsingle($id);
        if (!empty($data)) {
            $data['header_title'] = "Edit Class";
            return view('admin.subject.edit', $data);
        } else {

            abort(404);
        }
    }

    /**
     * Update admin
     */

    public function update($id, Request $request)
    {


        $save = SubjectModel::getsingle($id);
        $save->name = trim($request->name);
        $save->name = trim($request->type);
        $save->status = trim($request->status);
        $save->save();

        return redirect('admin/subject/list')->with('success', 'Subject successfully updated.');
    }
    public function delete($id)
    {

        $user = SubjectModel::getsingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/subject/list')->with('success', 'Subject successfully deleted.');
    }
}
