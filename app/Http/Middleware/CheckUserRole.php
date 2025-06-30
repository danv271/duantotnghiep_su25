<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role_id === 2 || auth()->user()->role_id === 6 ) {
            return $next($request); // Cho phép đi tiếp
        }

        return redirect('/'); // Không phải admin -> chuyển hướng
    }
}
