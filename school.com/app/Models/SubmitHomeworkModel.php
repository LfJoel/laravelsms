<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class SubmitHomeworkModel extends Model
{
    use HasFactory;
    protected $table = "homework_submit";

    static public function getRecord($homework_id)
    {
        $return = SubmitHomeworkModel::select('homework_submit.*', 'users.name as first_name', 'users.last_name')
            ->join('users', 'users.id', '=', 'homework_submit.student_id')
            ->where('homework_submit.homework_id', '=', $homework_id);
        if (!empty(Request::get('first_name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('first_name') . '%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('from_submitted_at'))) {
            $return = $return->whereDate('homework_submit.created_at', '<=', Request::get('from_submited_at'));
        }
        if (!empty(Request::get('to_submitted_at'))) {
            $return = $return->whereDate('homework_submit.created_at', '<=', Request::get('to_submited_at'));
        }
        $return = $return->orderBy('homework_submit.id', 'desc')
            ->paginate(50);
        return $return;
    }

    static public function getRecordStudent($student_id)
    {

        $return = SubmitHomeworkModel::select('homework_submit.*', 'class.name as class_name', 'subject.name as subject_name')
            ->join('homework', 'homework.id', '=', 'homework_submit.homework_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->where('homework_submit.student_id', '=', $student_id);
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

        if (!empty(Request::get('from_submitted_at'))) {
            $return = $return->whereDate('homework_submit.created_at', '>=', Request::get('from_submitted_at'));
        }
        if (!empty(Request::get('to_submitted_at'))) {
            $return = $return->whereDate('homework_submit.created_at', '<=', Request::get('to_submitted_at'));
        }
        $return = $return->orderBy('homework_submit.id', 'desc')
            ->paginate(20);

        return $return;
    }
    static public function getTotalSubmittedHomeworkCount($student_id)
    {

        $return = SubmitHomeworkModel::select('homework_submit.id')
            ->join('homework', 'homework.id', '=', 'homework_submit.homework_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', '=', 'homework.class_id')
            ->where('homework_submit.student_id', '=', $student_id);
        $return = $return->orderBy('homework_submit.id', 'desc')
            ->count();

        return $return;
    }

    static public function getHomeworkReport()
    {

        $return = SubmitHomeworkModel::select('homework_submit.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as first_name', 'users.last_name')
            ->join('users', 'users.id', '=', 'homework_submit.student_id')
            ->join('homework', 'homework.id', '=', 'homework_submit.homework_id')
            ->join('subject', 'subject.id', '=', 'homework.subject_id')
            ->join('class', 'class.id', '=', 'homework.class_id');
        if (!empty(Request::get('first_name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('first_name') . '%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
        }
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

        if (!empty(Request::get('from_submitted_at'))) {
            $return = $return->whereDate('homework_submit.created_at', '<=', Request::get('from_submited_at'));
        }
        if (!empty(Request::get('to_submitted_at'))) {
            $return = $return->whereDate('homework_submit.created_at', '<=', Request::get('to_submited_at'));
        }
        $return = $return->orderBy('homework_submit.id', 'desc')
            ->paginate(50);

        return $return;
    }
    public function getHomework()
    {
        return $this->belongsTo(HomeworkModel::class, 'homework_id');
    }

    public function getStudent()
    {
        return $this->belongsTo(User::class, 'student_id');
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
