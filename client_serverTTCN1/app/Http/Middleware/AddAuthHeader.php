<?php

namespace App\Http\Middleware;

use Closure;

class AddAuthHeader
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
        if (!$request->bearerToken()) {
            if ($request->hasCookie('_token')) {
                $token = $request->cookie('_token');
                $request->headers->add([
                    'Authorization' => 'Bearer ' . $token,
                    'Set-Cookie' => 'HttpOnly=false;Secure=null;SameSite=none'
                ]);
            }
        }
        return $next($request);
    }
}
