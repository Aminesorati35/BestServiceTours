<?php

use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\ClientAuthenticated;
use App\Http\Middleware\SuperAdminAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin'=> AdminAuthenticated::class,
            'client'=> ClientAuthenticated::class,
            'superAdmin' =>SuperAdminAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
