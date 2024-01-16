<?php

namespace App\Models;
/**
 * App\Models\HomeworkModel
 *
 * @property int $id
 * @property int|null $class_id
 * @property int|null $subject_id
 * @property string|null $homework_date
 * @property string|null $submission_date
 * @property string|null $description
 * @property string|null $document_file
 * @property int $is_delete
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\HomeworkModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereDocumentFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereHomeworkDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereSubmissionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeworkModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Request;

class HomeworkModel extends Model
{
    use HasFactory;
    protected $table = "homework";

    static public function getSingle($id)
    {
        return HomeworkModel::find($id);
    }
    static public function getRecord()
    {
        $return = HomeworkModel::select('homework.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'homework.created_by')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->where('homework.is_delete', '=', 0);
        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like', '%' . Request::get('subject_name') . '%');
        }
        if (!empty(Request::get('from_homework_date'))) {
            $return = $return->whereDate('homework.homework_date', '>=', Request::get('from_homework_date'));
        }
        if (!empty(Request::get('to_homework_date'))) {
            $return = $return->whereDate('homework.homework_date', '<=', Request::get('to_homework_date'));
        }
        if (!empty(Request::get('from_submission_date'))) {
            $return = $return->whereDate('homework.homework_date', '>=', Request::get('from_submission_date'));
        }
        if (!empty(Request::get('to_submission_date'))) {
            $return = $return->whereDate('homework.homework_date', '<=', Request::get('to_submission_date'));
        }

        if (!empty(Request::get('from_created_at'))) {
            $return = $return->whereDate('homework.created_at', '<=', Request::get('from_created_at'));
        }
        if (!empty(Request::get('to_created_at'))) {
            $return = $return->whereDate('homework.created_at', '<=', Request::get('to_created_at'));
        }

        $return = $return->orderby('homework.id', 'desc')
            ->paginate(20);

        return $return;
    }
    static public function getRecordTeacher($class_ids)
    {
        $return = HomeworkModel::select('homework.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'homework.created_by')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->whereIn('homework.class_id', $class_ids)
            ->where('homework.is_delete', '=', 0);
        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like', '%' . Request::get('subject_name') . '%');
        }
        if (!empty(Request::get('from_homework_date'))) {
            $return = $return->whereDate('homework.homework_date', '>=', Request::get('from_homework_date'));
        }
        if (!empty(Request::get('to_homework_date'))) {
            $return = $return->whereDate('homework.homework_date', '<=', Request::get('to_homework_date'));
        }
        if (!empty(Request::get('from_submission_date'))) {
            $return = $return->whereDate('homework.homework_date', '>=', Request::get('from_submission_date'));
        }
        if (!empty(Request::get('to_submission_date'))) {
            $return = $return->whereDate('homework.homework_date', '<=', Request::get('to_submission_date'));
        }

        if (!empty(Request::get('from_created_at'))) {
            $return = $return->whereDate('homework.created_at', '<=', Request::get('from_created_at'));
        }
        if (!empty(Request::get('to_created_at'))) {
            $return = $return->whereDate('homework.created_at', '<=', Request::get('to_created_at'));
        }

        $return = $return->orderby('homework.id', 'desc')
            ->paginate(20);

        return $return;
    }
    static public function getRecordStudent($class_id,$student_id)
    {
        $return = HomeworkModel::select('homework.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'homework.created_by')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->where('homework.class_id','=' ,$class_id)
            ->where('homework.is_delete', '=', 0)
            ->whereNotIn('homework.id',function($query) use ($student_id){
                $query->select('homework_submit.homework_id')
                ->from('homework_submit')
                ->where('homework_submit.student_id','=',$student_id);
            });
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like', '%' . Request::get('subject_name') . '%');
        }
        if (!empty(Request::get('from_homework_date'))) {
            $return = $return->whereDate('homework.homework_date', '>=', Request::get('from_homework_date'));
        }
        if (!empty(Request::get('to_homework_date'))) {
            $return = $return->whereDate('homework.homework_date', '<=', Request::get('to_homework_date'));
        }
        if (!empty(Request::get('from_submission_date'))) {
            $return = $return->whereDate('homework.homework_date', '>=', Request::get('from_submission_date'));
        }
        if (!empty(Request::get('to_submission_date'))) {
            $return = $return->whereDate('homework.homework_date', '<=', Request::get('to_submission_date'));
        }

        if (!empty(Request::get('from_created_at'))) {
            $return = $return->whereDate('homework.created_at', '<=', Request::get('from_created_at'));
        }
        if (!empty(Request::get('to_created_at'))) {
            $return = $return->whereDate('homework.created_at', '<=', Request::get('to_created_at'));
        }

        $return = $return->orderby('homework.id', 'desc')
            ->paginate(20);

        return $return;
    }

    static public function getTotalHomeworkCount($class_id,$student_id)
    {
        $return = HomeworkModel::select('homework.id')
            ->join('users', 'users.id', '=', 'homework.created_by')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->where('homework.class_id','=' ,$class_id)
            ->where('homework.is_delete', '=', 0)
            ->whereNotIn('homework.id',function($query) use ($student_id){
                $query->select('homework_submit.homework_id')
                ->from('homework_submit')
                ->where('homework_submit.student_id','=',$student_id);
            });
            $return = $return->orderby('homework.id', 'desc')
            ->count();

        return $return;
    }
    public function getDocument()
    {
        if (!empty($this->document_file) && file_exists('upload/homework/' . $this->document_file)) {
            return url('upload/homework/' . $this->document_file);
        } else {
            return '';
        }
    }
}
