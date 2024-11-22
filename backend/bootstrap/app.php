<?php

use App\Http\Middleware\ForceJsonRequestMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            $apiRoutes = config('api_routes');
            foreach ($apiRoutes as $version => $domains) {
                foreach ($domains as $prefix => $filepath) {
                    Route::prefix("api/$version/$prefix")
                        ->group(base_path($filepath));
                }
            }
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append([ForceJsonRequestMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
