<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty($request->session()->get('nhanvien')) || $request->session()->get('nhanvien')->Active=='Chưa Kích Hoạt'){
            return redirect()->route('admin.dangNhap');
        }
        return $next($request);
    }
}
