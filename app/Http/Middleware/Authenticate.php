<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;


class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request, Closure $next)
    {
        if (! $request->session()->get('login')) {
            return route('login');
        }

        return $next($request);
    }
}
