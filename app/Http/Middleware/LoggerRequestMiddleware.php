<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
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

        if ($request->path() == 'up') {
            return $response;
        }

        ActivityLog::create([
            'activity' => $request->path(),
            'properties' => json_encode([
                'url' => $request->url(),
                'path' => $request->path(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'user_id' => $request->user()->id ?? null,
                'response' => $response->getStatusCode(),
            ]),
            'user_id' => $request->user()->id ?? null,
        ]);

        return $response;
    }
}
