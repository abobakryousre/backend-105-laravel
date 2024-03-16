<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // logic before handling request;
        return $next($request);

        // logic after handling req, and before res
        $response = $next($request);
        // dd($response->cookie('name', "abobakr"));
        // dd($response);

        return $response;
    }
}
