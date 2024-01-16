<?php

namespace App\Models;

/**
 * App\Models\NoticeBoardMessageModel
 *
 * @property int $id
 * @property int|null $notice_board_id
 * @property int|null $message_to
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NoticeBoardMessageModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel whereMessageTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel whereNoticeBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NoticeBoardMessageModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeBoardMessageModel extends Model
{
    use HasFactory;
    protected $table = "notice_board_message";

    static public function deleteRecord($id){
        NoticeBoardMessageModel::where('notice_board_id','=',$id)->delete();
    }
}
