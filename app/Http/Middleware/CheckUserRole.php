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
        if (auth()->check()) {
        $user = auth()->user();
        $role = $user->role; 

        // Kiểm tra vai trò có tồn tại và thuộc danh sách cho phép
        if ($role && in_array($role->role_name, ['admin', 'Super admin'])) {
            return $next($request); // Cho phép tiếp tục
        }
    }
        return redirect('/'); // Không phải admin -> chuyển hướng
    }
}
