<?php

namespace App\Http\Middleware;

use App\Models\danhmuc;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class web
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
        $danhmucs = danhmuc::select("*")->get();
        view()->share('danhmucs', $danhmucs);
        if (Auth::check()) {
            view()->share('user', Auth::user());
        } else {
            view()->share('user', null);
        }


        return $next($request);
    }
}
