<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateWithApiKey
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
            abort(503, 'There are no API Keys in the systems. Please contact the support with the issue.');

        if (!$request->has('api_key'))
            abort(400, 'API Key required');

        if(!in_array($request->get('api_key'), config('auth.accepted_api_keys')))
            abort(401, 'API Key not found');

        return $next($request);
    }
}
