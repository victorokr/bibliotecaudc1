<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateEditorialRequest;
use App\Http\Requests\CreateEditorialRequest;

class EditorialController extends Controller
{


    public function __construct(){
    $this->middleware('auth:employes');//este middleware protege la ruta gestion/libros.


    $this->middleware('roles:Empleado');//protege la ruta gestionlibros dentro de la sesion y le pasa por parametro los distintos roles ej: ('roles:administrador,jefeDeInventario') si se agrega o se quitan roles aqui, tambien se debe hacer en el link  
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaEditoriales = \App\Editorial::all();
        return view ('editorial.index', compact('listaEditoriales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEditorialRequest $request)
    {
       //return $request->all(); 
       $listaEditoriales = \App\Editorial::create( $request->all() );

       return redirect()->route('editorial.index', compact('listaEditoriales'));
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
        $listaEditoriales = \App\Editorial::findOrFail ($id);
        return view('editorial.edit', compact('listaEditoriales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditorialRequest $request, $id)
    {
         $listaEditoriales = \App\Editorial::findOrFail($id);
         
         $listaEditoriales->update($request->all());
        
         return back()->with('infoEditorial','Editorial actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaEditoriales = \App\Editorial::findOrFail($id);
        $listaEditoriales->delete();
        return back()->with('infoDeleteEditorial','Editorial eliminada');
    }
}
