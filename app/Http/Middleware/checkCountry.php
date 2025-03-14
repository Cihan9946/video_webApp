<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkCountry
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $clientIP = $request->ip();
        $ip_split = explode(".", $clientIP);
        if ($clientIP != null) {
            if (isset($ip_split)) {
                if ($ip_split[0] == "10" || $clientIP == '172.17.4.144') {
                    return $next($request);
                } else {
                    return abort(403);
                }
            } else {
                return abort(403);
            }
        } else {
            abort(404);
        }
    }
}
