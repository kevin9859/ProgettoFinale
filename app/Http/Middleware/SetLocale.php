<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('applocale') && array_key_exists(Session::get('applocale'), config('app.locales'))) {
            App::setLocale(Session::get('applocale'));
        } else { // Questa parte è opzionale
            Session::put('applocale', config('app.fallback_locale'));
            App::setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}

