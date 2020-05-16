<?php


namespace App\Services;


use App\Models\City;
use App\Models\Load;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Loads
{

    /**
     * Get all loads or get loads by city slug
     *
     * @param $slug
     */
//    public function get($slug = null){
//        if($slug){
//            $city = City::where('slug', $slug)->first();
//            return $city->loadsFrom()->with(['cityFrom', 'cityTo'])->get();
//        } else {
//            return Load::with(['cityFrom', 'cityTo'])->get();
//        }
//    }
    public function get($slug = null){
        if($slug){
            $city = City::where('slug', $slug)->first();
            return Load::where('city_from_id', $city->id)->with(['cityFrom', 'cityTo'])->get();
        } else {
            return Load::with(['cityFrom', 'cityTo'])->get();
        }
    }


    /**
     * Store new load
     *
     * @param array $load
     */
    public function storeLoad(array $load){
        Load::insert($load);
    }


}
