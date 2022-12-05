<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ageCheck
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
        /**
         * if user < 18  -> cant access the web
         *
         * "$request ->age" means that age is present in the request
         * "$request -> age<18" checks if age request is less than 18
         * "/middleware-no-access" is the url defined in the routes in webp.php wher the user should be redirectes
         * http://127.0.0.1:8000/middleware-users/
         * eg http://127.0.0.1:8000/middleware-users?age=10
         */

         if($request ->age && $request -> age<18){
            return redirect('/middleware-no-access');
         }
        //  else{
        //     return redirect('/middleware-home');
        //  }
         //else
        return $next($request);
    }
}
