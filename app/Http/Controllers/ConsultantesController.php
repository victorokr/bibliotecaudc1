<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Consultante_biblioteca;
//use App\Auth;

class ConsultantesController extends Controller
{
    //use AuthenticatesUsers;
    

    public function showLoginForm()
    {
        return view('consultantes.login');
    }

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function guard()
    {
        return auth()->guard('consultants');
    }

    protected $guard = 'consultants';

    
    public function index()
    {
        return view('consultants');
    }


    public function authenticated()
    {

    	return redirect('/consultantes/area');
    }


     public function validator(Request $request)
    {
      $rules = [ 
               'email' =>  'email|required|string',
               'password' => 'required|string',
             ];
    }
    
    


    public function login(Request $request)
    {
        $this->validator($request);

        //return $credentials;
        
        if (Auth::guard('consultants')->attempt($request->only('email','password'),$request->filled('remember'))) 
        {

           return redirect()
           ->intended(url('/consultantes/area'))
           ->with('status','eres admin');
        }

        return back()
        ->withErrors (['email' => trans('auth.failed')])
        ->withInput (request(['email']));
    }
}
