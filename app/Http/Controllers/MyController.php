<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MaterialExport;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Entrada;
use App\Tipodematerial;
use App\Ubicacion;

class MyController extends Controller
{
    public function importExportView()
    {
        $entradass       = Entrada::pluck('Entrada','id_entrada');
        $tipoDeMateriall = Tipodematerial::pluck('Tipo_de_material','id_tipoDeMaterial');
        $ubicacionn      = Ubicacion::pluck('Sede','id_ubicacion');
    	return view('cargamasiva.import', compact('entradass','tipoDeMateriall','ubicacionn'));
    }

    public function export()
    {
    	return Excel::download(new MaterialExport, 'material.xlsx');
    }
    
    public function import(Request $request)
    {
        $errors = array();
        try {
    	$insertar = Excel::import(new MaterialImport($request), request()->file('file'));
        //dd ($insertar);
       
        //$insertar->entradas()->attach($request->entradas);

    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
     $failures = $e->failures();
     
     foreach ($failures as $failure) {
         array_push ($errors, [
            'row' => $failure->row(),// row that went wrong
            'failure' => $failure->attribute(), // either heading key (if using heading row concern) or column
          'errors' => $failure->errors(), // Actual error messages from Laravel validator
          'value' => $failure->values() // The values of the row that has failed.
        ]);
     }
    }
    	return redirect()->route('inventario.index', compact('insertar'))->with('infoImport','Material Agregado desde plantilla xlsx');
    }

  


    //  public function bindValue(Cell $cell, $value)
    // {
    //     if (is_numeric($value)) {
    //         $cell->setValueExplicit($value, DataType::TYPE_NUMERIC);

    //         return true;
    //     }

    //     // else return default behavior
    //     return parent::bindValue($cell, $value);
    // }

}
