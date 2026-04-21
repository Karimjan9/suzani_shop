<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole() || ! $this->app->bound('request')) {
            return;
        }

        $request = $this->app['request'];
        $basePath = rtrim($request->getBasePath(), '/');
        $rootUrl = rtrim($request->getSchemeAndHttpHost().$basePath, '/');

        URL::forceRootUrl($rootUrl);

        Vite::createAssetPathsUsing(static function (string $path) use ($basePath): string {
            $prefix = $basePath === '' ? '' : $basePath;

            return $prefix.'/'.ltrim($path, '/');
        });
    }
}
