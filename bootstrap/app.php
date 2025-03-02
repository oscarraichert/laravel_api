<?php

use App\Http\Middleware\EnsureAuthorizedDomain;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(EnsureAuthorizedDomain::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function (Response $response, Throwable $th, Request $request) {
            if ($response->getStatusCode() === 500 && $request->is('api/*')) {
                return response()->json([
                    'message' => $th->getMessage(),
                ], 500);
            }

            return $response;
        });
    })->create();
