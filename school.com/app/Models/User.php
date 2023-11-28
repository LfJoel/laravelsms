<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PgSql\Result;
use Request as Requests;

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


    static public function getAdmin()
    {
        $return = User::select('users.*')
            ->where('user_type', '=', 1)
            ->where('is_delete', '=', 0);
        if (!empty(Requests::get('name'))) {
            $return = $return->where('name', 'like', '%' . Requests::get('name') . '%');
        }
        if (!empty(Requests::get('email'))) {
            $return = $return->where('email', 'like', '%' . Requests::get('email') . '%');
        }
        if (!empty(Requests::get('date'))) {
            $return = $return->whereDate('created_at', '=', Requests::get('date'));
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
        if (!empty(Requests::get('name'))) {
            $return = $return->where('name', 'like', '%' . Requests::get('name') . '%');
        }
        if (!empty(Requests::get('email'))) {
            $return = $return->where('email', 'like', '%' . Requests::get('email') . '%');
        }
        if (!empty(Requests::get('date'))) {
            $return = $return->whereDate('created_at', '=', Requests::get('date'));
        }
        $return = $return->orderby('id', 'desc')
            ->paginate(5);

        return $return;
    }
    static public function  getTeacher()
    {
        $return = User::select('users.*')
            ->where('user_type', '=', 2)
            ->where('is_delete', '=', 0);
        if (!empty(Requests::get('name'))) {
            $return = $return->where('name', 'like', '%' . Requests::get('name') . '%');
        }
        if (!empty(Requests::get('email'))) {
            $return = $return->where('email', 'like', '%' . Requests::get('email') . '%');
        }
        if (!empty(Requests::get('gender'))) {
            $return = $return->where('gender', 'like', '%' . Requests::get('gender') . '%');
        }
        if (!empty(Requests::get('admission_date'))) {
            $return = $return->whereDate('admission_date', '=', Requests::get('admission_date'));
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
        if (!empty(Requests::get('name'))) {
            $return = $return->where('users.name', 'like', '%' . Requests::get('name') . '%');
        }
        if (!empty(Requests::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' . Requests::get('last_name') . '%');
        }
        if (!empty(Requests::get('admission_number'))) {
            $return = $return->where('users.admission_number', 'like', '%' . Requests::get('admission_number') . '%');
        }
        if (!empty(Requests::get('class'))) {
            $return = $return->where('class.name', 'like', '%' . Requests::get('class') . '%');
        }

        if (!empty(Requests::get('gender'))) {
            $return = $return->where('users.gender', 'like', '%' . Requests::get('gender') . '%');
        }
        $return = $return->orderby('users.id', 'desc')
            ->paginate(5);

        return $return;
    }

    static public function getSreachStudent()
    {

        if (!empty(Requests::get('id')) || !empty(Requests::get('name')) || !empty(Requests::get('last_name')) || !empty(Requests::get('email'))) {
            $return = User::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
                ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                ->join('class', 'class.id', '=', 'users.class_id', 'left')
                ->where('users.user_type', '=', 3)
                ->where('users.is_delete', '=', 0);
            if (!empty(Requests::get('id'))) {
                $return = $return->where('users.id', '=',  Requests::get('id'));
            }
            if (!empty(Requests::get('name'))) {
                $return = $return->where('users.name', 'like', '%' . Requests::get('name') . '%');
            }
            if (!empty(Requests::get('last_name'))) {
                $return = $return->where('users.last_name', 'like', '%' . Requests::get('last_name') . '%');
            }
            if (!empty(Requests::get('email'))) {
                $return = $return->where('email', 'like', '%' . Requests::get('email') . '%');
            }

            $return = $return->orderby('users.id', 'desc')
                ->limit(50)
                ->get();

            return $return;
        }
        // dd(Requests::all());
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

    public function getProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/profile/' . $this->profile_pic)) {
            return url('upload/profile/' . $this->profile_pic);
        } else {
            return "";
        }
    }
}
