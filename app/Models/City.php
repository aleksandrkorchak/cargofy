<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\City
 *
 * @property int $id
 * @property mixed $name
 * @property float $lat
 * @property float $lng
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereName($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    use HasTranslations;

    public $timestamps = false;
    public $translatable = ['name'];




    public function loadsFrom(){
        return $this->hasMany('App\Models\Load', 'city_from_id');
    }

    public function loadsTo(){
        return $this->hasMany('App\Models\Load', 'city_to_id');
    }
}
