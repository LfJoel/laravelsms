<?php

namespace App\Models;
/**
 * App\Models\NoticeBoardModel
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $notice_date
 * @property string|null $publish_date
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel whereNoticeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Request;

class NoticeBoardModel extends Model
{
    use HasFactory;
    protected $table = "notice_board";

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {

        $return = self::select('notice_board.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'notice_board.created_by');

        if (!empty(Request::get('title'))) {
            $return = $return->where('notice_board.title', 'like', '%' . Request::get('title') . '%');
        }

        if (!empty(Request::get('notice_date_from'))) {
            $return = $return->whereDate('notice_board.notice_date', '>=', Request::get('notice_date_from'));
        }
        if (!empty(Request::get('notice_date_to'))) {
            $return = $return->whereDate('notice_board.notice_date', '<=', Request::get('notice_date_to'));
        }

        if (!empty(Request::get('publish_date_from'))) {
            $return = $return->whereDate('notice_board.publish_date', '>=', Request::get('publish_date_from'));
        }
        if (!empty(Request::get('publish_date_to'))) {
            $return = $return->whereDate('notice_board.publish_date', '<=', Request::get('publish_date_to'));
        }
        if (!empty(Request::get('message_to'))) {
            $return = $return->join('notice_board_message', 'notice_board_message.id', '=', 'notice_board.id');

            $return = $return->where('notice_board_message.message_to', '=', Request::get('message_to'));
        }
        $return = $return->orderby('notice_board.id', 'desc')
            ->paginate(20);
        return $return;
    }

    static public function getRecordUser($message_to)
    {
        $return = self::select('notice_board.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'notice_board.created_by')
            ->join('notice_board_message', 'notice_board_message.notice_board_id', '=', 'notice_board.id');
            if (!empty(Request::get('title'))) {
                $return = $return->where('notice_board.title', 'like', '%' . Request::get('title') . '%');
            }
            if (!empty(Request::get('notice_date_from'))) {
                $return = $return->whereDate('notice_board.notice_date', '>=', Request::get('notice_date_from'));
            }
            if (!empty(Request::get('notice_date_to'))) {
                $return = $return->whereDate('notice_board.notice_date', '<=', Request::get('notice_date_to'));
            }
            $return = $return->where('notice_board_message.message_to', '=', $message_to);
            $return = $return->where('notice_board.publish_date', '<=', date('Y-m-d'));
            $return = $return->orderby('notice_board.id', 'desc')
            ->paginate(20);
        return $return;
    }
    static public function getNoticeBoardCount($message_to)
    {
        $return = self::select('notice_board.id')
            ->join('users', 'users.id', '=', 'notice_board.created_by')
            ->join('notice_board_message', 'notice_board_message.notice_board_id', '=',
            'notice_board.id');

            $return = $return->where('notice_board_message.message_to', '=', $message_to);
            $return = $return->where('notice_board.publish_date', '<=', date('Y-m-d'));
            $return = $return->orderby('notice_board.id', 'desc')
            ->count();
        return $return;
    }

    public function getMessage()
    {
        return $this->hasmany(NoticeBoardMessageModel::class, 'notice_board_id');
    }
    public function getMessageToSingle($notice_board_id, $message_to)
    {
        return NoticeBoardMessageModel::where('notice_board_id', '=', $notice_board_id)
            ->where('message_to', '=', $message_to)->first();
    }


}
