<?php

namespace App\Http\Middleware\Whitelist;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WhiteListIpAddressMiddleware
{

    public $whitelistIps = [
        '127.0.0.1',
        '77.237.66.139',
        '95.179.164.111'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array($request->ip(), $this->whitelistIps)) {
            abort(403, "You are restricted to access the site.");
        }

        return $next($request);
    }
}
