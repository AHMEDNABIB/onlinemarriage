<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ComplainControll
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
        if(session()->get('complain_gst_app_id')) {
            return $next($request);
        } else {
            return redirect()->route('complain.login')->with('err_msg', "আগে লগইন করুন");
        }
    }
}
