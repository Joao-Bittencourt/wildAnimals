<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LoggerRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        Log::channel('requestlog')->info('requestlog', [
            'request' => [
                'url' => $request->url(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'user' => $request->user()->id ?? null,
            ],
            'response' => $response->getStatusCode(),
            'created_at' => Carbon::now(),
        ]);

        return $response;
    }
}
