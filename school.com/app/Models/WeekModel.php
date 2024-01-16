<?php

namespace App\Models;
/**
 * App\Models\WeekModel
 *
 * @property int $id
 * @property string|null $name
 * @property int $full_calendar_day
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel whereFullCalendarDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeekModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekModel extends Model
{
    use HasFactory;

    protected $table = "week";

    static public function getRecord(){

        return self::get();
    }
    static public function getWeekUsingName($weekname){

        return self::where('name' ,'=',$weekname)->first();
    }
}
