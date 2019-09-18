<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultante_biblioteca;
use App\Prestamos;
use Illuminate\Support\Facades\Auth;

class MisprestamosController extends Controller
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




    public function index()
    {
        $misprestamos = Prestamos::orderBy('id_prestamo','DESC')
        ->where('id_consultanteBiblioteca','=', Auth::user()->id_consultanteBiblioteca)->get();

        // $misprestamos->paginate(4);
        return view('misprestamos.index', compact('misprestamos'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
