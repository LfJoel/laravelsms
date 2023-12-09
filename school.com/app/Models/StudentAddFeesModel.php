<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddFeesModel extends Model
{
    use HasFactory;
    protected $table = "student_fees";

    static public function getSingle($id)
    {
        return StudentAddFeesModel::find($id);
    }
    static public function getFees($student_id)
    {
        return StudentAddFeesModel::select('student_fees.*','class.name as class_name','users.name as created_by_name')
        ->join('class','class.id','=','student_fees.class_id')
        ->join('users','users.id','=','student_fees.created_by')
        ->where('student_fees.student_id','=',$student_id)
        ->where('student_fees.is_payment','=',1)
        ->get();
    }
    static public function getPaidAmount($student_id,$class_id)
    {
        return StudentAddFeesModel::where('student_fees.class_id','=',$class_id)
        ->where('student_fees.student_id','=',$student_id)
        ->where('student_fees.is_payment','=',1)
        ->sum('student_fees.paid_amount');
    }
    
}
