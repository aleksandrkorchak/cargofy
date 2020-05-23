<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoadResource;
use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class CityLoadController extends Controller
{

    /**
     * Display a listing of the resource
     *
     * @param City $city
     * @return Application|Factory|View
     */
    public function __invoke(City $city)
    {
        $loadsCollection = $city->loadsFrom()->with(['cityFrom', 'cityTo'])->get();
        $loads = LoadResource::collection($loadsCollection);

        return view('index', ['loads' => $loads->toJson()]);
    }
}
