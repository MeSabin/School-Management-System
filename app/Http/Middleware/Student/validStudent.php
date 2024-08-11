<?php

namespace App\Http\Middleware\Student;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class validStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
        if(Auth::guard('student')->check()){
            return $next($request);
        }
        else{
            return redirect()->route('studentLogin');
        }
    }
}
