<?php

namespace App\Models;
/**
 * App\Models\ChatModel
 *
 * @property int $id
 * @property int|null $sender_id
 * @property int|null $receiver_id
 * @property string|null $message
 * @property string|null $file
 * @property int $status
 * @property int|null $created_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ChatModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Request;
use Auth;

class ChatModel extends Model
{
    use HasFactory;

    protected $table = "chat";

    public static function getChat($receiver_id, $sender_id)
    {
        $query = self::select('chat.*')
            ->where(function ($q) use ($receiver_id, $sender_id) {

                $q->where(function ($q) use ($receiver_id, $sender_id) {
                    $q->where('receiver_id', $sender_id)
                        ->where('sender_id', $receiver_id)
                        ->where('status', '>', '-1');
                })->orWhere(function ($q) use ($receiver_id, $sender_id) {
                    $q->where('receiver_id', $receiver_id)
                        ->where('sender_id', $sender_id);
                });
            })
            ->where('message', '!=', '')
            ->orderBy('id', 'asc')
            ->get();
        return $query;
    }
    public function getConnectUser()
    {
        return $this->belongsTo(User::class, 'connect_user_id');
    }

    static  public function getChatUser($user_id)
    {
        $getuserchat = self::select('chat.*', DB::raw('(CASE WHEN chat.sender_id = "' . $user_id . '" THEN  chat.receiver_id ELSE chat.sender_id END) AS connect_user_id'))
            ->join('users as sender', 'sender.id', '=', 'chat.sender_id')
            ->join('users as receiver', 'receiver.id', '=', 'chat.receiver_id');

        if (!empty(Request::get('search'))) {
            $search = Request::get('search');
            $getuserchat = $getuserchat->where(function ($query) use ($search) {
                $query->where('sender.name', 'like', '%' . $search . '%')
                    ->orWhere('receiver.name', 'like', '%' . $search . '%');
            });
        }
        $getuserchat = $getuserchat->whereIn('chat.id', function ($query) use ($user_id) {
            $query->selectRaw('max(chat.id)')->from('chat')
                ->where('chat.status', '<', 2)
                ->where(function ($query) use ($user_id) {
                    $query->where('chat.sender_id', '=', $user_id)
                        ->orWhere(function ($query) use ($user_id) {
                            $query->where('chat.receiver_id', '=', $user_id)
                                ->where('chat.status', '>', '-1');
                        });
                })
                ->groupBy(DB::raw('CASE WHEN chat.sender_id = "' . $user_id . '" THEN  chat.receiver_id ELSE sender_id END'));
        })
            ->orderBy('chat.id', 'desc')
            ->get();

        $result = array();
        foreach ($getuserchat as $value) {
            $data = array();
            $data['id'] = $value->id;
            $data['message'] = $value->message;
            $data['created_date'] = $value->created_date;
            $data['user_id'] = $value->connect_user_id;
            $data['name'] = $value->getConnectUser->name . ' ' . $value->getConnectUser->last_name;
            $data['is_online'] = $value->getConnectUser->onlineUser();

            $data['profile_pic'] = $value->getConnectUser->getProfileDirect();
            $data['messagecount'] = $value->CountMessage($value->connect_user_id, $user_id);
            $result[] = $data;
        }
        // dd($result);
        return $result;
    }

    static public function CountMessage($connect_user_id, $user_id)
    {
        return self::where('sender_id', '=', $connect_user_id)->where('receiver_id', '=', $user_id)
            ->where('status', '=', 0)
            ->count();
    }
    static public function  updateCount($sender_id, $receiver_id)
    {
        return self::where('sender_id', '=', $receiver_id)->where('receiver_id', '=', $sender_id)
            ->where('status', '=', '0')
            ->update(['status' => '1']);
    }
    public function getSender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function getReceiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function getFile()
    {
        if (!empty($this->file) && file_exists('upload/chat/' . $this->file)) {
            return url('upload/chat/' . $this->file);
        } else {
            return "";
        }
    }

    static  public function getAllchatuserCount()
    {
        $user_id = Auth::user()->id;
        $return = self::select('chat.id')
            ->join('users as sender', 'sender.id', '=', 'chat.sender_id')
            ->join('users as receiver', 'receiver.id', '=', 'chat.receiver_id')
            ->where('chat.receiver_id', '=', $user_id)
            ->where('chat.status', '=', 0)
            ->count();
        return $return;
    }
}
