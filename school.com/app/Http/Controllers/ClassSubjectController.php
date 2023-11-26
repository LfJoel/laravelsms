<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use Auth;

class ClassSubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_tile'] = 'Assign subject list';
        return view('admin.assign_subject.list', $data);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Assign subject";
        return view('admin.assign_subject.add', $data);
    }

    public function insert(Request $request)
    {
        if(!empty($request->subject_id)){


            foreach($request->subject_id as $subject_id){
                
                    $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id,$request->subject_id );                
                    if(!empty($getAlreadyFirst)){
                        $getAlreadyFirst->status = $request->status;
                        $getAlreadyFirst->save();
                    }
                    else{
                        $save =new ClassSubjectModel;
                        $save-> class_id = $request ->class_id;
                        $save-> subject_id = $subject_id;
                        $save->status = $request->status;
                        $save->created_by = Auth::User()->id;
                        $save->save();
                    }
                   
            }
            return redirect('admin/assign_subject/list')->with('success','Subject successfully assign to class');

        }
        else{
            return redirect()->back()->with('error','Due to some error pls tr again');
        }
    }

}
