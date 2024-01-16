<?php

namespace App\Models;
/**
 * App\Models\SubjectModel
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $status 0: active, 1: inactive
 * @property int $created_by
 * @property int $is_delete 0: not, 1: yes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SubjectModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubjectModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Request;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table = "subject";

    static public function getRecord()
    {

        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subject.created_by');
            if (!empty(Request::get('name'))) {
                $return = $return->where('subject.name', 'like', '%' . Request::get('name') . '%');
            }
            if (!empty(Request::get('type'))) {
                $return = $return->where('subject.type', '=' , Request::get('type'));
            }
            if (!empty(Request::get('date'))) {
                $return = $return->whereDate('subject.created_at', '=', Request::get('date'));
            }
            $return = $return->where('subject.is_delete', '=', '0')
            ->orderBy('subject.id', 'desc')
            ->paginate(5);

        return $return;
    }
    static public function getSingle($id)
    {
        return SubjectModel::find($id);
    }

    static public function getSubject()
    {

        $return = SubjectModel::select('subject.*')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('subject.is_delete', '=', '0')
            ->where('subject.status', '=', '0')
            ->orderBy('subject.name', 'asc')
            ->get();

        return $return;
    }
    static public function getTotalSubject()
    {

        return SubjectModel::select('subject.id')
            ->where('subject.is_delete', '=', '0')
            ->where('subject.status', '=', '0')
            ->count();

    }


}
