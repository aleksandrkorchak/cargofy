<?php

namespace App\Providers;

use App\Services\City;
use App\Services\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @param Request $request
     * @return void
     */
    public function boot(Request $request)
    {
        View::composer('index', function ($view) use ($request) {
            $view->with('languages', (new Language())->getLanguagesWithPath($request->path()));
            $view->with('localization', \Lang::get('localization'));
            $view->with('locale', \Lang::getLocale());
            $view->with('cities', (new City())->getAllCities());
        });
    }
}
