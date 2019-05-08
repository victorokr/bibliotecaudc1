<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class pagesController extends Controller
{

	
	//public function __construct()
//	{
//		$this->middleware('example',['only'=> ['saludo']]); /*se agrega el bloqueo a solo saludo, tambien se puede usar except para aplicar a todos los metodos, menos al que este indicado*/
//	}






    public function home()
    {
    	return view('home');
    }



	


	




	public function saludo($nombre = "Invitado")
    {
    	
		return view('saludo',compact ('nombre'));
    }




}
