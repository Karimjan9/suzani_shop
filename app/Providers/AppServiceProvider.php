<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        RateLimiter::for('login', function (Request $request): Limit {
            $login = Str::lower((string) $request->input('login'));

            return Limit::perMinute(5)->by($login.'|'.$request->ip());
        });

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
