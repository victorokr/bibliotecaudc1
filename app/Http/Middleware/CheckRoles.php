<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
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
        $roles = array_slice(func_get_args(), 2);//optiene todos los parametros que se resiben, con esta funcion de php se optiene todos los roles
        
           if (auth()->user()->hasRoles ($roles) ) //el foreich que se usa para iterar sobre los roles esta en el modelo
            {
                return $next($request);
            }

        
        return redirect('/home');
    }
}
