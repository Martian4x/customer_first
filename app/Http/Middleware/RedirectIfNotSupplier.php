<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class RedirectIfNotSupplier
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
        if($request->user()->role!='Supplier'){
            
            return Redirect::back()->withMessage('You do not have Proper Privileges to perform such request..!')->with('flash_type', 'error');
        }
        return $next($request);
    }
}
