<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
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
        $currentLocale = \Str::lower($request->segment(1));
        $availableLocales = config('app.locales');

        if (in_array($currentLocale, $availableLocales))
        {
            App::setLocale($currentLocale);
        }

        return $next($request);
    }
}
