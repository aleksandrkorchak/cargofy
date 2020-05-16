<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetLoadsRequest;
use App\Http\Requests\GetSlugRequest;
use App\Services\Language;
use App\Services\Loads;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Get slug for city name
     *
     * @param GetSlugRequest $request
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function slug(GetSlugRequest $request){
        $cityName = $request->query('city');
        $city = new \App\Services\City();
        $slug = $city->getSlug($cityName);

        return $slug;
    }


    /**
     * Get all loads or get loads by city slug
     *
     * @param GetLoadsRequest $request
     * @return Builder[]|Collection
     */
    public function loads(GetLoadsRequest $request){
        $slug = $request->query('slug');

        $loadsInst = new Loads();

        return $loadsInst->get($slug);
    }


    /**
     * Get languages with path for menu
     *
     * @param Request $request
     * @return \string[][]
     */
    public function languages(Request $request){
        $langInst = new Language();

        return $langInst->getLanguagesWithPath($request->path);
    }

}
