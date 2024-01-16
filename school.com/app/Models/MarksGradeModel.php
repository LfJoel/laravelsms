<?php

namespace App\Models;
/**
 * App\Models\MarksGradeModel
 *
 * @property int $id
 * @property string|null $name
 * @property int $percent_from
 * @property int $percent_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel wherePercentFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel wherePercentTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MarksGradeModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGradeModel extends Model
{
    use HasFactory;
    protected $table = "marks_grade";


    static public function getRecord()
    {

        return self::select('marks_grade.*', 'users.name as createdby_name')
            ->join('users', 'users.id', '=', 'marks_grade.created_by')
            ->get();
    }
    static public function getSingle($id)
    {
        return MarksGradeModel::find($id);
    }

    static public function getGrade($percentage){
        $return = self::select('marks_grade.*')
        ->where('percent_from', '<=',$percentage)
        ->where('percent_to', '>=',$percentage)
        ->first();
        return  !empty($return->name) ? $return->name: '' ;
    }
}

