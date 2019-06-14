<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorial;
use App\Tema_del_material;
use App\Baja;
use App\Tipodematerial;
use App\Carrera;
use App\Ubicacion;

class MaterialbibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
    $this->middleware('auth:employes');//este middleware protege la ruta de usuarios sin autenticar


    $this->middleware('roles:Empleado');  
    }

    public function index()
    {
        $materialBibliotecas = \App\Materialbiblioteca::all();

        return view('materialbiblioteca.index', compact('materialBibliotecas') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $materialBibliotecas = \App\Materialbiblioteca::findOrFail($id);
      

       // $facultadd = Facultad::pluck('facultad','id_facultad');
        $editoriall = Editorial::pluck('Editorial','id_editorial');//'campo','id'
        $temaa = Tema_del_material::pluck('Area','id_temaDelMaterial');
        $bajaa = Baja::pluck('Baja','id_baja');
        $tipoDeMateriall = Tipodematerial::pluck('Tipo_de_material','id_tipoDeMaterial');
        $carreraa = Carrera::pluck('Carrera','id_carrera');
        $ubicacionn = Ubicacion::pluck('Sede','id_ubicacion');
        //$tipoDeConsultante = Tipo_de_consultante::pluck('tipoDeConsultante','id_tipoDeConsultante');
        //$perfiles = Perfil::pluck('Nombre_perfil', 'id_perfil');
        
        return view('materialbiblioteca.edit', compact('materialBibliotecas','editoriall','temaa','bajaa','tipoDeMateriall','carreraa','ubicacionn'));
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
        

        $materialBibliotecas = \App\Materialbiblioteca::findOrFail($id);
       // Materialbiblioteca->perfiles()->sync($request->perfiles);//el metodo sync evita duplicaciones en la tabla pivote consultanteBiblioteca_perfil al seleccionar los checkbox en el formulario

        $materialBibliotecas->update($request->all());
        return back()->with('infoUpdateMaterialBiblioteca','Material actualizado');//se coloca la llave info para lanzar mensage de se actualizo correctamente, la llave se activara con boostrack en el formulario edit de listaempleados
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materialBibliotecas = \App\Materialbiblioteca::findOrFail($id);
        $materialBibliotecas->delete();
        
        //return redirect()->route('empleados.index', compact('listaempleados'));//empleados.index, se verifica el comando php artisan r:l para poder redireccionar con index
        return back()->with('infoDeleteConsultantes','Consultante eliminado');
    }
}
