<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MaterialExport;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Entrada;

class MyController extends Controller
{
    public function importExportView()
    {
        $entradass = Entrada::pluck('Entrada','id_entrada');
    	return view('cargamasiva.import', compact('entradass'));
    }

    public function export()
    {
    	return Excel::download(new MaterialExport, 'material.xlsx');
    }

    public function import(Request $request)
    {
    	$insertar = Excel::import(new MaterialImport, request()->file('file'));

       
        //$insertar->entradas()->attach($request->entradas);

    	return redirect()->route('inventario.index', compact('insertar'))->with('infoImport','Material Agregado desde plantilla xlsx');
    }
}
