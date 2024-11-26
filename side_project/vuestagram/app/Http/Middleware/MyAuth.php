<?php

namespace App\Http\Middleware;

use MyToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 토큰이 유효하면 통과, 유효하지 않으면 퉁과 못함
        Log::debug('MyAuth : '.$request->bearerToken());

        MyToken::chkToken($request->bearerToken());

        return $next($request);
    }
}
