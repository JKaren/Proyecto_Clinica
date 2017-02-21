<?php

namespace App\Http\Middleware;

use Closure;

class MDusuarioPaciente
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
      if($var->tipo!='Paciente'){
          return 'jajaj eres un ovni';
      }
        return $next($request);
    }
}
