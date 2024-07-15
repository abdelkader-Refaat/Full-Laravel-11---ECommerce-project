<?php

use App\Http\Middleware\Admins;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath;
use Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web:[ __DIR__.'/../routes/web.php',
              __DIR__.'/../routes/auth.php',],
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function()
        {
            Route::middleware(['web'])->group(base_path('routes/admin.php'));
            // Route::middleware(['web'])->group(base_path('routes/auth.php')); // defined above __DIR__
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin'                   => Admins::class,
            'localize'                => LaravelLocalizationRoutes::class,
            'localizationRedirect'    => LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect'   => LocaleSessionRedirect::class,
            'localeCookieRedirect'    => LocaleCookieRedirect::class,
            'localeViewPath'          => LaravelLocalizationViewPath::class
    ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
