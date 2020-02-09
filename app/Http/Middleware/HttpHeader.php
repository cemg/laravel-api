<?php

namespace App\Http\Middleware;

use Closure;

class HttpHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('X-Api-Version', '1.0.0');
        $response->header('X-Api-Custom', 'Test');
        
        return $response;
    }
}
