<?php

namespace App\Models;
/**
 * App\Models\StudentAddFeesModel
 *
 * @property int $id
 * @property int|null $class_id
 * @property int|null $student_id
 * @property int $total_amount
 * @property int $remaining_amount
 * @property int $paid_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $payment_type
 * @property string|null $remark
 * @property int|null $created_by
 * @property int $is_payment
 * @property string|null $payment_data
 * @property string|null $stripe_session_id
 * @method static \Database\Factories\StudentAddFeesModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereIsPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel wherePaymentData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereRemainingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereStripeSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAddFeesModel whereUpdatedAt($value)
 */
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
