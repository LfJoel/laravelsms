<?php

namespace App\Models;
/**
 * App\Models\ClassSubjectModel
 *
 * @property int $id
 * @property int|null $class_id
 * @property int|null $subject_id
 * @property int|null $created_by
 * @property int $is_delete
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClassSubjectModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Request;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = "class_subject";

    static public function getRecord()
    {

        $return = ClassSubjectModel::select('class_subject.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->join('class', 'class.id', '=', 'class_subject.class_id')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('class_subject.is_delete', '=', 0);
        if (!empty(Request::get('claas_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('claas_name') . '%');
        }
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like', '%' . Request::get('subject_name') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('class.created_at', '=', Request::get('date'));
        }
        $return =  $return->orderBy('class_subject.class_id', 'desc')
            ->paginate(5);

        return $return;
    }
    static public function MySubject($class_id)
    {
        return ClassSubjectModel::select('class_subject.*', 'subject.name as subject_name', 'subject.type as subject_type')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->join('class', 'class.id', '=', 'class_subject.class_id')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('class_subject.class_id', '=', $class_id)
            ->where('class_subject.is_delete', '=', 0)
            ->where('class_subject.status', '=', 0)
            ->orderBy('class_subject.class_id', 'desc')
            ->get();
    }
    static public function getTotalSubjectStudent($class_id)
    {
        return ClassSubjectModel::select('class_subject.id')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->join('class', 'class.id', '=', 'class_subject.class_id')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('class_subject.class_id', '=', $class_id)
            ->where('class_subject.is_delete', '=', 0)
            ->where('class_subject.status', '=', 0)
            ->orderBy('class_subject.class_id', 'desc')
            ->count();
    }

    static public function getAlreadyFirst($class_id, $subject_id)
    {
        return ClassSubjectModel::where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }

    static public function getSingle($id)
    {
        return ClassSubjectModel::find($id);
    }

    static public function getAssignSubjectID($class_id)
    {
        return ClassSubjectModel::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();
    }
    static public function deleteSubject($class_id)
    {
        return ClassSubjectModel::where('class_id', '=', $class_id)->delete();
    }
}

