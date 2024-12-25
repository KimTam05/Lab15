<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\KNTQuantri;

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
        if (!Session::has('KNTQuanTri')) {
            return redirect()->route('KNTadmin.login');
        }

        $KNTAdminSession = Session::get('KNTQuanTri');
        $KNTAdminDatabase = KNTQuantri::where('kntTaikhoan', $KNTAdminSession)->first();
        if(!$KNTAdminDatabase || !$KNTAdminSession){
            return redirect()->route('KNTadmin.login');
        }

        return $next($request);
    }
}
