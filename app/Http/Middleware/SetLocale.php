<?php

namespace App\Http\Middleware;

use App\Support\Locales;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $basePath = rtrim($request->getBasePath(), '/');
        $rootUrl = rtrim($request->getSchemeAndHttpHost().$basePath, '/');

        URL::forceRootUrl($rootUrl);

        Vite::createAssetPathsUsing(static function (string $path) use ($basePath): string {
            $prefix = $basePath === '' ? '' : $basePath;

            return $prefix.'/'.ltrim($path, '/');
        });

        $locale = $request->session()->get('locale', Locales::DEFAULT);

        if (! Locales::isSupported($locale)) {
            $locale = Locales::DEFAULT;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
