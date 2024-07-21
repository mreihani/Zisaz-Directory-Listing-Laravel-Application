<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminRoles = collect(config('jaban.admin_roles'))->pluck('title')->toArray();

        if(!in_array($request->user()->role, $adminRoles)) {
            return redirect(route('home-page'));
        } 

        return $next($request);
    }
}
