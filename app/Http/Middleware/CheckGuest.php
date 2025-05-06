<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuest
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
        if(Auth::check())
        {
            if(Auth::user()->role->nom == 'prestataire')
            {
                return redirect('/professional/dashboard');
            }
            else if(Auth::user()->role->nom == 'admin')
            {
                return redirect('/admin/dashboard');
            }
            else if(Auth::user()->role->nom == 'client')
            {
                return redirect('/client/overview');
            }
        }
        return $next($request);
    }
}
