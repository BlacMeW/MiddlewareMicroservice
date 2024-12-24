<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request has a custom header
        if (!$request->hasHeader('X-Custom-Header')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Add a custom response header
        $response = $next($request);
        $response->headers->set('X-Middleware-Processed', 'True');
        return $response;
    }
}
