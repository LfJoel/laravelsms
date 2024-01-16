<?php

namespace App\Models;
/**
 * App\Models\ExaminationModel
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $note
 * @property int $is_delete
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExaminationModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExaminationModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Request;

class ExaminationModel extends Model
{
    use HasFactory;
    protected $table = "exam";


    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {

        $return =self::select('exam.*' , 'users.name as createdby_name')
            ->join('users', 'users.id', '=', 'exam.created_by')
            ->where('exam.is_delete' ,'=' ,0);
            if (!empty(Request::get('name'))) {
                $return = $return->where('exam.name', 'like', '%' . Request::get('name') . '%');
            }
            if (!empty(Request::get('subject_name'))) {
                $return = $return->where('exam.name', 'like', '%' . Request::get('note') . '%');
            }
            if (!empty(Request::get('date'))) {
                $return = $return->whereDate('exam.created_at', '=', Request::get('date'));
            }
            $return =  $return->orderBy('exam.id', 'desc')
            ->paginate(50);

        return $return;
    }
    static public function getExam()
    {

        $return =self::select('exam.*' , 'users.name as createdby_name')
            ->join('users', 'users.id', '=', 'exam.created_by')
            ->where('exam.is_delete' ,'=' ,0)
            ->orderBy('exam.name', 'asc')
            ->get();

        return $return;
    }
    static public function getTotalExam()
    {

        return self::select('exam.id')
            ->where('exam.is_delete' ,'=' ,0)
            ->count();
    }

}

