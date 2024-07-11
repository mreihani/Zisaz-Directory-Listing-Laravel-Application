<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use App\Jobs\VisitorLogging\VisitorLogging;
use Symfony\Component\HttpFoundation\Response;

class VisitorLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        if($request->getMethod() == "GET") {
            $incoming = [
                'url' => $request->fullUrl(),
                'device' => Agent::device(),
                'platform' => Agent::platform(),
                'browser' => Agent::browser(),
                'ip' => $request->ip(),
                'user_id' => auth()->check() ? auth()->user()->id : null,
            ]; 
            
            dispatch(new VisitorLogging($incoming));
        }

        return $next($request);
    }
}
