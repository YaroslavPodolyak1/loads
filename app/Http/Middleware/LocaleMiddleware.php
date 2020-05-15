<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public static $languages = ['en', 'uk'];

    public static function getLocale()
    {
        $localeSegment = request()->segment(1);
        if (! empty($localeSegment) && in_array($localeSegment, self::$languages)) {

            if ($localeSegment != config('app.locale')) {
                return $localeSegment;
            }

        }

        return null;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        if ($locale) {
            App::setLocale($locale);
        } else {
            App::setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
