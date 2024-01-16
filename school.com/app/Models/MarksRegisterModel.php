<?php

namespace App\Models;
/**
 * App\Models\MarksRegisterModel
 *
 * @property int $id
 * @property int|null $student_id
 * @property int|null $exam_id
 * @property int|null $class_id
 * @property int|null $subject_id
 * @property int $class_work
 * @property int $home_work
 * @property int $test_work
 * @property int $exam
 * @property int $full_marks
 * @property int $passing_mark
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MarksRegisterModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereClassWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereExam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereFullMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereHomeWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel wherePassingMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereTestWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksRegisterModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksRegisterModel extends Model
{
    use HasFactory;
    protected $table = "marks_register";

    static public function checkAlreadymark($student_id, $exam_id, $class_id, $subject_id)
    {

        return MarksRegisterModel::where("student_id", "=", $student_id)->where("exam_id", "=", $exam_id)->where("class_id", "=", $class_id)->where("subject_id", "=", $subject_id)->first();
    }

    static public function getExam($student_id)
    {
        return MarksRegisterModel::select("marks_register.*", "exam.name as exam_name")
            ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
            ->where('marks_register.student_id', '=', $student_id)
            ->groupby('marks_register.exam_id')
            ->get();
    }
    static public function getExamSubject($exam_id, $student_id)
    {
        return MarksRegisterModel::select("marks_register.*", "exam.name as exam_name" ,"subject.name as subject_name")
            ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
            ->join('subject', 'subject.id', '=', 'marks_register.subject_id')
            ->where('marks_register.exam_id', '=', $exam_id)
            ->where('marks_register.student_id', '=', $student_id)
            ->get();
    }
    static public function getClass($exam_id, $student_id)
    {
        return MarksRegisterModel::select("marks_register.*",'class.name as class_name')
            ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
            ->join('class', 'class.id', '=', 'marks_register.class_id')

            ->join('subject', 'subject.id', '=', 'marks_register.subject_id')
            ->where('marks_register.exam_id', '=', $exam_id)
            ->where('marks_register.student_id', '=', $student_id)
            ->first();
    }
}
