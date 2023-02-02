<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isStudentVerify
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
        if(admin()->roles == "studentVerify" || admin()->roles == "admin" || admin()->roles == "super")
        {
            return $next($request);
        }
        return redirect()->route('admin.dashboard');
    }
}
