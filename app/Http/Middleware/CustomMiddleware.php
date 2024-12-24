<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pre-process the request
        if (!$request->has('api_key')) {
            return response()->json(['error' => 'API key missing'], 400);
        }

        // Proceed to the next middleware or controller
        $response = $next($request);

        // Post-process the response
        $response->headers->set('X-Middleware', 'Processed');

        return $response;
    }
}
