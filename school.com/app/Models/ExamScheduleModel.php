<?php

namespace App\Models;
/**
 * App\Models\ExamScheduleModel
 *
 * @property int $id
 * @property int|null $exam_id
 * @property int|null $class_id
 * @property int|null $subject_id
 * @property string|null $exam_date
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string|null $room_number
 * @property string|null $full_marks
 * @property string|null $passing_mark
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExamScheduleModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereExamDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereFullMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel wherePassingMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereRoomNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamScheduleModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ExamScheduleModel extends Model
{
    use HasFactory;
    protected $table = "exam_schedule";

  static public function getRecordSingle($id)
    {
        return self::find($id);
    }
    static public function getSingle($exam_id, $class_id, $subject_id)
    {
        return self::where('exam_id', '=', $exam_id)->where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }

    static public function deleteRecord($exam_id, $class_id)
    {

        self::where('exam_id', '=', $exam_id)->where('class_id', '=', $class_id)->delete();
    }
    static public function getExam($class_id)
    {

        return self::select('exam_schedule.*', 'exam.name as exam_name')
            ->join('exam', 'exam.id', '=', 'exam_schedule.exam_id')
            ->where('exam_schedule.class_id', '=', $class_id)
            ->groupby('exam_schedule.exam_id')
            ->orderby('exam_schedule.id', 'desc')
            ->get();
    }
    static public function getExamTeacher($teacher_id)
    {

        return self::select('exam_schedule.*', 'exam.name as exam_name')
            ->join('exam', 'exam.id', '=', 'exam_schedule.exam_id')
            ->join('assign_class_teacher', 'assign_class_teacher.class_id' , '=' , 'exam_schedule.class_id')
            ->where('assign_class_teacher.teacher_id' , '=' ,$teacher_id)
            ->groupby('exam_schedule.exam_id')
            ->orderby('exam_schedule.id', 'desc')
            ->get();
    }

    static public function  getExamTimetable($exam_id, $class_id)
    {

        return self::select('exam_schedule.*', 'subject.name as subject_name', 'subject.type as subject_type')
            ->join('subject', 'subject.id', '=', 'exam_schedule.subject_id')
            ->join('exam', 'exam.id', '=', 'exam_schedule.exam_id')
            ->where('exam_schedule.exam_id', '=', $exam_id)
            ->where('exam_schedule.class_id', '=', $class_id)
            ->get();
    }

    static public function  getSubject($exam_id, $class_id)
    {

        return self::select('exam_schedule.*', 'subject.name as subject_name', 'subject.type as subject_type')
            ->join('subject', 'subject.id', '=', 'exam_schedule.subject_id')
            ->join('exam', 'exam.id', '=', 'exam_schedule.exam_id')
            ->where('exam_schedule.exam_id', '=', $exam_id)
            ->where('exam_schedule.class_id', '=', $class_id)
            ->get();
    }




    static public function   getExamtimetableTeacher($teacher_id)
    {

        return self::select('exam_schedule.*', 'class.name as class_name' , 'subject.name as subject_name' , 'exam.name as exam_name')
            ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'exam_schedule.class_id')
            ->join('class', 'class.id', '=', 'exam_schedule.class_id')
            ->join('subject', 'subject.id', '=', 'exam_schedule.subject_id')
            ->join('exam', 'exam.id', '=', 'exam_schedule.exam_id')
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->get();
    }

    static public function getMark($student_id,$exam_id,$class_id,$subject_id){
        return MarksRegisterModel::checkAlreadymark($student_id,$exam_id,$class_id,$subject_id);
    }
}
