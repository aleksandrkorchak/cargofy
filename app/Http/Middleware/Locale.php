<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();
        if ($locale){
            App::setLocale($locale);
        }

        return $next($request);
    }


    /**
     * Get local from request
     *
     * @return string|void|null
     */
    public static function getLocale(){
        $localeFromRequest = strtolower(Request::segment(1));
        $availableLocales = config('app.locales');

        if (!empty($localeFromRequest) && in_array($localeFromRequest, $availableLocales)){
            if ($localeFromRequest != config('app.locale')) {
                return $localeFromRequest;
            }
        }

        return null;
    }
}
