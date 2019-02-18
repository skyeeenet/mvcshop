<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;

class isCartEmpty
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

        if(!Cart::getProducts()) {

            return 'error';
        } else {

            return $next($request);
        }
    }
}
