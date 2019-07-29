<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materialbiblioteca;
use App\Estado;
use App\Estado_materialbiblioteca;
use App\Tipodeprestamo;
use App\Consultante_biblioteca;
use App\Empleado;
use App\Novedad;
use App\Sancion;
use App\Ubicacion;
use App\Http\Requests\UpdatePrestamoRequest;
use App\Http\Requests\CreatePrestamoRequest;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
    $this->middleware('auth:consultants');//este middleware protege la ruta de usuarios sin autenticar


    // $this->middleware('roles:Empleado');  
    }
    


    public function index(Request $request)
    {
        // $codigoisbn = $request->get('Codigo_ISBN');
        // $titulo     = $request->get('Titulo');
        // $estado     = $request->get('Estado');

        // $consultaMaterial = materialBiblioteca::orderBy('id_materialBiblioteca','ASC')
        // ->codigo($codigoisbn)//codigo es el nombre del metodo en el modelo, pero sin scope
        // ->titulo($titulo)
        // ->paginate(4);

        //  // $consultaMaterial = materialBiblioteca::orderBy('id_estadoMaterialBiblioteca','ASC')
        //  // ->estado($estado);

        // $prestamoo = \App\Prestamo::all();
        // return view('prestamo.index',compact('prestamoo','consultaMaterial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $codigoisbn = $request->get('Codigo_ISBN');
        $titulo     = $request->get('Titulo');
        $estado     = $request->get('Estado');

        $consultaMaterial = Materialbiblioteca::orderBy('id_materialBiblioteca','ASC')
        ->codigo($codigoisbn)//codigo es el nombre del metodo en el modelo, pero sin scope
        ->titulo($titulo)
        ->paginate(2);

        $tipoDePrestamoo = Tipodeprestamo::pluck('tipoDePrestamo','id_tipoDePrestamo');//'campo','id'
        $solicitantee = Consultante_biblioteca::pluck('Nombre','id_consultanteBiblioteca');
        $listaMateriall = Materialbiblioteca::pluck('Titulo','id_materialBiblioteca');
        $ubicacioness   = Ubicacion::pluck('Sede','id_ubicacion');
        //$recibee = Empleado::pluck('Nombre','id_empleado');
        //$estadoPrestamoo = Estado::pluck('Estado','id_estado');
        //$novedadess = Novedad::pluck('novedad','id_novedad');
        //$sancioness = Sancion::pluck('diasTranscurridos','id_sancion');

        return view('prestamo.create',compact('tipoDePrestamoo','solicitantee','consultaMaterial','listaMateriall','ubicacioness'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePrestamoRequest $request)
    {
        //return $request->all(); 
        $prestamos = \App\Prestamo::create( $request->all() );//solo relaciones many to many en metodo store

        $prestamos->materialBibliotecas()->attach($request->materialBibliotecas);
        $prestamos->ubicaciones()->attach($request->ubicaciones); 
        //$prestamos->novedades()->attach($request->novedades);
        //$prestamos->sanciones()->attach($request->sanciones);

        return redirect()->route('consultante.create', compact('prestamos'));
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
        // $prestamos = \App\Prestamo::findOrFail($id);

        // return view('consultante.edit');
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
        // $prestamos = \App\Prestamo::findOrFail($id);

        // $prestamos->update($request->all());

        // return redirect()->route('consultante.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // $prestamos = \App\Prestamo::findOrFail($id);
         // $prestamos->delete();
         // return back()->with('infoDeletePrestamo','Prestamo eliminado');
    }
}
