<?php

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    ) 
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\VerifyCsrfToken::class,
        ]);
    }) 
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin.auth' => AdminMiddleware::class, // ✅ Register alias
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
