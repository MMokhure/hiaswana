<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(\App\Http\Middleware\SecurityHeaders::class);

        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, $request) {
            $status = 500;
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface) {
                $status = $e->getStatusCode();
            } elseif ($e instanceof \Illuminate\Auth\AuthenticationException) {
                $status = 401;
            } elseif ($e instanceof \Illuminate\Auth\Access\AuthorizationException) {
                $status = 403;
            } elseif ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException || $e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                $status = 404;
            }

            $views = [
                403 => 'errors.403',
                404 => 'errors.404',
                500 => 'errors.500',
            ];

            if (view()->exists($views[$status] ?? null)) {
                return response()->view($views[$status] ?? 'errors.generic', [], $status);
            }

            return null;
        });
    })->create();
