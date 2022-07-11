<?php

namespace App\Http\Middleware;

use App\Exceptions\UserNotAllowedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminChecker
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws UserNotAllowedException
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->is_admin){
            return $next($request);
        }else{
            throw new UserNotAllowedException();
        }
    }
}
