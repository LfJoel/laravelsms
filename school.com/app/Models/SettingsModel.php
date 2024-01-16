<?php

namespace App\Models;
/**
 * App\Models\SettingsModel
 *
 * @property int $id
 * @property string|null $paypal_email
 * @property string|null $stripe_key
 * @property string|null $stripe_secret
 * @property string|null $fevicon_icon
 * @property string|null $logo
 * @property string|null $small_logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereFeviconIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel wherePaypalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereSmallLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereStripeKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereStripeSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsModel whereUpdatedAt($value)
 */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    use HasFactory;
    protected $table = "setting";

    static public function getSingle()
    {
        return self::find(1);
    }
    public function getLogo()
    {
        if (!empty($this->logo) && file_exists('upload/setting/' . $this->logo)) {
            return url('upload/setting/' . $this->logo);
        } else {
            return "";
        }
    }
    public function getSmallLogo()
    {
        if (!empty($this->small_logo) && file_exists('upload/setting/' . $this->small_logo)) {
            return url('upload/setting/' . $this->small_logo);
        } else {
            return "";
        }
    }
    public function getFevicon()
    {
        if (!empty($this->fevicon_icon) && file_exists('upload/setting/' . $this->fevicon_icon)) {
            return url('upload/setting/' . $this->fevicon_icon);
        } else {
            return "";
        }
    }
}
