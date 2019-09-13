<?php

namespace App\Exports;

use App\Materialbibliotecainventario;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaterialExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Materialbibliotecainventario::get(['Codigo_libro','Codigo_ISBN','Titulo','Edicion','NumeroDePaginas','id_baja','id_tipoDeMaterial']);
    }
}
