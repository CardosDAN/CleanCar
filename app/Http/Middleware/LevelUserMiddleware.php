<?php

namespace App\Http\Middleware;

use App\Models\Levels;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LevelUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $manager, $worker, $admin)
    {

        $role = DB::table('levels')->get('id')->toArray();
        $levels = DB::table('levels')->pluck('level_name')->toArray();
        $role[0] = $levels[0];

        if (in_array($manager, $levels)) {
            return $next($request);
        } else if (in_array($worker, $levels)) {
            return $next($request);
        } else if (in_array($admin, $levels)) {
            return $next($request);
        }


//        if($levels === 2 and $level) {
//            return $next($request);
//        }
//        }elseif ($role === 3 and $level){
//            return $next($request);
//        }elseif ($role === 4 and $level) {
//            return $next($request);
//        }elseif ($role === 1){
//            return $next($request);
//        }if (!auth()->user()->$role){
//            abort(403);
//        }

        return redirect()->route('home');
    }
}
