<?php

namespace App\Models;

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
