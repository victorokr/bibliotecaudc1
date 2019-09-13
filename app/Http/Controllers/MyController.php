<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MaterialExport;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    public function importExportView()
    {
    	return view('cargamasiva.import');
    }

    public function export()
    {
    	return Excel::download(new MaterialExport, 'material.xlsx');
    }

    public function import()
    {
    	Excel::import(new MaterialImport, request()->file('file'));
    	return redirect()->route('inventario.index')->with('infoImport','Material Agregado desde plantilla xlsx');
    }
}
