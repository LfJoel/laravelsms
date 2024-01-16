<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

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
        return StudentAddFeesModel::select('student_fees.*', 'class.name as class_name', 'users.name as created_by_name')
            ->join('class', 'class.id', '=', 'student_fees.class_id')
            ->join('users', 'users.id', '=', 'student_fees.created_by')
            ->where('student_fees.student_id', '=', $student_id)
            ->where('student_fees.is_payment', '=', 1)
            ->get();
    }
    static public function getPaidAmount($student_id, $class_id)
    {
        return StudentAddFeesModel::where('student_fees.class_id', '=', $class_id)
            ->where('student_fees.student_id', '=', $student_id)
            ->where('student_fees.is_payment', '=', 1)
            ->sum('student_fees.paid_amount');
    }
    static public function getTotalTodayFees()
    {
        return StudentAddFeesModel::where('student_fees.is_payment', '=', 1)
            ->whereDate('student_fees.created_at', '=', date('Y-m-d'))
            ->sum('student_fees.paid_amount');
    }
    static public function getTotalAllFees()
    {
        return StudentAddFeesModel::where('student_fees.is_payment', '=', 1)
            ->sum('student_fees.paid_amount');
    }
    static public function getRecord()
    {
        $return =  StudentAddFeesModel::select(
            'student_fees.*',
            'class.name as class_name',
            'users.name as created_by_name',
            'student.name as student_name',
            'student.last_name'
        )
            ->join('class', 'class.id', '=', 'student_fees.class_id')
            ->join('users as student', 'student.id', '=', 'student_fees.student_id')
            ->join('users', 'users.id', '=', 'student_fees.created_by')
            ->where('student_fees.is_payment', '=', 1);
            if (!empty(Request::get('class_id'))) {
                $return = $return->where('student_fees.class_id', '=', Request::get('class_id'));
            }
            if (!empty(Request::get('student_name'))) {
                $return = $return->where('student.name', 'like', '%' . Request::get('student_name') . '%');
            }
            if (!empty(Request::get('student_last_name'))) {
                $return = $return->where('student.last_name', 'like', '%' . Request::get('student_last_name') . '%');
            }
            if (!empty(Request::get('from_created_at'))) {
                $return = $return->where('student_fees.created_at', '>=', Request::get('from_created_at'));
            }
            if (!empty(Request::get('to_created_at'))) {
                $return = $return->where('student_fees.created_at', '<=', Request::get('to_created_at'));
            }
             if (!empty(Request::get('payment_type'))) {
                $return = $return->where('student_fees.payment_type', 'like', '%' .  Request::get('payment_type') . '%');
            }
            
            $return = $return->orderby('student_fees.id', 'desc')
            ->paginate(50);

            return  $return;
    }

    static public function getTotalPaidAmountStudent($student_id)
    {
        return StudentAddFeesModel::where('student_fees.student_id', '=', $student_id)
            ->where('student_fees.is_payment', '=', 1)
            ->sum('student_fees.paid_amount');
    }
    static public function getTotalPaidAmountMyStudent($student_ids)
    {
        return StudentAddFeesModel::whereIN('student_fees.student_id', $student_ids)
            ->where('student_fees.is_payment','=', 1)
            ->sum('student_fees.paid_amount');
    }
    
}
