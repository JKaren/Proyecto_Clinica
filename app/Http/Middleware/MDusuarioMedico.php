<?php

namespace App\Http\Middleware;

use Closure;

class MDusuarioMedico
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
      if($var->tipo!='Medico'){
          return 'agg tmre ps eres veterinario';
      }
        return $next($request);
    }
}
