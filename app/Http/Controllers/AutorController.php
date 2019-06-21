<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateAutorRequest;
use App\Http\Requests\CreateAutorRequest;

class AutorController extends Controller
{



    public function __construct(){
    $this->middleware('auth:employes');


    $this->middleware('roles:Empleado');  
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaAutores = \App\Autor::all();
        return view('autor.index', compact('listaAutores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAutorRequest $request)
    {
        //return $request->all(); 
       $listaAutores = \App\Autor::create( $request->all() );

       return redirect()->route('autor.index', compact('listaAutores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaAutores = \App\Autor::findOrFail ($id);
        return view('autor.edit', compact('listaAutores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAutorRequest $request, $id)
    {
         $listaAutores = \App\Autor::findOrFail($id);
         
         $listaAutores->update($request->all());
        
         return back()->with('infoAutor','Autor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaAutores = \App\Autor::findOrFail($id);
        $listaAutores->delete();
        return back()->with('infoDeleteAutor','Autor eliminado');
    }
}
