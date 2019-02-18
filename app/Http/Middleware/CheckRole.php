<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckRole
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

        if (Auth::guest()) {

            return redirect('login');
        }

        $id = Auth::id();

        $user_role = DB::table('users')->where('id', $id)->first()->role;

        if ($user_role == "admin") {

            return $next($request);
        } else {

            return redirect('/');
        }

    }
}
