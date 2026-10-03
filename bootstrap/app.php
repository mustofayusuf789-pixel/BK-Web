<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// Pindahkan folder storage ke /tmp khusus untuk lingkungan Vercel
if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || env('VERCEL')) {
    $app->useStoragePath('/tmp');
}

return $app;