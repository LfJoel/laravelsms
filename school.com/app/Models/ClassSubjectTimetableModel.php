<?php

namespace App\Models;
/**
 * App\Models\ClassSubjectTimetableModel
 *
 * @property int $id
 * @property int|null $class_id
 * @property int|null $subject_id
 * @property int|null $week_id
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string|null $room_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClassSubjectTimetableModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereRoomNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassSubjectTimetableModel whereWeekId($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectTimetableModel extends Model
{
    use HasFactory;
    protected $table = "class_subject_timetable";


    static public function getRecordClassSubject($class_id, $subject_id, $week_id)
    {
       return ClassSubjectTimetableModel::where('class_id' , '=', $class_id)->where('subject_id' , '=' ,$subject_id)->where('week_id' , '=',$week_id)->first();

    }
}
