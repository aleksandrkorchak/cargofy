<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoadRequest;
use App\Services\Loads;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoadController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoadsTransportRoutes(Request $request){
        $segments = $request->segments();

        $slug = null;
        switch (count($segments)){
            case 2:
                $slug = $segments[1];
                break;
            case 3:
                $slug = $segments[2];
        }

        $loadsInst = new Loads();
        $loads = $loadsInst->get($slug);

        return view('index', compact('loads'));
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

        $filePath = Storage::disk('local')->put('images', $request->photo);

        $load = [
            'city_from_id' => $request->cityFrom,
            'city_to_id' => $request->cityTo,
            'name' => $nameJson,
            'volume' => $request->volume,
            'photo' => $filePath
        ];

        $loadInst = new Loads();
        $loadInst->storeLoad($load);

        return back()->with('messages', __('localization.message_load_add_success'));
    }


}
