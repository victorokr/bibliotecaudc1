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
use App\Prestamos;
use App\Ubicacion;
use Carbon\Carbon;
use App\Http\Requests\UpdatePrestamoRequest;
use App\Http\Requests\CreatePrestamoRequest;
use Illuminate\Support\Facades\Auth;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
    $this->middleware('auth:employes');//este middleware protege la ruta de usuarios sin autenticar


    // $this->middleware('roles:Empleado');  
    }


    public function index(Request $request)
    {
        $nombreSolicitante = $request->get('id_consultanteBiblioteca');

        $prestamoss = \App\Prestamos::orderBy('id_prestamo','DESC')
        ->solicitante($nombreSolicitante)
        ->paginate(4);

        return view('prestamos.index',compact('prestamoss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $fe = new \DateTime();
        // dd($fe);

       // $fe = Carbon::now();
       // dd($fe);
        $prestamos = Prestamos::findOrFail($id);

        $listaMateriall = Materialbiblioteca::pluck('Titulo','id_materialBiblioteca');
        $ubicacioness   = Ubicacion::pluck('Sede','id_ubicacion');
        $tipoDePrestamoo = Tipodeprestamo::pluck('tipoDePrestamo','id_tipoDePrestamo');//'campo','id'
        $solicitantee = Consultante_biblioteca::pluck('Nombre','id_consultanteBiblioteca');
        $recibee = Empleado::pluck('Nombre','id_empleado');
        $novedadess = Novedad::pluck('novedad','id_novedad');
        $sancioness = Sancion::pluck('multa','id_sancion');
        $estadoPrestamoo = Estado::pluck('Estado','id_estado');

        
        

        // $updateEstado = DB::table('prestamo')
        // ->where(id_prestamo, $id)
        // ->update([
        //     'id_estado' => '4',
        //     'Fecha_prestamo' => '',
        //     'Fecha_devolucion' => ''
        // ])->get();

        
         
         //$prestamos->save();
         return view('prestamos.show', compact('prestamos','listaMateriall','ubicacioness','tipoDePrestamoo','solicitantee','recibee','novedadess','sancioness','estadoPrestamoo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestamos = \App\Prestamos::findOrFail($id);

        $listaMateriall = Materialbiblioteca::pluck('Titulo','id_materialBiblioteca');
        $ubicacioness   = Ubicacion::pluck('Sede','id_ubicacion');
        $tipoDePrestamoo = Tipodeprestamo::pluck('tipoDePrestamo','id_tipoDePrestamo');//'campo','id'
        $solicitantee = Consultante_biblioteca::pluck('Nombre','id_consultanteBiblioteca');
        $recibee = Empleado::pluck('Nombre','id_empleado');
        $novedadess = Novedad::pluck('novedad','id_novedad');
        $sancioness = Sancion::pluck('multa','id_sancion');
        $estadoPrestamoo = Estado::pluck('Estado','id_estado');

        return view('prestamos.edit', compact('prestamos','listaMateriall','ubicacioness','tipoDePrestamoo','solicitantee','recibee','novedadess','sancioness','estadoPrestamoo'));
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
        $prestamos = \App\Prestamos::findOrFail($id);
       // $estadoLibro = Materialbiblioteca::findOrFail($id);

        $prestamos->materialBibliotecas()->sync($request->materialBibliotecas);
        $prestamos->ubicaciones()->sync($request->ubicaciones); 
        $prestamos->novedades()->sync($request->novedades);
        $prestamos->sanciones()->sync($request->sanciones);

        if (is_null($request->novedades)) {
            # code...
       
        $prestamos->Fecha_prestamo = $request->input('Fecha_prestamo');
        $prestamos->Fecha_devolucion = $request->input('Fecha_devolucion');
        $prestamos->id_tipoDePrestamo = $request->input('id_tipoDePrestamo');
        $prestamos->id_consultanteBiblioteca = $request->input('id_consultanteBiblioteca');
        $prestamos->id_empleado =  Auth::user()->id_empleado;
        $prestamos->id_estado = '2';
        $prestamos->save();
        // $estadoLibro->estado()->sync('2');
        // $estadoLibro->save();

        return redirect()->route('prestamos.index')->with('infoUpdatePrestamo','Prestamo iniciado');
        }

        else{
        $prestamos->Fecha_prestamo = $request->input('Fecha_prestamo');
        $prestamos->Fecha_devolucion = $request->input('Fecha_devolucion');
        $prestamos->id_tipoDePrestamo = $request->input('id_tipoDePrestamo');
        $prestamos->id_consultanteBiblioteca = $request->input('id_consultanteBiblioteca');
        $prestamos->id_empleado =  Auth::user()->id_empleado;
        $prestamos->id_estado = '4';

        }
        
        $prestamos->save();
        

        return redirect()->route('prestamos.index')->with('infoUpdatePrestamo','Prestamo Finalizado');
        //return back()->with('infoUpdateMaterialBiblioteca','Material actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestamos = \App\Prestamos::findOrFail($id);
         $prestamos->delete();
         return back()->with('infoDeletePrestamo','Prestamo eliminado');
    }
}
