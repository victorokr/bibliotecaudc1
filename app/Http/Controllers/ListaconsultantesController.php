<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Institucion_universidad;
use App\Facultad;
use App\Tipo_de_consultante;
use App\Consultante_biblioteca;
use App\Http\Requests\UpdateConsultanteRequest;
use Illuminate\Validation\Rule;
use App\Http\Requests\CreateConsultanteRequest;

class ListaconsultantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth:employes'); //este middleware protege la ruta lista/consultantes.


        $this->middleware('roles:Empleado');//protege la ruta lista consultantes dentro de la sesion y le pasa por parametro los distintos roles ej: ('roles:administrador,jefeDeInventario') si se agrega o se quitan roles aqui, tambien se debe hacer en el link
        
    }




    public function index(Request $request)
    {
        //$listaconsultantes = \App\consultante_biblioteca::all();

        $documento   = $request->get('Documento');

        $listaconsultantes = Consultante_biblioteca::orderBy('id_consultanteBiblioteca','DESC')
        ->documento($documento)//documento es el nombre del metodo en el modelo, pero sin scope
        ->paginate(4);

        return view('listaconsultantes.index', compact('listaconsultantes') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucionUniversidadd = Institucion_universidad::pluck('institucion_Universidad','id_institucionUniversidad');

        $facultadd = Facultad::pluck('facultad','id_facultad');

        $tipoDeConsultante = Tipo_de_consultante::pluck('tipoDeConsultante','id_tipoDeConsultante');

        $perfiles = Perfil::pluck('Nombre_perfil', 'id_perfil');//esta linea le pasa los roles actuales al form create, el metodo pluck recupera todos los valores de una clave dada, esta linea se usa para una relacion muchosa muchos

        return view('listaconsultantes.create', compact('institucionUniversidadd','facultadd','tipoDeConsultante','perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConsultanteRequest $request)
    {
        //return $request->all();
        $listaconsultantes = \App\Consultante_biblioteca::create( $request->all() );
        $listaconsultantes->perfiles()->attach($request->perfiles);

        
        $listaconsultantes->roles()->attach(4);//asigna el rol estudiante por defecto al crear un consultante

        return redirect()->route('consultantes.index', compact('listaconsultantes'));
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
        $listaconsultantes = \App\Consultante_biblioteca::findOrFail($id);
        $institucionUniversidadd = Institucion_universidad::pluck('institucion_Universidad','id_institucionUniversidad');

        $facultadd = Facultad::pluck('facultad','id_facultad');

        $tipoDeConsultante = Tipo_de_consultante::pluck('tipoDeConsultante','id_tipoDeConsultante');
        $perfiles = Perfil::pluck('Nombre_perfil', 'id_perfil');
        
        return view('listaconsultantes.edit', compact('listaconsultantes','institucionUniversidadd','facultadd','tipoDeConsultante','perfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultanteRequest $request, $id)
    {

         

        $this->validate(request(), ['email' =>['required','email','max:50',Rule::unique('consultante_biblioteca')->ignore($id,'id_consultanteBiblioteca')]]);
       // return $request->all(); //linea para ver que se esta enviando desde el formulario

        $listaconsultantes = \App\Consultante_biblioteca::findOrFail($id);
        $listaconsultantes->perfiles()->sync($request->perfiles);//el metodo sync evita duplicaciones en la tabla pivote consultanteBiblioteca_perfil al seleccionar los checkbox en el formulario

        $listaconsultantes->update($request->all());
        return back()->with('infoUpdateConsultante','Consultante actualizado');//se coloca la llave info para lanzar mensage de se actualizo correctamente, la llave se activara con boostrack en el formulario edit de listaempleados
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaconsultantes = \App\Consultante_biblioteca::findOrFail($id);
        $listaconsultantes->delete();
        
        //return redirect()->route('empleados.index', compact('listaempleados'));//empleados.index, se verifica el comando php artisan r:l para poder redireccionar con index
        return back()->with('infoDeleteConsultantes','Consultante eliminado');
    }
}
