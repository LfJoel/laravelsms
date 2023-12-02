<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class AssignClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = "assign_class_teacher";

    static public function getSingle($id)
    {
        return AssignClassTeacherModel::find($id);
    }

    static public function getRecord()
    {

        $return = AssignClassTeacherModel::select('assign_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'users.name as created_by_name')
            ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('users', 'users.id', '=', 'assign_class_teacher.created_by')
            ->where('assign_class_teacher.is_delete', '=', 0);

        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('teacher_name'))) {
            $return = $return->where('teacher.name', 'like', '%' . Request::get('teacher_name') . '%');
        }
        if (!empty(Request::get('status'))) {
            $status = (Request::get('status') == 100) ? 0 : 1;
            $return = $return->where('assign_class_teacher.status', '=', $status);
        }
        $return =  $return->orderBy('assign_class_teacher.id', 'desc')
            ->paginate(5);

        return $return;
    }

    static public function  getClassSubject($teacher_id)
    {
        $return = AssignClassTeacherModel::select('assign_class_teacher.*', 'class.name as class_name', 'subject.name as subject_name', 'subject.type as subject_type', 'class.id as class_id', 'subject.id as subject_id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->where('assign_class_teacher.status', '=', 0)
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('class_subject.status', '=', 0)
            ->where('class_subject.is_delete', '=', 0)
            ->where('subject.status', '=', 0)
            ->where('subject.is_delete', '=', 0)
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->get();

        return $return;
    }
    static public function  getClassSubjectGroup($teacher_id)
    {
        $return = AssignClassTeacherModel::select(
            'assign_class_teacher.*',
            'class.name as class_name',
            'class.id as class_id'
        )
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->where('assign_class_teacher.status', '=', 0)
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->groupby('assign_class_teacher.class_id')
            ->get();

        return $return;
    }
    static public function  getCalendarTeacher($teacher_id)
    {
        return AssignClassTeacherModel::select(
            'class_subject_timetable.*',
            'class.name as class_name',
            'subject.name as subject_name',
            'week.name as week_name',
            'week.full_calendar_day'
        )
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
            ->join('class_subject_timetable', 'class_subject_timetable.subject_id', '=', 'class_subject.subject_id')
            ->join('subject', 'subject.id', '=', 'class_subject_timetable.subject_id')
            ->join('week', 'week.id', '=', 'class_subject_timetable.week_id')
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->get();
    }


    static public function getAlreadyFirst($class_id, $teacher_id)
    {
        return AssignClassTeacherModel::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }
    static public function getAssignTeacherID($class_id)
    {
        return AssignClassTeacherModel::where('class_id', '=', $class_id)->get();
    }
    static public function deleteTeacher($class_id)
    {
        return AssignClassTeacherModel::where('class_id', '=', $class_id)->delete();
    }


    static public function getMyTimetable($class_id, $subject_id)
    {

        $getWeek = WeekModel::getWeekUsingName(date('l'));

        return ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);
    }
}
