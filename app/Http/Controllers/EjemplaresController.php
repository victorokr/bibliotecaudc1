<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado_materialbiblioteca;
use App\Estado;

class EjemplaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejemplaress = \App\Estado_materialbiblioteca:: all();
        return view('ejemplares.index',compact('ejemplaress'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadoo = Estado::pluck('Estado','id_estado');//'campo','id'
        return view('ejemplares.create',compact('estadoo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //return $request->all();
        $ejemplaress = \App\Estado_materialbiblioteca::create($request->all());
        return redirect()->route('ejemplares.index', compact('ejemplaress'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $ejemplaress = \App\Estado_materialbiblioteca::findOrFail($id); 

        return view('ejemplares.show', compact('ejemplaress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ejemplaress = \App\Estado_materialbiblioteca::findOrFail($id);
        $estadoo = Estado_materialbiblioteca::pluck('codigo','id_estadoMaterialBiblioteca');//'campo','id'
        return view('ejemplares.edit', compact('ejemplaress','estadoo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $ejemplaress = \App\Estado_materialbiblioteca::findOrFail($id);
         $ejemplaress->update($request->all());
         return back()->with('infoEjemplar','Ejemplar actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejemplaress = \App\Estado_materialbiblioteca::findOrFail($id);
        $ejemplaress->destroy();
        return back()->with('infoDeleteEjemplar','Ejemplar eliminado');
    }
}
