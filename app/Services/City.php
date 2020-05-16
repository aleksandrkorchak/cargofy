<?php


namespace App\Services;


use Illuminate\Http\Request;

class City
{
    public function __construct()
    {

    }


    public function getSlug($city){
        $cityModel = \App\Models\City::whereRaw('lower(name->>"$.en") = lower(?)', $city)
                                   ->orWhereRaw('lower(name->>"$.ua") = lower(?)', $city)
                                   ->first();

        return $cityModel;
    }


    /**
     * Get the names of all cities name and their ids
     *
     * @return \App\Models\City[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCities(){
        $cities = \App\Models\City::all('name', 'id');

        return $cities;
    }
}
