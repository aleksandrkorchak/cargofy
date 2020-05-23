<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Load
 *
 * @property int $id
 * @property int $city_from_id
 * @property int $city_to_id
 * @property mixed $name
 * @property float $volume
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load whereCityFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load whereCityToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Load whereVolume($value)
 * @mixin \Eloquent
 */
class Load extends Model
{
    use HasTranslations;

    public $translatable = ['name'];


//    public function cityFrom(){
//        return $this->belongsTo('App\Models\City', 'city_from_id', 'id', 'loads_city_from_id_foreign');
//    }
//    public function cityTo(){
//        return $this->belongsTo('App\Models\City', 'city_to_id', 'id', 'loads_city_to_id_foreign');
//    }


    public function cityFrom(){
        return $this->belongsTo(City::class, 'city_from_id');
    }
    public function cityTo(){
        return $this->belongsTo(City::class, 'city_to_id');
    }

}
