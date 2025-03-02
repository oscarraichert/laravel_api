<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAuthorizedDomain
{
    public function handle(Request $request, Closure $next): Response
    {
        $authorized_host = env('AUTHORIZED_HOST');
        if ($request->getHost() == $authorized_host) {
            return $next($request);
        }

        return response()->json(['Message' => 'Your host is not authorized'], 401);
    }
}
