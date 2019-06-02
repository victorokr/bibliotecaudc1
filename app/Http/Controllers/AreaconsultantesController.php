<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaconsultantesController extends Controller
{


    public function consultante()
    {
    	return view('consultante');
    }

    public function __construct()
    {
    	$this->middleware('auth:consultants', ['only' => ['consultante']]); //middleware para restringir la ruta consultantes, consultants hace referencia al guard que tabaja con la tabla consultante_biblioteca

    	//$this->middleware('roles:Estudiante');
    }


}
