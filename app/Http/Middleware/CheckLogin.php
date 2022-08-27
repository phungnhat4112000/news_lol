<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//muốn sử dụng đối tượng nào thì phải khai báo đối tượng đó ở đây
//sử dụng đối tượng Auth đêr kiểm tra đăng nhập
use Auth;

class CheckLogin
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
        //kiểm tra xem user đã đăng nhập chưa
        /*
         url('login') -> tạo đường dẫn url
        redirect -> di chuyển đến một url
         */
        if(Auth::check() == false)
            return redirect(url('login'));
        return $next($request);
    }
}
