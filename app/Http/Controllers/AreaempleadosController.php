<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaempleadosController extends Controller
{
    public function empleado()
    {
    	return view('empleado');
    }

    public function __construct()
    {
        $this->middleware('auth:employes'); //este middleware protege la ruta area, a la cual se redirecciona el login empleados
        
    }
}
