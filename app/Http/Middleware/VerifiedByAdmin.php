<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class VerifiedByAdmin
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
        if(!Auth::user()||(!Auth::user()->verifiedByAdmin&&!Auth::user()->isAdmin)){
            //Session::flash('danger','Please wait till admin verifies your account!');
            return redirect('/');
        }
        return $next($request);
    }
}
