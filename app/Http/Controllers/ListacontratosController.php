<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateContratoRequest;
use App\Http\Requests\CreateContratoRequest;
use App\Tipo_de_contrato;
use App\Cargo;
use App\Empleado;
use App\Empresa;
use DB;

class ListacontratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth:employes'); //protege la ruta mensajes, solo se muestra haciendo login, se le paso employes como parametro para que no bloquie la ruta mensajes despues de hacer login

       //$this->middleware('roles:Administrador');//protege la ruta listacontratos dentro de la sesion y le pasa por parametro los distintos roles ej: ('roles:administrador,jefeDeInventario') si se agrega o se quitan roles aqui, tambien se debe hacer en el link
    }




    public function index()
    {
        $listacontratos = \App\Contrato::all();

        return view('listacontratos.index', compact('listacontratos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDeContrato = Tipo_de_contrato::pluck('Tipo','id_tipoDeContrato');//variable para el foreich del formulario con select
        $cargo = Cargo::pluck('Cargo','id_cargo');//variable para el foreich del formulario con select

        $empleado = Empleado::pluck('Nombre','id_empleado');//variable para el foreich del formulario con select
        $empresa = Empresa::pluck('Empresa','id_empresa');//variable para el foreich del formulario con select

        return view('listacontratos.create', compact('tipoDeContrato','cargo', 'empleado','empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContratoRequest $request)
    {
        //return $request->all();
        $listacontratos = \App\Contrato::create( $request->all() );

       //$listacontratos->tipoDeContrato()->create([$listacontratos]);
       // $listacontratos-> tipoDeContrato()->save($listacontratos);
         
        
        //$listacontratos->tipoDeContrato()->associate($listacontratos);
        //$listacontratos->save();
       


        // DB::table('contrato') -> insert([

          //  "Jornada" => $request->input('Jornada'),
            //"PeriodoDePrueva" => $request->input('PeriodoDePrueva'),
        //    "Salario" => $request->input('Salario'),
          //  "FechaInicio" => $request->input('FechaInicio'),
          //  "id_tipoDeContrato" => $request->input('id_tipoDeContrato'),
          //  "id_cargo" => $request->input('id_cargo'),
          //  "id_empleado" => $request->input('id_empleado'),
          //  "id_empresa" => $request->input('id_empresa'),
          //   ]);


        //return redirect()->route('contratos.index');
        return redirect()->route('contratos.index', compact('listacontratos'));

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
         $listacontratos = \App\Contrato::findOrFail($id);
        
        
        $tipoDeContrato = Tipo_de_contrato::pluck('Tipo','id_tipoDeContrato');//variable para el foreich del formulario con select
        $cargo = Cargo::pluck('Cargo','id_cargo');//variable para el foreich del formulario con select
        $empleado = Empleado::pluck('Nombre','id_empleado');//variable para el foreich del formulario con select
        $empresa = Empresa::pluck('Empresa','id_empresa');//variable para el foreich del formulario con select
        return view('listacontratos.edit', compact('listacontratos','tipoDeContrato','cargo','empleado','empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContratoRequest $request, $id)
    {
         //return $request->all(); //linea para ver que se esta enviando desde el formulario

         $listacontratos = \App\Contrato::findOrFail($id);
         
         $listacontratos->update($request->all());
        
         return back()->with('info','Contrato actualizado');//se coloca la llave info para lanzar mensage de se actualizo correctamente, la llave se activara con boostrack en el formulario edit de listaempleados
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listacontratos = \App\Contrato::findOrFail($id);
        $listacontratos->delete();
        return back()->with('infoDeleteContrato','contrato eliminado');
    }
}
