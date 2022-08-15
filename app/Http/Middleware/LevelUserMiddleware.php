<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $level)
    {
        $role = Auth::user()->level_id;
        if($role === 2 and $level){
            return $next($request);
        }elseif ($role === 3 and $level){
            return $next($request);
        }elseif ($role === 4 and $level) {
            return $next($request);
        }
//        }elseif ($role === 1){
//            return redirect()->route('home');
//        }
//        if (!auth()->user()->level){
//            abort(403);
//        }

        return redirect()->route('home');
    }
}
