<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MustBeAdmin
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
        if(auth()->user()->role == "admin"){
            return $next($request);
        }else{
            abort(ResponseAlias::HTTP_FORBIDDEN);
        }
    }
}
