<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ExaminationModel;
use App\Models\StudentAddFeesModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use App\Models\NoticeBoardModel;
use App\Models\StudentAttendanceModel;
use App\Models\SubmitHomeworkModel;
use Illuminate\Http\Request;
use Auth;
use APP\Models\User;


class DashboardController extends Controller
{

    public function dashboard()
    {

        $data['header_title'] = "Dashboard";
        if (Auth::user()->user_type == 1) {

            $data['getTotalTodayFees'] = StudentAddFeesModel::getTotalTodayFees();
            $data['getTotalAllFees'] = StudentAddFeesModel::getTotalAllFees();
            $data['getTotalSubject'] = SubjectModel::getTotalSubject();
            $data['getTotalClass'] = ClassModel::getTotalClass();
            $data['getTotalExam'] = ExaminationModel::getTotalExam();

            $data['totalAdmin'] = User::getTotalUser(1);
            $data['totalTeacher'] = User::getTotalUser(2);
            $data['totalStudent'] = User::getTotalUser(3);
            $data['totalParent'] = User::getTotalUser(4);
            return view('admin.dashboard', $data);
        } else if (Auth::user()->user_type == 2) {
            $data['getTotalSubject'] = AssignClassTeacherModel::getClassSubjectCount(Auth::user()->id);
            $data['getTotalClass'] = AssignClassTeacherModel::getClassSubjectGroupCount(Auth::user()->id);
            $data['totalStudent'] = User::getTeacherMyStudentsCount(Auth::user()->id);

            return view('teacher.dashboard', $data);
        } else if (Auth::user()->user_type == 3) {

            $data['getTotalPaidAmount'] = StudentAddFeesModel::getTotalPaidAmountStudent(Auth::user()->id);
            $data['getTotalSubject'] = ClassSubjectModel::getTotalSubjectStudent(Auth::user()->class_id);
            $data['getNoticeBoard'] = NoticeBoardModel::getNoticeBoardCount(Auth::user()->user_type);
            $data['getTotalHomework'] = HomeworkModel::getTotalHomeworkCount(Auth::user()->class_id, Auth::user()->id);
            $data['getTotalSubmittedHomework'] = SubmitHomeworkModel::getTotalSubmittedHomeworkCount(Auth::user()->id);

            return view('student.dashboard', $data);
        } else if (Auth::user()->user_type == 4) {

            $student_ids = User::getMyStudentIDs(Auth::user()->id);
            if (!empty($student_ids)) {
                $data['getTotalPaidAmount'] = StudentAddFeesModel::getTotalPaidAmountMyStudent($student_ids);
                $data['getTotalAttendance'] = StudentAttendanceModel::getTotalParentAttendanceCount($student_ids);

            } else {
                $data['getTotalPaidAmount'] = 0;
                $data['getTotalAttendance'] = 0;

            }

            $data['totalStudent'] = User::getMyStudentTotalCount(Auth::user()->id);
            $data['getNoticeBoard'] = NoticeBoardModel::getNoticeBoardCount(Auth::user()->user_type);

            return view('parent.dashboard', $data);
        }
    }
}
