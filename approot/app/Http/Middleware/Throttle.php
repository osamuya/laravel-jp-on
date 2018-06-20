<?php

namespace App\Http\Middleware;

// use \Illuminate\Cache\RateLimiter;
// use Illuminate\Routing\Middleware\ThrottleRequests;
use Closure;

class Throttle
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
        // $ob_limitter = new RateLimiter();
        // $ob = new ThrottleRequests(12);
        die("hoge");
        return $next($request);
    }












}
