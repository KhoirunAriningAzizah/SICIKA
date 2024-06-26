<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthStafHR
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
        if($request->session()->get('user')['role'] == 'Manager'){
            return $next($request);
          }
          return redirect('login')->with('failed','Akses ditolak ! Anda bukan Pejabat Struktural.');
    }
}
