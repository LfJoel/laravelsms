<?php

namespace App\Models;
/**
 * App\Models\ClassModel
 *
 * @property int $id
 * @property string|null $name
 * @property int $amount
 * @property int $status
 * @property int $created_by
 * @property int $is_delete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClassModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClassModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Request;

class ClassModel extends Model

{
    use HasFactory;

    protected $table = "class";


    static public function getRecord()
    {

        $return = ClassModel::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'class.created_by');

        if (!empty(Request::get('name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('class.created_at', '=', Request::get('date'));
        }
        $return = $return->where('class.is_delete', '=', '0')
            ->orderBy('class.id', 'desc')
            ->paginate(5);
        return $return;
    }

    static public function getSingle($id)
    {
        return ClassModel::find($id);
    }

    static public function getClass(){


        $return = ClassModel::select('class.*')
            ->join('users', 'users.id', '=', 'class.created_by')
            ->where('class.is_delete', '=', '0')
            ->where('class.status', '=', '0')
            ->orderBy('class.id', 'desc')
            ->get();
        return $return;
    }
    static public function getTotalClass(){


        return ClassModel::select('class.id')
            ->where('class.is_delete', '=', '0')
            ->where('class.status', '=', '0')
            ->count();

    }

}
