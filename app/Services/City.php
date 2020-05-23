<?php


namespace App\Services;


use App\Http\Resources\CityResource;
use Illuminate\Http\Request;

class City
{

//    public function getSlug($city){
//        $cityModel = \App\Models\City::whereRaw('lower(name->>"$.en") = lower(?)', $city)
//                                   ->orWhereRaw('lower(name->>"$.ua") = lower(?)', $city)
//                                   ->first();
//
//        return $cityModel;
//    }


    /**
     * Get the names of all cities name and their ids
     *
     * @return string
     */
    public function getAllCities(){
        $citiesDB = \App\Models\City::all('id', 'name', 'slug');

        return CityResource::collection($citiesDB);
    }


}
