<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class is_admin
{

    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_admin) {
          return $next($request);
        }
        else{
          return redirect('home');;
        }
    }
}
