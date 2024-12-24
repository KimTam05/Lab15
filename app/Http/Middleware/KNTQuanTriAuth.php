<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KNTQuanTriAuth
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
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Session::has('KNTQuanTri')) {
            return redirect()->route('KNTadmin.login');
        }

        // Nếu đã đăng nhập, cho phép tiếp tục
        return $next($request);
    }
}
