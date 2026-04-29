<?php

namespace App\Http\Middleware;

use App\Support\Locales;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('locale', Locales::DEFAULT);

        if (! Locales::isSupported($locale)) {
            $locale = Locales::DEFAULT;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
