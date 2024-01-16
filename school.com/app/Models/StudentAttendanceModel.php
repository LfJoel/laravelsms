<?php

namespace App\Models;
/**
 * App\Models\StudentAttendanceModel
 *
 * @property int $id
 * @property int|null $class_id
 * @property string|null $attendance_date
 * @property int|null $student_id
 * @property int|null $attendance_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @method static \Database\Factories\StudentAttendanceModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereAttendanceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereAttendanceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentAttendanceModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Request;

class StudentAttendanceModel extends Model
{
    use HasFactory;
    protected $table = "student_attendance";

    static public function getRecord()
    {
        $return = StudentAttendanceModel::select(
            'student_attendance.*',
            'class.name as class_name',
            'student.name as student_name',
            'student.last_name as student_last_name',
            'created.name as created_by_name'
        )
            ->join('class', 'class.id', '=', 'student_attendance.class_id')
            ->join('users as student', 'student.id', '=', 'student_attendance.student_id')
            ->join('users as created', 'created.id', '=', 'student_attendance.created_by');
        if (!empty(Request::get('class_id'))) {
            $return = $return->where('student_attendance.class_id', '=', Request::get('class_id'));
        }
        if (!empty(Request::get('student_name'))) {
            $return = $return->where('student.name', 'like', '%' . Request::get('student_name') . '%');
        }
        if (!empty(Request::get('student_last_name'))) {
            $return = $return->where('student.last_name', 'like', '%' . Request::get('student_last_name') . '%');
        }
        if (!empty(Request::get('attendance_date'))) {
            $return = $return->where('student_attendance.attendance_date', '=', Request::get('attendance_date'));
        }
        if (!empty(Request::get('attendance_type'))) {
            $return = $return->where('student_attendance.attendance_type', '=', Request::get('attendance_type'));
        }
        $return = $return->orderby('student_attendance.id', 'desc')
            ->paginate(50);
        return $return;
    }
    static public function CheckAlreadyAttendance($student_id, $class_id, $attendance_date)
    {
        return StudentAttendanceModel::where('student_id', '=', $student_id)->where('class_id', '=', $class_id)
            ->where('attendance_date', '=', $attendance_date)->first();
    }

    // teacher side function

    static public function getRecordTeacher($classarray)
    {


        if (!empty($classarray)) {
            $return = StudentAttendanceModel::select(
                'student_attendance.*',
                'class.name as class_name',
                'student.name as student_name',
                'student.last_name as student_last_name',
                'created.name as created_by_name'
            )
                ->join('class', 'class.id', '=', 'student_attendance.class_id')
                ->join('users as student', 'student.id', '=', 'student_attendance.student_id')
                ->join('users as created', 'created.id', '=', 'student_attendance.created_by')
                ->whereIn('student_attendance.class_id',  $classarray);
            if (!empty(Request::get('class_id'))) {
                $return = $return->where('student_attendance.class_id', '=', Request::get('class_id'));
            }
            if (!empty(Request::get('student_name'))) {
                $return = $return->where('student.name', 'like', '%' . Request::get('student_name') . '%');
            }
            if (!empty(Request::get('student_last_name'))) {
                $return = $return->where('student.last_name', 'like', '%' . Request::get('student_last_name') . '%');
            }
            if (!empty(Request::get('attendance_date'))) {
                $return = $return->where('student_attendance.attendance_date', '=', Request::get('attendance_date'));
            }
            if (!empty(Request::get('attendance_type'))) {
                $return = $return->where('student_attendance.attendance_type', '=', Request::get('attendance_type'));
            }
            $return = $return->orderby('student_attendance.id', 'desc')
                ->paginate(50);
            return $return;
        } else {
            return '';
        }
    }


    // student side function
    static public function getRecordStudent($student_id)
    {
        $return = StudentAttendanceModel::select(
            'student_attendance.*',
            'class.name as class_name'
        )
            ->join('class', 'class.id', '=', 'student_attendance.class_id')
            ->where('student_attendance.student_id', '=', $student_id);
            if (!empty(Request::get('class_id'))) {
                $return = $return->where('student_attendance.class_id', '=', Request::get('class_id'));
            }
            if (!empty(Request::get('attendance_date'))) {
                $return = $return->where('student_attendance.attendance_date', '=', Request::get('attendance_date'));
            }
            if (!empty(Request::get('attendance_type'))) {
                $return = $return->where('student_attendance.attendance_type', '=', Request::get('attendance_type'));
            }

            $return = $return->orderby('student_attendance.id', 'desc')
            ->paginate(50);

        return $return;
    }
    static public function getClassStudent($student_id)
    {
    return  StudentAttendanceModel::select('student_attendance.*' , 'class.name as class_name')
    ->join('class' ,'class.id' ,'=','student_attendance.class_id')
    ->where('student_attendance.student_id' ,'=',$student_id)
    ->groupby('student_attendance.class_id')
    ->get();
    }

    static public function getTotalParentAttendanceCount($student_ids)
    {
    return  StudentAttendanceModel::select('student_attendance.id' )
    ->join('class' ,'class.id' ,'=','student_attendance.class_id')
    ->whereIN('student_attendance.student_id' ,$student_ids)
    ->count();

    }



}
