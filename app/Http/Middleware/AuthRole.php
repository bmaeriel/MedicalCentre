<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T20:16:39+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-12T14:19:17+00:00




namespace App\Http\Middleware;

use Closure;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, String $role)
     {
       if(!$request->user() || !$request->user()->hasRole($role)){
         return redirect()->route('home');
       }
         return $next($request);
     }
}
