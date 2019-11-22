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
use App\Prestamo;
use App\Prestamos;
use App\Tema_del_material;
use App\Http\Requests\UpdatePrestamoRequest;
use App\Http\Requests\CreatePrestamoRequest;
use Illuminate\Support\Facades\Auth;

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
        $carreraLibro = $request->get('carreras');
        $titulo       = $request->get('Titulo');
        $temaLibro    = $request->get('temaDelMaterial');

        $consultaMaterial = Prestamo::orderBy('id_materialBiblioteca','DESC')
        ->carrera($carreraLibro)//codigo es el nombre del metodo en el modelo, pero sin scope
        ->titulo($titulo)
        ->tema($temaLibro)
        ->paginate(6);

        // $prestamoo = \App\Prestamo::all();
         return view('prestamo.index',compact('consultaMaterial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('prestamo.create');

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
        $idDelLibro = $request->get ('id_materialBiblioteca');
        //dd($idDelLibro);
        $idDeLaSede =$request ->get ('ubicaciones');
        //dd($idDeLaSede);
        $prestamos = new Prestamos;
        $prestamos->id_consultanteBiblioteca= Auth::user()->id_consultanteBiblioteca;

        $prestamos->save();
        //solo relaciones many to many en metodo store
        $prestamos->materialBibliotecas()->attach($idDelLibro);
        $prestamos->ubicaciones()        ->attach($idDeLaSede); 
        //dd($prestamos);
        return redirect()->route('consultante.index', compact('prestamos'))->with('infoPrestamo','Solicitud enviada');
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
