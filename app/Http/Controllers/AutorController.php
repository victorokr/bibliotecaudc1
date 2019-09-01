<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;
use App\Http\Requests\UpdateAutorRequest;
use App\Http\Requests\CreateAutorRequest;
use Illuminate\Validation\Rule;

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
    public function index(Request $request)
    {
        

        $nombreAutor = $request->get('Nombre');
        

        $listaAutores = Autor::orderBy('id_autor','DESC')
        ->autor($nombreAutor)//autor es el nombre del metodo en el modelo, pero sin scope
        ->paginate(4);
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
         $this->validate(request(), ['Nombre' =>['required','string','max:40',Rule::unique('autor')->ignore($id,'id_autor')]]);

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
