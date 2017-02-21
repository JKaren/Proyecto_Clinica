<?php

namespace App\Http\Middleware;

use Closure;

class MDusuarioAdmi
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
      $var=\Auth::user();
      if($var->tipo!='Admi'){
          return 'agg tmre ps no eres medico quieres ser Admi';
      }
        return $next($request);
    }
}
