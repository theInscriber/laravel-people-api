<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthenticateWithToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!config()->has('auth.accepted_api_keys'))
            abort(401, 'There are no API Keys');

        if(!in_array($request->get('api_key'), config('auth.accepted_api_keys')))
            abort(401, 'API key not found');

        return $next($request);
    }
}
