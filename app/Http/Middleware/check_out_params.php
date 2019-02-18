<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;

class check_out_params extends Controller
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

        /*$this->validate($request, [

            'first_name' => 'required|max:10',
        ]);*/

        return $next($request);
    }
}
