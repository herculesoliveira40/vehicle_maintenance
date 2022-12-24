<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAccess
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
        if (Auth::check() && Auth::user()->profile == 0) {
            return $next($request);
        } 
        else {
            if (!Auth::check()) {
                return redirect('/login')->with('mensagem', 'Faça login!');
            } 
            else {
               // dd("Ops, você não tem permissão");
             return redirect()->back()->with('alerta', 'Ops você não tem permissão para isso:ç');
        }
        }
    }
}
