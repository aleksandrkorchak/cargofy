<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoadRequest;
//use App\Http\Resources\LoadCollection;
use App\Http\Resources\LoadResource;
//use App\Http\Resources\Load as LoadResource;

use App\Models\Load;
//use App\Services\Loads;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LoadController extends Controller
{

    /**
     *
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(){
        $loadsDB = Load::with(['cityFrom', 'cityTo'])->get([
            'id',
            'city_from_id',
            'city_to_id',
            'name',
            'volume',
            'photo'
        ]);

        $loads = LoadResource::collection($loadsDB);


        return view('index', ['loads' => $loads->toJson()]);
    }


    /**
     * Store new load
     *
     * @param StoreLoadRequest $request
     * @return RedirectResponse
     */
    public function store(StoreLoadRequest $request){
        $name = new class{};
        $name->en = $request->enName;
        $name->ua = $request->uaName;
        $nameJson = json_encode($name);

        $filePath = Storage::put('', $request->photo);

        $load = [
            'city_from_id' => $request->cityFrom,
            'city_to_id' => $request->cityTo,
            'name' => $nameJson,
            'volume' => $request->volume,
            'photo' => $filePath
        ];

        $result = Load::insert($load);

        if ($result){
            return back()->with('messages', __('localization.message_load_add_success'));
        }
        else {
            return back()->withErrors(['errors' => 'Запись не была добавлена']);
        }

    }



}
