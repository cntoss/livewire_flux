<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', config('app.locale'));
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return $next($request);
    }
}
