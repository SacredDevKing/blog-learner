<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*
         * Если у пользователя роль не "админ", тогда мы говорим ему что у него нет прав.
         * Если роль "админ", тогда мы пропускаем его
         */

        if(auth()->user()->role !== 'admin'){
            return response()
                ->json([
                    'status' => false,
                ])
                ->setStatusCode(401, 'User is have not permissions');
        }
        return $next($request);
    }
}
