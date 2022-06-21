<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
       if (Auth::check() && Auth::user()) {
        return $next($request);   
       }else{
        $notif = array(
            'message' => 'Need To Login First!',
            'alert-type' => 'error'
        );
        return redirect()->route('login')->withErrors($notif);
       }

        
    }
}
