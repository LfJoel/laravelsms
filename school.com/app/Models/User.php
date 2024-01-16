<?php

namespace App\Models;
/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property int $user_type 1:admin, 2:teacher, 3:students, 4:parents
 * @property string|null $admission_number
 * @property string|null $roll_number
 * @property int|null $class_id
 * @property string|null $gender
 * @property string|null $date_of_birth
 * @property string|null $caste
 * @property string|null $religion
 * @property string|null $mobile_number
 * @property string|null $admission_date
 * @property string|null $profile_pic
 * @property string|null $blood_group
 * @property string|null $height
 * @property string|null $weight
 * @property string|null $occupation
 * @property string|null $address
 * @property string|null $permanent_address
 * @property string|null $marital_status
 * @property string|null $qualification
 * @property string|null $work_experience
 * @property string|null $note
 * @property int $is_delete 0: not deleted, 1: deleted
 * @property int $status 0: active, 1: inactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdmissionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdmissionNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBloodGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCaste($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRollNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWorkExperience($value)
 */
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
use Cache;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getUser($user_type)
    {
        return User::select('users.*')
            ->where('user_type', '=', $user_type)
            ->where('is_delete', '=', 0)->get();
    }

    public function onlineUser()
    {
        return Cache::has('OnlineUser' . $this->id);
    }
    static public function getAdmin()
    {
        $return = User::select('users.*')
            ->where('user_type', '=', 1)
            ->where('is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', '=', Request::get('date'));
        }
        $return = $return->orderby('id', 'desc')
            ->paginate(5);

        return $return;
    }
    static public function  getParent()
    {
        $return = User::select('users.*')
            ->where('user_type', '=', 4)
            ->where('is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', '=', Request::get('date'));
        }
        $return = $return->orderby('id', 'desc')
            ->paginate(5);

        return $return;
    }
    static public function getClassTeacher()
    {
        $return = User::select('users.*')
            ->where('users.user_type', '=', 2)
            ->where('users.is_delete', '=', 0)
            ->orderby('users.id', 'desc')
            ->get();

        return $return;
    }
    static public function  getTeacher()
    {
        $return = User::select('users.*')
            ->where('user_type', '=', 2)
            ->where('is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('gender'))) {
            $return = $return->where('gender', 'like', '%' . Request::get('gender') . '%');
        }
        if (!empty(Request::get('admission_date'))) {
            $return = $return->whereDate('admission_date', '=', Request::get('admission_date'));
        }
        $return = $return->orderby('id', 'desc')
            ->paginate(5);

        return $return;
    }
    static public function getStudent()
    {
        $return = User::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_last_name')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0);
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
        }
        if (!empty(Request::get('admission_number'))) {
            $return = $return->where('users.admission_number', 'like', '%' . Request::get('admission_number') . '%');
        }
        if (!empty(Request::get('class'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class') . '%');
        }

        if (!empty(Request::get('gender'))) {
            $return = $return->where('users.gender', 'like', '%' . Request::get('gender') . '%');
        }
        $return = $return->orderby('users.id', 'desc')
            ->paginate(5);

        return $return;
    }

    static public function getSearchStudent()
    {

        if (!empty(Request::get('id')) || !empty(Request::get('name')) || !empty(Request::get('last_name')) || !empty(Request::get('email'))) {
            $return = User::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
                ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                ->join('class', 'class.id', '=', 'users.class_id', 'left')
                ->where('users.user_type', '=', 3)
                ->where('users.is_delete', '=', 0);
            if (!empty(Request::get('id'))) {
                $return = $return->where('users.id', '=',  Request::get('id'));
            }
            if (!empty(Request::get('name'))) {
                $return = $return->where('users.name', 'like', '%' . Request::get('name') . '%');
            }
            if (!empty(Request::get('last_name'))) {
                $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
            }
            if (!empty(Request::get('email'))) {
                $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
            }

            $return = $return->orderby('users.id', 'desc')
                ->limit(50)
                ->get();

            return $return;
        }
    }
    static public function getMyStudent($parent_id)
    {
        $return = User::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.parent_id', '=', $parent_id)
            ->where('users.is_delete', '=', 0)
            ->orderby('users.id', 'desc')
            ->get();
        return $return;
    }
    static public function getMyStudentTotalCount($parent_id)
    {
        $return = User::select('users.id')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.parent_id', '=', $parent_id)
            ->where('users.is_delete', '=', 0)
            ->orderby('users.id', 'desc')
            ->count();
        return $return;
    }
    static public function getMyStudentIDs($parent_id)
    {
        $return = User::select('users.id')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->where('users.user_type', '=', 3)
            ->where('users.parent_id', '=', $parent_id)
            ->where('users.is_delete', '=', 0)
            ->orderby('users.id', 'desc')
            ->get();

        $student_ids = array();
        foreach ($return as $value) {
            $student_ids[] = $value->id;
        }
        return $student_ids;
    }

    static public function getStudentClass($class_id)
    {
        return User::select('users.*', 'users.name', 'users.last_name')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0)
            ->where('users.class_id', '=', $class_id)
            ->orderby('users.id', 'desc')
            ->get();
    }
    static public function getTeacherMyStudents($teacher_id)
    {
        $return = User::select('users.*', 'class.name as class_name')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.id')
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0)
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->paginate(20);
        return $return;
    }
    static public function getTeacherMyStudentsCount($teacher_id)
    {
        $return = User::select('users.id')
            ->join('class', 'class.id', '=', 'users.class_id', 'left')
            ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.id')
            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
            ->where('assign_class_teacher.status', '=', 0)
            ->where('assign_class_teacher.is_delete', '=', 0)
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0)
            ->orderby('users.id', 'desc')
            ->groupby('users.id')
            ->count();
        return $return;
    }
    static public function getCollectFeesStudent()
    {
        $return = User::select('users.*', 'class.name as class_name', 'class.amount')
            ->join('class', 'class.id', '=', 'users.class_id')
            ->where('users.user_type', '=', 3)
            ->where('users.is_delete', '=', 0);
        if (!empty(Request::get('first_name'))) {
            $return = $return->where('users.name', 'like', '%' . Request::get('first_name') . '%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Request::get('last_name') . '%');
        }
        if (!empty(Request::get('class_id'))) {
            $return = $return->where('users.class_id', '=', Request::get('class_id'));
        }
        if (!empty(Request::get('student_id'))) {
            $return = $return->where('users.id', '=', Request::get('student_id'));
        }
        $return = $return->orderby('users.name', 'asc')
            ->paginate(50);

        return $return;
    }

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }
    static public function getTokenSingle($token)
    {
        return User::where('remember_token', '=', $token)->first();
    }
    static public function getSingle($id)
    {
        return User::find($id);
    }
    static public function getSingleClass($id)
    {
        return User::select('users.*', 'class.amount', 'class.name as class_name')
            ->join('class', 'class.id', '=', 'users.class_id')
            ->where('users.id', '=', $id)
            ->first();
    }
    static public function getPaidAmount($student_id, $class_id)
    {
        return StudentAddFeesModel::getPaidAmount($student_id, $class_id);
    }
    public function getProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/profile/' . $this->profile_pic)) {
            return url('upload/profile/' . $this->profile_pic);
        } else {
            return "";
        }
    }

    static public function getAttendance($student_id, $class_id, $attendance_date)
    {
        return StudentAttendanceModel::CheckAlreadyAttendance($student_id, $class_id, $attendance_date);
    }
    static public function SearchUser($search)
    {
        $return = self::select('users.*');
        $return = $return->where(function ($query) use ($search) {
            $query->where('users.name', 'like', '%' . $search . '%')
                ->orWhere('users.last_name', 'like', '%' . $search . '%');
        })->limit(10)->get();

        return $return;
    }


    static public function getTotalUser($user_type)
    {
        return User::select('users.id')
            ->where('user_type', '=', $user_type)
            ->where('is_delete', '=', 0)
            ->count();
    }
    public function getProfileDirect()
    {
        if (!empty($this->profile_pic) && file_exists('upload/profile/' . $this->profile_pic)) {
            return url('upload/profile/' . $this->profile_pic);
        } else {
            return url('upload/profile/user.jpg');
        }
    }
}
