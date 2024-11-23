<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->admin) {
            return $next($request);
        }
        return redirect('/')->with('error', 'Unauthorized access.'); // Chuyển hướng về trang chính hoặc trang đăng nhập
        
    }
    
}
