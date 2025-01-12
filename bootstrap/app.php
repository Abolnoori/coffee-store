<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyCsrfToken;


$namespace = 'App\Http\Controllers';
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function() use ($namespace) {

            Route::middleware(['web', 'api'])
                ->namespace($namespace)
                ->prefix('api/v1')
                ->group(base_path('routes/v1/user.php'));

            Route::middleware(['web', 'api'])
                ->namespace($namespace)
                ->prefix('api/v1')
                ->group(base_path('routes/v1/contact.php'));
            Route::middleware(['web', 'api'])
                ->namespace($namespace)
                ->prefix('api/v1')
                ->group(base_path('routes/v1/login.php'));
            Route::middleware(['web', 'api'])
                ->namespace($namespace)
                ->prefix('api/v1')
                ->group(base_path('routes/v1/product.php'));
             Route::middleware(['web', 'api'])
                ->namespace($namespace)
                ->prefix('api/v1')
                ->group(base_path('routes/v1/cart.php'));
 


        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except:['api/*']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Exception handling definitions
    })
    ->create();

